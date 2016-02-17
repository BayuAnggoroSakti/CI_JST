<!DOCTYPE html>
<html lang="en-us" class="no-js">

    <head>
        <meta charset="utf-8">
        <title>Error 404 | Jogja Science Training</title>
        <meta name="description" content="The description should optimally be between 150-160 characters.">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Madeon08">

        <!-- ================= Favicon ================== -->
        <!-- Standard -->
        <link rel="shortcut icon" href="img/favicon.png">
        <!-- Retina iPad Touch Icon-->
        <link rel="apple-touch-icon" sizes="144x144" href="img/favicon-retina-ipad.png">
        <!-- Retina iPhone Touch Icon-->
        <link rel="apple-touch-icon" sizes="114x114" href="img/favicon-retina-iphone.png">
        <!-- Standard iPad Touch Icon--> 
        <link rel="apple-touch-icon" sizes="72x72" href="img/favicon-standard-ipad.png">
        <!-- Standard iPhone Touch Icon--> 
        <link rel="apple-touch-icon" sizes="57x57" href="img/favicon-standard-iphone.png">

        <!-- ============== Resources style ============== -->
        <link href="<?php echo base_url('assets/404/css/style-left-yellow.css')?>" rel="stylesheet" type="text/css" />
     


        <!-- Modernizr runs quickly on page load to detect features -->
        <script src="<?php echo base_url('assets/404/js/modernizr.custom.js')?>"></script>
    </head>
    
    <body>

        <!-- Overlay -->
        <div class="global-overlay">
            <div class="overlay skew-part"></div>
        </div>

        <div class="left-part">

            <div class="content">

                <!-- Your logo -->
                <img src="<?php echo base_url('assets/404/img/logo1.png') ?>" alt="" class="brand-logo" />

                <h1>ERROR <div class="timer"></div></h1>

                <h2>Maaf, halaman yang anda cari tidak ditemukan<br>
                Silahkan laporkan masalah ini kepada kami</h2>

                <div>
                    <a href="<?php echo site_url('home') ?>" id="open-more-info" data-target="right-side" class="light-btn">Back Home!</a>
                    <a data-dialog="somedialog" class="action-btn trigger">Report Problem</a>
                </div>

            </div>

            <div class="text-annex">
                <a href="mailto:rpz@rpz.com"><i class="fa fa-paper-plane"></i></a>
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
            </div>

        </div>

        <div class="right-part opacity-0"></div>

        <!-- START - Contact Popup -->
        <div id="somedialog" class="dialog">

            <div class="dialog__overlay"></div>
                    
            <div class="dialog__content">
                        
                <div class="dialog-inner">
                            
                    <h4>REPORT FORM</h4>
                            
                    <p>We couldn't find what you're looking for...<br>
                         <strong>Our team would be very grateful to be aware about this issue. Thanks!</strong></p>

                    <!-- START - Contact Form -->
                    <form id="contact-form" name="contact-form" method="POST" data-name="Contact Form">

                        <div class="row">

                            <!-- E-mail -->
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <input type="email" id="email" class="form form-control" placeholder="Your Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email'" name="email-address" data-name="Email Address" required>
                                </div>
                            </div>

                            <!-- Message -->
                            <div class="col-xs-12 col-sm-12 col-lg-12 no-padding">
                                <div class="form-group">
                                    <textarea id="text-area" class="form textarea form-control" placeholder="Your feedback here... 20 characters Min." onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your feedback here... 20 characters Min.'" name="message" data-name="Text Area" required></textarea>
                                </div>
                            </div>

                        </div>

                        <!-- Button submit -->
                        <button type="submit" id="valid-form" class="btn btn-color">Send my Message</button>
        
                    </form>
                    <!-- END - Contact Form -->
                    
                    <!-- Answer for the contact form is displayed in the next div, do not remove it. -->       
                    <div id="block-answer">

                        <div id="answer"></div>

                    </div>

                </div>
                <!-- /. dialog-inner -->

                <!-- Button Cross to close the Contact/Report form Popup -->
                <button class="close-newsletter" data-dialog-close><i class="icon ion-close-round"></i></button>

            </div>
            <!-- /. dialog__content -->
                        
        </div>
        <!-- END - Contact Popup -->

    <!-- ///////////////////\\\\\\\\\\\\\\\\\\\ -->
    <!-- ********** Resources jQuery ********** -->
    <!-- \\\\\\\\\\\\\\\\\\\/////////////////// -->
    
    <!-- * Libraries jQuery, Easing and Bootstrap - Be careful to not remove them * -->
    <script src="<?php echo base_url('assets/404/js/jquery.min.js"')?>"></script>
    <script src="<?php echo base_url('assets/404/js/jquery.easings.min.js"')?>"></script>
    <script src="<?php echo base_url('assets/404/js/bootstrap.min.js"')?>"></script>

    <!-- Plugin used to count down to the target number at a specified speed -->
    <script src="<?php echo base_url('assets/404/js/jquery.countTo.js"')?>"></script>


    <!-- Contact form plugin -->
    <script src="<?php echo base_url('assets/404/js/contact-me.js"')?>"></script>

    <!-- Plugin Background Slideshow -->
    <script src="<?php echo base_url('assets/404/js/vegas.js"')?>"></script>

    <!-- Popup Newsletter Form -->
    <script src="<?php echo base_url('assets/404/js/classie.js"')?>"></script>
    <script src="<?php echo base_url('assets/404/js/dialogFx.js"')?>"></script>

    <!-- Main JS File -->
    <script src="<?php echo base_url('assets/404/js/main.js""')?>"></script>
    
    <!--[if lt IE 10]><script type="text/javascript" src="js/placeholder.js"></script><![endif]-->

    </body>

</html>