
<p>
    Загрузите файл, который будет являться фоном страницы.
</p>
<p>
    Минимальная ширина: 1920 пикселей.
</p>
</p>
    Цвет фона автоматически определяется по цвету нижнего левого пикселя, 
    но его можно изменить во вкладке предпросмотра.
</p>
</p>
    Так же возможно задать верхний отступ для содержимого страницы, чтобы рекламная информация не закрывалась.
</p>
<?php
$this->widget('ext.EAjaxUpload.EAjaxUpload', array(
    'id' => 'uploadBg',
    'config' => array(
        'action' => Yii::app()->createUrl('site/uploadBg'),
        'allowedExtensions' => array("jpg", "jpeg"), //array("jpg","jpeg","gif","exe","mov" and etc...
        'sizeLimit' => 10 * 1024 * 1024, // maximum file size in bytes
        'minSizeLimit' => 10 * 1024, // minimum file size in bytes
        'onComplete' => "js:function(id, fileName, responseJSON){changeBg(responseJSON);}",
        'onError' => "js:function (){alert ('Произошла ошибка!');}"
    //'messages'=>array(
    //                  'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
    //                  'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
    //                  'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
    //                  'emptyError'=>"{file} is empty, please select files again without it.",
    //                  'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
    //                 ),
    //'showMessage'=>"js:function(message){ alert(message); }"
    )
));
?>
<div class="hidden">
    <?php echo $form->textFieldRow($model, 'background'); ?>
</div>

