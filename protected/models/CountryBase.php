<?php

/**
 * This is the model class for table "country".
 *
 * The followings are the available columns in table 'country':
 * @property string $id_country
 * @property string $tcc
 * @property string $country_en
 * @property string $country_cn
 * @property string $country_zh
 * @property string $flag
 */
class CountryBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Country the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'country';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('country_en, country_zh', 'required'),
			array('tcc', 'length', 'max'=>6),
			array('country_en, country_cn, country_zh', 'length', 'max'=>512),
			array('flag', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_country, tcc, country_en, country_cn, country_zh, flag', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_country' => 'Id Country',
			'tcc' => 'Tcc',
			'country_en' => 'Country En',
			'country_cn' => 'Country Cn',
			'country_zh' => 'Country Zh',
			'flag' => 'Flag',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_country',$this->id_country,true);

		$criteria->compare('tcc',$this->tcc,true);

		$criteria->compare('country_en',$this->country_en,true);

		$criteria->compare('country_cn',$this->country_cn,true);

		$criteria->compare('country_zh',$this->country_zh,true);

		$criteria->compare('flag',$this->flag,true);

		return new CActiveDataProvider('Country', array(
			'criteria'=>$criteria,
		));
	}
}