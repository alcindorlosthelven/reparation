<?php
if(\app\DefaultApp\Models\Utilisateur::session()){
    \app\DefaultApp\DefaultApp::redirection("ajouter_demmande");
}
use app\DefaultApp\DefaultApp as app;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="los-framework">
    <meta name="author" content="Alcindor losthelven">
    <title><?php if(isset($titre))echo $titre; ?></title>
    <!-- Main Styles -->
    <!-- Custom fonts for this template-->
    <link href="<?= App::autre("vendor/fontawesome-free/css/all.min.css") ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="<?= App::autre("css/sb-admin-2.min.css") ?>" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
<div id="contenue">
    <?php
    if(isset($contenue)){echo $contenue;}else{echo "pas de contenue";}
    ?>
</div>
</body>
<!-- Bootstrap core JavaScript-->
<script src="<?= App::autre("vendor/jquery/jquery.min.js") ?>"></script>
<script src="<?= App::autre("vendor/bootstrap/js/bootstrap.bundle.min.js") ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?= App::autre("vendor/jquery-easing/jquery.easing.min.js") ?>"></script>

<!-- Custom scripts for all pages-->
<script src="<?= App::autre("js/sb-admin-2.min.js") ?>"></script>
<script>
    $('document').ready(function () {
        $('#load').hide();
        $(".form-signin").on("submit", function (e) {
            $("#btn-login").css("display","none");
            e.preventDefault();
            $('#ajax-loading').show();
            $.ajax({
                type: 'POST',
                url: "app/DefaultApp/traitements/login_process.php",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function(){
                    $(".message").html("<div class='alert alert-info'>Patienter un instant.........</div>")
                },
                success: function (reponse) {
                    $(".message").html(reponse);
                    var data=$.parseJSON(reponse);
                    if(data.message==="ok"){
                        //$(".message").html("<div class='alert alert-info' style='text-align: center'>Success</div>");
                        document.location.href="ajouter-demmande";
                        //location.reload(true);
                    }else{
                        $(".message").html("<div class='alert alert-info' style='text-align: center'>"+data.message+"</div>");
                        setTimeout(function(){
                            $(".message").html("");
                        },6000)
                        $("#btn-login").css("display","inline-block");
                    }
                    $('#load').hide();
                }
            });

        });
        $("form").addClass("was-validated");
    });
</script>
</html>
