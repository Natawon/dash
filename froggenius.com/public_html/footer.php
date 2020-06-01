<!-- Footer -->
<footer>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <span class="copyright CSPraJadfont">4/4 M.11 Ratchaphruek Rd. Bangprom TalingChan Bangkok 10170 &nbsp; Frog Digital Group Co., Ltd.    &copy; <?php echo date("Y"); ?> All Rights Reserved.</span>
      </div>
    </div>
  </div>
</footer>

<!-- Custom scripts for this template -->
<script src="assets/js/main.js"></script>
<script src="https://rawgit.com/notifyjs/notifyjs/master/dist/notify.js"></script>

<script>
    // $('#submitmail').on('click', function(){
    //     if($('#name').val() != '' && $('#email').val() != '' && $('#tel').val() != ''){
    //         $('#submitmail').html('Sending...');
    //         $('#submitmail').prop("disabled", true);
    //     }
    //     });

$(document).ready(function() {

    $('[data-toggle="tooltip"]').tooltip();

    jQuery.validator.addMethod("customTel", function(value, element) {
        return this.optional(element) || /^[()+ 0-9\-]+$/i.test(value);
    }, "Letters only please"); 
    
    $('#sendmaill').validate({
        rules: {
            fullname: "required",          
            email: {
                required: true,
                email: true
            },
            tel: {
                required: true,
                customTel: true,
                minlength: 8,
                maxlength: 15
            },
            name: "required"
        },
        errorElement: "span" ,                            
        messages: {
            name: "Please enter your sweet name",
            email: "Please enter valid email address",
            tel: "Please enter your mobile number",
        },
        submitHandler: function(form) {
            var dataparam = $('#sendmaill').serialize();

            $.ajax({
                type: 'POST',
                url: 'sendmail.php',
                data: dataparam,
                beforeSend: function() { 
                    $('#submitmail').html('<span class="spinner-border spinner-border-sm" id="loadd"></span> Sending...');
                    $('#submitmail').prop("disabled", true);
                },
                success: function(data) {
                    $.ajax({
                        type: 'POST',
                        url: 'sendmail_customer-test.php',
                        data: dataparam,
                        success: function(data) {
                            $('#submitmail').html('Sent');
                            $('#submitmail').prop("disabled", false);
                            $.notify("ส่งข้อมูลสำเร็จ", "success");
                            setTimeout(function() {
                                window.location.href = '/thankyou';
                            }, 1500);
                        },
                        error: function(data) {
                            $('#submitmail').html('Request Demo');
                            $('#submitmail').prop("disabled", false);
                            // $.notify("เกิดข้อผิดพลาด ไม่สามารถส่งคำขอได้ กรุณาติดต่อเราทางอีเมล์หรือเบอร์โทรศัพท์", "error");
                            $.notify("เกิดข้อผิดพลาดไม่สามารถส่งคำขอได้ กรุณาติดต่อเราทางอีเมล์หรือเบอร์โทรศัพท์", {
                                autoHide: false,
                                className: 'error'
                            });
                        },
                    });
                },
                error: function(data) {
                    $('#submitmail').html('Request Demo');
                    $('#submitmail').prop("disabled", false);
                    // $.notify("เกิดข้อผิดพลาด ไม่สามารถส่งคำขอได้ กรุณาติดต่อเราทางอีเมล์หรือเบอร์โทรศัพท์", "error");
                    $.notify("เกิดข้อผิดพลาดไม่สามารถส่งคำขอได้ กรุณาติดต่อเราทางอีเมล์หรือเบอร์โทรศัพท์", {
                        autoHide: false,
                        className: 'error'
                    });
                },
            });
        }
    });
});
</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<?=$configuration['google_analytics']?>

<!-- Facebook Pixel Code -->
<?=$configuration['facebook_pixel_code']?>
<!-- End Facebook Pixel Code -->

<!-- Start of HubSpot Embed Code -->
<script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/6666690.js"></script>
<!-- End of HubSpot Embed Code -->