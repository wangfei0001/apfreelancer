<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jacky
 * Date: 27/06/13
 * Time: 4:50 PM
 * To change this template use File | Settings | File Templates.
 */
class User extends UserBase
{
    /***
     * @return array
     */
    public function behaviors(){
        return array(
            'CTimestampBehavior' => array(
                'class' => 'zii.behaviors.CTimestampBehavior',
                'createAttribute' => 'created_at',
                'updateAttribute' => 'updated_at',
            )
        );
    }


    public function relations()
    {
        return array(
            'balance'=>array(self::HAS_MANY, 'balance', 'fk_user'),
        );
    }


    /***
     * @param $username
     * @param $email
     * @param string $lang
     * @return bool
     * @throws Exception
     */
    public function create($username, $email, $lang = 'en')
    {
        $model = self::model();

        $transaction=$model->dbConnection->beginTransaction();
        try
        {

            $this->username = $username;

            $this->email = $email;

            $this->preferlang = $lang;

            $this->latestrefreshtime = new CDbExpression('NOW()');

            $this->verification = md5(crypt($username .$email));

            $result = $this->save();

            if(!$result){
                throw new Exception('Can not save user.');
            }

            $balance = new Balance();

            $balance->fk_user = $this->id_user;

            $balance->currency = Balance::CURRENCY_DEFAULT;

            $balance->balance = 0;

            $balance->pri = 1;  //primary account

            $result = $balance->save();

            if(!$result){
                throw new Exception('Can not save balance');
            }

            $transaction->commit();

            return $this;
        }
        catch(Exception $e)
        {
            $transaction->rollback();
        }

        return false;
    }
}
