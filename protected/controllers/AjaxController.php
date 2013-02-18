<?php

/**
 * Controller to handle ajax requests
 */
class AjaxController extends CController {

	/**
	 * Action is the add new event
	 */
	public function actionAddEvent() 
	{
		$user = Yii::app()->user;
		if (!$user->isGuest) {
			$time_from = strtotime(Yii::app()->request->getPost('timeFrom', ''));
			$time_to = strtotime(Yii::app()->request->getPost('timeTo', ''));
			$type = Yii::app()->request->getPost('type', null);
			$title = Yii::app()->request->getPost('title', '');
			$description = Yii::app()->request->getPost('description', '');
			if ($time_from && $time_to && ($type !== null)) {
				$event = new Event();
				$event->time_from = $time_from;
				$event->time_to = $time_to;
				$event->type = (int)$type;
				$event->title = $title;
				$event->description = $description;
				$event->username = $user->name;
				$event->save();
			}
		}
	}

	/**
	 * Action is the add new event
	 */
	public function actionEditEvent() 
	{
	
	}
}