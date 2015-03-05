<?php 
include('../db.conf.php');
BaseConnect();
?>

<?php
if(isset($_GET['purge']) && $_GET['purge'] == 'valider')
{
	$sql_del_article = mysql_query("DELETE FROM article")or die(mysql_error());
	$sql_del_article_cmd = mysql_query("DELETE FROM article_commande")or die(mysql_error());
	$sql_del_article_cmd_presta = mysql_query("DELETE FROM article_commande_prestataire")or die(mysql_error());
	$sql_del_article_menu = mysql_query("DELETE FROM article_menu")or die(mysql_error());
	$sql_del_cmd = mysql_query("DELETE FROM commande")or die(mysql_error());
	$sql_del_cmd_presta = mysql_query("DELETE FROM commande_prestataire")or die(mysql_error());
	$sql_del_fam_article = mysql_query("DELETE FROM famille_article")or die(mysql_error());
	$sql_del_menu = mysql_query("DELETE FROM menu")or die(mysql_error());
	$sql_del_prestataire = mysql_query("DELETE FROM prestataire")or die(mysql_error());
	$sql_del_rglt_cmd = mysql_query("DELETE FROM reglement_commande")or die(mysql_error());

	if($sql_del_article == TRUE && 
	   $sql_del_article_cmd == TRUE && 
	   $sql_del_article_cmd_presta == TRUE &&
	   $sql_del_article_menu == TRUE &&
	   $sql_del_cmd == TRUE &&
	   $sql_del_cmd_presta == TRUE &&
	   $sql_del_fam_article == TRUE &&
	   $sql_del_menu == TRUE &&
	   $sql_del_prestataire == TRUE &&
	   $sql_del_rglt_cmd == TRUE)
	{
		header("Location: ../../module/admin/setting/purge.php?purge=true");
	}else{
		header("Location: ../../module/admin/setting/purge.php?purge=false");
	}
}