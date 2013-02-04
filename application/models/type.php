<?php

class Type extends Eloquent 
{
    public function expenses()
        {
            return $this->has_many_and_belongs_to('Expense');
        }    
   
    public function user()
        {
            return $this->belongs_to('User');
        }
}