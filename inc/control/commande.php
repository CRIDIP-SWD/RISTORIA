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
?>

<?php
//Suppression de la commande
if(isset($_GET['supp-commande-control']) && $_GET['supp-commande-control'] == 'Valider')
{
    $idcommande = $_GET['idcommande'];
    $iduser = $_GET['iduser'];

    $sql_delete_article = mysql_query("DELETE FROM article_commande WHERE idcommande = '$idcommande'")or die(mysql_error());
    $sql_delete_commande = mysql_query("DELETE FROM commande WHERE idcommande = '$idcommande'")or die(mysql_error());

    if($sql_delete_commande == TRUE)
    {
        header("Location: ../../module/commande/index.php?iduser=$iduser&supp-commande=true");
    }else{
        header("Location: ../../module/commande/index.php?iduser=$iduser&supp-commande=false");
    }
}

?>

<?php
//Ajout de la date à la commande
if(isset($_POST['add-date-commande-control']) && $_POST['add-date-commande-control'] == 'Valider')
{
    $idcommande = $_POST['idcommande'];
    $date_commande = strtotime($_POST['date_commande']);

    $sql_add_date_commande = mysql_query("UPDATE commande SET date_commande = '$date_commande' WHERE idcommande = '$idcommande'")or die(mysql_error());

    if($sql_add_date_commande == TRUE)
    {
        header("Location: ../../module/commande/view.php?idcommande=$idcommande");
    }else{
        header("Location: ../../module/commande/view.php?idcommande=$idcommande&add-date-commande=false");
    }
}
?>

<?php
//Ajout d'un article à la commande
if(isset($_POST['add-article-control']) && $_POST['add-article-control'] == 'Valider')
{
    $idcommande = $_POST['idcommande'];
    $idarticle = $_POST['idarticle'];

    //Import base commande & Article
    $sql_import_commande = mysql_query("SELECT * FROM commande WHERE idcommande = '$idcommande'")or die(mysql_error());
    $import_commande = mysql_fetch_array($sql_import_commande);
    $montant_total = $import_commande['montant_total'];

    $sql_import_article = mysql_query("SELECT * FROM article WHERE idarticle = '$idarticle'")or die(mysql_error());
    $import_article = mysql_fetch_array($sql_import_article);
    $prix_unitaire = $import_article['prix_unitaire'];

    //Calcul du nouveau montant
    $calc_nouv_total = $montant_total+$prix_unitaire;

    //Update commande
    $sql_up_commande = mysql_query("UPDATE commande SET montant_total = '$calc_nouv_total' WHERE idcommande = '$idcommande'")or die(mysql_error());

    //Ajout de l'article

    $sql_add_article = mysql_query("INSERT INTO `article_commande`(`idarticlecommande`, `idcommande`, `idarticle`, `qte`, `total_ligne`)
                        VALUES (NULL,'$idcommande','$idarticle','1','$prix_unitaire')")or die(mysql_error());

    if($sql_add_article == TRUE)
    {
        header("Location: ../../module/commande/view.php?idcommande=$idcommande&add-article=true");
    }else{
        header("Location: ../../module/commande/view.php?idcommande=$idcommande&add-article=false");
    }
}
?>

<?php
//Suppression d'un article de la commande
if(isset($_GET['supp-article-control']) && $_GET['supp-article-control'] == 'Valider')
{
    $idarticlecommande = $_GET['idarticlecommande'];
    $idcommande = $_GET['idcommande'];
    $montant_total = $_GET['montant_total'];
    $prix_unitaire = $_GET['prix_unitaire'];

    //Calcul du nouveau total de commande
    $calc_nouv_total = $montant_total-$prix_unitaire;

    $sql_up_commande = mysql_query("UPDATE commande SET montant_total='$calc_nouv_total' WHERE idcommande = '$idcommande'")or die(mysql_error());

    $sql_delete_article_commande = mysql_query("DELETE FROM article_commande WHERE idarticlecommande = '$idarticlecommande'")or die(mysql_error());

    if($sql_delete_article_commande == TRUE)
    {
        header("Location: ../../module/commande/view.php?idcommande=$idcommande&supp-article=true");
    }else{
        header("Location: ../../module/commande/view.php?idcommande=$idcommande&supp-article=false");
    }
}
?>