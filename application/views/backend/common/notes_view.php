  
  <!--Notes page content--> 
                    <div class="row">
                        <div class="col">
                                <section class="card">
                                    
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h4>Course: <b><?=$note['course'];?></b></h4>
                                                <h4>Subject: <b><?=$note['subject'];?></b></h4>
                                                <h4>Title: <b><?=$note['title'];?></b></h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="embed-responsive embed-responsive-16by9">
                                            <iframe class="embed-responsive-item" src="<?php echo base_url();?>uploads/main/notes/<?php echo $note['id'];?>.pdf"></iframe>
                                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>