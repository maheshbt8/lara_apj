 <!--User Videos-->
                    <!-- <div class="row">
                        <div class="col">
                            <h2 class="text-center">CA Exam Series Notes</h2>
                            <h4 class="text-center"> <b>Supirior plan</b></h4>
                                <section class="card">
                                    
                                    <div class="card-body">
                                        <div class="col-lg-12">
                                            <div class="tabs">
                                                <ul class="nav nav-tabs">
                                                    <li class="nav-item active">
                                                        <a class="nav-link active" href="#subject1" data-toggle="tab"> subject1</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link " href="#subject2" data-toggle="tab"> subject2</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#subject3" data-toggle="tab">subject3</a>
                                                    </li>
                                                    <li class="nav-item ">
                                                        <a class="nav-link " href="#subject4" data-toggle="tab"> subject4</a>
                                                    </li>
                                                 </ul>
                                                <div class="tab-content">
                                                    <div id="subject1" class="tab-pane active">
                                                        <div class="row">
                                                            <div class="col-md-6 mb-3">
                                                                <div class="embed-responsive embed-responsive-16by9">
                                                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/DTutX48VQxw?start=185"></iframe>
                                                                </div>
                                                            </div>
                                                         </div>
                                                    </div>
                                                    
                                                    <div id="subject2" class="tab-pane ">
                                                        
                                                        <div class="row">
                                                            <div class="col-md-6 mb-3">
                                                                <div class="embed-responsive embed-responsive-16by9">
                                                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/DTutX48VQxw?start=185"></iframe>
                                                                </div>
                                                            </div>
                                                         </div>
                                                      
                                                    </div>
                                                    
                                                    <div id="subject3" class="tab-pane ">
                                                        
                                                        <div class="row">
                                                            <div class="col-md-6 mb-3">
                                                                <div class="embed-responsive embed-responsive-16by9">
                                                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/DTutX48VQxw?start=185"></iframe>
                                                                </div>
                                                            </div>
                                                         </div>
                                                        
                                                    </div>
                                                    
                                                    <div id="subject4" class="tab-pane ">
                                                        
                                                        <div class="row">
                                                            <div class="col-md-6 mb-3">
                                                                <div class="embed-responsive embed-responsive-16by9">
                                                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/DTutX48VQxw?start=185"></iframe>
                                                                </div>
                                                            </div>
                                                         </div>
                                                      
                                                    </div>
                                                    
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                           
                                 
                            </div>
                        </div> -->

                    <div class="row">
                        <div class="col">
                                <section class="card">
                                        <div class="row">
                                            <?php
                                            foreach ($videos as $row) {
                                            ?>
                                        <div class="col-md-4">
                                        <div class="card-body">
                                        
                                        <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item" src="<?=$row['url'];?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        </div>
                                        <h5 class="">Title: <b><?=$row['title'];?></b></h5>
                                        <h5 class="">Course: <b><?=$row['course'];?></b></h5>
                                        <h5 class="">Subject: <b><?=$row['subject'];?></b></h5>
                                        </div>
                                        </div>
                                           <?php }?>
                                        </div>
                                </section>
                            </div>
                        </div>








