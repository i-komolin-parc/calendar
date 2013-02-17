<?php

/**
 * Controller for registration or authorization of users
 */
class UserController extends CController
{
	/**
	 * Action user login
	 */
	public function actionLogin()
	{
		//Check username and password
		$name = Yii::app()->request->getPost('name', false);
		$password = Yii::app()->request->getPost('password', false);
		$message = '';
		if ($name && $password) {
			$identity = new UserIdentity($name, $password);		
			if ($identity->authenticate()) {
				Yii::app()->user->login($identity);
				$this->redirect('/');
			}
			
			$message = $identity->errorMessage;
		}
		
		//Output template login display
		$this->render('login', array(
			'message' => $message,
		));
	}
	
	/**
	 * User logout
 	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect('/user/login');
	}
	
	/**
	 * User registartion
	 */
	public function actionRegister()
	{
		//Add user
		$name = Yii::app()->request->getPost('name', false);
		$password = Yii::app()->request->getPost('password', false);
		$confirm_password = Yii::app()->request->getPost('confirm_password', false);
		$message = '';
		if ($name && $password && $confirm_password) {
			if ($password === $confirm_password) {
				$user = new User();
				$message = $user->addUser($name, $password);
			} else {
				$message = 'Passwords not match';
			}
		}
		
		//Output template register display
		$this->render('register', array(
			'message' => $message,
		));
	}
}