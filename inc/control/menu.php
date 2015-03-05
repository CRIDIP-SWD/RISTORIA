<?php
include('../db.conf.php');
BaseConnect();
?>
<?php 
//Ajout du Menu
if(isset($_POST['add-menu-valid']) && $_POST['add-menu-valid'] == 'Valider')
{
	$semaine = $_POST['semaine'];
	$date_menu = strtotime($_POST['date_menu']);

	$sql_add_menu = mysql_query("INSERT INTO `menu`(`idmenu`, `semaine`, `date_menu`, `etat_menu`) 
		VALUES (NULL,'$semaine','$date_menu','1')")or die(mysql_error());

	if($sql_add_menu == TRUE)
	{
		header("Location: ../../module/admin/menu/index.php?add-menu=true");
	}else{
		header("Location: ../../module/admin/menu/index.php?add-menu=false");
	}
}
?>
<?php
//Ajout d'un article dans le menu
if(isset($_POST['add-article']) && $_POST['add-article'] == 'Valider')
{
	$idmenu = $_POST['idmenu'];
	$idarticle = $_POST['idarticle'];

	//Verification que le produit ne soit pas déja insérer
	$sql_verif_article = mysql_query("SELECT SUM(idarticle) FROM article_menu WHERE idarticle = '$idarticle' AND idmenu = '$idmenu'");
	$verif_article = mysql_result($sql_verif_article, 0);

	if($verif_article == 0)
	{
		$sql_add_article_menu = mysql_query("INSERT INTO `article_menu`(`idarticlemenu`, `idmenu`, `idarticle`) 
		VALUES (NULL,'$idmenu','$idarticle')")or die(mysql_error());

		if($sql_add_article_menu == TRUE)
		{
			header("Location: ../../module/admin/menu/view.php?idmenu=$idmenu&add-article=true");
		}else{
			header("Location: ../../module/admin/menu/view.php?idmenu=$idmenu&add-article=false");
		}
	}else{
			header("Location: ../../module/admin/menu/view.php?idmenu=$idmenu&add-article=insert");
	}

}
?>
<?php
//Suppression de l'article dans le menu
if(isset($_GET['supp-article']) && $_GET['supp-article'] == 'valider')
{
	$idarticlemenu = $_GET['idarticlemenu'];
	$idmenu = $_GET['idmenu'];

	$sql_delete_article_menu = mysql_query("DELETE FROM article_menu WHERE idarticlemenu = '$idarticlemenu'")or die(mysql_error());

	if($sql_delete_article_menu == TRUE)
	{
		header("Location: ../../module/admin/menu/view.php?idmenu=$idmenu&supp-article=true");
	}else{
		header("Location: ../../module/admin/menu/view.php?idmenu=$idmenu&supp-article=false");
	}
}
?>