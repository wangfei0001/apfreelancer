<?php

class m130701_065254_add_countries_data extends CDbMigration
{
	public function up()
	{
        $basePath = Yii::app()->basePath;
        $fileContent = file_get_contents($basePath .'/data/country.sql');

        $this->execute($fileContent);

        $fileContent = file_get_contents($basePath .'/data/state.sql');

        $this->execute($fileContent);
	}

	public function down()
	{
		echo "m130701_065254_add_countries_data does not support migration down.\n";
		return false;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}