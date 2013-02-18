<?php

/**
 * Default controller to handle user requests.
 */
class SiteController extends CController {

	/**
	 * Index action is the default action in a controller.
	 */
	public function actionIndex() 
	{
		$user = Yii::app()->user;
		if ($user->isGuest) {
			$this->redirect('/user/login');
		}

		$type = new EventType();
		//Output in display index page with calendar
		$this->render('index', array(
			'username' => $user->name,
			'types' => $type->getAllTypes()
		));
	}
}