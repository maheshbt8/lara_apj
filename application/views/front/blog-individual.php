<?php
$this->session->set_userdata('last_page',current_url());
?>


<!--create a new page(Blog-individual.php) and the content below-->
<!-- Start Blog Details Area -->
<?php
$row=$blog_details;
?>
<section class="blog-details-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-details">
                    <div class="article-img">
                        <img src="<?=base_url();?>uploads/blog/<?=$row['id'];?>.jpg" alt="blog-details">
                        <div class="date"><?=date('d',strtotime($row['created_at']));?> <br> <?=date('M',strtotime($row['created_at']));?></div>
                    </div>

                    <div class="article-content">
                        <!-- <ul class="category">
                            <li><a href="#">IT</a></li>
                            <li><a href="#">Mobile</a></li>
                            <li><a href="#">Marketing</a></li>
                            <li><a href="#">Design</a></li>
                            <li><a href="#">Development</a></li>
                        </ul> -->
                        <h3><?=$row['title'];?></h3>
                        <?=$row['description'];?>
                        <!-- div class="share-post">
                            <ul>
                                <li><a href="#"><i class="icofont-facebook"></i></a></li>
                                <li><a href="#"><i class="icofont-twitter"></i></a></li>
                                <li><a href="#"><i class="icofont-linkedin"></i></a></li>
                                <li><a href="#"><i class="icofont-instagram"></i></a></li>
                                <li><a href="#"><i class="icofont-vimeo"></i></a></li>
                            </ul>
                        </div> -->
                    </div>
                </div>

               <!--  <div class="post-controls-buttons">
                    <div class="controls-left">
                        <a href="#"><i class="icofont-double-left"></i> Prev Post</a>
                    </div>

                    <div class="controls-right">
                        <a href="#">Next Post <i class="icofont-double-right"></i></a>
                    </div>
                </div>
 -->
            <!--    <div class="post-comments">
                    <h3>Comments</h3>
                    <div class="single-comment">
                        <div class="comment-img">
                            <img src="<?=base_url();?>assets/front-end/img/client1.jpg" alt="client">
                        </div>
                        <div class="comment-content">
                            <h4>John Smith</h4>
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Et minus, saepe porro a voluptatem, quidem aut libero consequatur unde molestiae quae impedit accusantium dolor est corporis! Dolores ut dignissimos doloribus?</p>
                            <span>Jan 19, 2018 - 9:10AM</span>
                            <a href="#">Reply</a>
                        </div>
                    </div>

                    <div class="single-comment left-m">
                        <div class="comment-img">
                            <img src="<?=base_url();?>assets/front-end/img/client2.jpg" alt="client">
                        </div>
                        <div class="comment-content">
                            <h4>Doe John</h4>
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Et minus, saepe porro a voluptatem, quidem aut libero consequatur unde molestiae quae impedit accusantium dolor est corporis! Dolores ut dignissimos doloribus?</p>
                            <span>Jan 19, 2018 - 9:10AM</span>
                            <a href="#">Reply</a>
                        </div>
                    </div>

                    <div class="single-comment">
                        <div class="comment-img">
                            <img src="<?=base_url();?>assets/front-end/img/client3.jpg" alt="client">
                        </div>
                        <div class="comment-content">
                            <h4>Steven Doe</h4>
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Et minus, saepe porro a voluptatem, quidem aut libero consequatur unde molestiae quae impedit accusantium dolor est corporis! Dolores ut dignissimos doloribus?</p>
                            <span>Jan 19, 2018 - 9:10AM</span>
                            <a href="#">Reply</a>
                        </div>
                    </div>

                    <div class="single-comment">
                        <div class="comment-img">
                            <img src="<?=base_url();?>assets/front-end/img/client4.jpg" alt="client">
                        </div>
                        <div class="comment-content">
                            <h4>John Cina</h4>
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Et minus, saepe porro a voluptatem, quidem aut libero consequatur unde molestiae quae impedit accusantium dolor est corporis! Dolores ut dignissimos doloribus?</p>
                            <span>Jan 19, 2018 - 9:10AM</span>
                            <a href="#">Reply</a>
                        </div>
                    </div>
                </div>-->

                <!-- <div class="leave-a-reply">
                    <h3>Feel free to Ask Your Question</h3>
                    <?php
$this->load->view('front/questions_ask');
?>
                </div> -->
            </div>

            <div class="col-lg-4">
                <div class="sidebar-area">
                    <div class="widget widget-search">
                        <form>
                            <input type="text" class="form-control" placeholder="Search">
                            <button type="submit"><i class="icofont-search-2"></i></button>
                        </form>
                    </div>
                    
                    <div class="widget widget_tag_cloud">
                        <h3 class="widget-title">Popular Tags</h3>
                        <div class="bar"></div>

                        <div class="tagcloud">
                            <a href="#">CPT</a>
                            <a href="#">IPCC</a>
                            <a href="#">Final</a>
                            <a href="#">CPT-New</a>
                            <a href="#">IPCC-New</a>
                            <a href="#">Final-New</a>
                            
                        </div>
                    </div>

                   

                    <div class="widget widget_recent_posts">
                        <h3 class="widget-title">Recent Post</h3>
                        <div class="bar"></div>

                        <ul>
                            <?php
                            foreach ($data->result_array() as $blog) {
                                $url=base_url('blog-details/').base64_encode($blog['id']);
                            ?>
                            <a href="<?=$url;?>">
                            <li>
                                <div class="recent-post-thumb">
                                    
                                        <img src="<?=base_url();?>uploads/blog/<?=$blog['id'];?>.jpg" alt="blog-image">
                            
                                </div>

                                <div class="recent-post-content">
                                    <h3><?=$blog['title'];?></h3>
                                    <span class="date"><?=date('F d,Y',strtotime($row['created_at']));?></span>
                                </div>
                            </li>
                            </a>
                        <?php }?>

                            <!-- <li>
                                <div class="recent-post-thumb">
                                    <a href="#">
                                        <img src="<?=base_url();?>assets/front-end/img/blog-img2.jpg" alt="blog-image">
                                    </a>
                                </div>

                                <div class="recent-post-content">
                                    <h3><a href="#">The Most Popular New Business Apps</a></h3>
                                    <span class="date">16 January 2019</span>
                                </div>
                            </li>

                            <li>
                                <div class="recent-post-thumb">
                                    <a href="#">
                                        <img src="<?=base_url();?>assets/front-end/img/blog-img3.jpg" alt="blog-image">
                                    </a>
                                </div>

                                <div class="recent-post-content">
                                    <h3><a href="#">3 WooCommerce Plugins to Boost Sales</a></h3>
                                    <span class="date">14 January 2019</span>
                                </div>
                            </li>

                            <li>
                                <div class="recent-post-thumb">
                                    <a href="#">
                                        <img src="<?=base_url();?>assets/front-end/img/blog-img4.jpg" alt="blog-image">
                                    </a>
                                </div>

                                <div class="recent-post-content">
                                    <h3><a href="#">CakeMail Review – Design Custom Emails</a></h3>
                                    <span class="date">06 January 2019</span>
                                </div>
                            </li> -->
                        </ul>
                    </div>

                    

                    <div class="widget widget_text">
                        <h3 class="widget-title">Instagram</h3>
                        <div class="bar"></div>

                        <ul>
                            <li>
                                <a href="#">
                                    <img src="<?=base_url();?>assets/front-end/img/work-img1.jpg" alt="image">
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <img src="<?=base_url();?>assets/front-end/img/work-img2.jpg" alt="image">
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <img src="<?=base_url();?>assets/front-end/img/work-img3.jpg" alt="image">
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <img src="<?=base_url();?>assets/front-end/img/work-img4.jpg" alt="image">
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <img src="<?=base_url();?>assets/front-end/img/work-img5.jpg" alt="image">
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <img src="<?=base_url();?>assets/front-end/img/work-img6.jpg" alt="image">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Blog Details Area 