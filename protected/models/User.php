<?php

class User extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'users':
	 * @var string $name
	 * @var string $password
	 */

	//For complexity hashing
	const SALT = 'q%3Hd21;w3';
	
	/**
	 * Returns the static model of the specified AR class.
	 * @return CActiveRecord the static model class
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
		return 'users';
	}
	
	/**
	 * Executes the create user
	 *
	 * @param str $name User name
	 * @param str $password User password
	 * @return str
	 */
	public function addUser($name, $password) {
		$result = 'User already exists';
		if ($this->findByAttributes(array('name' => $name)) === null) {
			$this->name = $name;
			$this->password = $this->safePassword($password);
			if ($this->save()) {
				$result = 'User ' . $name . ' saved!';
			} else {
				$result = 'Error! Please try again later!';
			}
		}
		
		return $result;
	}

	/**
	 * Executes password hashing
	 *
	 * @param str $password Password
	 * @return str
	 */
	public function safePassword($password) {
		return md5(self::SALT . $password);
	}
}