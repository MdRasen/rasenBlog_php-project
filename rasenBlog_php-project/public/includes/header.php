<?php
$cate_result = $obj->cate_view();
?>
<!-- Header -->
<header class="">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="../index.php">
                <h2>rasen Blog<em>.</em></h2>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="../index.php">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <?php
                    while ($item = mysqli_fetch_assoc($cate_result)) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><?= $item['cate_name'] ?></a>
                        </li>
                    <?php } ?>
                    <li class="nav-item">
                        <a href="../admin/" class="btn px-3" style="color: white; background-color: #F59B40;border:none;">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>