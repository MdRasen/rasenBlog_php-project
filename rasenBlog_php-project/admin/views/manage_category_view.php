<?php
$result = $obj->cate_view();

if (isset($_GET['status'])) {
    if ($_GET['status'] == "delete") {
        $obj->cate_delete($_GET['id']);
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
                                                            echo "Category has been deleted successfully.";
                                                        } elseif ($msg == "updatesuccess") {
                                                            echo "Category has been updated successfully.";
                                                        }
                                                        ?>
                        </div>
                    </div>
            <?php
                    header('Refresh: 4; URL=manage_category.php');
                }
            }
            ?>
            <div class="card-header">
                <h3 class="text-center font-weight-light my-3">Manage Category</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive-md">
                    <table id="myTable" class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th>Category Name</th>
                                <th>Slug</th>
                                <th style="width: 40%;">Description</th>
                                <th>Sort</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($item = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td><?= $item['cate_name'] ?></td>
                                    <td><?= $item['cate_slug'] ?></td>
                                    <td style="width: 40%;"><?= $item['cate_desc'] ?></td>
                                    <td><?= $item['cate_sort'] ?></td>
                                    <td><?= $item['cate_status'] ?></td>
                                    <td>
                                        <a href="edit_category.php?status=edit&&id=<?= $item['id'] ?>" class="btn btn-primary">Edit</a>
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
                        <a href="add_category.php" class="btn btn-info">Create Category</a>
                    </div>
                    <div class="col-sm-2 d-grid py-1">
                        <a href="dashboard.php" class="btn btn-secondary">Go Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>