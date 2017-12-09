<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     *
     * @return boolean whether authentication succeeds.
     */
    public function authenticate()
    {
        $pwd = addslashes(md5($this->password));
        $username = addslashes($this->username);
        
            $loginByEmail = AppUserData::model()->find("email = '{$username}' and password = '$pwd'");
        if (empty($loginByEmail)) {
            $loginByMobile = AppUserData::model()->find("mobile = '{$username}' and password = '$pwd'");
            if (! empty($loginByMobile)) {
                $this->setState('memberInfo', $loginByMobile);
                return true;
            } else {
                return false;
            }
        } else {
            $this->setState('memberInfo', $loginByEmail);
            return true;
        }
    }
}
