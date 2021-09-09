<?php
require 'header.php';


?>


<title>
    Contact 
</title>

<script>
    function send_message() {


        var name = jQuery("#name").val();
        var phone = jQuery("#mobile").val();
        var email = jQuery("#email").val();
        var message = jQuery("#message").val();



        var is_error = " ";
        if (name == "") {
            alert("Please enter name ");

        } else if (phone == "") {
            alert("Please enter contact number ");

        } else if (email == "") {
            alert("Please enter email ");

        } else if (message == "") {
            alert("Please enter contact message ");

        } else {


            jQuery.ajax({
                url: 'send_message.php',
                type: 'post',
                data: ' name=' + name + ' &phone=' + phone + '&email=' + email + '&message=' + message,

                success: function(result) {
                    console.log(result);



                }
            });
        }



    }
</script>

<section class="htc__contact__area ptb--100 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12 col-xs-12">
                <div class="map-contacts--2">
                    <div id="googleMap"></div>
                </div>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">
                <h2 class="title__line--6">CONTACT US</h2>
                <div class="address">
                    <div class="address__icon">
                        <i class="icon-location-pin icons"></i>
                    </div>
                    <div class="address__details">
                        <h2 class="ct__title">our address</h2>
                        <p>Subidanagar,Tinkune,Kathmandu ,Nepal </p>
                    </div>
                </div>
                <div class="address">
                    <div class="address__icon">
                        <i class="icon-envelope icons"></i>
                    </div>
                    <div class="address__details">
                        <h2 class="ct__title">openning hour</h2>
                        <p>8 AM ----- 11 PM </p>
                    </div>
                </div>

                <div class="address">
                    <div class="address__icon">
                        <i class="icon-phone icons"></i>
                    </div>
                    <div class="address__details">
                        <h2 class="ct__title">Phone Number</h2>
                        <p>+977-9810438054</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="contact-form-wrap mt--60">
                <div class="col-xs-12">
                    <div class="contact-title">
                        <h2 class="title__line--6">SEND A MAIL</h2>
                    </div>
                </div>
                <div class="col-xs-12">
                    <form id="contact-form" action="#" method="post">
                        <div class="single-contact-form">
                            <div class="contact-box name">
                                <input type="text" id="name" name="name" placeholder="Your Name*">
                                <input type="text" id="mobile" name="moblie" placeholder="Contact Number*">
                                <input type="email" id="email" name="email" placeholder="Mail*">
                            </div>
                        </div>
                        <div class="single-contact-form">
                            <div class="contact-box message">
                                <textarea name="message" id="message" placeholder="Your Message"></textarea>
                            </div>
                        </div>
                        <div class="contact-btn">
                            <button type="button" onclick="send_message()" name="submit" class="fv-btn">Send MESSAGE</button>
                        </div>
                    </form>
                    <div class="form-output">
                        <p class="form-messege"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
require 'footer.php';
?>