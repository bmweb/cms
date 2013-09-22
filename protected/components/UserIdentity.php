<?php 
class UserIdentity extends CUserIdentity
{
    private $_id;
    public function authenticate()
    {
	
        $record=User::model()->findByAttributes(array('email'=>$this->username));
	 
        if($record===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if($record->password!==sha1($this->password))
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else
        {
            $this->_id=$record->id;
            $this->setState('first_name', $record->first_name);
	    $this->setState('last_name', $record->last_name);
            $this->setState('type', $record->type);
            $this->setState('user_id', $record->user_id);
		  
            $this->errorCode=self::ERROR_NONE;
        }
        return !$this->errorCode;
    }
 
    public function getId()
    {
        return $this->_id;
    }
     
    
    
    
}
