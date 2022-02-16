<?php
class CreditCard
{
    private $number;
    private $expiration_date;
    private $name;
    private $last_name;

    // set functions
    public function set_number($input_number)
    {
        $this->number = $input_number;
    }
    public function set_expiration_date($input_expiration_date)
    {
        $date = new DateTime($input_expiration_date);
        if ($date->format("Y/m/d") < date("Y/m/d")) {
            $this->expiration_date = $input_expiration_date;
        } else if ($date->format("Y/m/d") >= date("Y/m/d")) {
            throw new Exception("Your credit card was expired");
        } else {
            throw new Exception("Invalid expiration date");
        }
    }
    public function set_name($input_name)
    {
        $this->name = $input_name;
    }
    public function set_last_name($input_last_name)
    {
        $this->last_name = $input_last_name;
    }

    // get functions
    public function get_number()
    {
        return $this->number;
    }
    public function get_expiration_date()
    {
        return $this->expiration_date;
    }
    public function get_name()
    {
        return $this->name;
    }
    public function get_last_name()
    {
        return $this->last_name;
    }

    // construct
    public function __construct($input_number, $input_expiration_date, $input_name, $input_last_name)
    {
        $this->set_number($input_number);
        $this->set_expiration_date($input_expiration_date);
        $this->set_name($input_name);
        $this->set_last_name($input_last_name);
    }
}
