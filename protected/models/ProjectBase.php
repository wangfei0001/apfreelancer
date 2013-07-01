<?php

/**
 * This is the model class for table "project".
 *
 * The followings are the available columns in table 'project':
 * @property string $id_project
 * @property string $category
 * @property string $name
 * @property string $description
 * @property string $currency
 * @property integer $budget
 * @property string $minbudget
 * @property string $maxbudget
 * @property integer $bidperiod
 * @property string $ownerid
 * @property integer $featured
 * @property integer $forgoldmembers
 * @property integer $nonpublic
 * @property integer $hidebids
 * @property integer $status
 * @property string $type
 * @property string $winner
 * @property string $keywords
 * @property string $createdate
 * @property string $start_date
 * @property string $finish_date
 * @property string $hitcounter
 * @property string $filename
 * @property string $country
 * @property double $minprice
 * @property double $maxprice
 * @property integer $notification
 * @property string $updated_at
 * @property string $created_at
 */
class ProjectBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Project the static model class
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
		return 'project';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('category, name, description, ownerid, createdate, created_at', 'required'),
			array('budget, bidperiod, featured, forgoldmembers, nonpublic, hidebids, status, notification', 'numerical', 'integerOnly'=>true),
			array('minprice, maxprice', 'numerical'),
			array('name, filename', 'length', 'max'=>128),
			array('currency', 'length', 'max'=>3),
			array('minbudget, maxbudget, ownerid, winner, hitcounter', 'length', 'max'=>20),
			array('type', 'length', 'max'=>32),
			array('keywords', 'length', 'max'=>255),
			array('country', 'length', 'max'=>256),
			array('start_date, finish_date, updated_at', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_project, category, name, description, currency, budget, minbudget, maxbudget, bidperiod, ownerid, featured, forgoldmembers, nonpublic, hidebids, status, type, winner, keywords, createdate, start_date, finish_date, hitcounter, filename, country, minprice, maxprice, notification, updated_at, created_at', 'safe', 'on'=>'search'),
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
			'id_project' => 'Id Project',
			'category' => 'Category',
			'name' => 'Name',
			'description' => 'Description',
			'currency' => 'Currency',
			'budget' => 'Budget',
			'minbudget' => 'Minbudget',
			'maxbudget' => 'Maxbudget',
			'bidperiod' => 'Bidperiod',
			'ownerid' => 'Ownerid',
			'featured' => 'Featured',
			'forgoldmembers' => 'Forgoldmembers',
			'nonpublic' => 'Nonpublic',
			'hidebids' => 'Hidebids',
			'status' => 'Status',
			'type' => 'Type',
			'winner' => 'Winner',
			'keywords' => 'Keywords',
			'createdate' => 'Createdate',
			'start_date' => 'Start Date',
			'finish_date' => 'Finish Date',
			'hitcounter' => 'Hitcounter',
			'filename' => 'Filename',
			'country' => 'Country',
			'minprice' => 'Minprice',
			'maxprice' => 'Maxprice',
			'notification' => 'Notification',
			'updated_at' => 'Updated At',
			'created_at' => 'Created At',
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

		$criteria->compare('id_project',$this->id_project,true);
		$criteria->compare('category',$this->category,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('currency',$this->currency,true);
		$criteria->compare('budget',$this->budget);
		$criteria->compare('minbudget',$this->minbudget,true);
		$criteria->compare('maxbudget',$this->maxbudget,true);
		$criteria->compare('bidperiod',$this->bidperiod);
		$criteria->compare('ownerid',$this->ownerid,true);
		$criteria->compare('featured',$this->featured);
		$criteria->compare('forgoldmembers',$this->forgoldmembers);
		$criteria->compare('nonpublic',$this->nonpublic);
		$criteria->compare('hidebids',$this->hidebids);
		$criteria->compare('status',$this->status);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('winner',$this->winner,true);
		$criteria->compare('keywords',$this->keywords,true);
		$criteria->compare('createdate',$this->createdate,true);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('finish_date',$this->finish_date,true);
		$criteria->compare('hitcounter',$this->hitcounter,true);
		$criteria->compare('filename',$this->filename,true);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('minprice',$this->minprice);
		$criteria->compare('maxprice',$this->maxprice);
		$criteria->compare('notification',$this->notification);
		$criteria->compare('updated_at',$this->updated_at,true);
		$criteria->compare('created_at',$this->created_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}