<?php

class Expense extends Eloquent 
{
    public function types()
    {
        return $this->has_many_and_belongs_to('Type');
    }

    public function user()
    {
        return $this->belongs_to('User');
    }

    public function vendor()
    {
        return $this->belongs_to('Vendor');
    }
}