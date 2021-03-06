<?php
session_start();
//opcache_reset();
//error_reporting(E_ALL);

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/inc/config.php';
require_once __DIR__ . '/inc/db.class.php';
$loader = new Twig_Loader_Filesystem('templates/');
$twig = new Twig_Environment($loader, array("cache" => false));
$db = new Database();
 
if($_POST){

    $persona = $_POST['persona'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $organiza = $_POST['organiza'];
    $masinfo = $_POST['masinfo'];
    $provincia = $_POST['provincia'];
    $lugar = $_POST['lugar'];
    $location = $_POST['location'];
    $hora = $_POST['hora'];
    $numero = $_POST['numero'];
    $comentarios = $_POST['comentarios'];
    
    $cuando = $_POST['momentos'];

    if ($db->existeEmail($email)) {
            echo $twig->render('index.html', array( "URLHOME" => URL_HOME , "mensaje" => 1 ));

    } else {
            $db->insertaParticipacion($persona, $email, $telefono, $direccion, $organiza, $masinfo, $provincia, $lugar, $location, $hora, $numero, $comentarios);
           
           echo $twig->render('index.html', array( "URLHOME" => URL_HOME , "mensaje" => 2 ));
    }




} else {
    echo $twig->render('index.html', array( "URLHOME" => URL_HOME, "mensaje" => 0 ));
}
