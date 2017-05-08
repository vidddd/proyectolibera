<?php
session_start();
opcache_reset();
error_reporting(E_ALL);

require_once  '../vendor/autoload.php';
require_once  '../inc/config.php';
require_once  '../inc/db.class.php';
$loader = new Twig_Loader_Filesystem('templates/');
$twig = new Twig_Environment($loader, array("cache" => false));
$db = new Database();

$es = 1;
$parti = null;
if($_GET) {
  if($_GET['change'] == 2 && $_GET['id']) {
      $db->updateEstado($_GET['id'],2);
  }
  if($_GET['change'] == 3 && $_GET['id']) {
      $db->updateEstado($_GET['id'],3);
  }
}

$total1 = $db->getParticipacionesCount(1);
$total2 = $db->getParticipacionesCount(2);
$total3 = $db->getParticipacionesCount(3);

if($_GET['par'] == 2) {
  $parti = $db->getParticipaciones(2); $es = 2;
} else if($_GET['par'] == 3) {
  $parti = $db->getParticipaciones(3); $es = 3;
} else {
  $parti = $db->getParticipaciones(1);
}

echo $twig->render('index.html', array( "URLHOME" => URL_HOME, "total1" => $total1, "total2" => $total2, "total3" => $total3, "provincias" => $provincias, "es" => $es, "parti" => $parti));
