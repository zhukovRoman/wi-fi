<script  type="text/javascript">
    function enable(number, checkbox) {
        //alert (12312);
        var toHide = document.getElementById(number+"Disable");
        toHide.style.display == 'none' ? toHide.style.display = 'block' : toHide.style.display = 'none';
        var toShow = document.getElementById(number+"Enable");
        toShow.style.display == 'none' ? toShow.style.display = 'block' : toShow.style.display = 'none';
        if (!checkbox.checked)
            {
               $("#collapse"+number).removeClass("in")
               $("#collapse"+number).css('height','0px')
               console.log();//.toggleClass('in');
            }
        else {
             $("#collapse"+number).addClass("in")
            $("#collapse"+number).css('height','auto')
        }
    }
    
     $(document).ready(function() {
                $(".accordion-body").removeClass("in")
               $(".accordion-body").css('height','0px')
 });
</script>

<div class="accordion" id="accordion2">
  <div class="accordion-group">
    <div class="accordion-heading" style="background-color: whitesmoke">
      <input type="checkbox" name="Advcomp[branding]" value="1" id ="ckbox_branding"
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
        Anim pariatur cliche...
      </div>
    </div>
  </div>
  <div class="accordion-group">
    <div class="accordion-heading" style="background-color: whitesmoke">
     <input type="checkbox" name="Advcomp[style]" value="1" style="float: left; margin: 11px 5px 5px 10px;">
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