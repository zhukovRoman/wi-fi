<script  type="text/javascript">
    function uploadBanner (derection, resp)
    {
        var topBanner = document.getElementById(derection+"BannerImg");
        var path = resp.filename;
        topBanner.src = path;
        console.log (topBanner, path);
        //topBanner.scr = resp.filename;
    }
    
    $(document).ready(function() {
      
       
        //$("#ifNoNeedTopBanner").hide();
        //$("#noNeedTopBanner").attr('checked', 'checked');
       
        $('#needTopBanner').click(function () {
        
            $("#ifNoNeedTopBanner").show();
        });
        $('#noNeedTopBanner').click(function () {
     
            $("#ifNoNeedTopBanner").hide();
        });
    });

    
    
</script>


    Параметры баннера должны быть 728 на 90 .... 
    <?php
    $this->widget('ext.EAjaxUpload.EAjaxUpload', array(
        'id' => 'uploadBanner',
        'config' => array(
            'action' => Yii::app()->createUrl('site/uploadTopBanner'),
            'allowedExtensions' => array("jpg", "jpeg"), //array("jpg","jpeg","gif","exe","mov" and etc...
            'sizeLimit' => 10 * 1024 * 1024, // maximum file size in bytes
            'minSizeLimit' => 10 * 1024, // minimum file size in bytes
            'onComplete' => "js:function(id, fileName, responseJSON){uploadBanner('top',responseJSON);
                $('#Advcomp_banner1').val(responseJSON.filename)}",
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
    
    <?php echo $form->textFieldRow($model, 'url1'); ?>
    <div class="hidden">
         <?php echo $form->textFieldRow($model, 'banner1'); ?>
    </div>
    
<!--    <DIV id="virtualScreen2" lass="container-background" style="width:900px; height: 655px; border: 1px solid; margin: 0 auto; position: relative; margin-bottom: 20px;">
        <img src="images\startPageWithBanners.jpg" style="width: 100%;  position: absolute;" id="pageContent">
        
    </div>-->
