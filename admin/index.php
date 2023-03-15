<?Php

include("class/function.php");
$obj = new adminBlog();

if (isset($_POST['login_btn'])) {
    // Send data as object
    $obj->admin_login($_POST);
}

// Check if the user is logged
session_start();
if (isset($_SESSION['adminID'])) {
    header("location:dashboard.php");
}

?>

<?Php include_once("includes/head.php"); ?>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 mt-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login</h3>
                                </div>
                                <div class="card-body">
                                    <!-- Show error message -->
                                    <?php
                                    if (!empty($_REQUEST["error"])) {
                                        $error = $_REQUEST["error"];
                                        if ($error == "invalid") {
                                    ?>
                                            <div class="mb-3">
                                                <p class="text-center text-danger"><b>Error: Invalid credentials (Failure)!</b></p>
                                            </div>
                                    <?php
                                            // header('Refresh: 5; URL=index.php');
                                        }
                                    }
                                    ?>
                                    <form action="#" method="POST">
                                        <div class="form-floating mb-3">
                                            <input name="email" class="form-control" id="inputEmail" type="email" placeholder="name@example.com" required />
                                            <label for="inputEmail">Email address</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input name="password" class="form-control" id="inputPassword" type="password" placeholder="Password" required />
                                            <label for="inputPassword">Password</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button name="login_btn" type="submit" class="btn btn-primary">Login</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="#" style="text-decoration: none;">Go Back</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <?Php include_once("includes/footer.php"); ?>
        </div>
    </div>
    <?php include_once("includes/script.php"); ?>
</body>

</html>