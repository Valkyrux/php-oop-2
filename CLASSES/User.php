<?php
class User
{
    protected $nick_name;
    private $email;
    private $password;
    protected $name;
    protected $last_name;
    private $date_of_birth;
    protected $subscription = false;

    // set functions
    public function set_nick_name($input_nick_name)
    {
        // check affiché non ci siano spazi nel nick name
        if (strpos($input_nick_name, " ") === false && $input_nick_name != "") {
            $this->nick_name = $input_nick_name;
        } else {
            throw new Exception("Invalid nick name");
        }
    }

    public function set_email($input_email)
    {
        // check per la validazione della mail
        if (strpos($input_email, " ") === false && strpos($input_email, "@") !== false) {
            $this->email = $input_email;
        } else {
            throw new Exception("Invalid email");
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

    public function set_password($input_password)
    {
        // check validazionde della password, nessuno spazio, lunghezza maggionre di 8 caratteri
        if (strpos($input_password, " ") === false && strlen($input_password) > 8) {
            $this->password = $input_password;
        } else {
            throw new Exception("Invalid password");
        }
    }

    public function set_date_of_birth($input_date_of_birth)
    {
        // check validazionde della data di nascita
        $date = new DateTime($input_date_of_birth);
        if ($date->format("Y/m/d") < date("Y/m/d")) {
            $this->date_of_birth = $input_date_of_birth;
        } else {
            throw new Exception("Invalid date of birth");
        }
    }

    public function set_subsription()
    {
        if ($this->get_subscription() === true) {
            $this->subscription = false;
        } else {
            $this->subscription = true;
        }
    }

    //get functions
    public function get_nick_name()
    {
        return $this->nick_name;
    }
    public function get_email()
    {
        return $this->email;
    }
    public function get_password()
    {
        return $this->password;
    }
    public function get_name()
    {
        return $this->name;
    }
    public function get_last_name()
    {
        return $this->last_name;
    }
    public function get_date_of_birth()
    {
        return $this->date_of_birth;
    }
    public function get_subscription()
    {
        return $this->subscription;
    }
    // construct
    public function __construct($input_nick_name, $input_email, $input_password)
    {
        $this->set_nick_name($input_nick_name);
        $this->set_email($input_email);
        $this->set_password($input_password);
    }
}
