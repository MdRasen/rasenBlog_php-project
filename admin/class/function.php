<?php
class adminBlog
{
    private $conn;

    public function __construct()
    {
        // Database host, Database user, Database pass, Database name
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $dbname = "rasen_blog";

        // Database coneection
        $this->conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

        // Database connection check
        if (!$this->conn) {
            die("Database connection error!");
        }
    }

    // Get data as $data
    public function admin_login($data)
    {
        $input_email =  $data['email'];
        $input_pass = md5($data['password']);

        // Query to check data
        $query = "SELECT * FROM admin_info WHERE admin_email='{$input_email}' && admin_password='{$input_pass}'";

        // Run query
        if (mysqli_query($this->conn, $query)) {
            $result = mysqli_query($this->conn, $query);

            // Check founded rows in $result
            if (mysqli_num_rows($result)) {
                $admin_info = mysqli_fetch_assoc($result);

                // Store information in session
                session_start();
                $_SESSION['adminID'] = $admin_info['id'];
                $_SESSION['adminName'] = $admin_info['admin_name'];
                $_SESSION['adminEmail'] = $admin_info['admin_email'];

                // Redirect to logged in page
                header("location:dashboard.php");
            } else {
                // Send error message
                header("location:index.php?error=invalid");
            }
        }
    }

    public function adminLogout()
    {
        // Clear information in session
        unset($_SESSION['adminID']);
        unset($_SESSION['adminName']);
        unset($_SESSION['adminEmail']);

        // Redirect to logged in page
        header("location:index.php");
    }
}
