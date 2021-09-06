 <!--Add plan in plans menu-->
                    <div class="row">
                        <div class="col">
                                <section class="card">
                                    <div class="card-body">
                                        <form method="post" action="<?=base_url('add_book');?>"enctype="multipart/form-data" novalidate="novalidate" class="form-horizontal" id="form">
                                             <div class="form-group row">
                                                <label class="col-sm-4 control-label text-sm-right pt-2">Upload Image: </label>
                                                <div class="col-sm-6">
                                                    <div class="custom-file">
                                                        <input type="file" class="form-control custom-file-input" id="sapaper" name="img" required="">
                                                        <label class="custom-file-label" for="sapaper">Choose file</label>
                                                  </div>
                                                  <?php 
                                                            if($this->session->flashdata('img_error')!=''){echo '
                                                            <div class="error">'.$this->session->flashdata('img_error').'</div>';}?>
                                                <?php echo form_error('img', '<div class="error">', '</div>'); ?>
                                                </div>
                                                
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 control-label text-sm-right pt-2">Plan Type: </label>
                                                <div class="col-sm-6">
                                                    <div class="form-control">
                                                    <label><input type="radio" name="book_type" required="" checked="" value="softcopy"  onclick="show_subjects(this.value);" <?=(set_value('book_type') == 'softcopy' || set_value('book_type') == '')? 'checked' : '';?>> Softcopy</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <label>
                                                    <input type="radio" name="book_type" required="" value="hardcopy"  onclick="show_subjects(this.value);" <?=(set_value('book_type') == 'hardcopy')? 'checked' : '';?>> Hardcopy
                                                    </label>
                                                </div>
                                                </div>
                                            </div>  
                                            <div class="form-group row">
                                                <label class="col-sm-4 control-label text-sm-right pt-2" placeholder="">Name: </label>
                                                <div class="col-sm-6">
                                                    <input type="text" name="name" class="form-control" required="" value="<?=set_value('name');?>">
                                                    <?php echo form_error('name', '<div class="error">', '</div>'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 control-label text-sm-right pt-2" placeholder="">Author: </label>
                                                <div class="col-sm-6">
                                                    <input type="text" name="author" class="form-control" required="" value="<?=set_value('author');?>">
                                                    <?php echo form_error('author', '<div class="error">', '</div>'); ?>
                                                </div>
                                                
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 control-label text-sm-right pt-2" placeholder="">No. of Pages: </label>
                                                <div class="col-sm-6">
                                                    <input type="text" name="pages" class="form-control" required="" value="<?=set_value('pages');?>">
                                                    <?php echo form_error('pages', '<div class="error">', '</div>'); ?>
                                                </div>
                                                
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 control-label text-sm-right pt-2" placeholder="">Actual Price: </label>
                                                <div class="col-sm-6">
                                                    <input type="text" name="actual_price" class="form-control" required="" value="<?=set_value('actual_price');?>">
                                                    <?php echo form_error('actual_price', '<div class="error">', '</div>'); ?>
                                                </div>
                                                
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 control-label text-sm-right pt-2" placeholder="">Discount Price: </label>
                                                <div class="col-sm-6">
                                                    <input type="text" name="discount_price" class="form-control" required="" value="<?=set_value('discount_price');?>">
                                                    <?php echo form_error('discount_price', '<div class="error">', '</div>'); ?>
                                                </div>
                                                
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 control-label text-sm-right pt-2" placeholder="">Type: </label>
                                                <div class="col-sm-6">
                                                    <input type="text" name="type" class="form-control" required="" value="<?=set_value('type');?>">
                                                    <?php echo form_error('type', '<div class="error">', '</div>'); ?>
                                                </div>
                                                
                                            </div>
                                            <div class="form-group row" id="book_file">
                                                <label class="col-sm-4 control-label text-sm-right pt-2">Upload Book Copy: </label>
                                                <div class="col-sm-6">
                                                    <div class="custom-file">
                                                        <input type="file" class="form-control custom-file-input" id="book" name="book" required="">
                                                        <label class="custom-file-label" for="sapaper"></label>
                                                  </div>
                                                  <?php 
                                                            if($this->session->flashdata('book_error')!=''){echo '
                                                            <div class="error">'.$this->session->flashdata('book_error').'</div>';}?>
                                                </div>
                                                
                                            </div>  
                                            
                                            
                                            <div class="form-group row">
                                                <label class="col-sm-4 control-label text-sm-right pt-2"> </label>
                                                <div class="col-sm-5">
                                                    <div class="custom-file">
                                                        <input type="submit" class="btn btn-primary" Placeholder="Submit">

                                                  </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    
                                </section>
                            </div>
                        </div>

<script type="text/javascript">

function show_subjects(type_id){
    if(type_id == 'softcopy'){
    $('#book_file').show()
    }else{
    $('#book_file').hide()
    }
}
</script>