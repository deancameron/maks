<?php

class Vendor extends Eloquent 
{
    public function expense()
    {
        return $this->has_many('Expense');
    }
 
    public function user()
    {
        return $this->belongs_to('User');
    }    
}