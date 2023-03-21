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
        $query = "SELECT posts.id, posts.post_img, posts.post_title, posts.post_slug, posts.post_desc, posts.cate_id, posts.post_author, posts.post_status, posts.post_total_views, posts.updated_at , categories.cate_name, categories.cate_slug FROM posts INNER JOIN categories ON posts.cate_id=categories.id WHERE posts.post_status='Active' ORDER BY posts.id DESC LIMIT 3";

        if (mysqli_query($this->conn, $query)) {
            $posts = mysqli_query($this->conn, $query);
            return $posts;
        }
    }

    // Recent Post
    public function recent_posts()
    {
        $query = "SELECT posts.id, posts.post_img, posts.post_title, posts.post_slug, posts.post_desc, posts.cate_id, posts.post_author, posts.post_status, posts.post_total_views, posts.updated_at , categories.cate_name, categories.cate_slug FROM posts INNER JOIN categories ON posts.cate_id=categories.id WHERE posts.post_status='Active' ORDER BY posts.id DESC LIMIT 5";

        if (mysqli_query($this->conn, $query)) {
            $posts = mysqli_query($this->conn, $query);
            return $posts;
        }
    }

    // Single post view
    public function single_post_view($slug)
    {
        $query = "SELECT posts.id, posts.post_img, posts.post_title, posts.post_slug, posts.post_desc, posts.cate_id, posts.post_author, posts.post_status, posts.post_total_views, posts.updated_at , categories.cate_name, categories.cate_slug FROM posts INNER JOIN categories ON posts.cate_id=categories.id WHERE posts.post_slug='$slug'";
        if (mysqli_query($this->conn, $query)) {
            $result = mysqli_query($this->conn, $query);

            if (mysqli_num_rows($result)) {
                $post_info = mysqli_fetch_assoc($result);
                $new_views = $post_info['post_total_views'] + 1;
                $query2 = "UPDATE posts SET post_total_views='$new_views' WHERE post_slug='$slug'";
                mysqli_query($this->conn, $query2);

                return $post_info;
            }
        }
    }
}
