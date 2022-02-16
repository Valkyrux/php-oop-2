<?php
include_once __DIR__ . './CreditCard.php';

class CreditCard extends User
{
    private $number;
    private $expiration_date;
    private $name_on_card;
    private $last_name_on_card;

    // set functions
    public function set_number($input_number)
    {
        $this->number = $input_number;
    }
    public function set_expiration_date($input_expiration_date)
    {
        $this->expiration_date = $input_expiration_date;
    }
    public function set_name_on_card($input_name_on_card)
    {
        $this->name_on_card = $input_name_on_card;
    }
    public function set_last_name_on_card($input_last_name_on_card)
    {
        $this->last_name_on_card = $input_last_name_on_card;
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
    public function get_name_on_card()
    {
        return $this->name_on_card;
    }
    public function get_last_name_on_card()
    {
        return $this->last_name_on_card;
    }

    // construct
    public function __construct($input_number, $input_expiration_date, $input_name_on_card, $input_last_name_on_card)
    {
        $this->set_number($input_number);
        $this->set_expiration_date($input_expiration_date);
        $this->set_name_on_card($input_name_on_card);
        $this->set_last_name_on_card($input_last_name_on_card);
    }
}
