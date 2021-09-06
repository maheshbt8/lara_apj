 <!--ipccplans-->
                    <div class="row">
                        <div class="col">
                                <section class="card">
                                    <div class="card-header">
                                        <a href="<?=base_url('add_subject');?>" class="btn buttons-print btn-default text-sm-right pt-2" ><b>+ Add New Subject</b></a>
                                    </div>
                                    <div class="card-body">
                                        <div class="col-lg-12">
                                            <div class="tabs">
                                                <ul class="nav nav-tabs">
                                                    <li class="nav-item active">
                                                        <a class="nav-link active" href="#cpt" data-toggle="tab"> CPT</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link " href="#ipcc" data-toggle="tab"> IPCC</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#final" data-toggle="tab">Final</a>
                                                    </li>
                                                    <li class="nav-item ">
                                                        <a class="nav-link " href="#cpt-new" data-toggle="tab"> CPT(new)</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link " href="#ipcc-new" data-toggle="tab"> IPCC(new)</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#final-new" data-toggle="tab">Final(new)</a>
                                                    </li>
                                                    
                                                </ul>
                                                <div class="tab-content">
                                                    <div id="cpt" class="tab-pane active">
                                                        <?php
                                                        $my_course_id=1;
                                                        ?>
                                                        <table class="table table-bordered table-striped mb-0" id="ipccplans">
                                                            <thead>
                                                                <tr>
                                                                    <th>SNo</th>
                                                                    <th>Subject Name</th>
                                                                    <th>Actions</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php 
                                                                $i=0;
                                                                $subjects=$this->crud_model->get_subjects_by_id($my_course_id);
                                                        foreach ($subjects as $row) {
                                                                ?>
                                                                <tr>
                                                                    <td><?=$i+1;?></td>
                                                                     <td><?=$row['subject'];?></td>
                                                                    <td>
                                                                        <a href="#" class=" mr-2  text-primary">
                                                                            <i class="fas fa-pencil-alt"></i>
                                                                        </a>
                                                                        <a href="#" class="mr-2  text-danger ">
                                                                            <i class="far fa-trash-alt"></i>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            <?php $i++;}?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div id="ipcc" class="tab-pane">
                                                         <?php
                                                        $my_course_id=2;
                                                        ?>
                                                        <table class="table table-bordered table-striped mb-0" id="ipccplans">
                                                            <thead>
                                                                <tr>
                                                                    <th>SNo</th>
                                                                    <th>Subject Name</th>
                                                                    <th>Actions</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php 
                                                                $i=0;
                                                                $subjects=$this->crud_model->get_subjects_by_id($my_course_id);
                                                        foreach ($subjects as $row) {
                                                                ?>
                                                                <tr>
                                                                    <td><?=$i+1;?></td>
                                                                     <td><?=$row['subject'];?></td>
                                                                    <td>
                                                                        <a href="#" class=" mr-2  text-primary">
                                                                            <i class="fas fa-pencil-alt"></i>
                                                                        </a>
                                                                        <a href="#" class="mr-2  text-danger ">
                                                                            <i class="far fa-trash-alt"></i>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            <?php $i++;}?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div id="final" class="tab-pane">
                                                        <?php
                                                        $my_course_id=3;
                                                        ?>
                                                        <table class="table table-bordered table-striped mb-0" id="ipccplans">
                                                            <thead>
                                                                <tr>
                                                                    <th>SNo</th>
                                                                    <th>Subject Name</th>
                                                                    <th>Actions</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php 
                                                                $i=0;
                                                                $subjects=$this->crud_model->get_subjects_by_id($my_course_id);
                                                        foreach ($subjects as $row) {
                                                                ?>
                                                                <tr>
                                                                    <td><?=$i+1;?></td>
                                                                     <td><?=$row['subject'];?></td>
                                                                    <td>
                                                                        <a href="#" class=" mr-2  text-primary">
                                                                            <i class="fas fa-pencil-alt"></i>
                                                                        </a>
                                                                        <a href="#" class="mr-2  text-danger ">
                                                                            <i class="far fa-trash-alt"></i>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            <?php $i++;}?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div id="cpt-new" class="tab-pane ">
                                                       <?php
                                                        $my_course_id=4;
                                                        ?>
                                                        <table class="table table-bordered table-striped mb-0" id="ipccplans">
                                                            <thead>
                                                                <tr>
                                                                    <th>SNo</th>
                                                                    <th>Subject Name</th>
                                                                    <th>Actions</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php 
                                                                $i=0;
                                                                $subjects=$this->crud_model->get_subjects_by_id($my_course_id);
                                                        foreach ($subjects as $row) {
                                                                ?>
                                                                <tr>
                                                                    <td><?=$i+1;?></td>
                                                                     <td><?=$row['subject'];?></td>
                                                                    <td>
                                                                        <a href="#" class=" mr-2  text-primary">
                                                                            <i class="fas fa-pencil-alt"></i>
                                                                        </a>
                                                                        <a href="#" class="mr-2  text-danger ">
                                                                            <i class="far fa-trash-alt"></i>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            <?php $i++;}?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div id="ipcc-new" class="tab-pane"><?php
                                                        $my_course_id=5;
                                                        ?>
                                                        <table class="table table-bordered table-striped mb-0" id="ipccplans">
                                                            <thead>
                                                                <tr>
                                                                    <th>SNo</th>
                                                                    <th>Subject Name</th>
                                                                    <th>Actions</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php 
                                                                $i=0;
                                                                $subjects=$this->crud_model->get_subjects_by_id($my_course_id);
                                                        foreach ($subjects as $row) {
                                                                ?>
                                                                <tr>
                                                                    <td><?=$i+1;?></td>
                                                                     <td><?=$row['subject'];?></td>
                                                                    <td>
                                                                        <a href="#" class=" mr-2  text-primary">
                                                                            <i class="fas fa-pencil-alt"></i>
                                                                        </a>
                                                                        <a href="#" class="mr-2  text-danger ">
                                                                            <i class="far fa-trash-alt"></i>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            <?php $i++;}?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div id="final-new" class="tab-pane">
                                                         <?php
                                                        $my_course_id=6;
                                                        ?>
                                                        <table class="table table-bordered table-striped mb-0" id="ipccplans">
                                                            <thead>
                                                                <tr>
                                                                    <th>SNo</th>
                                                                    <th>Subject Name</th>
                                                                    <th>Actions</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php 
                                                                $i=0;
                                                                $subjects=$this->crud_model->get_subjects_by_id($my_course_id);
                                                        foreach ($subjects as $row) {
                                                                ?>
                                                                <tr>
                                                                    <td><?=$i+1;?></td>
                                                                     <td><?=$row['subject'];?></td>
                                                                    <td>
                                                                        <a href="#" class=" mr-2  text-primary">
                                                                            <i class="fas fa-pencil-alt"></i>
                                                                        </a>
                                                                        <a href="#" class="mr-2  text-danger ">
                                                                            <i class="far fa-trash-alt"></i>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            <?php $i++;}?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>