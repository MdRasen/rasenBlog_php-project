<?php
class adminBlog
{
    private $conn;

    public function __construct()
    {
        // Database host, Database user, Database pass, Database name
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = "";
        $dbname = 'rasen_blog';

        this->conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

        if (!this->conn) {
            die("Database connection error!");
        }
    }
}
