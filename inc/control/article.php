<?php
include('../db.conf.php');
BaseConnect();
?>
<?php
//Suppression de l'article
if(isset($_GET['supp-article']) && $_GET['supp-article'] == 'valider')
{
	$idarticle = $_GET['idarticle'];

	//Verification de l'utilite de l'articles
	$sql_verif_util_art = mysql_query("SELECT SUM(idarticle) FROM article_menu")or die(mysql_error());
	$verif_util_art = mysql_result($sql_verif_util_art, 0);
		$sql_delete_article = mysql_query("DELETE FROM article WHERE idarticle = '$idarticle'")or die(mysql_error());

		if($sql_delete_article == TRUE)
		{
			header("Location: ../../module/admin/article/index.php?supp-article=true");
		}else{
			header("Location: ../../module/admin/article/index.php?supp-article=false");
		}
}

?>
<?php
//Ajout de l'article
if(isset($_POST['add-article']) && $_POST['add-article'] == 'Valider')
{
	$idfamillearticle = $_POST['idfamillearticle'];
	$designation_article = htmlentities(addslashes($_POST['designation_article']));
	$description_article = htmlentities(addslashes($_POST['description_article']));
	$prix_unitaire = $_POST['prix_unitaire'];

	$sql_add_article = mysql_query("INSERT INTO `article`(`idarticle`, `idfamillearticle`, `designation_article`, `description_article`, `prix_unitaire`) 
		VALUES (NULL,'$idfamillearticle','$designation_article','$description_article','$prix_unitaire')")or die(mysql_error());

	if($sql_add_article == TRUE)
		{
			header("Location: ../../module/admin/article/index.php?add-article=true");
		}else{
			header("Location: ../../module/admin/article/index.php?add-article=false");
		}

}

?>