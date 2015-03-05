<?php
include('../db.conf.php');
BaseConnect();
?>
<?php
//Suppression de la famille
if(isset($_GET['supp-famille-article']) && $_GET['supp-famille-article'] == 'valider')
{
	$idfamillearticle = $_GET['idfamillearticle'];

	//Verification de l'utilite de la famille dans les articles
	$sql_verif_util_fam = mysql_query("SELECT SUM(idfamillearticle) FROM article")or die(mysql_error());
	$verif_util_fam = mysql_result($sql_verif_util_fam, 0);

		$sql_delete_famille = mysql_query("DELETE FROM famille_article WHERE idfamillearticle = '$idfamillearticle'")or die(mysql_error());

		if($sql_delete_famille == TRUE)
		{
			header("Location: ../../module/admin/article/index.php?supp-famille-article=true");
		}else{
			header("Location: ../../module/admin/article/index.php?supp-famille-article=false");
		}
}

?>
<?php
//Ajout d'une famille
if(isset($_POST['add-famille-article']) && $_POST['add-famille-article'] == 'Valider')
{
	$designation = htmlentities(addslashes($_POST['designation']));

	$sql_add_famille = mysql_query("INSERT INTO `famille_article`(`idfamillearticle`, `designation`) VALUES (NULL,'$designation')")or die(mysql_error());
	if($sql_add_famille == TRUE)
		{
			header("Location: ../../module/admin/article/index.php?add-famille-article=true");
		}else{
			header("Location: ../../module/admin/article/index.php?add-famille-article=false");
		}
}
?>