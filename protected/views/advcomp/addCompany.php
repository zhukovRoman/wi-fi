<?php

$this->renderPartial("chosePoints", array(
    'model' => $model,
    //'dataProvider' => $dataProvider,
    'all' => $all,
    'cities' => $cities,
    'citiesSelect' => $citiesSelect,
    'tagsSelect' => $tagsSelect,
    'tags' => $tags,
        )
);
?>


