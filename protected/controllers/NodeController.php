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
           
            $this->testfill($model);
            
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
            {
                if ($model->saveGroup($_POST['tags']))
                    $this->redirect(array('view', 'id' => $model->id));
            }
                
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
    
    public function getContent($nodeId)
        {
            $city = Node::model()->findByPk($nodeId)->city;
            $contents = Content::model()->findAll("city_id=$city");
            $num = count($contents);
            $content = $contents[$num-1];
            return array (
                'usd'=>$content->usd,
                'euro'=>$content->euro,
            );
        }
        
        
    public function actionGetStartPage($id)
    {
        
        $this->layout="accessPoint";
        //$params['style'] = $this->getViewParams($id);
        //$params['content'] = $this->getContent($id);
        $this->startPageContent = $this->getContent($id);
        $this->startPageStyle = $this->setDeffParams($this->getViewParams($id));
        $this->render('startPage',$params);
    }
    protected function setDeffParams($style)
    {
        if($style['bg_image']==null)
        {
            $style['bg_image']=  Node::$DEF_BG_IMAGE;
            $style['content_margin_top'] = Node::$DEF_MARGIN_TOP;
            $style['bg_color']=  Node::$DEF_BG_COLOR;
        }
        if ($style['theme']==null)
            $style['theme']=  Node::$DEF_THEME;
        if ($style['top_banner']==null)
        {
            $style['top_banner']=  Node::$DEF_BANNER;
            $style['url_top_banner'] = Yii::app()->createAbsoluteUrl(Node::$DEF_PATH);
        }
         if ($style['down_banner']==null)
        {
            $style['down_banner']=  Node::$DEF_BANNER;
            $style['url_down_banner'] = Yii::app()->createAbsoluteUrl(Node::$DEF_PATH);
        }
        return $style;
    }
    
    protected function saveStatistic ($node_id, $company_id)
    {
            $stat = new Statistic;
            $stat->time = date("Y-m-d H:i:s");
            $stat->node_id=$node_id;
            $stat->company_id = $company_id;
            $stat->mac = "00000000";
            $stat->save();
    }
    protected function getViewParams($id)
    {
        $style = array();
        $brandingCompany = $this->getBrandingCompany($id);
        if ($brandingCompany!=null)
        {
            $style['bg_image']=$brandingCompany->background;
            $style['content_margin_top'] = $brandingCompany->margin_top;
            $style['bg_color']=$brandingCompany->bg_color;
        }
        $topBanner; 
        //echo $brandingCompany->banner1;
        if($brandingCompany->banner1!="0") 
        {
            
            $topBanner = $brandingCompany;
        }
        else $topBanner = $this->getTopBannerCompany($id, $brandingCompany);
        if ($topBanner!=null)
        { 
            $style['top_banner']=$topBanner->banner1;
            $style['url_top_banner']=$topBanner->url1;
        }
        $downBanner;
        if ($brandingCompany->banner2!="0")
            $downBanner = $brandingCompany;
        else
        {
            if ($topBanner->banner2!="0")
                $downBanner = $topBanner;
            else 
                 $downBanner = $this->getDownBannerCompany($id, $topBanner);
        }   
        if ($downBanner!=null)
        {
            
            $style['down_banner']=$downBanner->banner2;
            $style['url_down_banner']=$downBanner->url2;
        }     
       
        return $style;
    }
    
    protected function companyTurnir($type, $nodeId)
    {
        $criteria = new CDbCriteria;
        $criteria->condition = "nodeCompanies.node_id=:node and t.balance>0 and ($type != 0 or $type!='0') and t.status=5";
        $criteria->params = array(':node' => $nodeId);   
        $criteria->with = array('nodeCompanies'); 
        
        $companiesToType = Advcomp::model()->findAll($criteria);
        $companniesWithGoodBalance = array();
        $summPrice = 0;
        //echo "$type turnir<br>";
        foreach ($companiesToType as $comp)
        {
            $currentCPP = NodeCompany::model()->find("company_id=$comp->id AND node_id = $nodeId")->cpp;
            if ($comp->balance>=$currentCPP)
            {
                $companniesWithGoodBalance[] = $comp;
                $summPrice+=$currentCPP*$currentCPP;
            }  
        }
        
        $rand = rand(1, 99999)/100000;
        //echo "rand = $rand <br>";
        //echo "summ = $summPrice <br>";
        $chances = array();
        foreach ($companniesWithGoodBalance as $comp)
        {
            $currentCPP = NodeCompany::model()->find("company_id=$comp->id AND node_id = $nodeId")->cpp;
            $chances[] = array('l'=> ($currentCPP*$currentCPP)/$summPrice, 
                                'id'=>$comp->id,
                                'cpp'=>$currentCPP);
            
        }
        //print_r($chances);
        //echo "<br>";
        $currentPosition = 0 ;
        foreach ($chances as $comp)
        {
            $currentPosition+=$comp['l'];
            if ($currentPosition>=$rand)
            {
                //echo "win ". $comp['id'];
                $this->saveStatistic($nodeId, $comp['id']);
                $delta = NodeCompany::model()->find("company_id=".$comp['id']." AND node_id = $nodeId")->cpp;
                $winCompany = Advcomp::model()->findByPk($comp['id']);
                $winCompany->balance -= $comp['cpp'];
                $winCompany->save(false);
                return $winCompany;
            }
            
        }

    }
    
    protected function getBrandingCompany($nodeId)
    {
        return $this->companyTurnir("branding", $nodeId);        
    }
    
    protected function getTopBannerCompany($nodeId, $brandingCompany)
    {
//        if ($brandingCompany!=null&&$brandingCompany->banner1)
//        {
//            return $brandingCompany;
//        }
        return $this->companyTurnir("banner1", $nodeId);
    }
    protected function getDownBannerCompany($nodeId, $topBannerCompany)
    {
//         if ($topBannerCompany!=null&&$topBannerCompany->banner2)
//        {
//            return $topBannerCompany;
//        }
        return $this->companyTurnir("banner2", $nodeId);
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
    
    protected  function testfill($model) {

        $model->hostname = "точка" . date("his");
        $model->fw_version = "1.1";
        $model->mac_lte = "00-00-00-00-00";
        $model->mac_wifi = "00-00-00-00-01";
        $model->serial = "123-123-123";
        $model->geo_lat = 55.7 + (rand(0, 10) / 100);
        $model->geo_long = 37.6 + (rand(0, 10) / 100);
        $model->ip_address = "123.123.1";      
        $model->district = 1;
        $model->area = 3;
        $model->setup_by = 1;  
        $model->setup_contact = "sdfgh";
        $model->setup_address="adress";
        $model->setup_place = "palce";
        $model->setup_date = date("Y-m-d");
        
        $model->setup_tel = "12312312";
        $model->activated = date("Y-m-d H:i:s");
        $model->inet_type = 1;
    }

}
