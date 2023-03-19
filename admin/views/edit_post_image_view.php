<?php
if (isset($_GET['status'])) {
    if ($_GET['status'] == "edit_image") {
        $result = $obj->post_edit_image($_GET['id']);
    }
}

if (isset($_POST['update_img'])) {
    $obj->edit_image_submit($_POST);
}
?>
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card mt-4">
            <div class="card-header">
                <h3 class="text-center font-weight-light my-3">Edit Post</h3>
            </div>
            <div class="card-body">
                <div class="card">
                    <div class="row py-3">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <?php
                            if ($result['post_img']) {
                            ?>
                                <img src="<?php echo "post_images/" . $result['post_img'] ?>" alt="post image" style="width: 100%;">
                            <?Php
                            } else {
                            ?>
                                <img src="assets/No Image.jpg" alt="post image" style="width: 100%;">
                            <?php
                            }
                            ?>
                            <div class="card-body">
                                <form action="#" method="POST" enctype="multipart/form-data">
                                    <input class="form-control" name="post_id" type="hidden" value="<?= $result['id'] ?>">
                                    <input class="form-control" style="width: 100%;" type="file" name="post_img" required>
                                    <button class="btn btn-primary mt-1" type="submit" name="update_img">Update Image</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-center py-3">
                <div class="row">
                    <div class="col-sm-8">
                    </div>
                    <div class="col-sm-2 d-grid py-1">
                        <a href="manage_post.php" class="btn btn-info">Manage Post</a>
                    </div>
                    <div class="col-sm-2 d-grid py-1">
                        <a href="dashboard.php" class="btn btn-secondary">Go Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>