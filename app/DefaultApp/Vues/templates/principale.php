<?php

use app\DefaultApp\Models\GeoLocalisation;
use systeme\Application\Application as App;

if (!\systeme\Model\Utilisateur::session()) {
    app::redirection("connexion");
}
$role=\systeme\Model\Utilisateur::role();
$localisation=new GeoLocalisation();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="los-framework">
    <meta name="author" content="Alcindor losthelven">
    <title><?php if (isset($titre)) echo $titre; ?></title>
    <!-- Main Styles -->
    <!-- Custom fonts for this template-->
    <link href="<?= App::autre("vendor/fontawesome-free/css/all.min.css") ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="<?= App::autre("css/sb-admin-2.min.css") ?>" rel="stylesheet">
</head>

<body id="page-top">
<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Réparation</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <li class="nav-item" style="<?php if($role==="agent" || $role ==="reparateur")echo "display:none" ?>">
            <a class="nav-link" href="succursal">
                <i class="fas fa-fw fa-house-user"></i>
                <span>Succursale</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="demmande">
                <i class="fas fa-fw fa-house-user"></i>
                <span>Demmandes</span></a>
        </li>

        <li class="nav-item" style="<?php if($role==="agent" || $role ==="reparateur")echo "display:none" ?>">
            <a class="nav-link" href="utilisateur">
                <i class="fas fa-fw fa-house-user"></i>
                <span>Utilisateurs</span></a>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Search -->
               <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                               aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>-->

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                             aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                           placeholder="Search for..." aria-label="Search"
                                           aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>



                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= \app\DefaultApp\Models\Utilisateur::pseudo() ?></span>
                            <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                           <!-- <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Settings
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                Activity Log
                            </a>-->
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Deconnecter
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <?php
                if (isset($contenue)) {
                    echo $contenue;
                } else {
                    echo "pas de contenue";
                }
                ?>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; solution ip 2020</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->
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
    $("document").ready(function () {
        $("form").addClass("was-validated");
        <?php
        //new \app\DefaultApp\Models\GeoLocalisation();
        ?>
        $(".ajouter_demmande").on("submit", function (e) {
            e.preventDefault();
            $('#load').show();
            $.ajax({
                type: 'POST',
                url: "app/DefaultApp/traitements/demmande.php",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function(){
                    $(".message").html("<div class='alert alert-info'>Patienter un instant.........</div>")
                },
                success: function (reponse) {
                    if(reponse.trim()==="ok"){
                        $(".message").html("<div class='alert alert-success'>Enregistrer avec success</div>");
                        alert('fait avec success');
                        document.location.href='ajouter-demmande';
                    }else{
                        $(".message").html("<div class='alert alert-success'>"+reponse+"</div>");
                    }
                    $('#load').hide();
                }
            });

        });

        $(".ajouter_categorie").on("submit", function (e) {
            e.preventDefault();
            $('#load').show();
            $.ajax({
                type: 'POST',
                url: "app/DefaultApp/traitements/demmande.php",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function(){
                    $(".message").html("<div class='alert alert-info'>Patienter un instant.........</div>")
                },
                success: function (reponse) {
                    if(reponse.trim()==="ok"){
                        $(".message").html("<div class='alert alert-success'>Enregistrer avec success</div>");
                        alert('fait avec success');
                        document.location.href='lister-categorie';
                    }else{
                        $(".message").html("<div class='alert alert-success'>"+reponse+"</div>");
                    }
                    $('#load').hide();
                }
            });

        });

        $(".form-ajouter-succursal").on("submit", function (e) {
            e.preventDefault();
            $('#load').show();
            $.ajax({
                type: 'POST',
                url: "app/DefaultApp/traitements/succursal.php",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function(){
                    $(".message").html("<div class='alert alert-info'>Patienter un instant.........</div>")
                },
                success: function (reponse) {
                    if(reponse.trim()==="ok"){
                        $(".message").html("<div class='alert alert-success'>Enregistrer avec success</div>");
                        alert('fait avec success');
                        document.location.href='lister-succursal';
                    }else{
                        $(".message").html("<div class='alert alert-success'>"+reponse+"</div>");
                    }
                    $('#load').hide();
                }
            });

        });

        $(".form-attribuer").on("submit", function (e) {
            e.preventDefault();
            $('#load').show();
            $.ajax({
                type: 'POST',
                url: "app/DefaultApp/traitements/demmande.php",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function(){
                    $(".message").html("<div class='alert alert-info'>Patienter un instant.........</div>")
                },
                success: function (reponse) {
                    if(reponse.trim()==="ok"){
                        $(".message").html("<div class='alert alert-success'>Fait avec success</div>");
                        alert('fait avec success');
                        location.reload(true);
                    }else{
                        $(".message").html("<div class='alert alert-success'>"+reponse+"</div>");
                    }
                    $('#load').hide();
                }
            });

        });

        $(".form_note").on("submit", function (e) {
            e.preventDefault();
            $('#load').show();
            $.ajax({
                type: 'POST',
                url: "app/DefaultApp/traitements/demmande.php",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function(){
                    $(".message").html("<div class='alert alert-info'>Patienter un instant.........</div>")
                },
                success: function (reponse) {
                    if(reponse.trim()==="ok"){
                        $(".message").html("<div class='alert alert-success'>Fait avec success</div>");
                        alert('fait avec success');
                        location.reload(true);
                    }else{
                        $(".message").html("<div class='alert alert-success'>"+reponse+"</div>");
                    }
                    $('#load').hide();
                }
            });

        });



        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imgInp").change(function () {
            readURL(this);
        });


    });
</script>
</html>