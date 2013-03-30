<h3>Рекламная компания <?php echo $model->name; ?></h3>
<div>
    
    <?php $this->renderPartial("chart", array('model' => $model,));?>  
    <?php $this->renderPartial("companyButtons", array('model' => $model,));?>  
    
    
    
</div>
