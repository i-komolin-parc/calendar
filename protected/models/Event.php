<?php

class Event extends CActiveRecord {
	
	/**
	 * The followings are the available columns in table 'events':
	 * @var int $id
	 * @var int $time_from
	 * @var int $time_to
	 * @var int $type
	 * @var string $title
	 * @var string $description
	 * @var string $username
	 */

	/**
	 * Returns the static model of the specified AR class.
	 * @return CActiveRecord the static model class
	 */
	public static function model($className = __CLASS__) 
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName() 
	{
		return 'events';
	}
}