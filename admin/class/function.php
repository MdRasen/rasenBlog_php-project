<?php
class adminBlog
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

    // Admin Login
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

    // Admin Logout
    public function adminLogout()
    {
        // Clear information in session
        unset($_SESSION['adminID']);
        unset($_SESSION['adminName']);
        unset($_SESSION['adminEmail']);

        // Redirect to logged in page
        header("location:index.php");
    }

    // Create Category
    public function cate_create($data)
    {
        $cate_name =  $data['cate_name'];
        $cate_slug =  $data['cate_slug'];
        $cate_desc =  $data['cate_desc'];
        $cate_sort =  $data['cate_sort'];
        $cate_status =  $data['cate_status'];

        if (!$cate_slug) {
            $cate_slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $cate_name)));
        }

        $query = "INSERT INTO categories (cate_name, cate_slug, cate_desc, cate_sort, cate_status) values('$cate_name','$cate_slug', '$cate_desc', '$cate_sort', '$cate_status')";

        if (mysqli_query($this->conn, $query)) {
            header("location:add_category.php?msg=success");
        } else {
            header("location:add_category.php?msg=failed");
        }
    }

    // View Category
    public function cate_view()
    {
        $query = "SELECT * FROM categories";
        if (mysqli_query($this->conn, $query)) {
            $categories = mysqli_query($this->conn, $query);
            return $categories;
        } else {
            header("location:add_category.php?msg=failed");
        }
    }

    // Delete Category
    public function cate_delete($cate_id)
    {
        $query = "DELETE FROM categories WHERE id = $cate_id";
        if (mysqli_query($this->conn, $query)) {
            header("location:manage_category.php?msg=deletesuccess");
        } else {
            header("location:manage_category.php?msg=failed");
        }
    }

    // Edit Category
    public function cate_edit($cate_id)
    {
        $query = "SELECT * FROM categories WHERE id=$cate_id";
        if (mysqli_query($this->conn, $query)) {
            $result = mysqli_query($this->conn, $query);
            if (mysqli_num_rows($result)) {
                $cate_info = mysqli_fetch_assoc($result);
                return $cate_info;
            } else {
                header("location:manage.php?msg=error");
            }
        }
    }

    // Edit Category
    public function cate_edit_submit($data)
    {
        $cate_id =  $data['cate_id'];
        $cate_name =  $data['cate_name'];
        $cate_slug =  $data['cate_slug'];
        $cate_desc =  $data['cate_desc'];
        $cate_sort =  $data['cate_sort'];
        $cate_status =  $data['cate_status'];

        if (!$cate_slug) {
            $cate_slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $cate_name)));
        }

        $query = "UPDATE categories SET cate_name='$cate_name', cate_slug='$cate_slug', cate_desc='$cate_desc', cate_sort='$cate_sort', cate_status='$cate_status' WHERE id='$cate_id'";

        if (mysqli_query($this->conn, $query)) {
            header("location:manage_category.php?msg=updatesuccess");
        } else {
            header("location:add_category.php?msg=failed");
        }
    }

    // Create Post
    public function post_create($data)
    {
        $post_title =  $data['post_title'];
        $post_slug =  $data['post_slug'];
        if (!$post_slug) {
            $post_slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $post_title)));
        }
        $post_img = time() . '-' . $_FILES['post_img']['name'];

        $post_img_src =  $_FILES['post_img']['tmp_name'];
        $post_img_des = 'post_images/' . $_FILES['post_img']['name'];

        $post_category =  $data['post_category'];
        $post_desc =  $data['post_desc'];
        $post_tags =  $data['post_tags'];
        $post_author =  $data['post_author'];
        $post_status =  $data['post_status'];

        $query = "INSERT INTO posts (post_title, post_slug, post_img, cate_id, post_desc, post_tags, post_author, post_status) values('$post_title','$post_slug', '$post_img', '$post_category', '$post_desc', '$post_tags', '$post_author', '$post_status')";

        if (mysqli_query($this->conn, $query)) {
            move_uploaded_file($post_img_src, $post_img_des);
            header("location:add_post.php?msg=success");
        } else {
            header("location:add_category.php?msg=failed");
        }
    }
}
