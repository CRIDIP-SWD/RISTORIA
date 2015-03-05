<?php
include('../../../../inc/config.php');
include('../../../../inc/db.conf.php');
BaseConnect();
$sql_import_centre = mysql_query("SELECT * FROM setting WHERE idsetting = 1")or die(mysql_error());
$import_centre = mysql_fetch_array($sql_import_centre);
$date_commande1 = strtotime($_POST['date_commande1']);
$date_commande2 = strtotime($_POST['date_commande2']);

/**
 * HTML2PDF Librairy - example
 *
 * HTML => PDF convertor
 * distributed under the LGPL License
 *
 * @author      Laurent MINGUET <webmaster@html2pdf.fr>
 *
 * isset($_GET['vuehtml']) is not mandatory
 * it allow to display the result in the HTML format
 */

    // get the HTML
    ob_start();
?>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="../../../../inc/control/pdf/styles/pdf.css">
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
                Commande à effectuer auprès d'un prestataire
            </td>
        </tr>
    </table>

    <div style="padding-top: 15px; padding-bottom: 15px;"></div>
    <div style="font-size: 35px; text-align: center;">Du <?php echo date("d-m-Y", $date_commande1); ?> au <?php echo date("d-m-Y", $date_commande2); ?></div>
    <div style="padding-top: 15px; padding-bottom: 15px;"></div>

    <table cellspacing="0" style="width: 100%; border: solid 2px; border-radius: 5px 5px 5px 5px;">
        <tr>
            <th style="width: 50%; text-align: center; border: solid 1px; height: 25px;">Article</th>
            <th style="width: 50%; text-align: center; border: solid 1px; height: 25px;">Quantité</th>
        </tr>
        <?php
        $sql_commande = mysql_query("SELECT * FROM commande, article_commande, article WHERE article_commande.idcommande = commande.idcommande
            AND article_commande.idarticle = article.idarticle
            AND commande.date_commande between '$date_commande1' and '$date_commande2'")or die(mysql_error());
        while($donnee_commande = mysql_fetch_array($sql_commande))
        {
        ?>
        <tr>
            <td style="padding-left: 5px; border: solid 1px; padding-top: 10px; padding-bottom: 10px;">
                <?php echo $donnee_commande['designation_article']; ?>
            </td>
            <td style="padding-left: 5px; border: solid 1px; padding-top: 10px; padding-bottom: 10px; text-align: center;">
                <?php
                $sql_count_qte = mysql_query("SELECT SUM(qte) FROM article_commande, article WHERE article_commande.idarticle = article.idarticle AND article.idarticle =".$donnee_commande['idarticle'])or die(mysql_error());
                echo mysql_result($sql_count_qte, 0);
                ?>
            </td>
            
        </tr>
        <?php } ?>
    </table>

</body>
</html>
<?php
    $content = ob_get_clean();

    // convert in PDF
    require_once('../../../../inc/control/pdf/html2pdf.class.php');
    try
    {
        $html2pdf = new HTML2PDF('L', 'A4', 'fr');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('exemple01.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
?>