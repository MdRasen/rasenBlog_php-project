<?php
class publicBlog
{
    private $conn;

    // Database connection
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
            die("Database connection error!" . mysqli_connect_error());
        }
    }

    // View Category
    public function cate_view()
    {
        $query = "SELECT * FROM categories WHERE cate_status='Active'";
        if (mysqli_query($this->conn, $query)) {
            $categories = mysqli_query($this->conn, $query);
            return $categories;
        }
    }

    // View Post
    public function posts_view()
    {
        $query = "SELECT posts.id, posts.post_img, posts.post_title, posts.post_desc, posts.cate_id, posts.post_author, posts.post_status, posts.post_total_views, posts.updated_at , categories.cate_name FROM posts INNER JOIN categories ON posts.cate_id=categories.id WHERE posts.post_status='Active' ORDER BY posts.id DESC LIMIT 3";

        if (mysqli_query($this->conn, $query)) {
            $posts = mysqli_query($this->conn, $query);
            return $posts;
        }
    }

    // Recent Post
    public function recent_posts()
    {
        $query = "SELECT posts.id, posts.post_img, posts.post_title, posts.post_desc, posts.cate_id, posts.post_author, posts.post_status, posts.post_total_views, posts.updated_at , categories.cate_name FROM posts INNER JOIN categories ON posts.cate_id=categories.id WHERE posts.post_status='Active' ORDER BY posts.id DESC LIMIT 5";

        if (mysqli_query($this->conn, $query)) {
            $posts = mysqli_query($this->conn, $query);
            return $posts;
        }
    }
}
