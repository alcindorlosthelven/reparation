<div class="container">
    <br>
    <br>
    <br>
    <br>
    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block" style="background: url('https://www.usinenouvelle.com/expo/img/reparation-electroportatif-000675968-product_zoom.jpg');background-position: center;background-size: cover;"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <div class="message"></div>
                                    <h1 class="h4 text-gray-900 mb-4">Bienvenue !</h1>
                                </div>
                                <form class="user form-signin con was-validated" method="post">
                                    <input type="hidden" name="login">
                                    <div class="form-group">
                                        <input required id="user_email" name="user_email" type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                    </div>

                                    <div class="form-group">
                                        <input required name="password" id="password" type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                                    </div>


                                    <input type="submit" class="btn btn-primary btn-user btn-block" value="Se Connecter">

                                    <hr>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<div class="card" style="display:none">
    <div class="card-header">
        <center><h2 class="text-center"
                    style="color: red"><?= stripslashes(\app\DefaultApp\Models\Configuration::getValueOfConfiguraton("titre_login")); ?></h2>
            <span class="text-center"
                  style="font-weight: bold;color: dimgray;"><?= stripslashes(\app\DefaultApp\Models\Configuration::getValueOfConfiguraton("definition_titre_login")); ?></span><br>
            <img src="<?= \app\DefaultApp\Models\Configuration::getValueOfConfiguraton("logo"); ?>"
                 style="height: 60px">
        </center>
    </div>
    <div class="card-body">
        <form class="form-signin con was-validated" method="post" id="login-form" href="">
            <input type="hidden" name="login">
            <div class="message">
                <?php
                if (isset($message)) {
                    echo "<div class='alert alert-warning'>$message</div>";
                } ?>
            </div>
            <p class="text-muted"></p>
            <div class="input-group mb-3">
                <span class="input-group-addon"><i class="icon-user"></i></span>
                <input value="<?php if (isset($pseudo)) echo $pseudo ?>" type="text" class="form-control"
                       placeholder="Username"
                       name="user_email" id="user_email" required>
            </div>
            <div class="input-group mb-4">
                <span class="input-group-addon"><i class="icon-lock"></i></span>
                <input value="<?php if (isset($password)) echo $password ?>" type="password" class="form-control"
                       placeholder="Password" name="password" id="password" required>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <button type="submit" class="btn btn-primary px-4" name="btn-login" id="btn-login">
                        <span class="icon-login"></span> S'identifier
                    </button>
                </div>

                <div class="form-group col-md-12">
                    <center>
                        <a href="login?forget-password" class="">Mot de passe oublié</a>
                    </center>
                </div>

            </div>
        </form>
    </div>

    <div class="card-footer">

        <div class="float-right ">
            <a class="text-dark" href="<?= \app\DefaultApp\Models\Configuration::getValueOfConfiguraton("lien_contact"); ?>"
               target="_blank">Copyright &copy; 2017-<?= date("Y") ?><a href="">&nbsp;Solution Ip</a></a>
        </div>
        <center><span style="font-weight: bold">Version <?= VERSION ?></span></center>
    </div>
</div>