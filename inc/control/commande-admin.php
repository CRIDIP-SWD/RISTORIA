<?php
include ('../db.conf.php');
BaseConnect();
?>
<?php 
//Suppression de la commande utilisateur
if(isset($_GET['supp-cmd']) && $_GET['supp-cmd'] == 'true')
{
	$idcommande = $_GET['idcommande'];

	$sql_delete_article_cmd = mysql_query("DELETE FROM article_commande WHERE idcommande = '$idcommande'")or die(mysql_error());
	$sql_delete_cmd = mysql_query("DELETE FROM commande WHERE idcommande = '$idcommande'")or die(mysql_error());

	if($sql_delete_cmd == TRUE)
	{
		header("Location: ../../module/admin/commande/user/index.php?supp-cmd=true");
	}else{
		header("Location: ../../module/admin/commande/user/index.php?supp-cmd=false");
	}
}

 ?>

 <?php
 //Ajout du reglement utilisateur
 if(isset($_POST['add-reglement']) && $_POST['add-reglement'] == 'valider')
 {
 	$idcommande = $_POST['idcommande'];
 	$type_reglement = $_POST['type_reglement'];
 	$date_reglement = strtotime($_POST['date_reglement']);
 	$montant_reglement = $_POST['montant_reglement'];
 	$porteur_chq = $_POST['porteur_chq'];
 	$num_chq = $_POST['num_chq'];
 	$banque_chq = $_POST['banque_chq'];

 	$sql_add_reglement = mysql_query("INSERT INTO `reglement_commande`(`idreglement`, `idcommande`, `type_reglement`, `date_reglement`, `montant_reglement`, `porteur_chq`, `num_chq`, `banque_chq`) 
 		VALUES (NULL,'$idcommande','$type_reglement','$date_reglement','$montant_reglement','$porteur_chq','$num_chq','$banque_chq')")or die(mysql_error());

 	$sql_up_cmd = mysql_query("UPDATE commande SET regle = '1' WHERE idcommande = '$idcommande'")or die(mysql_error());

 	if($sql_add_reglement == TRUE)
 	{
 		header("Location: ../../module/admin/commande/user/view.php?idcommande=$idcommande&add-reglement=success");
 	}else{
 		header("Location: ../../module/admin/commande/user/view.php?idcommande=$idcommande&add-reglement=error");
 	}
 }


 ?>
<?php
//change etat commande user = envoie prestataire
if(isset($_GET['envoie-prestataire']) && $_GET['envoie-prestataire'] == 'valider')
{
	$idcommande = $_GET['idcommande'];

	$sql_etat_commande = mysql_query("UPDATE commande SET etat_commande = '2' WHERE idcommande = '$idcommande'")or die(mysql_error());

	if($sql_etat_commande == TRUE)
	{
		header("Location: ../../module/admin/commande/user/view.php?idcommande=$idcommande&envoie-prestataire=true");
	}else{
		header("Location: ../../module/admin/commande/user/view.php?idcommande=$idcommande&envoie-prestataire=false");
	}
}
if(isset($_GET['disponible']) && $_GET['disponible'] == 'valider')
{
	$idcommande = $_GET['idcommande'];

	$sql_etat_commande = mysql_query("UPDATE commande SET etat_commande = '3' WHERE idcommande = '$idcommande'")or die(mysql_error());

	if($sql_etat_commande == TRUE)
	{
		header("Location: ../../module/admin/commande/user/view.php?idcommande=$idcommande&disponible=true");
	}else{
		header("Location: ../../module/admin/commande/user/view.php?idcommande=$idcommande&disponible=false");
	}

}
?>
<?php
//Suppression ligne article commande user
if(isset($_GET['supp-article']) && $_GET['supp-article'] == 'valider')
{
	$idarticlecommande = $_GET['idarticlecommande'];
	$idcommande = $_GET['idcommande'];
	$prix_total_commande = $_GET['prix_total_commande'];
	$montant_total = $_GET['montant_total'];


	//calcul
	$calc_montant_total = $montant_total-$prix_total_commande;


	$sql_up_commande = mysql_query("UPDATE commande SET montant_total = '$calc_montant_total' WHERE idcommande = '$idcommande'")or die(mysql_error());
	$sql_delete_article = mysql_query("DELETE FROM article_commande WHERE idarticlecommande = '$idarticlecommande'")or die(mysql_error());

	if($sql_delete_article == TRUE)
	{
		header("Location: ../../module/admin/commande/user/view.php?idcommande=$idcommande&supp-article=true");
	}else{
		header("Location: ../../module/admin/commande/user/view.php?idcommande=$idcommande&supp-article=false");
	}
}

?>
<?php
//Suppression de la ligne de reglement commande user
if(isset($_GET['supp-reglement']) && $_GET['supp-reglement'] == 'valider')
{
	$idcommande = $_GET['idcommande'];
	$idreglement = $_GET['idreglement'];

	$sql_delete_reglement = mysql_query("DELETE FROM reglement_commande WHERE idreglement = '$idreglement'")or die(mysql_error());

	if($sql_delete_reglement == TRUE)
	{
		header("Location: ../../module/admin/commande/user/view.php?idcommande=$idcommande&supp-reglement=true");
	}else{
		header("Location: ../../module/admin/commande/user/view.php?idcommande=$idcommande&supp-reglement=false");
	}
}

?>
<?php
//Suppression de la commande Prestataire
if(isset($_GET['supp-cmd-presta']) && $_GET['supp-cmd-presta'] == 'true')
{
	$idcomprestataire = $_GET['idcomprestataire'];

	$sql_delete_cmd_article_presta = mysql_query("DELETE FROM article_commande_prestataire WHERE idcomprestataire = '$idcomprestataire'")or die(mysql_error());
	$sql_delete_cmd_presta = mysql_query("DELETE FROM commande_prestataire WHERE idcomprestataire = '$idcomprestataire'")or die(mysql_error());

	if($sql_delete_cmd_presta == TRUE)
	{
		header("Location: ../../module/admin/commande/presta/index.php?supp-cmd-presta=true");
	}else{
		header("Location: ../../module/admin/commande/presta/index.php?supp-cmd-presta=false");
	}
}
?>

<?php
// Nouvelle Commande Prestataire
if(isset($_POST['add-cmd-presta']) && $_POST['add-cmd-presta'] == 'valider')
{
	$num_commande = "ORD.PR.".rand(100,9999);
	$idprestataire = $_POST['idprestataire'];
	$date_commande = strtotime($_POST['date_commande']);

	$sql_add_cmd_presta = mysql_query("INSERT INTO `commande_prestataire`(`idcomprestataire`, `num_commande`, `idprestataire`, `date_commande`, `montant_total`, `etat_commande`) 
		VALUES (NULL,'$num_commande','$idprestataire','$date_commande','0','0')");

	$sql_import_cmd_presta = mysql_query("SELECT * FROM commande_prestataire WHERE num_commande = '$num_commande'")or die(mysql_error());
	$import_cmd_presta = mysql_fetch_array($sql_import_cmd_presta);
	$idcomprestataire = $import_cmd_presta['idcomprestataire'];

	if($sql_add_cmd_presta == TRUE)
	{
		header("Location: ../../module/admin/commande/presta/view.php?idcomprestataire=$idcomprestataire&add-cmd-presta=true");
	}else{
		header("Location: ../../module/admin/commande/presta/index.php?add-cmd-presta=false");
	}
}
?>

<?php
//Ajout d'article commande prestataire
if(isset($_POST['add-article']) && $_POST['add-article'] == 'valider')
{
	$idcomprestataire = $_POST['idcomprestataire'];
	$idarticle = $_POST['idarticle'];
	$qte = $_POST['qte'];

	//Import base article et famille article
	$sql_import_article = mysql_query("SELECT * FROM article, famille_article WHERE article.idfamillearticle = famille_article.idfamillearticle
		AND article.idarticle = '$idarticle'")or die(mysql_error());
	$import_article = mysql_fetch_array($sql_import_article);
	$idfamillearticle = $import_article['idfamillearticle'];
	$prix_unitaire = $import_article['prix_unitaire'];

	//Import commande
	$sql_import_commande = mysql_query("SELECT * FROM commande_prestataire WHERE idcomprestataire = '$idcomprestataire'")or die(mysql_error());
	$import_commande = mysql_fetch_array($sql_import_commande);
	$montant_total = $import_commande['montant_total'];


	//Calcul du prix total de la ligne
	$calc_total_ligne = $prix_unitaire*$qte;
	$calc_total_commande = $montant_total+$calc_total_ligne;

	$sql_up_total_commande = mysql_query("UPDATE commande_prestataire SET montant_total = '$calc_total_commande' WHERE idcomprestataire = '$idcomprestataire'")or die(mysql_error());

	$sql_add_article = mysql_query("INSERT INTO `article_commande_prestataire`(`idarticlecompresta`, `idcomprestataire`, `idfamillearticle`, `idarticle`, `qte`, `prix_total_commande`) 
		VALUES (NULL,'$idcomprestataire','$idfamillearticle','$idarticle','$qte','$calc_total_ligne')")or die(mysql_error());

	if($sql_add_article == TRUE)
	{
		header("Location: ../../module/admin/commande/presta/view.php?idcomprestataire=$idcomprestataire&add-article=true");
	}else{
		header("Location: ../../module/admin/commande/presta/view.php?idcomprestataire=$idcomprestataire$add-article=false");
	}
}
?>

<?php
//change etat commande prestataire 1
if(isset($_GET['change-etat']) && $_GET['change-etat'] == '1')
{
	$idcomprestataire = $_GET['idcomprestataire'];

	$sql_up_etat_1 = mysql_query("UPDATE commande_prestataire SET etat_commande = '1' WHERE idcomprestataire = '$idcomprestataire'")or die(mysql_error());

	if($sql_up_etat_1 == TRUE)
	{
		header("Location: ../../module/admin/commande/presta/view.php?idcomprestataire=$idcomprestataire&change-etat-1=true");
	}else{
		header("Location: ../../module/admin/commande/presta/view.php?idcomprestataire=$idcomprestataire&change-etat-1=false");
	}
}
//change etat commande prestataire 2
if(isset($_GET['change-etat']) && $_GET['change-etat'] == '2')
{
	$idcomprestataire = $_GET['idcomprestataire'];

	$sql_up_etat_2 = mysql_query("UPDATE commande_prestataire SET etat_commande = '2' WHERE idcomprestataire = '$idcomprestataire'")or die(mysql_error());

	if($sql_up_etat_2 == TRUE)
	{
		header("Location: ../../module/admin/commande/presta/view.php?idcomprestataire=$idcomprestataire&change-etat-2=true");
	}else{
		header("Location: ../../module/admin/commande/presta/view.php?idcomprestataire=$idcomprestataire&change-etat-2=false");
	}
}
//change etat commande prestataire 3
if(isset($_GET['change-etat']) && $_GET['change-etat'] == '3')
{
	$idcomprestataire = $_GET['idcomprestataire'];

	$sql_up_etat_3 = mysql_query("UPDATE commande_prestataire SET etat_commande = '3' WHERE idcomprestataire = '$idcomprestataire'")or die(mysql_error());

	if($sql_up_etat_3 == TRUE)
	{
		header("Location: ../../module/admin/commande/presta/view.php?idcomprestataire=$idcomprestataire&change-etat-3=true");
	}else{
		header("Location: ../../module/admin/commande/presta/view.php?idcomprestataire=$idcomprestataire&change-etat-3=false");
	}
}
//change etat commande prestataire 4
if(isset($_GET['change-etat']) && $_GET['change-etat'] == '4')
{
	$idcomprestataire = $_GET['idcomprestataire'];

	$sql_up_etat_4 = mysql_query("UPDATE commande_prestataire SET etat_commande = '4' WHERE idcomprestataire = '$idcomprestataire'")or die(mysql_error());

	if($sql_up_etat_4 == TRUE)
	{
		header("Location: ../../module/admin/commande/presta/view.php?idcomprestataire=$idcomprestataire&change-etat-4=true");
	}else{
		header("Location: ../../module/admin/commande/presta/view.php?idcomprestataire=$idcomprestataire&change-etat-4=false");
	}
}
?>
<?php
//Suppression ligne article commande Prestataire
if(isset($_GET['supp-art-cmd-presta']) && $_GET['supp-art-cmd-presta'] == 'valider')
{
	$idcomprestataire = $_GET['idcomprestataire'];
	$prix_total_commande = $_GET['prix_total_commande'];
	$montant_total = $_GET['montant_total'];
	$idarticlecompresta = $_GET['idarticlecompresta'];

	//calcul nouveau total commande
	$calc_montant_total = $montant_total-$prix_total_commande;

	$sql_up_commande = mysql_query("UPDATE commande_prestataire SET montant_total = '$calc_montant_total' WHERE idcomprestataire = '$idcomprestataire'")or die(mysql_error());
	$sql_delete_article = mysql_query("DELETE FROM article_commande_prestataire WHERE idarticlecompresta = '$idarticlecompresta'")or die(mysql_error());

	if($sql_delete_article == TRUE)
	{
		header("Location: ../../module/admin/commande/presta/view.php?idcomprestataire=$idcomprestataire&supp-article=true");
	}else{
		header("Location: ../../module/admin/commande/presta/view.php?idcomprestataire=$idcomprestataire&supp-article=false");
	}

}

?>
