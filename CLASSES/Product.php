<?php
class Product
{
    private $name;
    private $price;
    private $level_sub_required;

    // set functions 
    public function set_name(string $input_name)
    {
        $this->name = $input_name;
    }

    public function set_price(float $input_price)
    {
        $this->price = $input_price;
    }

    public function set_level_sub_required(int $input_level_sub_required)
    {
        if ($input_level_sub_required >= 1 && $input_level_sub_required <= 3) {
            $this->level_sub_required = $input_level_sub_required;
        } else {
            throw new Exception("Invalid value for subscription on product");
        }
    }

    // get functions
    public function get_name()
    {
        return $this->name;
    }
    public function get_price()
    {
        return $this->price;
    }
    public function get_level_sub_required()
    {
        return $this->level_sub_required;
    }

    // costruct
    public function __construct($input_name, $input_price)
    {
        $this->set_name($input_name);
        $this->set_price($input_price);
    }
}
