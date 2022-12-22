<?php
class Database
{
    private $hostname = '127.0.0.1';
    private $username = 'root';
    private $password = '';
    private $database = 'golden90';
    private $port = 19546;

    private function connect()
    {
        $mysqli = new mysqli($this->hostname, $this->username, $this->password, $this->database);

        if ($mysqli->connect_error) {
            die('Connect Error (' . $mysqli->connect_errno . ')  ' . $mysqli->connect_error);
        }
        return $mysqli;
    }

    public function getUser($email, $password)
    {
        $email = mysqli_real_escape_string($this->connect(), $email);
        $password = mysqli_real_escape_string($this->connect(), $password);

        if (!$password) {
            $query = mysqli_query($this->connect(), "SELECT * FROM `users` WHERE `email`='$email' LIMIT 1");
        } else {
            $query = mysqli_query($this->connect(), "SELECT * FROM `users` WHERE `email`='$email' AND `password`='$password' LIMIT 1");
        }
        if ($query) {
            return mysqli_fetch_assoc($query);
        }
        return null;
    }
    public function getSlides()
    {
        $query = mysqli_query($this->connect(), "SELECT * FROM `slides`");
        if ($query) {
            $result = [];
            while ($products = mysqli_fetch_assoc($query)) {
                $result[] = $products;
            }
            return $result;
        }
        return null;
    }
}
