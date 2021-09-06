<!-- Start Cart Area -->
<section class="cart-area ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                       <!--  <form> -->
                            <div class="cart-table table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Course</th>
                                            <th scope="col">Plan</th>
                                            <th scope="col">Type/Subject </th>
                                            <!-- <th scope="col">Quantity</th> -->
                                            <th scope="col">Total</th>
                                            <th scope="col">Remove</th>
                                        </tr>
                                    </thead>

                                    <tbody id="my_cart">
                                        
                                    </tbody>
                                </table>
                            </div>

                            <div class="cart-buttons">
                                <div class="row h-100 justify-content-center align-items-center">
                                    <div class="col-lg-7 col-md-7">
                                        <div class="coupon-box">
                                            <input type="text" class="form-control" placeholder="Coupon Code" id="my_coupon">
                                            <button type="button" onclick="return get_coupon_dis()">Apply Coupon Code</button>
                                        </div>
                                        <span id="coupon_message"></span>
                                    </div>
                                    <div class="col-lg-5 col-md-5">
<div class="cart-totals">
                                <h3>Cart Totals</h3>

                                <ul>
                                    <li>Actual Price: <span><i class="fa fa-inr" aria-hidden="true"></i>&nbsp;<span id="actualprice">0</span></span></li>
                                    <li>Discount: <span>- <i class="fa fa-inr" aria-hidden="true"></i>&nbsp;<span id="discount_pri">0</span></span></li>
                                    <li>Subtotal: <span><i class="fa fa-inr" aria-hidden="true"></i>&nbsp;<span id="subtotal">0</span></span></li>
                                    <li>Additional Discount: <span><i class="fa fa-inr" aria-hidden="true"></i>&nbsp;<span id="discount">0</span></span></li>
                                    <li>Total: <span><i class="fa fa-inr" aria-hidden="true"></i>&nbsp;<span id="grand_total">0</span></span></li>
                                </ul>
                                <a href="#" class="btn btn-primary"  onclick="<?php if($login_role_details!=''){?>return buy_this_package();<?php }else{?>return login_to_account('Please Login To Purchase This...');<?php }?>">Proceed to Checkout</a>
                            </div>
                        </div>
                                    <!-- <div class="col-lg-5 col-md-5 text-right">
                                        <a href="#" class="btn btn-primary">Update Cart</a>
                                    </div> -->
                                </div>
                            </div>

                            <!-- <div class="cart-totals">
                                <h3>Cart Totals</h3>

                                <ul>
                                    <li>Subtotal: <span><i class="fa fa-inr" aria-hidden="true"></i>&nbsp;<span id="subtotal">250.00</span></span></li>
                                    <li>Discount: <span><i class="fa fa-inr" aria-hidden="true"></i>&nbsp;<span id="discount">0</span></span></li>
                                    <li>Total: <span><i class="fa fa-inr" aria-hidden="true"></i>&nbsp;<span id="grand_total">0</span></span></li>
                                </ul>
                                <a href="#" class="btn btn-primary">Proceed to Checkout</a>
                            </div> -->
                        <!-- </form> -->
                    </div>
                </div>
                
            </div>
        </section>
<!-- End Cart Area -->

<script type="text/javascript">
    function buy_this_package() {
        var checkedVals = $(".cart_packages").map(function() {
            return this.value;
        }).get();
        var cart_courses = $(".cart_courses").map(function() {
            return this.value;
        }).get();
        var cart_packages=checkedVals.join(",");
        var subtotal=$('#subtotal').text();
        var discount=$('#discount').text();
        var grand_total=$('#grand_total').text();
        var discount_id=0;
        if(discount!=0){
            discount_id=$('#coupon_id').val();
        }
        /*var track_id=$.now();*/
        var track_id='<?=date('Ymd')?>'+Math.round(Math.random() * 6) + 1;
       
        $.ajax({
            type:'POST',
            url: '<?php echo base_url();?>ajax/users_plan_relation/',
            data: {cart_packages: cart_packages, subtotal : subtotal, discount : discount, grand_total : grand_total, discount_id : discount_id, track_id : track_id, cart_courses : cart_courses},
            success: function(response)
            {
                alert(response);
                location.reload(true);
            }
            });
    }
</script>