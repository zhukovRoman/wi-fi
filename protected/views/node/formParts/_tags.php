<?php Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . '/css/multiselect/multi-select.css'); ?>
<select multiple="multiple" id="tags" name="tags[]">
    <?php echo $model->getTags($_POST['tags']); ?>
</select>
<a href='#' id='deselect-all'>Убрать все</a>

<script>
    
<?php
//if ($model->isNewRecord && isset($_POST['tags'])) {
//    foreach ($_POST['tags'] as $t) {
//        echo "arr[$t]=$t;";
//    }
//}
?> 
    
    $('#tags').multiSelect();
    //$('#tags').multiSelect('select', arr);
    //$('#your-select').multiSelect('select', String|Array);
    $('#deselect-all').click(function(){
        $('#tags').multiSelect('deselect_all');
        return false;
    });
</script>