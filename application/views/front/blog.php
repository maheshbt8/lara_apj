
<!--create a new page(blog.php) and the content below-->
<!-- Start Blog Area -->
<section class="blog-area blog-section">
    <div class="container">
        <div class="row">
            <div class="col-12 justify-content-center align-items-center d-flex mt-4">
                 <h3 class="pb-3"> <b>Blog</b></h3>
            </div>
            <?php
            $blog=$data->result_array();
            foreach ($blog as $row) {
                $url=base_url('blog-details/').base64_encode($row['id']);
            ?>
            <div class="col-lg-4 col-md-6">
                <div class="single-blog-post">
                    <a href="<?=$url?>" class="post-image"><img src="<?=base_url();?>uploads/blog/<?=$row['id'];?>.jpg" alt="blog-image"></a>

                    <div class="blog-post-content" style="height: 300px; overflow: hidden;">
                        <ul>
                            <!-- <li><i class="icofont-user-male"></i> <a href="#">Admin</a></li> -->
                            <li><i class="icofont-wall-clock"></i><?=date('F d,Y',strtotime($row['created_at']));?></li>
                        </ul>
                        <h3><a href="<?=$url?>"><?=$row['title'];?></a></h3>
                        <p><?=$row['description'];?></p>
                    </div>
                    <a href="<?=$url?>" class="read-more-btn  mt-3 ml-4 mb-4"> Read More <i class="icofont-rounded-double-right"></i></a>
                </div>
            </div>
        <?php }?>
<!-- 
            <div class="col-lg-4 col-md-6">
                <div class="single-blog-post">
                    <a href="#" class="post-image"><img src="<?=base_url();?>assets/front-end/img/blog-img2.jpg" alt="blog-image"></a>

                    <div class="blog-post-content">
                        <ul>
                            <li><i class="icofont-user-male"></i> <a href="#">Admin</a></li>
                            <li><i class="icofont-wall-clock"></i> January 16, 2019</li>
                        </ul>
                        <h3><a href="#">The Best Marketing Management Tools</a></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi turpis massa, dapibus nec libero vitae.</p>
                        <a href="#" class="read-more-btn">Read More <i class="icofont-rounded-double-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="single-blog-post">
                    <a href="#" class="post-image"><img src="<?=base_url();?>assets/front-end/img/blog-img3.jpg" alt="blog-image"></a>

                    <div class="blog-post-content">
                        <ul>
                            <li><i class="icofont-user-male"></i> <a href="#">Admin</a></li>
                            <li><i class="icofont-wall-clock"></i> January 14, 2019</li>
                        </ul>
                        <h3><a href="#">3 WooCommerce Plugins to Boost Sales</a></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi turpis massa, dapibus nec libero vitae.</p>
                        <a href="#" class="read-more-btn">Read More <i class="icofont-rounded-double-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="single-blog-post">
                    <a href="#" class="post-image"><img src="<?=base_url();?>assets/front-end/img/blog-img4.jpg" alt="blog-image"></a>

                    <div class="blog-post-content">
                        <ul>
                            <li><i class="icofont-user-male"></i> <a href="#">Admin</a></li>
                            <li><i class="icofont-wall-clock"></i> January 06, 2019</li>
                        </ul>
                        <h3><a href="#">CakeMail Review – Design Custom Emails</a></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi turpis massa, dapibus nec libero vitae.</p>
                        <a href="#" class="read-more-btn">Read More <i class="icofont-rounded-double-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="single-blog-post">
                    <a href="#" class="post-image"><img src="<?=base_url();?>assets/front-end/img/blog-img5.jpg" alt="blog-image"></a>

                    <div class="blog-post-content">
                        <ul>
                            <li><i class="icofont-user-male"></i> <a href="#">Admin</a></li>
                            <li><i class="icofont-wall-clock"></i> January 04, 2019</li>
                        </ul>
                        <h3><a href="#">The Most Popular New Apps in 2019</a></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi turpis massa, dapibus nec libero vitae.</p>
                        <a href="#" class="read-more-btn">Read More <i class="icofont-rounded-double-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="single-blog-post">
                    <a href="#" class="post-image"><img src="<?=base_url();?>assets/front-end/img/blog-img3.jpg" alt="blog-image"></a>

                    <div class="blog-post-content">
                        <ul>
                            <li><i class="icofont-user-male"></i> <a href="#">Admin</a></li>
                            <li><i class="icofont-wall-clock"></i> January 26, 2019</li>
                        </ul>
                        <h3><a href="#">The Fastest Growing Apps in 2019</a></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi turpis massa, dapibus nec libero vitae.</p>
                        <a href="#" class="read-more-btn">Read More <i class="icofont-rounded-double-right"></i></a>
                    </div>
                </div>
            </div> -->

            <div class="col-lg-12 col-md-12">
                <div class="pagination-area">
                    <nav aria-label="Page navigation example">
                      <!--   <ul class="pagination justify-content-center">

                            <li class="page-item"><a class="page-link" href="#"><i class="icofont-double-left"></i></a></li>

                            <li class="page-item active"><a class="page-link" href="#">1</a></li>

                            <li class="page-item"><a class="page-link" href="#">2</a></li>

                            <li class="page-item"><a class="page-link" href="#">3</a></li>

                            <li class="page-item"><a class="page-link" href="#"><i class="icofont-double-right"></i></a></li>
                        </ul> -->
                         <?php echo $pagination; ?>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- End Blog Area -->