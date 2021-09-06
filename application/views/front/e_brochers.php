<section class="saas-tools ptb-100 bg-gray">
			<div class="container">
				<div class="section-title text-center">
					<h2>E-Brochures</h2>
					<div class="bar"></div>
					<!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>-->
				</div>

				<div class="row">
					<div class="col-lg-12 col-md-12">
                        <div class="tab">
                            <ul class="tabs">
                                <?php
                    /*$e_brochers=array_reverse($this->crud_model->get_e_brochers_info());*/
                    $where['row_status']=1;
                    if($_GET['brochures']!=''){
                        $where['course']=$_GET['brochures'];
                    }
                    $e_brochers=$this->crud_model->select_results_info('e_brochers',$where)->result_array();
                    foreach ($e_brochers as $row) {
                    ?>
                    <li><a href="#">
                    <i class=""><?=$row['course'];?></i>
                    <br>
								</a></li>
								<?php }?>
                                
                            </ul>

                            <div class="tab_content">
                                <?php

                                foreach ($e_brochers as $row) {
                                    ?>
                                <div class="tabs_item">
                                    <div class="row h-100 justify-content-center align-items-center">
                                         <div class="col-lg-12 col-md-12">
                        <iframe class="embed-responsive-item" src="<?=base_url('uploads/e-brochers/').$row['file_name'];?>" style="width: 100%;height: 1000px;"></iframe>
                    </div>
                                    </div>
                                </div>
                            <?php }?>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</section>


