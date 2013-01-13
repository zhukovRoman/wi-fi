<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'window-login-form',
    'type'=>'horizontal',
	'enableClientValidation'=>false,
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
			'validateOnSubmit'=>false,
			'validateOnChange'=>false,
	),
	
	//'action' => array('site/login'),
)); ?>
	 
<fieldset> 
	<legend>Добро пожаловать!</legend>

	<p>Пожалуйста, заполните следующую форму для входа на наш портал!</p>
	<p><span class="label label-info">Внимание!</span>
	<i>Поля, отмеченные звездочкой <span class="required">*</span>, обязательны для заполнения.</i></p>

    <?php //echo $form->errorSummary($model)?>
    
    <?php $this->widget('bootstrap.widgets.TbAlert'); ?>
    
    <?php echo $form->textFieldRow($model, 'username', array('hint' => CHtml::link(CHtml::encode("Зарегистрироваться"), array('account/signup')), 'tabindex' => '1')); ?>
    <?php echo $form->passwordFieldRow($model,'password', array('hint' => CHtml::link(CHtml::encode("Забыли пароль?"), array('account/passrecovery')), 'tabindex' => '2')); ?>
    <?php echo $form->checkBoxRow($model, 'rememberMe'); ?>
    
   
    	<?php $this->widget('bootstrap.widgets.TbButton', array(
    			'buttonType'=>'submit', 
    			'type'=>'primary', 
    			'icon'=>'ok white', 
    			'label'=>'Войти',
    			
    			'url' => array('site/login'),
    			)
    	); ?>
    
    

</fieldset> 	 
<?php $this->endWidget(); ?>