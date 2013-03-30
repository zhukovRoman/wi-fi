<script  type="text/javascript">
    
    $(document).ready(function() {
       // $("#ifNoNeedDownBanner").hide();
       // $("#noNeedDownBanner").attr('checked', 'checked');
       
        $('#needDownBanner').change(function () {
            $("#ifNoNeedDownBanner").show();
        });
        $('#noNeedDownBanner').change(function () {
            $("#ifNoNeedDownBanner").hide();
        });
    });

</script>


    Параметры баннера должны быть бла-бла-бла.... 
    <?php
    $this->widget('ext.EAjaxUpload.EAjaxUpload', array(
        'id' => 'uploadBannerDown',
        'config' => array(
            'action' => Yii::app()->createUrl('site/uploadDownBanner'),
            'allowedExtensions' => array("jpg", "jpeg"), //array("jpg","jpeg","gif","exe","mov" and etc...
            'sizeLimit' => 10 * 1024 * 1024, // maximum file size in bytes
            'minSizeLimit' => 10 * 1024, // minimum file size in bytes
            'onComplete' => "js:function(id, fileName, responseJSON){uploadBanner('down',responseJSON);
                 $('#Advcomp_banner2').val(responseJSON.filename)}",
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


    <?php echo $form->textFieldRow($model, 'url2'); ?>
    <div class="hidden">
         <?php echo $form->textFieldRow($model, 'banner2'); ?>
    </div>

<!--    <div id="virtualScreen2" lass="container-background" style="width:900px; height: 655px; border: 1px solid; margin: 0 auto; position: relative; margin-bottom: 20px;">
        <img src="images\startPageWithBanners.jpg" style="width: 100%;  position: absolute;" id="pageContent">
        <img id="topBannerImg1" src="images/bannerTop.jpg" style="position:relative; top: 80px;left: 85px;">
        <img id="downBannerImg" src="images/bannerDown.jpg" style="position:relative; top: 410px; left: 85px;">
    </div>-->
