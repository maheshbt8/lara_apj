
		<!-- Start Overview Area -->
		<section class="saas-tools ptb-100 bg-gray">
            <div class="container">
                <div class="section-title text-center">
                    <h2><?=$page_type;?></h2>
                    <div class="bar"></div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="tab">
                            <ul class="tabs">
                                <?php
					$i=0;
                    foreach ($test_data as $row) {
                    ?>
                    <li><a href="#">
                    <i class=""><?=$row['test'];?></i>
                    <br>
                                </a></li>
                                <?php }?>
                                
                            </ul>

                            <div class="tab_content">
                                <?php
					$i=0;
                    foreach ($test_data as $row) {
                    ?>
                                <div class="tabs_item">
                                    <div class="row  justify-content-center align-items-center">
                                    	<div class="col-lg-12 col-md-12">
                                    		
                                    			<p>Number of Questions: <b><?=$row['no_of_questions'];?></b></p>
                                    			<p><?=$row['description'];?></p>
                                    			<a href="<?=base_url('take_test/').$row['id'];?>" class="btn btn-primary pull-right md-30" target="_blank">Take Test</a>
                                    	</div>

                                         <div class="col-lg-12 col-md-12">
						<div class="section-title">
							<h2>Highest Scored</h2>
							<div class="bar"></div>
						</div>
                        <div class="cart-table table-responsive">
                                <table class="table table-bordered">
                                	<thead>
                        		<th>Name</th>
                        		<th>Marks</th>
                        	</thead>
                        	<tbody>
                        		<td>Mahesh</td>
                        		<td>50</td>
                        	</tbody>
                        	</table>
                        </div>
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