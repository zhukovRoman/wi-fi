<?php Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . '/css/multiselect/multi-select.css'); ?>
<select multiple="multiple" id="tags" name="tags[]">
    <?php echo Tag::getAllOption(); ?>
</select>
<a href='#' id='deselect-all'>Убрать все</a>

<script>
   $('#tags').multiSelect();
    $('#deselect-all').click(function(){
      $('#tags').multiSelect('deselect_all');
      return false;
    });
</script>