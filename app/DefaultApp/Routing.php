<?php
use app\DefaultApp\DefaultApp as App;
$role=\systeme\Model\Utilisateur::role();
App::get("/logout", function (){
    session_destroy();
    App::redirection("connexion");
}, "index");

App::get("/", "default.index", "index");
App::post("/", "default.index","index_post");

App::get("/", "login.login");
App::post("/", "login.login");
App::get("/login", "login.login", "connexion");
App::post("/login", "login.login");

App::post("/dashboard", "default.index");

if($role!=="agent") {
//utilisateur
    App::get("/utilisateur", "utilisateur.lister", "utilisateur");
    App::get("/ajouter-utilisateur", "utilisateur.ajouter", "ajouter_utilisateur");
    App::post("/ajouter-utilisateur", "utilisateur.ajouter", "ajouter_utilisateur");
    App::get("/lister-utilisateur", "utilisateur.lister", "lister_utilisateur");
    App::get("/blocker-utilisateur-:id", "utilisateur.blocker", "blocker_utilisateur")->avec("id", "['0-9']+");
    App::get("/deblocker-utilisateur-:id", "utilisateur.deblocker", "deblocker_utilisateur")->avec("id", "['0-9']+");
    App::get("/supprimer-utilisateur-:id", "utilisateur.supprimer", "supprimer_utilisateur")->avec("id", "['0-9']+");
    App::get("/modifier-utilisateur-:id", "utilisateur.modifier", "modifier_utilisateur")->avec("id", "['0-9']+");
    App::post("/modifier-utilisateur-:id", "utilisateur.modifier")->avec("id", "['0-9']+");
//fin utilisateur


//succursal
    App::get("/succursal", "succursal.lister", "succursal");
    App::post("/succursal", "succursal.lister", "succursal");
    App::get("/ajouter-succursal", "succursal.ajouter", "ajouter_succursal");
    App::post("/ajouter-succursal", "succursal.ajouter", "ajouter_succursal");
    App::get("/lister-succursal", "succursal.lister", "lister_succursal");
    App::post("/lister-succursal", "succursal.lister", "lister_succursal");
    App::get("/supprimer-succursal-:id", "succursal.supprimer", "supprimer_succursal")->avec("id", "['0-9']+");
    App::get("/modifier-succursal-:id", "succursal.modifier", "modifier_succursal")->avec("id", "['0-9']+");
    App::post("/modifier-succursal-:id", "succursal.modifier")->avec("id", "['0-9']+");
//fin/succursal

}
//demmande
App::get("/demmande", "demmande.lister","demmande");
App::get("/ajouter-demmande", "demmande.ajouter", "ajouter_demmande");
App::post("/ajouter-demmande", "demmande.ajouter","ajouter_demmande");
App::get("/lister-demmande", "demmande.lister", "lister_demmande");
App::get("/supprimer-demmande-:id", "demmande.supprimer", "supprimer_demmande")->avec("id", "['0-9']+");
App::get("/modifier-demmande-:id", "demmande.modifier", "modifier_demmande")->avec("id", "['0-9']+");
App::post("/modifier-demmande-:id", "demmande.modifier")->avec("id", "['0-9']+");
App::get("/fiche-demmande-:id", "demmande.fiche")->avec("id", "['0-9']+");

//if($role!=="agent") {
    App::get("/ajouter-categorie", "demmande.ajouterCategorie", "ajouter_categorie");
    App::post("/ajouter-categorie", "demmande.ajouterCategorie", "ajouter_categorie");
    App::get("/lister-categorie", "demmande.listerCategorie", "lister_categorie");
    App::get("/modifier-categorie-:id", "demmande.modifierCategorie")->avec("id", "['0-9']+");
//}
//fin demmande