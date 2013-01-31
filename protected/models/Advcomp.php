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
            array('name', 'required'),
            array('type, status, owner', 'numerical', 'integerOnly' => true),
            array('name, cities, tags', 'length', 'max' => 200),
            array('background, banner1, banner2', 'length', 'max' => 100),
            array('css', 'safe'),
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
            'name' => 'Name',
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

}