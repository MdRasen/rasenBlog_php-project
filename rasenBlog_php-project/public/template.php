<?php
// ob_start() -> Location redirect solve
ob_start();
include("class/public-function.php");
$obj = new publicBlog();

?>
<?Php include_once("includes/head.php"); ?>

<body>
    <?Php
    include_once("includes/freeloader.php");
    include_once("includes/header.php");

    if (isset($view)) {
        if ($view == "home") {
            include("views/home_view.php");
        } elseif ($view == "single-post") {
            include("views/single-post_view.php");
        }
    }

    include_once("includes/footer.php");
    include_once("includes/script.php");
    ?>

</body>

</html>