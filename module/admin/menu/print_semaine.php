<?php
include('../../../inc/config.php');
include('../../../inc/db.conf.php');
$date_debut = strtotime($_POST['date_debut']);
$date_fin = strtotime($_POST['date_fin']);
$sql_import_centre = mysql_query("SELECT * FROM setting WHERE idsetting = 1")or die(mysql_error());
$import_centre = mysql_fetch_array($sql_import_centre);

ob_start();
?>
    <html>
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="../../../inc/control/pdf/styles/pdf.css">
    </head>
    <body>
    <table style="width: 100%;">
        <tr>
            <td style="width: 50%">
                <div style="font-size: 45px; font-weight: bold;"><?php echo $import_centre['raison_social']; ?></div>
                <p>
                    <?php echo $import_centre['adresse']; ?><br>
                    <?php echo $import_centre['code_postal']; ?> <?php echo $import_centre['ville']; ?><br>
                    <strong>Téléphone:</strong> <?php echo $import_centre['telephone']; ?><br>
                    <strong>Adresse Mail:</strong> <?php echo $import_centre['email']; ?>
                </p>
            </td>
            <td style="text-align: right; width: 50%; position: relative; top: -50px; font-size: 35px; font-weight: bolder; color: grey;">
                RECAPITULATIF DES ARTICLES COMMANDER DU <?= date("d-m-Y", $date_debut); ?> AU <?= date("d-m-Y", $date_fin); ?>
            </td>
        </tr>
    </table>

    <div style="padding-top: 15px; padding-bottom: 15px;"></div>
    <?php
    $sql_menu = mysql_query("SELECT * FROM menu WHERE date_menu >= '$date_debut' AND date_menu <= '$date_fin'")or die(mysql_error());
    while($donnee_menu = mysql_fetch_array($sql_menu)):
        $idmenu = $donnee_menu['idmenu'];
    ?>
        <h2>MENU DU <?= date("d-m-Y", $donnee_menu['date_menu']); ?></h2>
    <table cellspacing="0" style="width: 100%; border: solid 2px; border-radius: 10px 10px 10px 10px;">
        <tr>
            <th style="width: 50%; text-align: center; height: 20px;">Désignation</th>
            <th style="width: 10%; text-align: center; height: 20px;">Tarif Unitaire</th>
            <th style="width: 10%; text-align: center; height: 20px;">Quantité Commander</th>
            <th style="width: 30%; text-align: center; height: 20px;">Salarié</th>
        </tr>
        <?php
        $sql_article = mysql_query("SELECT * FROM article WHERE idmenu = '$idmenu'")or die(mysql_error());
        while($donnee_article = mysql_fetch_array($sql_article))
        {
            ?>
            <tr>
                <td style="padding-left: 5px; padding-bottom: 5px; padding-top: 5px; border: solid 1px; width: 50%;">
                    <?php echo $donnee_article['designation']; ?>
                </td>
                <td style="padding-left: 5px; padding-bottom: 5px; padding-top: 5px; border: solid 1px; width: 10%; text-align: center;">
                    <?= number_format($donnee_article['prix_unitaire'], 2, ',', ' ')." €"; ?>
                </td>
                <td style="padding-left: 5px; padding-bottom: 5px; padding-top: 5px; border: solid 1px; width: 10%; text-align: center;">
                    <?php
                    $sql_sum_qte_article = mysql_query("SELECT SUM(qte) FROM article_commande WHERE idarticle = ".$donnee_article['idarticle'])or die(mysql_error());
                    echo mysql_result($sql_sum_qte_article, 0);
                    ?>
                </td>
                <td style="padding-left: 5px; padding-bottom: 5px; padding-top: 5px; border: solid 1px; width: 10%; text-align: center;">
                    <?php
                    $sql_article_cmd = mysql_query("SELECT * FROM article_commande WHERE idarticle = ".$donnee_article['idarticle'])or die(mysql_error());
                    while($article_cmd = mysql_fetch_array($sql_article_cmd)):
                        ?>
                        <?= $article_cmd['nom_salarie']; ?> (<?= $article_cmd['qte']; ?>),
                    <?php endwhile; ?>
                </td>
            </tr>
        <?php } ?>
    </table>
    <?php endwhile; ?>
    <page_footer>
        <div style="text-align: right; font-weight: bold;">
            page [[page_cu]]/[[page_nb]]
        </div>
    </page_footer>


    </body>
    </html>
<?php
$content = ob_get_clean();

// convert in PDF
require_once('../../../inc/control/pdf/html2pdf.class.php');
try
{
    $html2pdf = new HTML2PDF('P', 'A4', 'fr');
    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
    $html2pdf->Output('exemple01.pdf');
}
catch(HTML2PDF_exception $e) {
    echo $e;
    exit;
}
?>