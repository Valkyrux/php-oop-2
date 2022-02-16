<?php

require_once __DIR__ . '/User.php';

class Premium extends User
{
    protected $level;
    protected $date;
    protected $months;
    protected $discount;

    // set functions
    public function set_level(int $input_level)
    {
        if ($input_level === 1 || $input_level === 2 || $input_level === 3) {
            $this->level = $input_level;
        } else {
            throw new Exception("Invalid level");
        }
    }
    public function set_date_months(string $input_date, int $input_months)
    {
        // check se la data di inizio abbonamento è precedente ad oggi e la data di fine e successiva
        $start_date = new DateTime($input_date);
        $end_date = new DateTime($input_date);
        $end_date->add(new DateInterval('P' . $input_months . 'M'));
        if ($end_date->format("Y/m/d") > date("Y/m/d") && $start_date->format("Y/m/d") < date("Y/m/d")) {
            $this->date = $start_date->format("d/m/Y");
            $this->months = $input_months;
        } else {
            throw new Exception("Invalid subscription date and months");
        }
    }
    public function set_discount()
    {
        $this->discount = $this->get_level() * 10;
    }

    // get functions
    public function get_level()
    {
        return $this->level;
    }

    public function get_date()
    {
        return $this->date;
    }
    public function get_months()
    {
        return $this->months;
    }
    public function get_discount()
    {
        return $this->discount;
    }

    // construct
    public function __construct($input_level, $input_date, $input_months)
    {
        $this->set_level($input_level);
        $this->set_date_months($input_date, $input_months);
        $this->set_discount();
    }
}

$io = new Premium(1, "17-01-2022", 1);
