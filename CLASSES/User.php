<?php
class User
{
    protected $nick_name;
    private $email;
    private $password;
    protected $name;
    protected $last_name;
    private $date_of_birth;
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
        if (strpos($input_email, " ") === false && $input_email != "" && strpos($input_email, "@") != false) {
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

    public function __construct($inpu_nick_name)
    {
        $this->set_nick_name($inpu_nick_name);
    }
}

$io = new User("c");
var_dump(date("d-m-Y"));
$var = new DateTime("2003/02/02");
var_dump($var->format("d-m-Y"));
if ($var->format("Y-m-d") < date("Y-m-d")) {
    var_dump("diocane");
}
