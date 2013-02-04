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

    public function get_total()
    {
        $expensesTotal = Expense::where('user_id','=',$this->user_id)->sum('amount');
        //setlocale(LC_MONETARY, 'en_US');
        return money_format('%i', $expensesTotal) . "\n";
    }

}