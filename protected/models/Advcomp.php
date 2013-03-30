<?php

/**
 * This is the model class for table "advcomp".
 *
 * The followings are the available columns in table 'advcomp':
 * @property integer $id
 * @property string $name
 * @property integer $type
 * @property string $background
 * @property string $css
 * @property string $banner1
 * @property string $banner2
 * @property integer $status
 * @property integer $owner
 * @property string $cities
 * @property string $tags
 *
 * The followings are the available model relations:
 * @property Account $owner0
 * @property NodeCompany[] $nodeCompanies
 */
class Advcomp extends CActiveRecord {

    public $bg_color = "d5d5d5";
    public $margin_top = 200;
    public $summprice;
    
    public static $BRANDING_PRICE = 0.5;
    public static $STYLE_PRICE = 0.2;
    public static $TOP_PRICE = 0.3;
    public static $DOWN_PRICE = 0.2;
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Advcomp the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'advcomp';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            //array('name', 'required'),
            array('type, status, owner', 'numerical', 'integerOnly' => true),
            array('name, cities, tags', 'length', 'max' => 200),
            array('background, banner1, banner2', 'length', 'max' => 100),
            array('css, branding, style, banner_top, banner_down, banner1, banner2, url1, url2, selectedPoint, name, margin_top', 'safe'),
            array('bg_color', 'default', 'value' => "d5d5d5"),
            array('name', 'required'),
            //array('name', 'default', 'value' => "New comapny"),
            //array('margin_top', 'default', 'value'=>200),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, type, background, css, banner1, banner2, status, owner, cities, tags', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'owner0' => array(self::BELONGS_TO, 'Account', 'owner'),
            'nodeCompanies' => array(self::HAS_MANY, 'NodeCompany', 'company_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name' => 'Название компании',
            'type' => 'Type',
            'background' => 'Background',
            'css' => 'Css',
            'banner1' => 'Banner1',
            'banner2' => 'Banner2',
            'status' => 'Status',
            'owner' => 'Owner',
            'cities' => 'Cities',
            'tags' => 'Tags',
            'branding' => '',
            'balance' => 'Вложить в эту компанию',
            'url1'=>"Ссылка",
            'url2'=>"Ссылка",
            'margin_top'=>"Отступ сверху",
            'bg_color'=>"Цвет фона",
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('type', $this->type);
        $criteria->compare('background', $this->background, true);
        $criteria->compare('css', $this->css, true);
        $criteria->compare('banner1', $this->banner1, true);
        $criteria->compare('banner2', $this->banner2, true);
        $criteria->compare('status', $this->status);
        $criteria->compare('owner', $this->owner);
        $criteria->compare('cities', $this->cities, true);
        $criteria->compare('tags', $this->tags, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    protected function beforeSave() {
        parent::beforeSave();
        if (!$this->branding) {
            $this->margin_top = Null;
            $this->bg_color = Null;
            $this->background = Null;
            $this->style = 0;
            
        }
        if (!$this->style) {
            $this->css = "standart";
        }

        if (!$this->banner_top) {
            $this->url1 = Null;
            $this->banner1= 0;
        }
        if (!$this->banner_down) {
            $this->url2 = Null;
            $this->banner2= 0;
        }
        return true;
    }

    public function getMinPrice()
    {
        $minPrice = 0;
        $minPrice += Advcomp::$BRANDING_PRICE*$this->branding;
        $minPrice += Advcomp::$STYLE_PRICE*$this->style;
        $minPrice += Advcomp::$TOP_PRICE*$this->banner1;
        $minPrice += Advcomp::$DOWN_PRICE*$this->banner2;
        return $minPrice;
    }
    
    public function getChartData()
    {
        $stat = array();
        $stat[] = array('Year', 'Показы');
        $allShows = Statistic::model()->findAll("company_id=$this->id AND time >= date('now', '-7 days')");
        $tmp = array();
        foreach ($allShows as $statRecord)
        {
            
            $time = date("m-d", strtotime($statRecord->time));
            if (!isset($tmp[$time]))
            {
                $tmp[$time] = array ($time, 0);
            }
            $tmp[$time][1] = $tmp[$time][1] + 1;
        }
        foreach ($tmp as $t)
        {
            $stat[]=array($t[0], $t[1]);
        }
        //print_r($tmp);
        return json_encode($stat);
        
        
    }
}