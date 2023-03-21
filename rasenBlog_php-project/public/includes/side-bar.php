<?php
$recent_posts = $obj->recent_posts();
$cate_result2 = $obj->cate_view();
?>
<div class="row">
    <div class="col-lg-12">
        <div class="sidebar-item search">
            <form id="search_form" name="gs" method="GET" action="#">
                <input type="text" name="q" class="searchText" placeholder="type to search..." autocomplete="on">
            </form>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="sidebar-item recent-posts">
            <div class="sidebar-heading">
                <h2>Recent Posts</h2>
            </div>
            <div class="content">
                <ul>
                    <?php
                    while ($item = mysqli_fetch_assoc($recent_posts)) {
                    ?>
                        <li>
                            <a href="single-post.php?status=view_post&&slug=<?= $item['post_slug'] ?>">
                                <h5><?= $item['post_title'] ?></h5>
                                <span><?= date("M d, Y", strtotime($item['updated_at'])) ?></span>
                            </a>
                        </li>
                    <?php } ?>

                </ul>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="sidebar-item categories">
            <div class="sidebar-heading">
                <h2>Categories</h2>
            </div>
            <div class="content">
                <ul>
                    <?php
                    while ($item = mysqli_fetch_assoc($cate_result2)) {
                    ?>
                        <li><a href="#">- <?= $item['cate_name'] ?></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="sidebar-item tags">
            <div class="sidebar-heading">
                <h2>Tag Clouds</h2>
            </div>
            <div class="content">
                <ul>
                    <li><a href="#">Lifestyle</a></li>
                    <li><a href="#">Creative</a></li>
                    <li><a href="#">HTML5</a></li>
                    <li><a href="#">Inspiration</a></li>
                    <li><a href="#">Motivation</a></li>
                    <li><a href="#">PSD</a></li>
                    <li><a href="#">Responsive</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>