<?php

class Connect extends Common
{
    private $_id;
    private $_user;
    private $_password;
    private $_role;

    
    public function getId()
    {
        return $this->_id;    
    }   
    public function getUser()
    {
        return $this->_user;     
    }   
    public function getPassword()
    {
        return $this->_password;    
    }
    public function getRole()
    {
        return $this->_role;    
    }  
    
    
    public function setId($id)
    {
        $id = (int) $id;
        
        if($id > 0)
            $this->_id = $id;
    }
    public function setUser($user)
    {
        if(is_string($user))
            $this->_user = $user;
    }
    public function setPassword($password)
    {
        $this->_password = $password;
    }
    public function setRole($role)
    {
        $this->_role = $role; 
    }  

}