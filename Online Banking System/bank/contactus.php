<?php
session_start();
include_once 'mysql.php';
include_once 'headerCustomer.php';
include_once 'customerTop.php';
?>


<section id="aa-contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            
                    <div class="aa-contact-top" style="padding-bottom: 20px;padding-top: 20px;">
                        <h2 style="color:#000;">We are waiting to assist you..</h2> 
                    </div>           
                    <div class="aa-contact-address" style="padding-bottom: 20px;padding-top: 20px;">
                        <div class="row">
                            <div class="col-md-8">
                                <?php
                                if (isset($_GET) && !empty($_GET)) {
                                    if (isset($_GET) && !empty($_GET) && $_GET['s'] == 0) {
                                        ?>                      
                                        <div class="alert alert-danger" id="danger-alert">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <strong> <?php echo $_GET['st'] ?> </strong>
                                        </div>                      
                                    <?php } ?>

                                    <?php
                                    if (isset($_GET) && !empty($_GET) && $_GET['s'] == 1) {
                                        ?>

                                        <div class="alert alert-success" id="danger-alert">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <strong> <?php echo $_GET['st'] ?> </strong>
                                        </div>
                                    <?php
                                    }
                                }
                                ?>
                                <div class="aa-contact-address-left">
                                    <form class="comments-form contact-form" action="contactusStatus.php" method="post">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">                        
                                                    <input type="text" placeholder="First Name" class="form-control" name="firstname" required="">
                                                </div>
                                            </div>
                                           <div class="col-md-6">
                                                 <div class="form-group">                        
                                                    <input type="text" placeholder="Last Name" class="form-control" name="lastname" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">                                            
                                            
                                             <div class="col-md-6">
                                                <div class="form-group">                        
                                                    <input type="email" placeholder="Email" class="form-control" name="email" required="">
                                                </div>
                                            </div>
                                             <div class="col-md-6">
                                                <div class="form-group">                        
                                                    <input type="text" placeholder="Mobile" class="form-control" name="mobile" required="">
                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                                        
                                          <div class="row">
                                               <div class="col-md-6">
                                                <div class="form-group">                        
                                                   <textarea class="form-control" rows="5" placeholder="Address" name="address" style="width: 100%;" required=""></textarea>
                                                </div>
                                            </div>
                                               <div class="col-md-6">
                                                <div class="form-group">                        
                                                    <input type="text" placeholder="Subject" class="form-control" name="subject" required="">
                                                </div>
                                            </div>
                                           
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">                        
                                                    <input type="text" placeholder="City" class="form-control" name="city" required="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">                        
                                                    <input type="text" placeholder="State" class="form-control" name="state" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">                        
                                                    <input type="text" placeholder="Country" class="form-control" name="country" required="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">                        
                                                    <input type="text" placeholder="Zipcode" class="form-control" name="zipcode" required="">
                                                </div>
                                            </div>
                                        </div>                  

                                        <div class="form-group">                        
                                            <textarea class="form-control" rows="3" placeholder="Message" name="message" required=""></textarea>
                                        </div>
                                        <button type="submit" class="aa-secondary-btn">Send</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="aa-contact-address-right">
                                    <address>
                                        <h4>Safe and Secure Internet Banking</h4>
                                        <p> 115 Broad Street, Warrensburg , Missouri(MO),USA,64093</p>
                                        <p><span class="fa fa-phone"></span>+1 868-868-8686</p>
                                        <p><span class="fa fa-envelope"></span>safebank@gmail.com</p>
                                    </address>
                                </div>
                            </div>
                        </div>
                    </div>
              
            </div>
        </div>
    </div>
</section>


<?php include 'footerCustomer.php'; ?>