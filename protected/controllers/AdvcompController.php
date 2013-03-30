<?php

class AdvcompController extends Controller {
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
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'addStep1', 'addStep2', 'Companypage', 'editprice', 'UpdateEachPrice'),
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

    public function actionCompanypage($id)
    {
        $model = $this->loadModel($id);
        $this->render('view', array(
                                    'model' => $model,                                    
                        ));
    }
    
   
    public function actionaddStep1() {
        $model = new Advcomp;
        
        if (isset($_POST['Advcomp'])) {

            $model->attributes = $_POST['Advcomp'];
            //print_r($model->attributes);
            $model->status = 1;
            $model->create_date = date("Y-m-d H:i:s");
            $model->modify_date = date("Y-m-d H:i:s");
            $model->owner = Yii::app()->user->getId();
            if (isset($_POST['cities']))
                $model->cities = implode(",", $_POST['cities']);
            if (isset($_POST['tags']))
                $model->tags = implode(",", $_POST['tags']);
           // print_r($model->attributes);
           // die();
            if ($model->save()) {
                $minPrice = $model->getMinPrice();
                
                $selectedNodes = explode(",", $model->selectedPoint);
                foreach ($selectedNodes as $node) {
                    $node_comp = new NodeCompany();
                    $node_comp->company_id = $model->id;
                    $node_comp->node_id = $node;
                    $node_comp->cpp = $minPrice;
                    $node_comp->save();
                }
                
                $this->redirect(array('addStep2', 'id' => $model->id));
            }
        }
        //$model->name = "New company";

        $cities = City::model()->findAll();
        $nodesOfCity = array();
        foreach ($cities as $city) {
            $nodesOfCity[$city->id] = array();
            foreach ($city->nodes as $node) {
                $nodesOfCity[$city->id][] = $node->id;
            }
        }

        $nodesOfTag = array();
        foreach (Tag::model()->findAll() as $tag) {
            $nodesOfTag[$tag->id] = array();
            foreach ($tag->nodeTags as $node) {
                $nodesOfTag[$tag->id][] = $node->node_id;
            }
        }


        $this->render('form', array(
            'model' => $model,
            'all' => Node::model()->findAll(),
            'cities' => $cities,
            'citiesSelect' => $nodesOfCity,
            'tagsSelect' => $nodesOfTag,
            'tags' => Tag::model()->findAll(),
        ));
    }

     public function actionaddStep2($id)
    {
        $model = Advcomp::model()->findByPk($id);
        if ($model==null)
        {
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }
        
        if (isset($_POST))
        {
            $summ = $_POST['summ'];
            if (isset($_POST['fromRobokassa']))
            {
//                echo "Оплата компании на $summ через RK";
//                die();
                   $model->balance += $summ;
                   $model->status = 5;
                   $model->saveAttributes(array('balance', 'status'));
                   $this->redirect(array('companypage', 'id' => $model->id));
            }
            if (isset ($_POST['fromBalance']))
            {
               $user = Account::model()->findByPk(Yii::app()->user->getId());
               if ($user->balance>=$summ)
               {
                   $user->balance-=$summ;
                   $user->saveAttributes(array ('balance'));
                   $model->balance += $summ;
                   $model->status = 5;
                   $model->saveAttributes(array('balance', 'status'));
                   $this->redirect(array('companypage', 'id' => $model->id));
                    
               }
            }
        }
        
        
        $this->render('step2', array(
                'model' => $model,
                'acc' => Account::model()->findByPk(Yii::app()->user->getId()),
        ));
        
        
    }

    public function actionUpdateEachPrice()
    {
        print_r($_POST);
        $id = intval(($_POST['pk']));
        $model = NodeCompany::model()->findByPk($id);
        if ($model!=null)
        {
            $model->cpp = $_POST['value'];
            $model->save();
        }

    }
    public function actionEditPrice($id)
    {
        
        //$nodes = NodeCompany::model()->findAll("company_id=$id");
        $criteria = new CDbCriteria;
        //$criteria->addCondition('status_id=1');
        $criteria->condition = "t.company_id=:company";

        $criteria->params = array(':company' => $id);
        $criteria->with = array('node');

        $dataProvider = new CActiveDataProvider("NodeCompany", array(
                    'criteria' => $criteria,
                    //'sort' => $sort,
                    'pagination' => array(
                        'pageSize' => 20,
                    ),
                ));
        
        $this->render("tablePrice", array ("nodes"=>$nodes, "dp" => $dataProvider));
    }
   
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Advcomp'])) {
            $oldNodes = explode(",", $model->selectedPoint);
            $model->attributes = $_POST['Advcomp'];
            $model->status = 1;
            $model->modify_date = date("Y-m-d H:i:s");
            if (isset($_POST['cities']))
                $model->cities = implode(",", $_POST['cities']);
            if (isset($_POST['tags']))
                $model->tags = implode(",", $_POST['tags']);
            if ($model->save()) {
                $minPrice = $model->getMinPrice();
                $newNodes = explode(",", $model->selectedPoint);
                
                $forDelete = array_diff($oldNodes, $newNodes);
                $forAdd = array_diff($newNodes, $oldNodes);
                foreach ($forDelete as $node) {
                    $node_comp = NodeCompany::model()->find("company_id=$model->id AND node_id=$node");
                    $node_comp->delete();
                }
                 foreach ($forAdd as $node) {
                    $node_comp = new NodeCompany();
                    $node_comp->company_id = $model->id;
                    $node_comp->node_id = $node;
                    $node_comp->cpp = $minPrice;
                    $node_comp->save();
                }
                
                $this->redirect(array('CompanyPage', 'id' => $model->id));
            }
        }

        $cities = City::model()->findAll();
        $nodesOfCity = array();
        foreach ($cities as $city) {
            $nodesOfCity[$city->id] = array();
            foreach ($city->nodes as $node) {
                $nodesOfCity[$city->id][] = $node->id;
            }
        }

        $nodesOfTag = array();
        foreach (Tag::model()->findAll() as $tag) {
            $nodesOfTag[$tag->id] = array();
            foreach ($tag->nodeTags as $node) {
                $nodesOfTag[$tag->id][] = $node->node_id;
            }
        }


        $this->render('form', array(
            'model' => $model,
            'all' => Node::model()->findAll(),
            'cities' => $cities,
            'citiesSelect' => $nodesOfCity,
            'tagsSelect' => $nodesOfTag,
            'tags' => Tag::model()->findAll(),
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            $model->$this->loadModel($id);
            $model->status = 15;
            $model->save(false);
            
        }
//        
//            // we only allow deletion via POST request
//            $this->loadModel($id)->delete();
//
//            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
//            if (!isset($_GET['ajax']))
//                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
//        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Advcomp');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Advcomp('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Advcomp']))
            $model->attributes = $_GET['Advcomp'];

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
        $model = Advcomp::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'advcomp-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
