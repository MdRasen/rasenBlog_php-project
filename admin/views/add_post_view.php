<?php

$result = $obj->cate_view();
$cate_result = $obj->post_cate_view();

if (isset($_POST['post_submit'])) {
    $obj->post_create($_POST);
}
?>
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card mt-4">
            <!-- Show message -->
            <?php
            if (!empty($_REQUEST["msg"])) {
                $error = $_REQUEST["msg"];
                if ($error == "success") {
            ?>
                    <div class="alert-box" style="padding:10px 40px">
                        <div class="alert bg-success">
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                            <strong>Success!</strong> Post has been created successfully.
                        </div>
                    </div>
            <?php
                    header('Refresh: 3; URL=add_post.php');
                }
            }
            ?>
            <div class="card-header">
                <h3 class="text-center font-weight-light my-3">Create New Post</h3>
            </div>
            <div class="card-body">
                <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input name="post_title" class="form-control" id="inputPostTitle" type="text" placeholder="Enter Post tile" required />
                                <label for="inputPostTitle">Post Title</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input name="post_slug" class="form-control" id="inputPostSlug" type="text" placeholder="Enter Post Slug" />
                                <label for="inputPostSlug">Slug</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input name="post_img" class="form-control" id="inputPostImg" type="file" placeholder="Selete post image" required />
                                <label for="inputPostImg">Image</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <select name="post_category" class="form-control">
                                    <?php
                                    while ($item = mysqli_fetch_assoc($cate_result)) {
                                    ?>
                                        <option value="<?= $item['id'] ?>"><?= $item['cate_name'] ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <label for="inputPostCate">Category</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea name="post_desc" class="form-control" id="" style="height: 120px;" required></textarea>
                        <label for="inputPostDesc">Description</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea name="post_tags" class="form-control" id="" style="height: 80px;"></textarea>
                        <label for="inputPostTags">Tags</label>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input name="post_author" class="form-control" id="inputPostImg" type="text" placeholder="Enter author name" value="Admin" required />
                                <label for="inputPostAuthor">Author</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <select name="post_status" class="form-control">
                                    <option value="Active" selected>Active
                                    </option>
                                    <option value="Hidden">Hidden</option>
                                </select>
                                <label for="inputPostStatus">Status</label>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 mb-0">
                        <div class="d-grid">
                            <button name="post_submit" class="btn btn-primary btn-block" type="submit">Create Post</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center py-3">
                <div class="row">
                    <div class="col-sm-8">
                    </div>
                    <div class="col-sm-2 d-grid py-1">
                        <a href="manage_Post.php" class="btn btn-info">Manage Post</a>
                    </div>
                    <div class="col-sm-2 d-grid py-1">
                        <a href="dashboard.php" class="btn btn-secondary">Go Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>