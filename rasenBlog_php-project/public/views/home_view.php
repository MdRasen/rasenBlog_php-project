<?php
$post_result = $obj->posts_view();
$post_result2 = $obj->posts_view();
$recent_posts = $obj->recent_posts();
$cate_result2 = $obj->cate_view();
?>
<!-- Page Content -->
<!-- Banner Starts Here -->
<div class="main-banner header-text">
    <div class="container-fluid">
        <div class="owl-banner owl-carousel">
            <?php
            if (mysqli_num_rows($post_result) > 0) {
                while ($item = mysqli_fetch_assoc($post_result)) {
            ?>
                    <div class="item">
                        <?php
                        if ($item['post_img']) {
                        ?>
                            <img src="<?php echo "../admin/post_images/" . $item['post_img'] ?>" alt="post image">
                        <?Php
                        } else {
                        ?>
                            <img src="assets/images/banner-item-01.jpg" alt="post image">
                        <?php
                        }
                        ?>
                        <div class="item-content">
                            <div class="main-content">
                                <div class="meta-category">
                                    <span><?= $item['cate_name'] ?></span>
                                </div>
                                <a href="post-details.html">
                                    <h4><?= $item['post_title'] ?></h4>
                                </a>
                                <ul class="post-info">
                                    <li><a href="#"><?= $item['post_author'] ?></a></li>
                                    <li><a href="#"><?= date("M d, Y", strtotime($item['updated_at'])) ?></a></li>
                                    <!-- <li><a href="#">12 Comments</a></li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php
                }
            } else { ?>

                <div class="item">
                    <img src="assets/images/banner-item-01.jpg" alt="">
                    <div class="item-content">
                        <div class="main-content">
                            <div class="meta-category">
                                <span>Category</span>
                            </div>
                            <a href="post-details.html">
                                <h4>This is demo title</h4>
                            </a>
                            <ul class="post-info">
                                <li><a href="#">Admin</a></li>
                                <li><a href="#">12 July, 2023</a></li>
                                <!-- <li><a href="#">12 Comments</a></li> -->
                            </ul>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<!-- Banner Ends Here -->

<section class="call-to-action">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-content">
                    <div class="row">
                        <div class="col-lg-8">
                            <span>rasenBlog - Custom Ads</span>
                            <h4>Contact Us For Custom Ads!</h4>
                        </div>
                        <div class="col-lg-4">
                            <div class="main-button">
                                <a rel="nofollow" href="#" target="_parent">Contact Now!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="blog-posts">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="all-blog-posts">
                    <div class="row">
                        <?php
                        while ($item = mysqli_fetch_assoc($post_result2)) {
                        ?>
                            <div class="col-lg-12">
                                <div class="blog-post">
                                    <div class="blog-thumb">
                                        <?php
                                        if ($item['post_img']) {
                                        ?>
                                            <img src="<?php echo "../admin/post_images/" . $item['post_img'] ?>" alt="post image">
                                        <?Php
                                        } else {
                                        ?>
                                            <img src="assets/images/banner-item-01.jpg" alt="post image">
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="down-content">
                                        <span><?= $item['cate_name'] ?></span>
                                        <a href="post-details.html">
                                            <h4><?= $item['post_title'] ?></h4>
                                        </a>
                                        <ul class="post-info">
                                            <li><a href="#"><?= $item['post_author'] ?></a></li>
                                            <li><a href="#"><?= date("M d, Y", strtotime($item['updated_at'])) ?></a></li>
                                            <!-- <li><a href="#">12 Comments</a></li> -->
                                        </ul>
                                        <p><?php
                                            for ($i = 0; $i <= 300; $i++) {
                                                echo $item['post_desc'][$i];
                                            }
                                            ?> ...</p>

                                        <div class="post-options">
                                            <div class="row">
                                                <div class="col-6">
                                                    <ul class="post-tags">
                                                        <li><i class="fa fa-tags"></i></li>
                                                        <li><a href="#">Beauty</a>,</li>
                                                        <li><a href="#">Nature</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-6">
                                                    <ul class="post-share">
                                                        <li><i class="fa fa-share-alt"></i></li>
                                                        <li><a href="#">Facebook</a>,</li>
                                                        <li><a href="#"> Twitter</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="col-lg-12">
                            <div class="main-button">
                                <a href="#">View All Posts</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar">
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
                                                <a href="#">
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
                </div>
            </div>
        </div>
    </div>
</section>