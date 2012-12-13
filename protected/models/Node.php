<?php

/**
 * This is the model class for table "node".
 *
 * The followings are the available columns in table 'node':
 * @property integer $id
 * @property string $hostname
 * @property string $serial
 * @property string $mac_wifi
 * @property string $mac_lte
 * @property integer $inet_type
 * @property integer $country
 * @property integer $region
 * @property integer $city
 * @property integer $area
 * @property integer $district
 * @property integer $status
 * @property integer $group
 * @property integer $setup_by
 * @property string $setup_date
 * @property string $setup_address
 * @property string $setup_place
 * @property string $setup_contact
 * @property string $setup_tel
 * @property string $activated
 * @property string $ip_address
 * @property string $fw_version
 * @property double $geo_lat
 * @property double $geo_long
 *
 * The followings are the available model relations:
 * @property Country $country0
 * @property Region $region0
 * @property City $city0
 * @property Area $area0
 * @property District $district0
 * @property NodeGroup $group0
 * @property InetType $inetType
 * @property NodeStatus $status0
 * @property NodeTag[] $nodeTags
 */
class Node extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Node the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'node';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
     return array(
//            array('inet_type, country, region, city, area, district, status, group, setup_by', 'numerical', 'integerOnly' => true),
//            array('geo_lat, geo_long', 'numerical'),
//            array('hostname, serial, mac_wifi, mac_lte, setup_address, setup_place, setup_contact, setup_tel', 'length', 'max' => 50),
//            array('ip_address', 'length', 'max' => 15),
//            array('fw_version', 'length', 'max' => 10),
//            array('setup_date, activated', 'safe'),
//            //array('ip_address', 'unique'),
//                // The following rule is used by search().
//                // Please remove those attributes that should not be searched.
//                //array('id, hostname, serial, mac_wifi, mac_lte, inet_type, country, region, city, area, district, status, group, setup_by, setup_date, setup_address, setup_place, setup_contact, setup_tel, activated, ip_address, fw_version, geo_lat, geo_long', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'comp2aps' => array(self::HAS_MANY, 'Comp2ap', 'id_ap'),
            'country0' => array(self::BELONGS_TO, 'Country', 'country'),
            'region0' => array(self::BELONGS_TO, 'Region', 'region'),
            'city0' => array(self::BELONGS_TO, 'City', 'city'),
            'area0' => array(self::BELONGS_TO, 'Area', 'area'),
            'district0' => array(self::BELONGS_TO, 'District', 'district'),
            'group0' => array(self::BELONGS_TO, 'NodeGroup', 'group'),
            'inetType' => array(self::BELONGS_TO, 'InetType', 'inet_type'),
            'status0' => array(self::BELONGS_TO, 'NodeStatus', 'status'),
            'nodeTags' => array(self::HAS_MANY, 'NodeTag', 'node_id'),
        );
    }

    protected function beforeSave() {
        parent::beforeSave();
        $this->mac_lte = strtoupper($this->mac_lte);
        $this->mac_wifi = strtoupper($this->mac_wifi);
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'hostname' => 'Название',
            'serial' => 'Серийный номер',
            'mac_wifi' => 'Mac Wi-fi',
            'mac_lte' => 'Mac Lte',
            'inet_type' => 'Тип доступа',
            'country' => 'Страна',
            'region' => 'Регион',
            'city' => 'Город',
            'area' => 'Округ',
            'district' => 'Район',
            'status' => 'Статус',
            'group' => 'Группа',
            'setup_by' => 'Кем установлена',
            'setup_date' => 'Дата установки',
            'setup_address' => 'Адрес расположения',
            'setup_place' => 'Место расположения',
            'setup_contact' => 'Контакты',
            'setup_tel' => 'Телефон',
            'activated' => 'Дата активации',
            'ip_address' => 'IP',
            'fw_version' => 'FW ver',
            'geo_lat' => 'Широта',
            'geo_long' => 'Долгота',
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
        $criteria->compare('hostname', $this->hostname, true);
        $criteria->compare('serial', $this->serial, true);
        $criteria->compare('mac_wifi', $this->mac_wifi, true);
        $criteria->compare('mac_lte', $this->mac_lte, true);
        $criteria->compare('inet_type', $this->inet_type);
        $criteria->compare('country', $this->country);
        $criteria->compare('region', $this->region);
        $criteria->compare('city', $this->city);
        $criteria->compare('area', $this->area);
        $criteria->compare('district', $this->district);
        $criteria->compare('status', $this->status);
        $criteria->compare('group', $this->group);
        $criteria->compare('setup_by', $this->setup_by);
        $criteria->compare('setup_date', $this->setup_date, true);
        $criteria->compare('setup_address', $this->setup_address, true);
        $criteria->compare('setup_place', $this->setup_place, true);
        $criteria->compare('setup_contact', $this->setup_contact, true);
        $criteria->compare('setup_tel', $this->setup_tel, true);
        $criteria->compare('activated', $this->activated, true);
        $criteria->compare('ip_address', $this->ip_address, true);
        $criteria->compare('fw_version', $this->fw_version, true);
        $criteria->compare('geo_lat', $this->geo_lat);
        $criteria->compare('geo_long', $this->geo_long);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    public function saveGroup($groups) {
        foreach ($groups as $g) {
            $toSave = new NodeTag();
            $toSave->tag_id = $g;
            $toSave->node_id = $this->id;
            if (!$toSave->save())
                return false;
        }
        return true;
    }

    public function testfill() {

        $this->hostname = "точка" . date("his");
        $this->fw_version = "1.1";
        $this->mac_lte = "00-00-00-00-00";
        $this->mac_wifi = "00-00-00-00-01";
        $this->serial = "123-123-123";
        $this->geo_lat = 55.7 + (rand(0, 10) / 1000);
        $this->geo_long = 37.6 + (rand(0, 10) / 1000);
        $this->ip_address = "123.123.123.123";      
        $this->district = 1;
        $this->area = 3;
        $this->setup_by = 1;  
        $this->setup_contact = "sdfgh";
        $this->setup_address="adress";
        $this->setup_place = "palce";
        $this->setup_date = date("Y-m-d");
        
        $this->setup_tel = "12312312";
        $this->activated = date("Y-m-d H:i:s");
        $this->inet_type = 1;
    }

}