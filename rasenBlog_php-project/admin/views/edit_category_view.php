<?php
if (isset($_GET['status'])) {
    if ($_GET['status'] == "edit") {
        $result = $obj->cate_edit($_GET['id']);
    }
}

if (isset($_POST['cate_edit_submit'])) {
    $obj->cate_edit_submit($_POST);
}
?>
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card mt-4">
            <div class="card-header">
                <h3 class="text-center font-weight-light my-3">Edit Category</h3>
            </div>
            <div class="card-body">
                <form action="#" method="POST">
                    <input name="cate_id" class="form-control" id="inputCateId" type="hidden" value="<?= $result['id'] ?>" placeholder="Enter Category id" required />
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input name="cate_name" class="form-control" id="inputCateName" type="text" value="<?= $result['cate_name'] ?>" placeholder="Enter Category name" required />
                                <label for="inputCateName">Category name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input name="cate_slug" class="form-control" id="inputCateSlug" type="text" value="<?= $result['cate_slug'] ?>" placeholder="Enter category Slug" />
                                <label for="inputCateSlug">Slug</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="cate_desc" class="form-control" id="inputCateDesc" type="text" value="<?= $result['cate_desc'] ?>" placeholder="Enter short description" />
                        <label for="inputCateDesc">Short Description</label>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input name="cate_sort" class="form-control" id="inputCateSort" type="number" value="<?= $result['cate_sort'] ?>" placeholder="Enter sort number" required />
                                <label for="inputCateSort">Sort</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <select name="cate_status" class="form-control">
                                    <option value="Active" <?php if ($result['cate_status'] == "Active") {
                                                                echo "selected";
                                                            } ?>>Active
                                    </option>
                                    <option value="Hidden" <?php if ($result['cate_status'] == "Hidden") {
                                                                echo "selected";
                                                            } ?>>Hidden</option>
                                </select>
                                <label for="inputCateStatus">Status</label>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 mb-0">
                        <div class="d-grid">
                            <button name="cate_edit_submit" class="btn btn-primary btn-block" type="submit">Update Category</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center py-3">
                <div class="row">
                    <div class="col-sm-8">
                    </div>
                    <div class="col-sm-2 d-grid py-1">
                        <a href="manage_category.php" class="btn btn-info">Manage Category</a>
                    </div>
                    <div class="col-sm-2 d-grid py-1">
                        <a href="dashboard.php" class="btn btn-secondary">Go Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>