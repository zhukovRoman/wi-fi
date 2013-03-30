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
        calc();
}
 
 function isChecked(chekbox)
 {
     if (chekbox.is(':checked')==false)
         return 0;
     return 1;
 }
function calc()
{
   
    var summ = 0;
    summ += isChecked($("[name='Advcomp[branding]']"))*<?php echo Advcomp::$BRANDING_PRICE;?>;
    summ += isChecked($("[name='Advcomp[style]']"))*<?php echo Advcomp::$STYLE_PRICE;?>;
    summ += isChecked($("[name='Advcomp[banner_top]']"))*<?php echo Advcomp::$TOP_PRICE;?>;
    summ += isChecked($("[name='Advcomp[banner_down]']"))*<?php echo Advcomp::$DOWN_PRICE;?>;
    $("#summ").text(summ)
}
$(document).ready(function() {
    calc();
    //$(".accordion-body").removeClass("in");
    //$(".accordion-body").css('height','0px');
});
 
    
</script>

<div class="accordion" id="accordion2">
    <div class="accordion-group">
        <div class="accordion-heading" style="background-color: whitesmoke">
            <?php //echo $form->checkboxRow($model, 'branding'); ?>
            <input type="checkbox" name="Advcomp[branding]" value="1"
                   onClick = 'js: enable("One", this);'
                   style="float: left; margin: 11px 5px 5px 10px;"
                   <?php if ($model->branding) echo "checked"; ?>
                >
            <a class="accordion-toggle" 
               style="display: <?php echo ($model->branding)? "none" : "block"; ?>;" 
               id="OneDisable">
                Фон страницы (+<?php echo Advcomp::$BRANDING_PRICE;?>р)
            </a>
            <a class="accordion-toggle" id="OneEnable" 
               style="display: <?php echo (!$model->branding)? "none" : "block"; ?>;"
               data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
               Фон страницы (+<?php echo Advcomp::$BRANDING_PRICE;?>р)
            </a>
            
            
        </div>
        <div id="collapseOne" class="accordion-body collapse" >
            <div class="accordion-inner">
                <?php
                $this->renderPartial("formParts/background", array(
                    'model' => $model,
                    'form' => $form,
                        )
                );
                ?>
               
<!--        <div class="accordion-group">
        <div class="accordion-heading" style="background-color: whitesmoke">
            <input type="checkbox" name="Advcomp[style]" value="1" 
                   onClick = 'js: enable("Two", this);'
                   style="float: left; margin: 11px 5px 5px 10px;"
                    <?php if ($model->style) echo "checked"; ?>
                   >
            <a class="accordion-toggle" 
               style="display: <?php echo ($model->style)? "none" : "block"; ?>;"  
               id="TwoDisable">
                Стилизация страницы (+<?php echo Advcomp::$STYLE_PRICE;?>р)
            </a>
            <a class="accordion-toggle" id="TwoEnable" 
               style="display: <?php echo (!$model->style)? "none" : "block"; ?>;"
               data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                Стилизация страницы (+<?php echo Advcomp::$STYLE_PRICE;?>р)
            </a>
        </div>
        <div id="collapseTwo" class="accordion-body collapse">
            <div class="accordion-inner">
                <?php
                $this->renderPartial("formParts/styleChose", array(
                    'model' => $model,
                    'form' => $form,
                        )
                );
                ?>  
            </div>
        </div>
    </div>-->
                
                
            </div>
        </div>
    </div>

    <div class="accordion-group">
        <div class="accordion-heading" style="background-color: whitesmoke">
            <input type="checkbox" name="Advcomp[banner_top]" value="1" 
                   onClick = 'js: enable("Three", this);'
                   style="float: left; margin: 11px 5px 5px 10px;"
                    <?php if ($model->banner_top) echo "checked"; ?>
                   >
           <a class="accordion-toggle" 
               style="display: <?php echo ($model->banner_top)? "none" : "block"; ?>;" 
               id="ThreeDisable">
                Верхний баннер (+<?php echo Advcomp::$TOP_PRICE;?>р)
            </a>
            <a class="accordion-toggle" id="ThreeEnable" 
               style="display: <?php echo (!$model->banner_top)? "none" : "block"; ?>;"  
               data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
                Верхний баннер (+<?php echo Advcomp::$TOP_PRICE;?>р)
            </a>
        </div>
        <div id="collapseThree" class="accordion-body collapse">
            <div class="accordion-inner">
                <?php
                $this->renderPartial("formParts/uploadTopBanner", array(
                    'model' => $model,
                    'form' => $form,
                    'banner' => 'top',
                        )
                );
                ?>  
            </div>
        </div>
    </div>
    <div class="accordion-group">
        <div class="accordion-heading" style="background-color: whitesmoke">
            <input type="checkbox" name="Advcomp[banner_down]" value="1" 
                   onClick = 'js: enable("Four", this);'
                   style="float: left; margin: 11px 5px 5px 10px;"
                    <?php if ($model->banner_down) echo "checked"; ?>
                   >
            <a class="accordion-toggle" 
               style="display: <?php echo ($model->banner_down)? "none" : "block"; ?>;" 
               id="FourDisable">
                Нижний баннер (+<?php echo Advcomp::$DOWN_PRICE;?>р)
            </a>
            <a class="accordion-toggle" id="FourEnable" 
               style="display: <?php echo (!$model->banner_down)? "none" : "block"; ?>;"  
               data-toggle="collapse" data-parent="#accordion2" href="#collapseFour">
                Нижний баннер (+<?php echo Advcomp::$DOWN_PRICE;?>р)
            </a>
        </div>
        <div id="collapseFour" class="accordion-body collapse">
            <div class="accordion-inner">
                <?php
                $this->renderPartial("formParts/uploadDownBanner", array(
                    'model' => $model,
                    'form' => $form,
                    'banner' => 'down',
                        )
                );
                ?>  
            </div>
        </div>
    </div>
     <div class="accordion-group">
        <div class="accordion-heading" style="background-color: whitesmoke">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFive">
                Предпросмотр
            </a>
        </div>
        <div id="collapseFive" class="accordion-body collapse">
            <div class="accordion-inner">
                <?php
                $this->renderPartial("formParts/preview", array(
                    'model' => $model,
                    'form' => $form,
                    'banner' => 'down',
                        )
                );
                ?>  
            </div>
        </div>
    </div>
</div>

<div>Минимальная стоимость одного показа будет составлять <span id="summ">0</span> рублей</div>