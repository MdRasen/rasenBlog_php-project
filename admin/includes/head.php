<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>
        <?php
        if (isset($view)) {
            if ($view == "index") {
                echo "rasenBlog - Login";
            } elseif ($view == "dashboard") {
                echo "rasenBlog - Dashboard";
            } elseif ($view == "add_category") {
                echo "rasenBlog - Add category";
            } elseif ($view == "manage_category") {
                echo "rasenBlog - Manage category";
            } elseif ($view == "add_post") {
                echo "rasenBlog - Add post";
            } elseif ($view == "manage_post") {
                echo "rasenBlog - Manage post";
            }
        }
        ?>
    </title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        .alert {
            padding: 12px;
            color: white;
            border-radius: 10px;
        }

        .closebtn {
            margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;
        }

        .closebtn:hover {
            color: black;
        }
    </style>
</head>