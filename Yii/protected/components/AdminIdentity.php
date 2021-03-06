<?php

/**
 * AdminIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class AdminIdentity extends CUserIdentity
{
    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    public function authenticate()
    {
        $user = AdminUser::model()->findByAttributes(array('loginname' => $username, 'is_disabled' => 0));
        if ($user == null) {
            return false;
        } elseif ($user->password != md5($this->password) || $user->is_disabled == 1) {
            return false;
        } else {
            $this->setState('userid', $user->id);
            $this->setState('loginname', $user->loginname);
            $this->setState('nickname', $user->nickname);
            $user->last_login_at = time();
            $user->last_login_ip = Yii::app()->request->userHostAddress;
            $this->errorCode = 0;
            return true;
        }
    }
}
