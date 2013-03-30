<?php

class SiteController extends Controller {

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->render('index');
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact() {
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                $headers = "From: $name <{$model->email}>\r\n" .
                        "Reply-To: {$model->email}\r\n" .
                        "MIME-Version: 1.0\r\n" .
                        "Content-type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    public function actionUploadBg() {
        Yii::import("ext.EAjaxUpload.qqFileUploader");

        $folder = 'images/bg/'; // folder for uploaded files
        $allowedExtensions = array("jpg", "jpeg"); //array("jpg","jpeg","gif","exe","mov" and etc...
        $sizeLimit = 10 * 1024 * 1024; // maximum file size in bytes
        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
        $result = $uploader->handleUpload($folder);

        $im = ImageCreateFromJpeg($result['filename']);
        $IS = GetImageSize($result['filename']);
        if ($IS[0]!=1920)
        {
            //!!!!!!!!!! удалить файл !!!!!!!!!!!!! 
            echo htmlspecialchars(json_encode(array ('success'=>false, 'msg'=>"wrong dimension")), ENT_NOQUOTES);
            return;
        }
        $h = $IS[1];
        $rgb = ImageColorAt($im, 1, $h-1);
        

        $result['red'] = dechex(($rgb >> 16) & 0xFF);
        $result['green'] = dechex(($rgb >> 8) & 0xFF);
        $result['blue'] = dechex($rgb & 0xFF);
        $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);

        //$fileSize = filesize($folder . $result['filename']); //GETTING FILE SIZE
        //$fileName = $result['filename']; //GETTING FILE NAME

        echo $return; // it's array
    }

    public function actionuploadTopBanner() {
        Yii::import("ext.EAjaxUpload.qqFileUploader");

        $folder = 'images/banners/top/'; // folder for uploaded files
        $allowedExtensions = array("jpg", "jpeg"); //array("jpg","jpeg","gif","exe","mov" and etc...
        $sizeLimit = 10 * 1024 * 1024; // maximum file size in bytes
        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
        $result = $uploader->handleUpload($folder);
        Yii::app()->ih->load($result['filename'])->resize(728,90,false)->save();
        $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);

        //$fileSize = filesize($folder . $result['filename']); //GETTING FILE SIZE
        //$fileName = $result['filename']; //GETTING FILE NAME

        echo $return; // it's array
    }
    
     public function actionuploadDownBanner() {
        Yii::import("ext.EAjaxUpload.qqFileUploader");

        $folder = 'images/banners/down/'; // folder for uploaded files
        $allowedExtensions = array("jpg", "jpeg"); //array("jpg","jpeg","gif","exe","mov" and etc...
        $sizeLimit = 10 * 1024 * 1024; // maximum file size in bytes
        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
        $result = $uploader->handleUpload($folder);
        Yii::app()->ih->load($result['filename'])->resize(728,90,false)->save();
        $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);

        //$fileSize = filesize($folder . $result['filename']); //GETTING FILE SIZE
        //$fileName = $result['filename']; //GETTING FILE NAME

        echo $return; // it's array
    }
}