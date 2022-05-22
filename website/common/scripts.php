<!-- login pop up show  -->
<script>
    <?php if(isset($_REQUEST['login']) && $_REQUEST['login']=="login"){ ?>
    $(window).on('load', function(){ 
        $('#loginModal').modal('show');
    });
    <?php } ?>

    function loginPopUpShow(){
        $('#loginModal').modal('show');
    }

    // close login modal
    $('#close-login-modal').click(function (e) { 
        $('#loginModal').modal('hide');
    });

</script>