<?php
include('../db.conf.php');
BaseConnect();

?>

<?php
//Nouveau Menu
if (isset($_POST['add-menu-control']) && $_POST['add-menu-control'] == 'Valider') {
    $semaine = $_POST['semaine'];

    $sql_add_menu = mysql_query("INSERT INTO `menu`(`idmenu`, `semaine`, `etat_menu`) VALUES (NULL,'$semaine','0')")or die(mysql_error());

    if($sql_add_menu == TRUE)
    {
        header("Location: ../../module/admin/menu/index.php?add-menu=true");
    }else{
        header("Location: ../../module/admin/menu/index.php?add-menu=false");
    }
}

?>

<?php
//modification du Menu
if (isset($_POST['modif-menu-control']) && $_POST['modif-menu-control'] == 'Valider') {

    $idmenu = $_POST['idmenu'];
    $semaine = $_POST['semaine'];

    $sql_modif_menu = mysql_query("UPDATE `menu` SET `semaine`='$semaine' WHERE idmenu='$idmenu'")or die(mysql_error());

    if($sql_modif_menu == TRUE)
    {
        header("Location: ../../module/admin/menu/index.php?modif-menu=true");
    }else{
        header("Location: ../../module/admin/menu/index.php?modif-menu=false");
    }
}

?>

<?php
//modification du Menu
if (isset($_GET['supp-menu-control']) && $_GET['supp-menu-control'] == 'Valider') {

    $idmenu = $_GET['idmenu'];

    $sql_supp_menu = mysql_query("DELETE FROM menu WHERE idmenu='$idmenu'")or die(mysql_error());

    if($sql_supp_menu == TRUE)
    {
        header("Location: ../../module/admin/menu/index.php?supp-menu=true");
    }else{
        header("Location: ../../module/admin/menu/index.php?supp-menu=false");
    }
}

?>

<?php
//Ajout d'un article au menu
if (isset($_POST['add-article-control']) && $_POST['add-article-control'] == 'Valider') {

    $idmenu = $_POST['idmenu'];
    $designation = $_POST['designation'];
    $description = $_POST['description'];
    $prix_unitaire = $_POST['prix_unitaire'];

    $sql_add_article = mysql_query("INSERT INTO `article`(`idarticle`, `idmenu`, `designation`, `description`, `prix_unitaire`)
    VALUES (NULL,'$idmenu','$designation','$description','$prix_unitaire')")or die(mysql_error());

    if($sql_add_article == TRUE)
    {
        header("Location: ../../module/admin/menu/view.php?idarticle=$idmenu&add-article=true");
    }else{
        header("Location: ../../module/admin/menu/view.php?idarticle=$idmenu&add-article=false");
    }
}

?>




