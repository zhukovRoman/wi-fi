<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<?php Yii::app()->bootstrap->register(); ?>
        <?php Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . '/js/jquery.js', CClientScript::POS_HEAD); ?>
        <?php Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . '/js/jquery.multi-select.js',CClientScript::POS_HEAD); ?>
        <?php //Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . '/js/bootstrap.js', CClientScript::POS_END); ?>
        <?php Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . '/js/chosen/chosen.jquery.js',CClientScript::POS_HEAD); ?>
        <?php ?>  
        <!--<script src="http://cdn.leafletjs.com/leaflet-0.4/leaflet.js"></script>-->
            <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.4/leaflet.css" />
            <!--[if lte IE 8]>
                <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.4/leaflet.ie.css" />
            <![endif]-->
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap/bootstrap.css" />
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap/bootstrap-yii.css" />
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap/bootstrap-responsive.min.css" />
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/chosen/chosen.css" />
         <?php Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/js/editable/css/bootstrap-editable.css');  
             Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . '/js/editable/js/bootstrap-editable.js',CClientScript::POS_HEAD);
            ?>
            
</head>

<body>

    
  
<?php $this->widget('bootstrap.widgets.TbNavbar',array(
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                //array('label'=>'Home', 'url'=>array('/site/index')),
                array('label'=>'О нас', 'url'=>array('/site/page', 'view'=>'about')),
                array('label'=>'Создать компанию', 'url'=>array('advcomp/addStep1')),
            ),
        ),
          array(
            'class'=>'bootstrap.widgets.TbMenu',
            'htmlOptions'=>array('class'=>'pull-right'),
            'items'=>array(
                array('label'=>'Вход', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=>Yii::app()->user->name, 'url'=>"#", 'items'=> array(
                            array('label'=>'Мои компании', 'url'=>  Yii::app()->createUrl("account/companylist")),
                            array('label'=>'Мой профиль', 'url'=>'#'),
                            '---',
                            array('label'=>'Выход', 'url'=>array('/site/logout')),
                    ), 'visible'=>!Yii::app()->user->isGuest)
                    
            ),
        ),
    ),
)); ?>

  
<div class="container content-border" id="page">

	

	<?php echo $content; ?>

	<div class="clear"></div>

	

</div><!-- page -->
<div id="footer">\
    <div class="container content-border" >
		Copyright &copy; <?php echo date('Y'); ?> by RISK Tech.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
    </div>
</div>
</body>
</html>
