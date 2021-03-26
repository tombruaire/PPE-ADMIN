<?php require "core/Autoloader.php";
Autoloader::register();

$session = new Session();

require "core/Functions.php";
require "core/Constants.php";

$bdd = connectBDD(HOSTNAME, DATABASE, USERNAME, PASSWORD);

$helpers = new Helpers();
$forms = new Forms();

if (isset($_GET['p'])) {   
    if(file_exists("controleur/".$_GET['p'].".controleur.php"))
        $page = $_GET['p'];
    else
        $page = "404";
} else {
    $page = "connexion";
}

ob_start();
require "controleur/".$page.".controleur.php";
$content = ob_get_clean();

require "nav.php";

?>