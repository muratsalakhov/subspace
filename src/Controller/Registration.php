<?php

namespace Murat\Subspace\Controller;

use Exception;
use mysqli;

class Registration extends BaseController
{
    protected array $postData;

    public function __construct(mysqli $connection)
    {
        parent::__construct($connection);
        $this->postData = $_POST;
    }

    public function register()
    {
        if (!isset($this->postData['username'])) {
            throw new Exception('Empty username field');
        }
        if (!isset($this->postData['password'])) {
            throw new Exception('Empty password field');
        }

        $username = $this->postData['username'];
        $password = md5($this->postData['password']);
        $email    = $this->postData['email'];

        $query = "SELECT * FROM users WHERE user_name = '$username' OR user_email = '$email'";
        $result = mysqli_query($this->dbConnection, $query) or die(mysqli_error($connection));
        $count = mysqli_num_rows($result);

        if ($count == 0) {
            $query  = "INSERT INTO users (user_name, user_email, user_password) VALUES ('$username', '$email', '$password')";
            $result = mysqli_query($connection, $query);

            if ($result) {
                header("Location: /registration/#success");
                require('new_user_init.php');

            } else {
                header("Location: /registration/#error2");
            }
        } else {
            header("Location: /registration/#error1");
        }
    }
}