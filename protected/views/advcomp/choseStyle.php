<script  type="text/javascript">
    function enable(number, checkbox) {
        //alert (12312);
        var toHide = document.getElementById(number+"Disable");
        toHide.style.display == 'none' ? toHide.style.display = 'block' : toHide.style.display = 'none';
        var toShow = document.getElementById(number+"Enable");
        toShow.style.display == 'none' ? toShow.style.display = 'block' : toShow.style.display = 'none';
        if (!checkbox.checked)
            {
               $("#collapse"+number).removeClass("in");
               $("#collapse"+number).css('height','0px');
               console.log();//.toggleClass('in');
            }
        else {
             $("#collapse"+number).addClass("in");
             $("#collapse"+number).css('height','auto');
        }
    }
    
     $(document).ready(function() {
                $(".accordion-body").removeClass("in");
               $(".accordion-body").css('height','0px');
 });
 
    function changeBg (resp)
    {
        var path = resp.filename;
        var bg = document.getElementById("bg");
        bg.src = path;
        var color = resp.red+resp.green+resp.blue;
        $('#Advcomp_bg_color').val(color);
        $("#virtualScreen").css('background-color','#'+color);
        
    }
    
    function marginChange ()
    {
        var val =  parseInt($('#Advcomp_margin_top').val()/2);
        if (val>=0 && val<=300)
                {
                    $('#startPageContent').css('top',val+'px');
                    console.log(val+'px');
                }
    };
    
</script>

<div class="accordion" id="accordion2">
  <div class="accordion-group">
    <div class="accordion-heading" style="background-color: whitesmoke">
      <input type="checkbox" name="Advcomp[branding]" value="0" id ="ckbox_branding"
             onClick = 'js: enable("One", this);'
             style="float: left; margin: 11px 5px 5px 10px;">
      <a class="accordion-toggle" style="display: block;" id="OneDisable">
        Фон страницы
      </a>
      <a class="accordion-toggle" id="OneEnable" 
            style="display: none;" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
        Фон страницы
      </a>
    </div>
    <div id="collapseOne" class="accordion-body collapse in" >
      <div class="accordion-inner">
          <?php $this->widget('ext.EAjaxUpload.EAjaxUpload',
                    array(
                            'id'=>'uploadBg',
                            'config'=>array(
                                   'action'=>Yii::app()->createUrl('site/uploadBg'),
                                   'allowedExtensions'=>array("jpg", "jpeg"),//array("jpg","jpeg","gif","exe","mov" and etc...
                                   'sizeLimit'=>10*1024*1024,// maximum file size in bytes
                                   'minSizeLimit'=>10*1024,// minimum file size in bytes
                                   'onComplete'=>"js:function(id, fileName, responseJSON){changeBg(responseJSON);}",
                                   //'messages'=>array(
                                   //                  'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
                                   //                  'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
                                   //                  'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
                                   //                  'emptyError'=>"{file} is empty, please select files again without it.",
                                   //                  'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
                                   //                 ),
                                   //'showMessage'=>"js:function(message){ alert(message); }"
                                  )
                    )); ?>
          <DIV id="virtualScreen" lass="container-background" style="width:960px; height: 540px; border: 1px solid; margin: 0 auto; position: relative; background-color: #d5d5d5;">
             <img src="images\noBrand.jpg" style="width: 100%;  position: absolute;" id="bg">
             <img id ="startPageContent" src="images\startPageContent.jpg" style="position: absolute;
                                                            width: 450px;
                                                            height: 327px;
                                                            top: 50px;
                                                            left: 255px;
                                                            ">
          </DIV>
          
          <?php echo $form->textFieldRow($model, 'bg_color', array('prepend'=>'#')); ?>
          <?php echo $form->textFieldRow($model, 'margin_top', array('append'=>'px', 'onChange'=>"marginChange()", 'hint'=>"Отступ сверху для блока с информацией. >100 <300")); ?>
      </div>
    </div>
  </div>
  <div class="accordion-group">
    <div class="accordion-heading" style="background-color: whitesmoke">
     <input type="checkbox" name="Advcomp[style]" value="0" style="float: left; margin: 11px 5px 5px 10px;">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
        Стилизация страницы
      </a>
    </div>
    <div id="collapseTwo" class="accordion-body collapse">
      <div class="accordion-inner">
        Anim pariatur cliche...
      </div>
    </div>
  </div>
</div>