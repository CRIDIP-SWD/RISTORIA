    <?php
    session_start();
    include ('inc/db.conf.php');
    $iduser = $_GET['iduser'];
    mysql_query("UPDATE utilisateur SET connect = '0' WHERE iduser = '$iduser'")or die(mysql_error());
    session_unset();
    session_destroy();
    header('Location: index.php');
    exit();
    ?>