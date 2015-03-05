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




