<?php
session_start();
include_once 'mysql.php';
include_once 'headerCustomer.php';
include_once 'customerTop.php';
?>

<section id="aa-myaccount">
    <div class="container">

        <div class="row" style="margin: -15px;">
            <div class="col-md-12">
                <div class="aa-myaccount-area" style="padding-top: 25px;padding-bottom: 25px;">  
                    <div class="row">
                        <div class="col-md-3">
                           
                        </div>
                        <div class="col-md-6">
                            <div class="aa-myaccount-login">
                                <u> <h3 style="color: blueviolet;">Login As Administrator</h3></u>
                                <?php
                                if (isset($_GET) && !empty($_GET) && $_GET['s'] == 2) {
                                    ?>

                                    <div class="alert alert-danger" id="danger-alert">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong> <?php echo $_GET['st'] ?> </strong>
                                    </div>

                                <?php }
                                ?>
                                <form method="POST" action="loginAdministratorStatus.php" class="aa-login-form">
                                    <label for="">Username or Email address<span>*</span></label>
                                    <input type="text" placeholder="Username or email" name="username" required="">
                                    <label for="">Password<span>*</span></label>
                                    <input type="password" placeholder="Password" name="password" required="">                                    
                                    <button type="submit" class="aa-browse-btn">Login</button>                                                                     
                                </form>
                            </div>
                        </div>
                        <div class="col-md-3">
                           
                        </div>
                    </div>          
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'footerCustomer.php'; ?>