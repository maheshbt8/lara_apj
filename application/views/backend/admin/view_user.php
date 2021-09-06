<section class="card">
						<div class="card-body">
							<div class="invoice">
								<header class="clearfix">
									<div class="row">
										<div class="col-sm-6 mt-3">
											<div class="ib">
												<img src="<?=base_url($this->crud_model->get_image_url($user_data['id']));?>" alt="OKLER Themes">
											</div>
											
										</div>
										<div class="col-sm-6 text-right mt-3 mb-3">
											<h3 class="mt-0 mb-1 text-dark font-weight-bold"><?=ucwords($user_data['first_name']);?></h3>
											<h4 class="m-0 text-dark font-weight-bold"><?=$user_data['unique_id'];?></h4>
											<!-- <address class="ib mr-5">
												Okler Themes Ltd
												<br>
												123 Porto Street, New York, USA
												<br>
												Phone: +12 3 4567-8901
												<br>
												okler@okler.net
											</address>
											 -->
										</div>
									</div>
								</header>
								<div class="bill-info">
									<div class="row">
										<div class="col-md-12 table-responsive">
											<table class="table-hover" border="1">
												<tr>
													<th>Email</th>
													<td><?=$user_data['email'];?></td>
												</tr>
												<tr>
													<th>Mobile</th>
													<td><?=$user_data['mobile'];?></td>
												</tr>
												<tr>
													<th>ICAI Reg Number</th>
													<td><?=$user_data['icai_reg_no'];?></td>
												</tr>
												<tr>
													<th>Address</th>
													<td><?=$user_data['address'];?></td>
												</tr>
												<tr>
													<th>Course</th>
													<td><?=$this->crud_model->get_type_name_by_where('courses','id',$user_data['exam_type'],'course');?></td>
												</tr>
												<?php
												$plans=$this->crud_model->select_results_info('users_plan_relation',array('user_id'=>$user_data['id']))->result_array();
												if(!empty($plans)){
												?>
												<tr>
													<th>Plans</th>
													<td>
														<ul>
														<?php
														foreach ($plans as $p) {
															$plan=$this->crud_model->get_type_name_by_where('plans','id',$p['plan_id'],'plan');
															$package=$this->crud_model->get_type_name_by_where('packages','id',$p['package_id'],'subject_name');
															
															echo '<li>'.$plan .' - '. $package.'</li>';
															
														}
														?>
													</ul>		
													</td>
												</tr>
											<?php }?>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>