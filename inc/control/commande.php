<?php
include ('../db.conf.php');
?>
<?php
//Création de la commande
if(isset($_POST['add-commande-control']) && $_POST['add-commande-control'] == 'Valider')
{
    $idmenu = $_POST['idmenu'];
    $iduser = $_POST['iduser'];
    $num_commande = "ORD.UTS.".rand(100, 99999);

    $sql_import_menu = mysql_query("SELECT * FROM menu WHERE idmenu = '$idmenu'")or die(mysql_error());
    $import_menu = mysql_fetch_array($sql_import_menu);
    $date_menu = $import_menu['date_menu'];

    $sql_add_commande = mysql_query("INSERT INTO `commande`(`idcommande`, `idmenu`, `num_commande`, `date_commande`, `iduser`, `montant_total`)
VALUES (NULL,'$idmenu','$num_commande','$date_menu','$iduser','0')")or die(mysql_error());

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
//Ajout d'un article à la commande
if(isset($_POST['add-article-control']) && $_POST['add-article-control'] == 'Valider')
{
    $idcommande = $_POST['idcommande'];
    $idarticle = $_POST['idarticle'];
    $qte = $_POST['qte'];

    //Import base commande & Article
    $sql_import_commande = mysql_query("SELECT * FROM commande, utilisateur WHERE commande.iduser = utilisateur.iduser AND idcommande = '$idcommande'")or die(mysql_error());
    $import_commande = mysql_fetch_array($sql_import_commande);
    $montant_total = $import_commande['montant_total'];
    $nom_salarie = $import_commande['nom_salarie'];

    $sql_import_article = mysql_query("SELECT * FROM article WHERE idarticle = '$idarticle'")or die(mysql_error());
    $import_article = mysql_fetch_array($sql_import_article);
    $prix_unitaire = $import_article['prix_unitaire'];

    $calc_ligne = $prix_unitaire*$qte;

    //Calcul du nouveau montant
    $calc_nouv_total = $montant_total+$calc_ligne;

    //Update commande
    $sql_up_commande = mysql_query("UPDATE commande SET montant_total = '$calc_nouv_total' WHERE idcommande = '$idcommande'")or die(mysql_error());

    //Ajout de l'article

    $sql_add_article = mysql_query("INSERT INTO `article_commande`(`idarticlecommande`, `idcommande`, `idarticle`, `qte`, `total_ligne`, `nom_salarie`)
                        VALUES (NULL,'$idcommande','$idarticle','$qte','$calc_ligne', '$nom_salarie')")or die(mysql_error());

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
<?php
if(isset($_GET['action']) && $_GET['action'] == 'valider_commande')
{
    $idcommande = $_GET['idcommande'];

    $sql_up = mysql_query("UPDATE commande SET etat_commande = 1 WHERE idcommande = '$idcommande'")or die(mysql_error());

    if($sql_up == TRUE){
        header("Location: ../../module/commande/view.php?idcommande=$idcommande&valider_commande=true");
    }else{
        header("Location: ../../module/commande/view.php?idcommande=$idcommande&valider_commande=false");
    }
}
?>

<?php
if(isset($_POST['action']) && $_POST['action'] == 'edit-password'){
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $iduser = $_POST['iduser'];
    $en_old_password = md5($old_password);
    $en_new_password = md5($new_password);

    $sql_user = mysql_query("SELECT * FROM utilisateur WHERE iduser = $iduser");
    $user = mysql_fetch_array($sql_user);

    if($user['pass_md5'] == $en_old_password){
        $sql_update = mysql_query("UPDATE utilisateur SET pass_md5 = $en_new_password, pass_clear = $new_password WHERE iduser = $iduser");
        if($sql_update == TRUE){
            header("Location: ../../module/commande/mdp.php?iduser=$iduser&edit-password=true");
        }else{
            header("Location: ../../module/commande/mdp.php?iduser=$iduser&edit-password=false");
        }
    }else{
        header("Location: ../../module/commande/mdp.php?iduser=$iduser&edit-password=warning");
    }
}
