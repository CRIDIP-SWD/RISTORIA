<?php include ('../../inc/header.php'); ?>
<?php
$idcommande = $_GET['idcommande'];
$sql_commande = mysql_query("SELECT * FROM commande WHERE idcommande = '$idcommande'")or die(mysql_error());
$donnee_commande = mysql_fetch_array($sql_commande);
$idmenu = $donnee_commande['idmenu'];
?>
<?php
define("TITLE_PAGE", "COMMANDE UTILISATEUR");
define("SUBTITLE_PAGE", "COMMANDE N° ".$donnee_commande['num_commande']."- Total Commande:".$donnee_commande['montant_total']);
//Breadcumb
$li_start = "<li>".$logiciel."</li>";
$li1 = "";
$li2 = "";
$li3 = "";
$li4 = "";
$li_end = "<li><a href='#'>".TITLE_PAGE."</a></li>";
?>
    <body>
        <!-- Preloader -->
        <!-- Preloader functionality (initialized in js/app.js) - pageLoading() -->
        <!-- Used only if page preloader is enabled from inc/config (PHP version) or the class 'page-loading' is added in body element (HTML version) -->
        <div class="preloader themed-background">
            <h1 class="push-top-bottom text-light text-center"><strong>Pro</strong>UI</h1>
            <div class="inner">
                <h3 class="text-light visible-lt-ie9 visible-lt-ie10"><strong>Loading..</strong></h3>
                <div class="preloader-spinner hidden-lt-ie9 hidden-lt-ie10"></div>
            </div>
        </div>
        <!-- END Preloader -->

        <!-- Page Container -->
        <!-- In the PHP version you can set the following options from inc/config file -->
        <!--
            Available #page-container classes:

            '' (None)                                       for a full main and alternative sidebar hidden by default (> 991px)

            'sidebar-visible-lg'                            for a full main sidebar visible by default (> 991px)
            'sidebar-partial'                               for a partial main sidebar which opens on mouse hover, hidden by default (> 991px)
            'sidebar-partial sidebar-visible-lg'            for a partial main sidebar which opens on mouse hover, visible by default (> 991px)

            'sidebar-alt-visible-lg'                        for a full alternative sidebar visible by default (> 991px)
            'sidebar-alt-partial'                           for a partial alternative sidebar which opens on mouse hover, hidden by default (> 991px)
            'sidebar-alt-partial sidebar-alt-visible-lg'    for a partial alternative sidebar which opens on mouse hover, visible by default (> 991px)

            'sidebar-partial sidebar-alt-partial'           for both sidebars partial which open on mouse hover, hidden by default (> 991px)

            'sidebar-no-animations'                         add this as extra for disabling sidebar animations on large screens (> 991px) - Better performance with heavy pages!

            'style-alt'                                     for an alternative main style (without it: the default style)
            'footer-fixed'                                  for a fixed footer (without it: a static footer)

            'disable-menu-autoscroll'                       add this to disable the main menu auto scrolling when opening a submenu

            'header-fixed-top'                              has to be added only if the class 'navbar-fixed-top' was added on header.navbar
            'header-fixed-bottom'                           has to be added only if the class 'navbar-fixed-bottom' was added on header.navbar
        -->
        <div id="page-container" class="sidebar-partial sidebar-visible-lg sidebar-no-animations">
            <!-- Alternative Sidebar -->
            <div id="sidebar-alt">
                <!-- Wrapper for scrolling functionality -->
                <div class="sidebar-scroll">
                    <!-- Sidebar Content -->
                    <div class="sidebar-content">
                        <?php //include ('inc/chat.php'); ?>

                        <?php include ('../../../inc/activity.php'); ?>

                        <?php include ('../../../inc/message_ui.php'); ?>
                    </div>
                    <!-- END Sidebar Content -->
                </div>
                <!-- END Wrapper for scrolling functionality -->
            </div>
            <!-- END Alternative Sidebar -->

            <?php include ('../../inc/sidebar.php'); ?>

            <!-- Main Container -->
            <div id="main-container">
                <!-- Header -->
                <!-- In the PHP version you can set the following options from inc/config file -->
                <!--
                    Available header.navbar classes:

                    'navbar-default'            for the default light header
                    'navbar-inverse'            for an alternative dark header

                    'navbar-fixed-top'          for a top fixed header (fixed sidebars with scroll will be auto initialized, functionality can be found in js/app.js - handleSidebar())
                        'header-fixed-top'      has to be added on #page-container only if the class 'navbar-fixed-top' was added

                    'navbar-fixed-bottom'       for a bottom fixed header (fixed sidebars with scroll will be auto initialized, functionality can be found in js/app.js - handleSidebar()))
                        'header-fixed-bottom'   has to be added on #page-container only if the class 'navbar-fixed-bottom' was added
                -->
                <?php include ('../../inc/headerbar.php'); ?>

                <!-- Page content -->
                <div id="page-content">
                    <!-- Blank Header -->
                    <div class="content-header">
                        <div class="header-section">
                            <h1>
                                <i class="gi gi-user"></i><?php echo TITLE_PAGE; ?><br><small><?php echo SUBTITLE_PAGE; ?></small>
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                        <?php
                        if(empty($li_start)){echo "";}else{echo $li_start;}
                        if(empty($li1)){echo "";}else{echo $li1;}
                        if(empty($li2)){echo "";}else{echo $li2;}
                        if(empty($li3)){echo "";}else{echo $li3;}
                        if(empty($li4)){echo "";}else{echo $li4;}
                        if(empty($li_end)){echo "";}else{echo $li_end;}
                        ?>
                    </ul>
                    <!-- END Blank Header -->
                    <!-- ALERT UTILISATEUR -->
                    <?php
                        if($donnee_commande['etat_commande'] == "0"){
                    ?>
                    <div class="alert alert-info alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <h4><i class="fa fa-info-circle"></i> Information</h4> Veuillez insérer des articles et valider votre commande !
                    </div>
                    <?php
                        }
                    ?>
                    <!-- RESULTAT DES ETATS -->
                    <?php
                    if(isset($_GET['add-commande']) && $_GET['add-commande'] == 'true')
                    {
                    ?>
                    <div class="alert alert-success alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <h4><i class="fa fa-check-circle"></i> Succès</h4> La commande à été créer avec succès.
                    </div>
                    <?php } ?>
                    <?php
                    if(isset($_GET['valid-commande']) && $_GET['valid-commande'] == 'true')
                    {
                    ?>
                    <div class="alert alert-success alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <h4><i class="fa fa-check-circle"></i> Succès</h4> La commande à été Valider avec succès.
                    </div>
                    <?php } ?>
                    <?php
                    if(isset($_GET['valid-commande']) && $_GET['valid-commande'] == 'false')
                    {
                    ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <h4><i class="fa fa-times-circle"></i> Erreur</h4> Une erreur à eu lieu lors de la validation de la commande.<br>Veuillez contacter le support technique.
                    </div>
                    <?php } ?>

                    <?php
                    if(isset($_GET['add-article']) && $_GET['add-article'] == 'true')
                    {
                    ?>
                    <div class="alert alert-success alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <h4><i class="fa fa-check-circle"></i> Succès</h4> L'article à été ajouter à la commande.
                    </div>
                    <?php } ?>
                    <?php
                    if(isset($_GET['add-article']) && $_GET['add-article'] == 'false')
                    {
                    ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <h4><i class="fa fa-times-circle"></i> Erreur</h4> Une erreur à eu lieu lors de l'ajout de l'article dans la commande.<br>Veuillez contacter le support technique.
                    </div>
                    <?php } ?>

                    <?php
                    if(isset($_GET['supp-article']) && $_GET['supp-article'] == 'true')
                    {
                    ?>
                    <div class="alert alert-success alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <h4><i class="fa fa-check-circle"></i> Succès</h4> L'article à été supprimer à la commande.
                    </div>
                    <?php } ?>
                    <?php
                    if(isset($_GET['supp-article']) && $_GET['supp-article'] == 'false')
                    {
                    ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <h4><i class="fa fa-times-circle"></i> Erreur</h4> Une erreur à eu lieu lors de la suppression de l'article dans la commande.<br>Veuillez contacter le support technique.
                    </div>
                    <?php } ?>


                    <?php
                    $sql_commande = mysql_query("SELECT * FROM commande, menu WHERE commande.idmenu = menu.idmenu AND idcommande = '$idcommande'")or die(mysql_error());
                    $donnee_commande = mysql_fetch_array($sql_commande);
                    $idmenu = $donnee_commande['idmenu'];
                    ?>
                    <!-- BLOCK -->
                    <div class="row">
                        <div class="col-md-8">
                            <div class="block">
                                <div class="block-title">
                                    <h2>Montant de la commande</h2>
                                </div>
                                <div style="text-align: center; font-size: 35px; font-weight: bolder;"><?php echo number_format($donnee_commande['montant_total'], 2, ',', ' ')." €"; ?></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="block">
                                <div class="block-title">
                                    <h2>Etat de la commande</h2>
                                </div>
                                <div style="text-align: center; font-size: 20px; height: 75px;">
                                    <?php
                                    if($donnee_commande['etat_commande'] == "0"){
                                    ?>
                                    <div class="text-muted">
                                        <i class="fa fa-times-circle"></i>
                                        Commande créer, Non valider.
                                        <a href="<?php echo SITE,FOLDER; ?>inc/control/commande.php?idcommande=<?php echo $idcommande; ?>&valid-commande=valider" class="btn btn-block btn-success"><i class="fa fa-check"></i> Valider la commande</a>
                                    </div>
                                    <?php } ?>
                                    <?php
                                    if($donnee_commande['etat_commande'] == "1"){
                                    ?>
                                    <div class="text-info">
                                        <i class="fa fa-user"></i>
                                        Commande Valider
                                    </div>
                                    <?php } ?>
                                    <?php
                                    if($donnee_commande['etat_commande'] == "2"){
                                    ?>
                                    <div class="text-warning">
                                        <i class="fa fa-refresh fa-spin"></i>
                                        Traitement en cours...
                                    </div>
                                    <?php } ?>
                                    <?php
                                    if($donnee_commande['etat_commande'] == "3"){
                                    ?>
                                    <div class="text-success">
                                        <i class="fa fa-check"></i>
                                        Commande Disponible
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="block">
                                <div class="block-title">
                                    <h2>Produit Commander - Menu du <?php echo date("d-m-Y", $donnee_commande['date_menu']); ?> / Semaine <?php echo $donnee_commande['semaine']; ?></h2>
                                    <div class="pull-right">
                                        <a href="imp.php?idcommande=<?php echo $idcommande; ?>" class="btn btn-primary"><i class="fa fa-print"></i> Imprimer la commande</a>
                                        <?php
                                        if($donnee_commande['etat_commande'] == 0){
                                        ?>
                                        <a href="#add-article" data-toggle="modal" class="btn btn-info"><i class="fa fa-plus-circle"></i> Ajouter un article à la commande</a>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-vcenter">
                                        <thead>
                                            <tr>
                                                <th class="text-center;">Famille d'article</th>
                                                <th class="text-center;">Designation Article</th>
                                                <th style="text-align: right;">Prix Unitaire</th>
                                                <th class="text-center;">Quantité</th>
                                                <th style="text-align: right;">Prix Total</th>
                                                <?php
                                                if($donnee_commande['etat_commande'] == 0){
                                                ?>
                                                <th class="text-center">Action</th>
                                                <?php } ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql_article_commande = mysql_query("SELECT * FROM article_commande, commande, article, famille_article WHERE article_commande.idcommande = commande.idcommande
                                                AND article_commande.idfamillearticle = famille_article.idfamillearticle
                                                AND article_commande.idarticle = article.idarticle
                                                AND article_commande.idcommande = '$idcommande'")or die(mysql_error());
                                            while($donnee_article_commande = mysql_fetch_array($sql_article_commande))
                                            {
                                            ?>
                                            <tr>
                                                <td><?php echo $donnee_article_commande['designation']; ?></td>
                                                <td>
                                                    <strong><?php echo $donnee_article_commande['designation_article']; ?></strong>
                                                    <h5><i><?php echo $donnee_article_commande['description_article']; ?></i></h5>
                                                </td>
                                                <td style="text-align: right;"><?php echo number_format($donnee_article_commande['prix_unitaire'], 2, ',', ' ')." €"; ?></td>
                                                <td class="text-center"><?php echo $donnee_article_commande['qte']; ?></td>
                                                <td style="text-align: right;"><?php echo number_format($donnee_article_commande['prix_total_commande'], 2, ',', ' ')." €"; ?></td>
                                                <?php
                                                if($donnee_commande['etat_commande'] == 0){
                                                ?>
                                                <td>
                                                    <a href="<?php echo SITE, FOLDER; ?>inc/control/commande.php?idcommande=<?php echo $idcommande; ?>&prix_total_commande=<?php echo $donnee_article_commande['prix_total_commande']; ?>&montant_total=<?php echo $donnee_commande['montant_total']; ?>&idarticlecommande=<?php echo $donnee_article_commande['idarticlecommande']; ?>&supp-article=valider" class="btn btn-danger"><i class="fa fa-times"></i></a>
                                                </td>
                                                <?php } ?>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="4" style="text-align: right;">Montant Total de la Commande</td>
                                                <td style="text-align: right;"><?php echo number_format($donnee_commande['montant_total'], 2, ',', ' ')." €"; ?></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="block">
                                <div class="block-title">
                                    <h2>Reglement de la commande N°<?php echo $donnee_commande['num_commande']; ?></h2>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-vcenter">
                                        <thead>
                                            <tr>
                                                <th class="text-center;">Type de Réglement</th>
                                                <th class="text-center;">Montant Réglement</th>
                                                <th>Date du Réglement</th>
                                                <th>Porteur Chèque</th>
                                                <th>Numéro de Chèque</th>
                                                <th>Banque du chèque</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql_reglement_commande = mysql_query("SELECT * FROM reglement_commande, commande WHERE reglement_commande.idcommande = commande.idcommande
                                            AND commande.idcommande = '$idcommande'")or die(mysql_error());
                                            while($donnee_reglement_commande = mysql_fetch_array($sql_reglement_commande))
                                            {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php
                                                        if($donnee_reglement_commande['type_reglement'] == '1'){echo "<img src='../../../assets/img/perso/icone-cheque.png' /> Chèque";}
                                                        if($donnee_reglement_commande['type_reglement'] == '2'){echo "<i class='fa fa-euro'></i> Espèce";}
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php echo number_format($donnee_reglement_commande['montant_reglement'], 2, ',', ' ')." €"; ?>
                                                </td>
                                                <td>
                                                    <?php echo date("d-m-Y", $donnee_reglement_commande['date_reglement']); ?>
                                                </td>
                                                <td>
                                                    <?php echo $donnee_reglement_commande['porteur_chq']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $donnee_reglement_commande['num_chq']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $donnee_reglement_commande['banque_chq']; ?>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <?php
                                            $sql_calc_total_reglement = mysql_query("SELECT SUM(montant_reglement) FROM reglement_commande WHERE idcommande = '$idcommande'")or die(mysql_error());
                                            $calc_total_reglement = mysql_result($sql_calc_total_reglement, 0);
                                            ?>
                                            <?php
                                            if(empty($calc_total_reglement)){
                                            ?>
                                            <tr>
                                                <td colspan="6" style="text-align: center; font-weight: bold; color: red"><i class="fa fa-times"></i> Facture non régularisée</td>
                                            </tr>
                                            <?php }else{ ?>
                                            <?php
                                            if($calc_total_reglement != $donnee_commande['montant_total']){
                                            ?>
                                            <tr>
                                                <td colspan="6" style="text-align: center; font-weight: bold; color: orange"><i class="fa fa-warning"></i> Facture Partiellement régularisée</td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" style="text-align: right; font-style: italic;">Montant à régularisée:</td>
                                                <td style="text-align: right;">
                                                    <?php
                                                    $calc_reliquat = $calc_total_reglement-$donnee_commande['montant_total'];
                                                    echo number_format($calc_reliquat, 2, ',',' ')." €";
                                                    ?>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                            <?php
                                            if($calc_total_reglement == $donnee_commande['montant_total']){
                                            ?>
                                            <tr>
                                                <td colspan="6" style="text-align: center; font-weight: bold; color: green"><i class="fa fa-times"></i> Facture régularisée</td>
                                            </tr>
                                            <?php }} ?>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="add-article" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h3 class="modal-title">Modal Title</h3>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal form-bordered" action="<?php echo SITE,FOLDER; ?>inc/control/commande.php" method="POST">
                                                    <input type="hidden" name="idcommande" value="<?php echo $idcommande; ?>" />

                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label" for="example-select2">Article</label>
                                                        <div class="col-md-6">
                                                            <select id="example-select2" name="idarticle" class="select-select2" style="width: 100%;" data-placeholder="Selectionner l'article du menu...">
                                                                <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                                <?php
                                                                $sql_article = mysql_query("SELECT * FROM article_menu, article, famille_article WHERE article_menu.idarticle = article.idarticle
                                                                    AND article.idfamillearticle = famille_article.idfamillearticle
                                                                    AND article_menu.idmenu = '$idmenu'")or die(mysql_error());
                                                                while($donnee_article = mysql_fetch_array($sql_article))
                                                                {
                                                                ?>
                                                                <option value="<?php echo $donnee_article['idarticle']; ?>"><?php echo $donnee_article['designation']; ?> - <?php echo $donnee_article['designation_article']; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label" for="example-text-input">Quantité</label>
                                                        <div class="col-md-9">
                                                            <input type="text" id="example-text-input" name="qte" class="form-control" placeholder="Quantité de l'article Selectionner">
                                                        </div>
                                                    </div>

                                                    <div class="form-group form-actions">
                                                        <button type="submit" class="btn btn-success" name="add-article-valid" value="Valider"><i class="fa fa-check-circle"></i> Ajout de l'article à la commande</button>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                </div>
                <!-- END Page Content -->

                <?php include ('../../inc/footer.php'); ?>
            </div>
            <!-- END Main Container -->
        </div>
        <!-- END Page Container -->

        <!-- Scroll to top link, initialized in js/app.js - scrollToTop() -->
        <a href="#" id="to-top"><i class="fa fa-angle-double-up"></i></a>

        <!-- Include Jquery library from Google's CDN but if something goes wrong get Jquery from local file (Remove 'http:' if you have SSL) -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script>!window.jQuery && document.write(decodeURI('%3Cscript src="../../../../assets/js/vendor/jquery-1.11.1.min.js"%3E%3C/script%3E'));</script>

        <!-- Bootstrap.js, Jquery plugins and Custom JS code -->
        <script src="<?php echo SITE,FOLDER,ASSETS; ?>js/vendor/bootstrap.min.js"></script>
        <script src="<?php echo SITE,FOLDER,ASSETS; ?>js/plugins.js"></script>
        <script src="<?php echo SITE,FOLDER,ASSETS; ?>js/app.js"></script>
        <script src="<?php echo SITE,FOLDER,ASSETS; ?>js/pages/tablesGeneral.js"></script>
        <script src="<?php echo SITE,FOLDER,ASSETS; ?>js/pages/formsGeneral.js"></script>
        <script src="<?php echo SITE,FOLDER,ASSETS; ?>js/pages/formsValidation.js"></script>
        <script>$(function(){ FormsValidation.init(); });</script>
        <script>$(function(){ FormsGeneral.init(); });</script>
        <script>$(function(){ TablesGeneral.init(); });</script>
    </body>
</html>