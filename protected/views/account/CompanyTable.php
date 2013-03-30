<?php 
    $this->widget('bootstrap.widgets.TbGridView', array(
    'type'=>'striped bordered condensed',
    'dataProvider'=>$dp,
    'template'=>"{items}{pager}",
    'columns'=>array(
        //array('name'=>'id', 'header'=>'#', 'sortable'=>false),
            array ('name'=>'name', 
                    'value'=>'Chtml::link($data->name, Yii::app()->createUrl("advcomp/companypage", array ("id"=>$data->id)))', 
                    "type"=>"raw",
                    "header"=>"Название"),
            array ('name'=>'balance', 'value'=>'$data->balance', "header"=>"Остаток средств"),
            array ('name'=>'status', 'value'=>'$data->status', "header"=>"Статус"),
            array(
                'class'=>'bootstrap.widgets.TbButtonColumn',
                'template' => '{update}{view}{delete}',
                'buttons' => array(
                    'update'=> array(
                        'label'=>'Изменить',
                        'url'=>'Yii::app()->createUrl("advcomp/update", array ("id"=>$data->id));',
                        'icon'=>"pencil",
                    ),
                    'view'=> array(
                        'label'=>'Просмотреть',
                        'url'=>'Yii::app()->createUrl("advcomp/companypage", array ("id"=>$data->id));',
                        'icon'=>"eye-open",
                    ),
                    'delete'=> array(
                        'label'=>'Удалить',
                        'url'=>'Yii::app()->createUrl("advcomp/delete", array ("id"=>$data->id));',
                        'icon'=>"trash",
                    ),
                    ),
                'htmlOptions'=>array('width'=>'70px'),
            ),
        )
    )
);

?>