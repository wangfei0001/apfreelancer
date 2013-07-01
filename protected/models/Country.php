<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jacky
 * Date: 1/07/13
 * Time: 4:58 PM
 * To change this template use File | Settings | File Templates.
 */
class Country extends CountryBase
{

    public function relations()
    {
        return array(
            'state'=>array(self::HAS_MANY, 'state', 'fk_country'),
        );
    }


    public function getStates($name)
    {

        $result = false;
        $country = self::model('Country')->find(
            'country_en=:country_en',
            array(':country_en' => $name)
        )->with('state');
        if($country){
            var_dump($country->state);


        }
    }

    public function getStatesByCountryId($id)
    {
//        Australia
    }
}
