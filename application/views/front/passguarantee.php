


  <style type="text/css">
    html, body {
      margin: 0;
      padding: 0;
    }

    * {
      box-sizing: border-box;
    }

    .slider {
        width: 50%;
        margin: 100px auto;
    }

    .slick-slide {
      margin: 0px 20px;
    }

    .slick-slide img {
      width: 100%;
    }

    .slick-prev:before,
    .slick-next:before {
      color: black;
    }


    .slick-slide {
      transition: all ease-in-out .3s;
      opacity: .2;
    }
    
    .slick-active {
      opacity: .5;
    }

    .slick-current {
      opacity: 1;
    }
  </style>






<style>
    .w-90{
        width: 90%
    }
    .pt-150{
        padding-top: 150px
    }
    .m--auto{
        margin: auto;
    }
    .outline{
            outline: 2px solid black;
    }
    .plan-title{
        background-color: #fab301;
        padding: 10px 40px;
        border-radius: 40px;
        color: white;
    }
    .plan-section{
        
        padding: 0px 0px 60px 0px;
    }
    .plan-bg{
        background-color: #fff5e9;
    }
    .plan-title1{
        padding: 9px 42px;
        background-color: #fab301;
        border-radius: 7px;
        color: white;
        /*margin: auto;*/
        }
    .plan-title-sec{
        /*margin: auto;*/
        display: grid;
        justify-content: center;
    }
    .yl{
        background-color: #fab301;
    }
    .pd-lr-26{
        padding: 9px 26px;
    }
</style>
<style>
    * 
    { 
    box-sizing: border-box; 
    } 
    body 
    { 
    font-family: Verdana, sans-serif; 
    } 

    .image-sliderfade 
    { 
    display: none; 
    } 

    img 
    { 
    vertical-align: middle; 
    } 

    /* Slideshow container */
    .container 
    { 
    max-width: 1000px; 
    position: relative; 
    margin: auto; 
    } 

    /* Caption text */
    .text 
    { 
    color: #f2f2f2; 
    font-size: 15px; 
    padding: 20px 15px; 
    position: absolute; 
    right: 10px; 
    bottom: 10px; 
    width: 40%; 
    background: rgba(0, 0, 0, .7); 
    text-align: left; 
    } 

    /* The dots/bullets/indicators */
    .dot 
    { 
    height: 15px; 
    width: 15px; 
    margin: 0 2px; 
    background-color: transparent; 
    border-color: #ddd; 
    border-width: 5 px; 
    border-style: solid; 
    border-radius: 50%; 
    display: inline-block; 
    transition: border-color 0.6s ease; 
    } 

    .active 
    { 
    border-color: #666; 
    } 

    /* Animation */
    .fade 
    { 
    -webkit-animation-name: fade-image; 
    -webkit-animation-duration: 1.5s; 
    animation-name: fade-image; 
    animation-duration: 1.5s; 
    } 

    @-webkit-keyframes fade-image 
    { 
    from {opacity: .4} 
    to {opacity: 1} 
    } 

    @keyframes fade-image 
    { 
    from {opacity: .4} 
    to {opacity: 1} 
    } 

    /* On smaller screens, decrease text size */
    @media only screen and (max-width: 300px) 
    { 
    .text {font-size: 11px} 
    } 
</style>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			 <div class="">
            <!-- start img slider -->
            <!--HTML Code-->
        <!-- Slideshow Container Div -->
            <div class="container-fluid">
            <!-- Full-width images with caption text -->
            <div class="image-sliderfade fade"> 
                <img src="http://localhost/ca/assets/front-end/img/home-slide1.jpg" style="width:100%"> 
                <!-- <div class="text">Image caption 1</div>  -->
            </div> 
            <div class="image-sliderfade fade"> 
                <img src="http://localhost/ca/assets/front-end/img/home-slide2.jpg" style="width:100%"> 
              <!--   <div class="text">Image caption 2</div>  -->
            </div> 
            <div class="image-sliderfade fade"> 
                <img src="http://localhost/ca/assets/front-end/img/home-slide3.jpg" style="width:100%"> 
                <!-- <div class="text">Image caption 3</div>  -->
            </div> 
            <div class="image-sliderfade fade"> 
                <img src="http://localhost/ca/assets/front-end/img/home-slide4.jpg" style="width:100%"> 
                <!-- <div class="text">Image caption 4</div>  -->
            </div> 
        </div> 
        <br> 
        <!-- The dots/circles -->
        <div style="text-align:center"> 
        <span class="dot"></span> 
        <span class="dot"></span> 
        <span class="dot"></span> 
        <span class="dot"></span>  
        </div> 
        <script type="text/javascript">
            var slideIndex = 0; 
            showSlides(); // call showslide method 

            function showSlides() 
            { 
                var i; 

                // get the array of divs' with classname image-sliderfade 
                var slides = document.getElementsByClassName("image-sliderfade"); 
                
                // get the array of divs' with classname dot 
                var dots = document.getElementsByClassName("dot"); 

                for (i = 0; i < slides.length; i++) { 
                    // initially set the display to 
                    // none for every image. 
                    slides[i].style.display = "none"; 
                } 

                // increase by 1, Global variable 
                slideIndex++; 

                // check for boundary 
                if (slideIndex > slides.length) 
                { 
                    slideIndex = 1; 
                } 

                for (i = 0; i < dots.length; i++) { 
                    dots[i].className = dots[i].className. 
                                        replace(" active", ""); 
                } 

                slides[slideIndex - 1].style.display = "block"; 
                dots[slideIndex - 1].className += " active"; 

                // Change image every 3 seconds 
                setTimeout(showSlides, 3000); 
            } 
        </script>

        <!-- close img slider -->
    </div>



        




		</div>
	</div>
    <!-- Pass Guarantee Page -->
            <div class="container">
                <div class="row"><div class="col-lg-12"><h3 class="text-center" >Exclusive Pass Guarantee Stat<h3>
<br>
                </div></div>
                <div class="row">
                    <div class="col-lg-4 ">
                        <div class="card box1">
                          <div class="card-header"><h4 class="card-title">Stat of May 2019</h4></div>
                          <div class="card-body">
                            <p class="card-text"><small>No. of Students Registered: <strong>132</strong></small></p>
                            <p class="card-text"><small>No. of Students Qualified: <strong>98</strong></small></p>
                            <p class="card-text"><small>Pass Percentage: <strong>70</strong></small></p>
                          </div>
                          <div class="card-footer">
                             <input type="button" name="" href="#" class="btn btn-download" 
                                value="Click Here for more details">
                            <!-- <button type="button" href="#" class="card-link btn btn-light" value="">Add to Cart</button>
                            <button type="button" href="#" class="card-link btn btn-light" value="">Buy Now</button> -->
                          </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card box1">
                          <div class="card-header"><h4 class="card-title">Stat of May 2019</h4></div>
                          <div class="card-body">
                            <p class="card-text"><small>No. of Students Registered: <strong>132</strong></small></p>
                            <p class="card-text"><small>No. of Students Qualified: <strong>98</strong></small></p>
                            <p class="card-text"><small>Pass Percentage: <strong>70</strong></small></p>
                          </div>
                          <div class="card-footer">
                             <input type="button" name="" href="#" class="btn btn-download" 
                                value="Click Here for more details">
                            <!-- <button type="button" href="#" class="card-link btn btn-light" value="">Add to Cart</button>
                            <button type="button" href="#" class="card-link btn btn-light" value="">Buy Now</button> -->
                          </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card box2">
                          <div class="card-header"><h4 class="card-title">Stat of May 2019</h4></div>
                          <div class="card-body">
                            <p class="card-text"><small>No. of Students Registered: <strong>132</strong></small></p>
                            <p class="card-text"><small>No. of Students Qualified: <strong>98</strong></small></p>
                            <p class="card-text"><small>Pass Percentage: <strong>70</strong></small></p>
                          </div>
                          <div class="card-footer">
                             <input type="button" name="" href="#" class="btn btn-download" 
                                value="Click Here for more details">
                            <!-- <button type="button" href="#" class="card-link btn btn-light" value="">Add to Cart</button>
                            <button type="button" href="#" class="card-link btn btn-light" value="">Buy Now</button> -->
                          </div>
                        </div>
                    </div>
                </div>
            </div><br>
                           
        </div>
        </div>


        <div class="plan-section" id="plan-GOLD">
            <div class="container ">
                <div class="row justify-content-center align-items-center">
                    <div class="col-12 justify-content-center align-items-center d-flex">
                         <h3 class="plan-title"> <b>IPCC</b></h3><!--plan name-->
                    </div>
                    <div class="col-12 justify-content-center align-items-center d-flex">
                               <center><h5 class="justify-content-center align-items-center ">
                                <br> <a href="#"> (Click Here &amp; Download Sylabus Pdf)</a>
                                </h5></center>
                    </div>
                    <!-- Both 1 -->
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 mb-4">
                            <div class="pricing-table">
                                <div class="price-header">
                                    <h3 class="title">Group1</h3>
                                    <div class="price"><small style="color: red"><strike><span class="dollar"><i class="fa fa-inr" aria-hidden="true"></i></span>1996</strike></small>&nbsp;&nbsp;<span class="dollar"><i class="fa fa-inr" aria-hidden="true"></i></span>1799</div>
                                    <!--<span class="plan-h plan-hh">Winners Choice</span>-->
                                </div>
                                <div class="price-body">
                                    <ul>
                                       <li><input type="checkbox" class="cbmr" checked>12 Unit Exams</li>
                                       <li><input type="checkbox" class="cbmr" checked>8 Full Syllabus Exams</li>
                                       <li><input type="checkbox" class="cbmr" checked>100% Coverage</li>
                                       <li><input type="checkbox" class="cbmr" checked>Systematic Schedule</li>
                                       <li><input type="checkbox" class="cbmr" checked>Description5</li>                    
                                   </ul>
                                </div>
                                <div class="price-footer">
                                    <a class="btn-sm btn-primary" onclick="return addCart('1')" href="#">Add to cart</a>
                                    <a class="btn-sm btn-primary" onclick="return addCart('1')" href="http://localhost/ca/cart">Buy Now</a>
                                    <!-- <a class="btn-sm btn-primary" href="http://localhost/ca/cart" onclick="return login_to_account('Please Login To Buy This');">Buy Now</a> -->
                                </div>
                            </div>
                            </div>
                            <!-- Both 2 -->
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 mb-4">
                                    <div class="pricing-table">
                                        <div class="price-header">
                                            <h3 class="title">Group2</h3>
                                            <div class="price"><span class="dollar"><i class="fa fa-inr" aria-hidden="true"></i></span>1200</div>
                                            <!--<span class="plan-h plan-hh">Winners Choice</span>-->
                                        </div>
                                        <div class="price-body">
                                            <ul>
                                                <li><input type="checkbox" class="cbmr" checked>Description1</li>
                                                <li><input type="checkbox" class="cbmr" checked>Description2</li>
                                                <li><input type="checkbox" class="cbmr" checked>Description3</li>
                                                <li><input type="checkbox" class="cbmr" checked>Description4</li>
                                                <li><input type="checkbox" class="cbmr" checked>Description5</li>                    
                                            </ul>
                                        </div>
                                        <div class="price-footer">
                                            <a class="btn-sm btn-primary" onclick="return addCart('2')" href="#">Add to cart</a>
                                            <a class="btn-sm btn-primary" onclick="return addCart('2')" href="http://localhost/ca/cart">Buy Now</a>
                                            <!-- <a class="btn-sm btn-primary" href="#" onclick="return login_to_account('Please Login To Buy This');">Buy Now</a> -->
                                        </div>
                                </div>
                            </div>
                            <!-- Both Groups -->
                             <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 mb-4">
                                    <div class="pricing-table">
                                        <div class="price-header">
                                            <h3 class="title">Both Groups</h3>
                                            <div class="price"><span class="dollar"><i class="fa fa-inr" aria-hidden="true"></i></span>1200</div>
                                            <!--<span class="plan-h plan-hh">Winners Choice</span>-->
                                        </div>
                                        <div class="price-body">
                                            <ul>
                                                <li><input type="checkbox" class="cbmr" checked>Description1</li>
                                                <li><input type="checkbox" class="cbmr" checked>Description2</li>
                                                <li><input type="checkbox" class="cbmr" checked>Description3</li>
                                                <li><input type="checkbox" class="cbmr" checked>Description4</li>
                                                <li><input type="checkbox" class="cbmr" checked>Description5</li>                    
                                            </ul>
                                        </div>
                                        <div class="price-footer">
                                            <a class="btn-sm btn-primary" onclick="return addCart('2')" href="#">Add to cart</a>
                                            <a class="btn-sm btn-primary" onclick="return addCart('2')" href="http://localhost/ca/cart">Buy Now</a>
                                            <!-- <a class="btn-sm btn-primary" href="#" onclick="return login_to_account('Please Login To Buy This');">Buy Now</a> -->
                                        </div>
                                </div>
                            </div>
                </div>
            </div>
        </div>

        <div class="plan-section" id="plan-GOLD">
            <div class="container ">
                <div class="row justify-content-center align-items-center">
                    <div class="col-12 justify-content-center align-items-center d-flex">
                         <h3 class="plan-title"> <b>CA-INTER</b></h3><!--plan name-->
                    </div>
                    <div class="col-12 justify-content-center align-items-center d-flex">
                               <center><h5 class="justify-content-center align-items-center ">
                                <br> <a href="#"> (Click Here &amp; Download Sylabus Pdf)</a>
                                </h5></center>
                    </div>
                    <!-- Both 1 -->
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 mb-4">
                            <div class="pricing-table">
                                <div class="price-header">

                                    <h3 class="title">Group1</h3>
                                    <div class="price"><small style="color:red"><strike><span class="dollar"><i class="fa fa-inr" aria-hidden="true"></i></span>1996</strike></small>&nbsp;

                                    <span class="dollar"><i class="fa fa-inr" aria-hidden="true"></i></span>1799</div>
                                    <!--<span class="plan-h plan-hh">Winners Choice</span>-->
                                </div>
                                <div class="price-body ">
                                    <ul class="text-left pl-1">
                                       <li><input type="checkbox" class="cbmr" checked>12 Unit Exams</li>
                                       <li><input type="checkbox" class="cbmr" checked>8 Full Syllabus Exams</li>
                                       <li><input type="checkbox" class="cbmr" checked>100% Coverage</li>
                                       <li><input type="checkbox" class="cbmr" checked>Systematic Schedule</li>
                                       <li><input type="checkbox" class="cbmr" checked>Description5</li>                    
                                   </ul>
                                </div>
                                <div class="price-footer">
                                    <a class="btn-sm btn-primary" onclick="return addCart('1')" href="#">Add to cart</a>
                                    <a class="btn-sm btn-primary" onclick="return addCart('1')" href="http://localhost/ca/cart">Buy Now</a>
                                    <!-- <a class="btn-sm btn-primary" href="http://localhost/ca/cart" onclick="return login_to_account('Please Login To Buy This');">Buy Now</a> -->
                                </div>
                            </div>
                            </div>
                            <!-- Both 2 -->
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 mb-4">
                                    <div class="pricing-table">
                                        <div class="price-header">
                                            <h3 class="title">Group2</h3>
                                            <div class="price"><span class="dollar"><i class="fa fa-inr" aria-hidden="true"></i></span>1200</div>
                                            <!--<span class="plan-h plan-hh">Winners Choice</span>-->
                                        </div>
                                        <div class="price-body">
                                            <ul>
                                                <li><input type="checkbox" class="cbmr" checked>Description1</li>
                                                <li><input type="checkbox" class="cbmr" checked>Description2</li>
                                                <li><input type="checkbox" class="cbmr" checked>Description3</li>
                                                <li><input type="checkbox" class="cbmr" checked>Description4</li>
                                                <li><input type="checkbox" class="cbmr" checked>Description5</li>                    
                                            </ul>
                                        </div>
                                        <div class="price-footer">
                                            <a class="btn-sm btn-primary" onclick="return addCart('2')" href="#">Add to cart</a>
                                            <a class="btn-sm btn-primary" onclick="return addCart('2')" href="http://localhost/ca/cart">Buy Now</a>
                                            <!-- <a class="btn-sm btn-primary" href="#" onclick="return login_to_account('Please Login To Buy This');">Buy Now</a> -->
                                        </div>
                                </div>
                            </div>
                            <!-- Both Groups -->
                             <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 mb-4">
                                    <div class="pricing-table">
                                        <div class="price-header">
                                            <h3 class="title">Both Groups</h3>
                                            <div class="price"><span class="dollar"><i class="fa fa-inr" aria-hidden="true"></i></span>1200</div>
                                            <!--<span class="plan-h plan-hh">Winners Choice</span>-->
                                        </div>
                                        <div class="price-body">
                                            <ul>
                                                <li><input type="checkbox" class="cbmr" checked>Description1</li>
                                                <li><input type="checkbox" class="cbmr" checked>Description2</li>
                                                <li><input type="checkbox" class="cbmr" checked>Description3</li>
                                                <li><input type="checkbox" class="cbmr" checked>Description4</li>
                                                <li><input type="checkbox" class="cbmr" checked>Description5</li>                    
                                            </ul>
                                        </div>
                                        <div class="price-footer">
                                            <a class="btn-sm btn-primary" onclick="return addCart('2')" href="#">Add to cart</a>
                                            <a class="btn-sm btn-primary" onclick="return addCart('2')" href="http://localhost/ca/cart">Buy Now</a>
                                            <!-- <a class="btn-sm btn-primary" href="#" onclick="return login_to_account('Please Login To Buy This');">Buy Now</a> -->
                                        </div>
                                </div>
                            </div>
                </div>
            </div>
        </div>

        <div class="section-title">
                    <h2 class="text-center">Process</h2>
                  
                </div>

        <div class="section">
            <div class="container">
            <div class="row">
                    <div class="col-lg-7">
                        <ul class="process_ul">
                            <li>1. Register for Pass Guarantee Plan</li>
                            <li>2. Write All the Exams we conduct</li>
                            <li>3. Score Min 50% Marks In Every Exam</li>
                            <li>4. Write Exams With Confidence</li>
                            <li>5. You Will Qualify For Sure – We Trust In Our Secret Recipe – PRACTICE</li>
                            <li>6. If Failed – No Issues, Your Money Will Be Refunded.</li>
                        </ul>
                    </div>
                    

                    <div class="col-lg-5 mb-4">
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                              <div class="carousel-inner">
                                <div class="carousel-item active">
                                  <img class="d-block w-100" src="http://localhost/ca/assets/front-end/img/gallery1.jpg" alt="First slide">

                                </div>
                                <div class="carousel-item">
                                  <img class="d-block w-100"  src="http://localhost/ca/assets/front-end/img/gallery2.jpg" alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                  <img class="d-block w-100"  src="http://localhost/ca/assets/front-end/img/gallery3.jpg" alt="Third slide">
                                </div>
                              </div>
                              <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                              </a>
                              <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                              </a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <section class="faq-area mb-4">
    <div class="container">
        <div class="faq-accordion">
            <div class="col-12 justify-content-center align-items-center d-flex">
                 <h3 class=" mt-5"> <b>FAQ's</b></h3>
            </div>
            <ul class="accordion">
                                <li class="accordion-item">
                    <a class="accordion-title active" href="javascript:void(0)">fdsfdsfds</a>
                    <p class="accordion-content show">dsfdfdsfdsfdsafdsaf</p>
                </li>
                            <li class="accordion-item">
                    <a class="accordion-title " href="javascript:void(0)">fgdfgdfg</a>
                    <p class="accordion-content ">dfggdfgdfsgdfgdsfgdfgdfgdfsgdfsgdf</p>
                </li>
                        </ul>
        </div>
        <!-- <div class="faq-contact">
            <h3>Feel free to Ask Your Question</h3>
                <form method="post" action="http://localhost/ca/contact-us" novalidate="novalidate" class="form-horizontal" id="form">
                            <div class="row">
                                                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" required title="Please enter your name" placeholder="Name" name="name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <input type="email" class="form-control" required title="Please enter your email" placeholder="Email" name="email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Phone" name="phone">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" required title="Please enter subject"placeholder="Subject" name="subject">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <textarea name="message" class="form-control" id="message" cols="30" rows="5" required title="Write your message" placeholder="Your Message"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <button type="submit" class="btn btn-primary">Send Message</button>
                                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>        </div> -->
    </div>
</section>