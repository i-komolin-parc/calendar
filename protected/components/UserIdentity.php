<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Validates the username and password
	 */
	public function authenticate()
	{
		$user = User::model()->findByAttributes(array('name' => $this->username));
		if ($user === null) {
			$this->errorMessage = 'username invalid!';
			$result = false;
		} elseif ($user->password !== $user->safePassword($this->password)) {
			$this->errorMessage = 'password invalid!';
			$result = false;
		} else {
			$result = true;
		}

		return $result;
	}
}