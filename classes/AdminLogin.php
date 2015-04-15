<?php
include('Database.php');

class AdminLogin
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function adminLogin($username, $password)
    {
        $command = "SELECT * FROM `admin`";
        $queryResult = $this->db->query($command);
        while ($item = mysqli_fetch_array($queryResult)) {
            if (($item['login'] == $username) && ($item['password'] == $password)) {
                header('Location: control_panel.php');
            } else {
                echo "<script type='text/javascript'> alert('Ви ввели не вірний логін або пароль') </script>";
            }
        }
    }
}