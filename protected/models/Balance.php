<?php

/**
 * This is the model class for table "balance".
 *
 * The followings are the available columns in table 'balance':
 * @property string $id_balance
 * @property string $fk_user
 * @property integer $pri
 * @property string $currency
 * @property double $balance
 */
class Balance extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Balance the static model class
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
		return 'balance';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fk_user, currency', 'required'),
			array('pri', 'numerical', 'integerOnly'=>true),
			array('balance', 'numerical'),
			array('fk_user', 'length', 'max'=>20),
			array('currency', 'length', 'max'=>3),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_balance, fk_user, pri, currency, balance', 'safe', 'on'=>'search'),
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
			'id_balance' => 'Id Balance',
			'fk_user' => 'Fk User',
			'pri' => 'Pri',
			'currency' => 'Currency',
			'balance' => 'Balance',
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

		$criteria->compare('id_balance',$this->id_balance,true);

		$criteria->compare('fk_user',$this->fk_user,true);

		$criteria->compare('pri',$this->pri);

		$criteria->compare('currency',$this->currency,true);

		$criteria->compare('balance',$this->balance);

		return new CActiveDataProvider('Balance', array(
			'criteria'=>$criteria,
		));
	}
}