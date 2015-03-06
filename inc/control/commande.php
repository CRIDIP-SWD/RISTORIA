<?php
include ('../db.conf.php');
BaseConnect();
?>
<?php
//Création de la commande
if(isset($_POST['add-commande-control']) && $_POST['add-commande-control'] == 'Valider')
{
    $idmenu = $_POST['idmenu'];
    $iduser = $_POST['iduser'];
    $num_commande = "ORD.UTS.".rand(100, 99999);

    $sql_add_commande = mysql_query("INSERT INTO `commande`(`idcommande`, `idmenu`, `num_commande`, `date_commande`, `iduser`, `montant_total`)
VALUES (NULL,'$idmenu','$num_commande','','$iduser','0')")or die(mysql_error());

    //Import commande pour redirection
    $sql_import_commande = mysql_query("SELECT * FROM commande WHERE num_commande = '$num_commande'")or die(mysql_error());
    $import_commande = mysql_fetch_array($sql_import_commande);
    $idcommande = $import_commande['idcommande'];

    if($sql_add_commande == TRUE)
    {
        header("Location: ../../module/commande/view.php?idcommande=$idcommande");
    }else{
        header("Location: ../../module/commande/inde.php?add-commande=false");
    }

}