
		<!-- Start Overview Area -->
		<section class="saas-tools ptb-100 bg-gray">
            <div class="container" style="">
                <div class="section-title te">
                    <h2><?=$test['course'].' - '.$test['test'];?></h2>
                    <div class="bar"></div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="tab">
                            <div class="tab_content">
                               <div class="tabs_item">
                                    <div class="row  justify-content-center align-items-center">
                                        <div class="col-lg-12 col-md-12">
                                           <p><h3>Number of Questions:</h3> <b><?=$test['no_of_questions'];?></b></p>
                                            <h3>Description</h3>
                                            <p><?=$test['description'];?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="tab">
                            <div class="tab_content">
                               <div class="tabs_item">
                                    <div class="row  justify-content-center align-items-center">
                                        <div class="col-lg-12 col-md-12">
                                        <?php
                                        echo '<h4><span class="pull-right"> Results: '.$result['scored'].'/'.$result['total'].'</span></h4>';
                                        ?>
                                    </div>
                                    	<div class="col-lg-12 col-md-12">
                     
                            <?php
                            $res=json_decode($result['answers']);
                            $j=0;
                            $i=1;foreach ($test_data as $row) {
                            ?>
                                <div class="row card">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                        <p><h5><?=$i.' ). '. $row['question'];?></h5></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-check">
                                            <input type="radio" class="form-radio-input" id="choice1<?=$i;?>" name="answer<?=$i;?>" required="" value="1" disabled="" <?php if($res[$j]==$row['choice1']){echo "checked";}?>>
                                            <label class="form-radio-label  <?php if($row['answer']==$row['choice1']){echo 'text-success';}elseif($res[$j]==1){echo 'text-danger';}?>" for="choice1<?=$i;?>"><?=$row['choice1'];?></label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="form-radio-input" id="choice2<?=$i;?>" name="answer<?=$i;?>" value="2" disabled="" <?php if($res[$j]==$row['choice2']){echo "checked";}?>>
                                            <label class="form-radio-label  <?php if($row['answer']==$row['choice2']){echo 'text-success';}elseif($res[$j]==2){echo 'text-danger';}?>" for="choice2<?=$i;?>"><?=$row['choice2'];?></label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="form-radio-input" id="choice3<?=$i;?>" name="answer<?=$i;?>" value="3" disabled="" <?php if($res[$j]==$row['choice3']){echo "checked";}?>>
                                            <label class="form-radio-label <?php if($row['answer']==$row['choice3']){echo 'text-success';}elseif($res[$j]==3){echo 'text-danger';}?>" for="choice3<?=$i;?>"><?=$row['choice3'];?></label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="form-radio-input" id="choice4<?=$i;?>" name="answer<?=$i;?>" value="4" disabled="" <?php if($res[$j]==$row['choice4']){echo "checked";}?>>
                                            <label class="form-radio-label  <?php if($row['answer']==$row['choice4']){echo 'text-success';}elseif($res[$j]==4){echo 'text-danger';}?>" for="choice4<?=$i;?>"><?=$row['choice4'];?></label>
                                        </div>
                                        <label class="error" for="answer<?=$i;?>"></label>
                                    </div>
                                </div>
                                <br/>
                            <?php $j++;$i++;}?>
                            
                                    	</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>