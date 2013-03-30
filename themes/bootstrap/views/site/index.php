<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit',array(
    'heading'=>'Приветсвуем на '.CHtml::encode(Yii::app()->name),
)); ?>

<p>Наш ресурс позволяет увеличить Ваши продажи путем необычной рекламы на стартовой странице хот-спотов.</p>

<?php $this->endWidget(); ?>


