

<?php Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . '/css/multiselect/multi-select.css'); ?>

Вы можете настроить фильтры для выбора группы точек, или же выбрать произволные точки просто дважды кликнув на их иконке.  <br>

<select multiple="multiple" id="cities" name="cities[]" data-placeholder="Выберите город...">
    <?php
    foreach ($cities as $city) {
        echo "<option value='$city->id'";
                if(in_array($city->id, explode(",", $model->cities)))
                        echo "selected "; 
                echo ">" . $city->name . "</option>";
    }
    ?>
</select>
<br>
<select multiple="multiple" id="tags" name="tags[]" data-placeholder="Добавьте фильтр...">
    <?php
    foreach ($tags as $tag) {
        echo "<option value='$tag->id'";
                if(in_array($tag->id, explode(",", $model->tags)))
                        echo "selected "; 
                echo ">" . $tag->text . "</option>";
    }
    ?>
</select>
<br>
<div class="hidden">
        <?php echo $form->textFieldRow($model, 'selectedPoint' ); ?>
</div>
<hr>
<p>Всего выбрано: <span id="counter">0</span> </p>


<?php Yii::app()->getClientScript()->registerScriptFile('http://cdn.leafletjs.com/leaflet-0.5/leaflet.js', CClientScript::POS_HEAD); ?>
<div id="map" style="height: 600px; width: 900px; float:left; margin-right: 20px; margin-top:20px;"></div>

<?php  $this->renderPartial("formParts/scripts", array(
            'model' => $model,
            //'dataProvider' => $dataProvider,
            'all' => $all,
            'cities' => $cities,
            'citiesSelect' => $citiesSelect,
            'tagsSelect' => $tagsSelect,
            'tags' => $tags,
            'form'=> $form,
                )
        );
?>



