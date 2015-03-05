<?php 
include ('../db.conf.php');
BaseConnect();
 ?>

<?php
//Nouvelle Commande Utilisateur
if(isset($_POST['add-commande-valid']) && $_POST['add-commande-valid'] == 'Valider')
{
	$iduser = $_POST['iduser'];
	$num_commande = "ORD.UTS.".rand(100,9999);
	$idmenu = $_POST['idmenu'];
	$date_commande = strtotime(date("d-m-Y"));

	$sql_add_commande = mysql_query("INSERT INTO `commande`(`idcommande`, `num_commande`, `idmenu`, `iduser`, `date_commande`, `etat_commande`, `montant_total`, `regle`) 
		VALUES (NULL,'$num_commande','$idmenu','$iduser','$date_commande','0','0','0')")or die(mysql_error());

	$sql_import_cmd = mysql_query("SELECT * FROM commande WHERE num_commande = '$num_commande'")or die(mysql_error());
	$import_cmd = mysql_fetch_array($sql_import_cmd);
	$idcommande = $import_cmd['idcommande'];

	if($sql_add_commande == TRUE)
	{
		header("Location: ../../module/commande/view.php?idcommande=$idcommande&add-commande=true");
	}else{
		header("Location: ../../module/commande/index.php?iduser=$iduser&add-commande=false");
	}

}
?>
<?php
//Validation de la commande
if(isset($_GET['valid-commande']) && $_GET['valid-commande'] == 'valider')
{
	$idcommande = $_GET['idcommande'];

	$sql_up_commande = mysql_query("UPDATE commande SET etat_commande = '1' WHERE idcommande = '$idcommande'")or die(mysql_error());

	if($sql_up_commande == TRUE)
	{
		header("Location: ../../module/commande/view.php?idcommande=$idcommande&valid-commande=true");
	}else{
		header("Location: ../../module/commande/view.php?idcommande=$idcommande&valid-commande=false");
	}
}
?>

<?php
//Ajout d'un article
if(isset($_POST['add-article-valid']) && $_POST['add-article-valid'] == 'Valider')
{
	$idcommande = $_POST['idcommande'];
	$idarticle = $_POST['idarticle'];
	$qte = $_POST['qte'];

	//import
	$sql_article = mysql_query("SELECT * FROM article WHERE idarticle = '$idarticle'")or die(mysql_error());
	$donnee_article = mysql_fetch_array($sql_article);

	$sql_commande = mysql_query("SELECT * FROM commande WHERE idcommande = '$idcommande'")or die(mysql_error());
	$donnee_commande = mysql_fetch_array($sql_commande);

	$idfamillearticle = $donnee_article['idfamillearticle'];
	$prix_unitaire = $donnee_article['prix_unitaire'];

	$montant_total = $donnee_commande['montant_total'];

	//calcul total ligne commande
	$calc_ligne_total = $prix_unitaire*$qte;
	$calc_up_total = $montant_total+$calc_ligne_total;

	$sql_add_article = mysql_query("INSERT INTO `article_commande`(`idarticlecommande`, `idcommande`, `idfamillearticle`, `idarticle`, `qte`, `prix_total_commande`) 
		VALUES (NULL,'$idcommande','$idfamillearticle','$idarticle','$qte','$calc_ligne_total')")or die(mysql_error());

	$sql_up_commande = mysql_query("UPDATE commande SET montant_total = '$calc_up_total' WHERE idcommande = '$idcommande'")or die(mysql_error());

	if($sql_add_article == TRUE)
	{
		header("Location: ../../module/commande/view.php?idcommande=$idcommande&add-article=true");
	}else{
		header("Location: ../../module/commande/view.php?idcommande=$idcommande&add-article=false");
	}


}
?>

<?php
//suppression de l'article
if(isset($_GET['supp-article']) && $_GET['supp-article'] == 'valider')
{
	$idcommande = $_GET['idcommande'];
	$prix_total_commande = $_GET['prix_total_commande'];
	$montant_total = $_GET['montant_total'];
	$idarticlecommande = $_GET['idarticlecommande'];

	//Update du solde de la commande
	$calc_up_total = $montant_total-$prix_total_commande;

	$sql_up_commande = mysql_query("UPDATE commande SET montant_total = '$calc_up_total' WHERE idcommande = '$idcommande'")or die(mysql_error());

	$sql_del_article_cmd = mysql_query("DELETE FROM article_commande WHERE idarticlecommande = '$idarticlecommande'")or die(mysql_error());

	if($sql_del_article_cmd == TRUE)
	{
		header("Location: ../../module/commande/view.php?idcommande=$idcommande&supp-article=true");
	}else{
		header("Location: ../../module/commande/view.php?idcommande=$idcommande&supp-article=false");
	}
}