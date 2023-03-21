<?php
// ob_start() -> Location redirect solve
ob_start();
include("class/function.php");
$obj = new adminBlog();

// Check if the user is logged
session_start();
$id = $_SESSION['adminID'];
if ($id == null) {
    header("location:index.php");
}

if (isset($_GET['adminlogout'])) {
    if ($_GET['adminlogout'] == "logout") {
        $obj->adminLogout();
    }
}
?>
<?Php include_once("includes/head.php"); ?>

<body class="sb-nav-fixed">
    <?Php include_once("includes/top-nav.php"); ?>
    <div id="layoutSidenav">
        <?Php include_once("includes/side-nav.php"); ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <?php
                    if (isset($view)) {
                        if ($view == "dashboard") {
                            include("views/dashboard_view.php");
                        } elseif ($view == "add_category") {
                            include("views/add_category_view.php");
                        } elseif ($view == "manage_category") {
                            include("views/manage_category_view.php");
                        } elseif ($view == "edit_category") {
                            include("views/edit_category_view.php");
                        } elseif ($view == "add_post") {
                            include("views/add_post_view.php");
                        } elseif ($view == "manage_post") {
                            include("views/manage_post_view.php");
                        } elseif ($view == "edit_post") {
                            include("views/edit_post_view.php");
                        } elseif ($view == "edit_post_image") {
                            include("views/edit_post_image_view.php");
                        }
                    }
                    ?>
                </div>
            </main>
            <?Php include_once("includes/footer.php"); ?>
        </div>
    </div>
    <?php include_once("includes/script.php"); ?>
</body>

</html>