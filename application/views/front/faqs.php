<!--create a new page(faq.php) and the content below-->
<!-- Start FAQ Area -->
<section class="faq-area">
    <div class="container">
        <div class="faq-accordion">
            <div class="col-12 justify-content-center align-items-center d-flex">
                 <h3 class=""> <b>FAQ's</b></h3>
            </div>
            <ul class="accordion">
                <?php
                $i=0;
                $faqs=$this->crud_model->get_faqs_info();
                foreach ($faqs as $row) {
                ?>
                <li class="accordion-item">
                    <a class="accordion-title <?php if($i==0)echo 'active';?>" href="javascript:void(0)"><?=$row['question'];?></a>
                    <p class="accordion-content <?php if($i==0)echo 'show';?>"><?=$row['answer'];?></p>
                </li>
            <?php $i++;}?>
            </ul>
        </div>
        <!-- <div class="faq-contact">
            <h3>Feel free to Ask Your Question</h3>
                <?php
                    $this->load->view('front/questions_ask');
                    ?>
        </div> -->
    </div>
</section>
<!-- End FAQ Area 