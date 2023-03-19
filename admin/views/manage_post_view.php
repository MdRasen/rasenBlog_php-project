<?php
$result = $obj->post_view();

if (isset($_GET['status'])) {
    if ($_GET['status'] == "delete") {
        $obj->post_delete($_GET['id']);
    }
}
?>
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card mt-4">
            <!-- Show message -->
            <?php
            if (!empty($_REQUEST["msg"])) {
                $msg = $_REQUEST["msg"];
                if ($msg == "deletesuccess" || $msg == "updatesuccess") {
            ?>
                    <div class="alert-box" style="padding:10px 40px">
                        <div class="alert bg-success">
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                            <strong>Success!</strong> <?php
                                                        if ($msg == "deletesuccess") {
                                                            echo "Post has been deleted successfully.";
                                                        } elseif ($msg == "updatesuccess") {
                                                            echo "Post has been updated successfully.";
                                                        }
                                                        ?>
                        </div>
                    </div>
            <?php
                    header('Refresh: 4; URL=manage_post.php');
                }
            }
            ?>
            <div class="card-header">
                <h3 class="text-center font-weight-light my-3">Manage Post</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive-md">
                    <table id="datatablesSimple" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Author</th>
                                <th>Status</th>
                                <th>Views</th>
                                <th>Update</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Author</th>
                                <th>Status</th>
                                <th>Views</th>
                                <th>Update</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            while ($item = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td>

                                        <?php
                                        if ($item['post_img']) {
                                        ?>
                                            <img src="<?php echo "post_images/" . $item['post_img'] ?>" style="width: 120px;">
                                        <?Php
                                        } else {
                                        ?>
                                            <img src="assets/No Image.jpg" alt="post image" style="width: 120px;">
                                        <?php
                                        }
                                        ?>
                                        <br>
                                        <a href="edit_post_image.php?status=edit_image&&id=<?= $item['id'] ?>" class="btn btn-sm btn-info mt-1" style="width: 120px;">Update Image</a>
                                    </td>
                                    <td><?= $item['post_title'] ?></td>
                                    <td><?= $item['cate_name'] ?></td>
                                    <td><?= $item['post_author'] ?></td>
                                    <td><?= $item['post_status'] ?></td>
                                    <td><?= $item['post_total_views'] ?></td>
                                    <td><?= date("M d, Y", strtotime($item['updated_at'])) ?></td>
                                    <td>
                                        <a href="edit_post.php?status=edit&&id=<?= $item['id'] ?>" class="btn btn-primary">Edit</a>
                                        <a href="?status=delete&&id=<?= $item['id'] ?>" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer text-center py-3">
                <div class="row">
                    <div class="col-sm-8">
                    </div>
                    <div class="col-sm-2 d-grid py-1">
                        <a href="add_post.php" class="btn btn-info">Create Post</a>
                    </div>
                    <div class="col-sm-2 d-grid py-1">
                        <a href="dashboard.php" class="btn btn-secondary">Go Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>