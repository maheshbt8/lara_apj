<style type="text/css">
    img.co-icon {
    /* height: 232px; */
    padding: 10px;
    border-radius: 50%;
    border: 2px dashed;
}
</style>

        <section class="saas-tools ptb-100 bg-gray">
            <div class="container-fluid">
                <div class="section-title">
                    <h2 class="text-center">SCHEDULE</h2>
                    <div class="bar"></div>
                </div>
<div class="row justify-content-lg-center">
    <div class="col-lg-10">
        <div class="row ">
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 col-4"><a href="#CPT(New)">
        <img class="co-icon" src="<?=base_url();?>assets/front-end/img/slider-icons/4.png"></a>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 col-4"><a href="#IPCC(New)">
        <img class="co-icon" src="<?=base_url();?>assets/front-end/img/slider-icons/5.png"></a>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 col-4"><a href="#Final(New)">
        <img class="co-icon" src="<?=base_url();?>assets/front-end/img/slider-icons/6.png"></a>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 col-4"><a href="#CPT">
        <img class="co-icon" src="<?=base_url();?>assets/front-end/img/slider-icons/7.png"></a>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 col-4"><a href="#IPCC">
        <img class="co-icon" src="<?=base_url();?>assets/front-end/img/slider-icons/8.png"></a>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 col-4"><a href="#Final">
        <img class="co-icon" src="<?=base_url();?>assets/front-end/img/slider-icons/9.png"></a>
        </div>
        </div>
    </div>
</div>
    <?php
    $courses=$this->crud_model->get_active_courses();
    $i=0;foreach ($courses as $course) {
    ?>
                <div class="row" id="<?=$course['course'];?>">
                    
                    <div class="col-lg-12 col-md-12">
                        <div class="tab <?php if($i % 2 == 0){ 
        echo "section-bg";  
    }?>">

                    <div class="section-title">
                    <h2 class="text-center"><?=ucwords($course['course']);?></h2>
                    <div class="bar"></div>
                    </div>
                    
                            <ul class="tabs">
                                <?php
                    $schedules=array_reverse($this->crud_model->get_schedules_info($course['id']));

                    foreach ($schedules as $row) {
                    ?>
                    <li><a href="#">
                    <i class=""><?=$this->crud_model->get_type_name_by_where('plans', 'id', $row['plan_id'], 'plan');?></i>
                    <br>
                                </a></li>
                                <?php }?>
                                
                            </ul>

                            <div class="tab_content">
                                <?php

                                foreach ($schedules as $row) {
                                    ?>
                                <div class="tabs_item">
                                    <div class="row h-100 justify-content-center align-items-center">
                                         <div class="col-lg-12 col-md-12">
                        <iframe class="embed-responsive-item" src="<?=base_url('uploads/schedules/').$row['file_name'];?>" style="width: 100%;height: 1000px;"></iframe>
                    </div>
                                    </div>
                                </div>
                            <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
<?php $i++;}?>
            </div>
        </section>