<?php

/**
 * This is the model class for table "content".
 *
 * The followings are the available columns in table 'content':
 * @property integer $id
 * @property double $usd
 * @property double $euro
 * @property string $humor
 * @property string $afisha
 * @property integer $city_id
 * @property string $date
 *
 * The followings are the available model relations:
 * @property City $city
 */
class Content extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Content the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'content';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('usd, euro, humor, afisha, city_id, date', 'required'),
            array('city_id', 'numerical', 'integerOnly' => true),
            array('usd, euro', 'numerical'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, usd, euro, humor, afisha, city_id, date', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'city' => array(self::BELONGS_TO, 'City', 'city_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'usd' => 'Usd',
            'euro' => 'Euro',
            'humor' => 'Humor',
            'afisha' => 'Afisha',
            'city_id' => 'City',
            'date' => 'Date',
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
        $criteria->compare('usd', $this->usd);
        $criteria->compare('euro', $this->euro);
        $criteria->compare('humor', $this->humor, true);
        $criteria->compare('afisha', $this->afisha, true);
        $criteria->compare('city_id', $this->city_id);
        $criteria->compare('date', $this->date, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    public static function getNewContent() {
        $date = date('d.m.Y');
        $xml = new SimpleXMLElement(file_get_contents
                                ("http://www.cbr.ru/scripts/XML_daily.asp?date_req=$date"));
        $cont = new Content();
        $cont->date = date('Y-m-d H:i:s');
        $cont->city_id = 1;
        foreach ($xml->Valute as $val) {
            if ($val->CharCode == "USD")
                $cont->usd = str_replace(",", '.', (string) $val->Value);;



            if ($val->CharCode == "EUR")
                $cont->euro = str_replace(",", '.', (string) $val->Value);;
        }

        print_r($cont->attributes);
        $cont->save(false);


        return;
        $content = preg_match("/<p.*?>(.*?)<\/p>/i", file_get_contents("http://pda.anekdot.ru/anekdots/top/2011"), $matches);
    }

}