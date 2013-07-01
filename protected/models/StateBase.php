<?php

/**
 * This is the model class for table "state".
 *
 * The followings are the available columns in table 'state':
 * @property string $id_state
 * @property string $fk_country
 * @property string $state_en
 * @property string $state_cn
 * @property string $state_zh
 */
class StateBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return State the static model class
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
		return 'state';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fk_country, state_en, state_zh', 'required'),
			array('fk_country', 'length', 'max'=>20),
			array('state_en, state_cn, state_zh', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_state, fk_country, state_en, state_cn, state_zh', 'safe', 'on'=>'search'),
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
			'id_state' => 'Id State',
			'fk_country' => 'Fk Country',
			'state_en' => 'State En',
			'state_cn' => 'State Cn',
			'state_zh' => 'State Zh',
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

		$criteria->compare('id_state',$this->id_state,true);

		$criteria->compare('fk_country',$this->fk_country,true);

		$criteria->compare('state_en',$this->state_en,true);

		$criteria->compare('state_cn',$this->state_cn,true);

		$criteria->compare('state_zh',$this->state_zh,true);

		return new CActiveDataProvider('State', array(
			'criteria'=>$criteria,
		));
	}
}