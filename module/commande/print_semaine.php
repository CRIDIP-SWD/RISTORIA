<?php
include('../../inc/config.php');
include('../../inc/db.conf.php');
$date_debut = strtotime($_POST['date_debut']);
$date_fin = strtotime($_POST['date_fin']);
$sql_import_centre = mysql_query("SELECT * FROM setting WHERE idsetting = 1")or die(mysql_error());
$import_centre = mysql_fetch_array($sql_import_centre);
$sql_commande = mysql_query("SELECT * FROM commande, utilisateur WHERE commande.iduser = utilisateur.iduser AND date_commande >= '$date_debut' AND date_commande <= '$date_fin'")or die(mysql_error());
while($commande = mysql_fetch_array($sql_commande)):
    $idcommande = $commande['idcommande'];
ob_start();
?>
        <html>
        <head>
            <title></title>
            <link rel="stylesheet" type="text/css" href="../../inc/control/pdf/styles/pdf.css">
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
                    COMMANDE
                </td>
            </tr>
        </table>

        <div style="padding-top: 15px; padding-bottom: 15px;"></div>
        <table style="width:">
            <tr>
                <td>
                    <strong><?php echo $commande['nom_user']; ?> <?php echo $commande['prenom_user']; ?></strong><br>
                    <strong>Téléphone:</strong> <?php echo $commande['tel_user']; ?><br>
                    <strong>Email:</strong> <?php echo $commande['login']; ?>
                </td>
            </tr>

        </table>


        <div style="padding-top: 15px; padding-bottom: 15px;"></div>
        <div style="font-size: 20px;"><strong>N° de la commande:</strong> <?php echo $commande['num_commande']; ?></div>
        <div style="font-size: 20px;"><strong>Date de la commande:</strong> <?php echo date("d-m-Y", $commande['date_commande']); ?></div>
        <div style="padding-top: 15px; padding-bottom: 15px;"></div>

        <table cellspacing="0" style="width: 100%; border: solid 2px; border-radius: 5px 5px 5px 5px;">
            <tr>
                <th style="width: 25%; text-align: center; border: solid 1px; height: 25px;">Article</th>
                <th style="width: 25%; text-align: center; border: solid 1px; height: 25px;">Prix unitaire</th>
                <th style="width: 25%; text-align: center; border: solid 1px; height: 25px;">Quantité</th>
                <th style="width: 25%; text-align: center; border: solid 1px; height: 25px;">Prix Total</th>
            </tr>
            <?php
            $sql_article = mysql_query("SELECT * FROM article_commande, article WHERE article_commande.idarticle = article.idarticle AND idcommande = '$idcommande'")or die(mysql_error());
            while($donnee_article = mysql_fetch_array($sql_article))
            {
                ?>
                <tr>
                    <td style="width: 25%;padding-left: 5px; border: solid 1px; padding-top: 10px; padding-bottom: 10px;">
                        <?php echo $donnee_article['designation']; ?>
                    </td>
                    <td style="width: 25%;padding-left: 5px; border: solid 1px; padding-top: 10px; padding-bottom: 10px; text-align: right;">
                        <?php echo number_format($donnee_article['prix_unitaire'], 2, ',', ' ')." €"; ?>
                    </td>
                    <td style="width: 25%;text-align: center; border: solid 1px; padding-top: 10px; padding-bottom: 10px; padding-right: 10px;">
                        <?php echo $donnee_article['qte']; ?>
                    </td>
                    <td style="width: 25%;text-align: right; border: solid 1px; padding-top: 10px; padding-bottom: 10px;">
                        <?php echo number_format($donnee_article['total_ligne'], 2, ',', ' ')." €"; ?>
                    </td>
                </tr>
            <?php } ?>
            <tr>
                <td colspan="3" style="text-align: right; font-style: italic; padding-top: 5px; padding-bottom: 5px;">Total à payer</td>
                <td style="text-align: right; font-weight: bold; font-size: 15px; padding-top: 5px; padding-bottom: 5px;"><?php echo number_format($commande['montant_total'], 2, ',', ' ')." €"; ?></td>
            </tr>
        </table>

        </body>
        </html>
<?php
$content = ob_get_clean();
endwhile;
// convert in PDF
require_once('../../inc/control/pdf/html2pdf.class.php');
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