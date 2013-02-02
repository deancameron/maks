<?php

class User extends Eloquent 
{
    public function expenses()
    {
        return $this->has_many('Expense');
    }

    public function types()
    {
        return $this->has_many('Type');
    }

    public function vendors()
    {
        return $this->has_many('Vendor');
    }

    public function set_password($password)
    {
        $this->set_attribute('password', Hash::make($password));
    }


}
