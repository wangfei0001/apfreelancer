<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property string $id_user
 * @property string $username
 * @property string $password
 * @property integer $gender
 * @property string $email
 * @property string $verification
 * @property integer $regstatus
 * @property string $logo
 * @property string $recommender
 * @property integer $locked
 * @property string $name
 * @property string $company
 * @property string $address
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string $zipcode
 * @property string $phone
 * @property string $skills
 * @property string $keywords
 * @property double $hourlyrate
 * @property string $profile
 * @property string $favouritecat
 * @property string $lastvisitdate
 * @property string $created_at
 * @property string $updated_at
 * @property string $buyerrating
 * @property string $buyerreviews
 * @property string $sellerrating
 * @property string $sellerreviews
 * @property string $smscredit
 * @property integer $bgoldmember
 * @property integer $bmonthly
 * @property string $payuntil
 * @property string $latestrefreshtime
 * @property integer $postedbid
 * @property string $mobile
 * @property string $mcemail
 * @property string $mcverification
 * @property integer $bnews
 * @property integer $bprojects
 * @property integer $coverage
 * @property string $sp_background
 * @property string $latestvisit
 * @property string $preferlang
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, email, created_at, updated_at, latestrefreshtime', 'required'),
			array('gender, regstatus, locked, bgoldmember, bmonthly, postedbid, bnews, bprojects, coverage', 'numerical', 'integerOnly'=>true),
			array('hourlyrate', 'numerical'),
			array('username, password, email, address, mcemail', 'length', 'max'=>128),
			array('verification, name, company, city, mcverification', 'length', 'max'=>64),
			array('logo, skills, keywords', 'length', 'max'=>255),
			array('recommender, state, country, buyerrating, buyerreviews, sellerrating, sellerreviews, smscredit', 'length', 'max'=>20),
			array('zipcode', 'length', 'max'=>16),
			array('phone, mobile, sp_background', 'length', 'max'=>32),
			array('preferlang', 'length', 'max'=>3),
			array('profile, favouritecat, lastvisitdate, payuntil, latestvisit', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_user, username, password, gender, email, verification, regstatus, logo, recommender, locked, name, company, address, city, state, country, zipcode, phone, skills, keywords, hourlyrate, profile, favouritecat, lastvisitdate, created_at, updated_at, buyerrating, buyerreviews, sellerrating, sellerreviews, smscredit, bgoldmember, bmonthly, payuntil, latestrefreshtime, postedbid, mobile, mcemail, mcverification, bnews, bprojects, coverage, sp_background, latestvisit, preferlang', 'safe', 'on'=>'search'),
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
			'id_user' => 'Id User',
			'username' => 'Username',
			'password' => 'Password',
			'gender' => 'Gender',
			'email' => 'Email',
			'verification' => 'Verification',
			'regstatus' => 'Regstatus',
			'logo' => 'Logo',
			'recommender' => 'Recommender',
			'locked' => 'Locked',
			'name' => 'Name',
			'company' => 'Company',
			'address' => 'Address',
			'city' => 'City',
			'state' => 'State',
			'country' => 'Country',
			'zipcode' => 'Zipcode',
			'phone' => 'Phone',
			'skills' => 'Skills',
			'keywords' => 'Keywords',
			'hourlyrate' => 'Hourlyrate',
			'profile' => 'Profile',
			'favouritecat' => 'Favouritecat',
			'lastvisitdate' => 'Lastvisitdate',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
			'buyerrating' => 'Buyerrating',
			'buyerreviews' => 'Buyerreviews',
			'sellerrating' => 'Sellerrating',
			'sellerreviews' => 'Sellerreviews',
			'smscredit' => 'Smscredit',
			'bgoldmember' => 'Bgoldmember',
			'bmonthly' => 'Bmonthly',
			'payuntil' => 'Payuntil',
			'latestrefreshtime' => 'Latestrefreshtime',
			'postedbid' => 'Postedbid',
			'mobile' => 'Mobile',
			'mcemail' => 'Mcemail',
			'mcverification' => 'Mcverification',
			'bnews' => 'Bnews',
			'bprojects' => 'Bprojects',
			'coverage' => 'Coverage',
			'sp_background' => 'Sp Background',
			'latestvisit' => 'Latestvisit',
			'preferlang' => 'Preferlang',
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

		$criteria->compare('id_user',$this->id_user,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('gender',$this->gender);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('verification',$this->verification,true);
		$criteria->compare('regstatus',$this->regstatus);
		$criteria->compare('logo',$this->logo,true);
		$criteria->compare('recommender',$this->recommender,true);
		$criteria->compare('locked',$this->locked);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('company',$this->company,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('state',$this->state,true);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('zipcode',$this->zipcode,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('skills',$this->skills,true);
		$criteria->compare('keywords',$this->keywords,true);
		$criteria->compare('hourlyrate',$this->hourlyrate);
		$criteria->compare('profile',$this->profile,true);
		$criteria->compare('favouritecat',$this->favouritecat,true);
		$criteria->compare('lastvisitdate',$this->lastvisitdate,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);
		$criteria->compare('buyerrating',$this->buyerrating,true);
		$criteria->compare('buyerreviews',$this->buyerreviews,true);
		$criteria->compare('sellerrating',$this->sellerrating,true);
		$criteria->compare('sellerreviews',$this->sellerreviews,true);
		$criteria->compare('smscredit',$this->smscredit,true);
		$criteria->compare('bgoldmember',$this->bgoldmember);
		$criteria->compare('bmonthly',$this->bmonthly);
		$criteria->compare('payuntil',$this->payuntil,true);
		$criteria->compare('latestrefreshtime',$this->latestrefreshtime,true);
		$criteria->compare('postedbid',$this->postedbid);
		$criteria->compare('mobile',$this->mobile,true);
		$criteria->compare('mcemail',$this->mcemail,true);
		$criteria->compare('mcverification',$this->mcverification,true);
		$criteria->compare('bnews',$this->bnews);
		$criteria->compare('bprojects',$this->bprojects);
		$criteria->compare('coverage',$this->coverage);
		$criteria->compare('sp_background',$this->sp_background,true);
		$criteria->compare('latestvisit',$this->latestvisit,true);
		$criteria->compare('preferlang',$this->preferlang,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}