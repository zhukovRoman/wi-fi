<?php

class NodeController extends Controller {
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'SelectCountry','GetStartPage','SelectArea'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Node;
        //$model->testfill();
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Node'])) {
            
            
            // зададим город регион и страну по умлочанию
            $city = City::model()->findByPk(1);
            $model->city= $city->id;
            $model->region = $city->region_id;
            $model->country = 1;
            $model->attributes = $_POST['Node'];
           
            if ($model->save())
            {
                if ($model->saveGroup($_POST['tags']))
                    $this->redirect(array('view', 'id' => $model->id));
            }
        }
       
        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Node'])) {
            $model->attributes = $_POST['Node'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Node');


        $this->render('index', array(
            'dataProvider' => $dataProvider,
            'all' => Node::model()->findAll(),
        ));
    }
    
    public function actionGetStartPage()
    {
        $this->layout="accessPoint";
        $sty = array ('bodycolor'=>"#fff");
        $this->styles = $sty;
        $this->render('startPage',array (
            'content'=>"dfs",
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Node('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Node']))
            $model->attributes = $_GET['Node'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Node::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'node-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionSelectArea() {
        if (isset($_POST['select'])) {

            $current = intval($_POST['select']);
//            echo $current;
//            die();
            $districts = District::model()->findAll('area_id=:area',
                                            array(':area'=>$current));
            $html = "<option value='0'>-- Выберете округ --</option>";
            foreach ($districts as $dis) {
                $html .= "<option value='$dis->id'>$dis->name</option>";
            }

            echo json_encode(array('count' => count($districts),
                'html' => $html));
        }
    }
    
    public function actionSelectCountry() {
        if (isset($_POST['select'])) {

            $current = intval($_POST['select']);
            
            $regions = Region::model()->findAll();
            $html = "<option value='0'>-- Выберете край --</option>";
            foreach ($regions as $reg) {
                $html .= "<option value='$reg->id'>$reg->name</option>";
            }

            echo json_encode(array('count' => count($regions),
                'html' => $html));
        }
    }

}
