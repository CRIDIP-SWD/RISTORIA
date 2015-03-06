<?php include ('../../inc/header.php'); ?>
<?php
$idcommande = $_GET['idcommande'];
$sql_commande = mysql_query("SELECT * FROM commande, menu, utilisateur WHERE commande.idmenu = menu.idmenu
                AND commande.iduser = utilisateur.iduser
                AND idcommande = '$idcommande'")or die(mysql_error());
$donnee_commande = mysql_fetch_array($sql_commande);
?>
<?php
define("TITLE_PAGE", "COMMANDE");
define("SUBTITLE_PAGE", "COMMANDE ".$donnee_commande['num_commande']." Semaine".$donnee_commande['semaine']);
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

                        <?php include ('inc/activity.php'); ?>

                        <?php include ('inc/message_ui.php'); ?>
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
                                <i class="gi gi-brush"></i><?php echo TITLE_PAGE; ?><br><small><?php echo SUBTITLE_PAGE; ?></small>
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
                    <!-- ETAT -->
                    <?php
                    if(empty($donnee_commande['date_commande']))
                    {
                    ?>
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="fa fa-info-circle"></i> Information !</h4> Veuillez saisir la date de la commande.
                        </div>
                    <?php } ?>
                    <?php
                    if(isset($_GET['add-date-commande']) && $_GET['add-date-commande'] == 'false')
                    {
                        ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="fa fa-times-circle"></i> Erreur !</h4> Une erreur à eu lieu lors de la création de la date dans la commande.<br>
                            Veuillez contacter le service technique. <strong>Erreur EX8881</strong>
                        </div>
                    <?php } ?>


                    <?php
                    if(isset($_GET['add-article']) && $_GET['add-article'] == 'true')
                    {
                        ?>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="fa fa-check-circle"></i> Succès !</h4> L'article à été ajouter à la commande
                        </div>
                    <?php } ?>
                    <?php
                    if(isset($_GET['add-article']) && $_GET['add-article'] == 'false')
                    {
                        ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="fa fa-times-circle"></i> Erreur !</h4> Une erreur à eu lieu lors de l'ajout d'un article dans la commande.<br>
                            Veuillez contacter le service technique. <strong>Erreur EX8882</strong>
                        </div>
                    <?php } ?>
                    <!-- Example Block -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="block">
                                <!-- Example Title -->
                                <div class="block-title">
                                    <h2>Information</h2>
                                </div>
                                <!-- END Example Title -->
                                <table style="width: 50%">
                                    <tr>
                                        <td>Identité:</td>
                                        <td>
                                            <?php echo $donnee_commande['nom_user']; ?> <?php echo $donnee_commande['prenom_user']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Date de la commande:</td>
                                        <?php
                                        if(empty($donnee_commande['date_commande']))
                                        {
                                        ?>
                                        <td style="color: #ff0000;">
                                            Inconnu
                                        </td>
                                        <td>
                                            <a class="btn btn-danger btn-xs" href="#add-date-commande" data-toggle="modal"><i class="fa fa-edit"></i> Modifier la date de la commande</a>
                                        </td>

                                        <?php }else{ ?>
                                        <td>
                                            <?php echo date("d-m-Y", $donnee_commande['date_commande']); ?>
                                        </td>
                                        <?php } ?>
                                    </tr>
                                    <tr>
                                        <td>Montant de la Commande:</td>
                                        <td>
                                            <strong><?php echo number_format($donnee_commande['montant_total'], 2, ',', ' ')." €"; ?></strong>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="block">
                        <!-- Example Title -->
                        <div class="block-title">
                            <h2>Votre commande</h2>
                            <div class="pull-right">
                                <a href="#add-article" data-toggle="modal" class="btn btn-info"><i class="fa fa-plus-circle"></i> Ajouter un produit</a>
                            </div>
                        </div>
                        <!-- END Example Title -->

                        <!-- Example Content -->
                        <div class="table-responsive">
                            <!--
                            Available Table Classes:
                                'table'             - basic table
                                'table-bordered'    - table with full borders
                                'table-borderless'  - table with no borders
                                'table-striped'     - striped table
                                'table-condensed'   - table with smaller top and bottom cell padding
                                'table-hover'       - rows highlighted on mouse hover
                                'table-vcenter'     - middle align content vertically
                            -->
                            <table id="general-table" class="table table-striped table-vcenter table-bordered">
                                <thead>
                                <tr>
                                    <td>Produit</td>
                                    <td>Prix_unitaire</td>
                                    <td>Qte</td>
                                    <td>Prix total</td>
                                    <td>Action</td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql_article = mysql_query("SELECT * FROM article_commande, commande, article WHERE article_commande.idcommande = commande.idcommande
                                                AND article_commande.idarticle = article.idarticle
                                                AND article_commande.idcommande = '$idcommande'")or die(mysql_error());
                                while($donnee_article = mysql_fetch_array($sql_article)) {
                                    ?>
                                    <tr>
                                        <td>
                                            <strong><?php echo $donnee_article['designation']; ?></strong><br>
                                            <h5><i><?php echo $donnee_article['description']; ?></i></h5>
                                        </td>
                                        <td><?php echo number_format($donnee_article['prix_unitaire'], 2, ',', ' ')." €"; ?></td>
                                        <td><?php echo $donnee_article['qte']; ?></td>
                                        <td><?php echo number_format($donnee_article['total_ligne'], 2, ',', ' ')." €"; ?></td>
                                        <td>

                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="3">Total de la commande</td>
                                    <td>
                                        <?php echo number_format($donnee_commande['montant_total'], 2, ',', ' ')." €"; ?>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- END Example Content -->
                    </div>
                    <!-- END Example Block -->
                </div>
                <div id="add-date-commande" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h3 class="modal-title">Ajout de la date à la commande</h3>
                            </div>
                            <div class="modal-body">
                               <form class="form-horizontal form-bordered" action="<?php echo SITE,FOLDER; ?>inc/control/commande.php" method="POST">

                                   <input type="hidden" name="idcommande" value="<?php echo $idcommande; ?>" />

                                   <div class="form-group">
                                       <label class="col-md-4 control-label" for="masked_date2">Date de la commande</label>
                                       <div class="col-md-6">
                                           <input type="text" id="masked_date2" name="date_commande" class="form-control" placeholder="jj-mm-aaaa">
                                       </div>
                                   </div>

                                   <div class="form-group form-actions">
                                       <div class="pull-left">
                                           <button type="submit" class="btn btn-success" name="add-date-commande-control" value="Valider"><i class="fa fa-check-circle-o"></i> Valider</button>
                                       </div>
                                       <div class="pull-right">
                                           <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times-circle-o"></i> Fermer la boite de dialogue</button>
                                       </div>
                                   </div>

                               </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="add-article" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h3 class="modal-title">Ajout d'un article à la commande</h3>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal form-bordered" action="<?php echo SITE,FOLDER; ?>inc/control/commande.php" method="POST">

                                    <input type="hidden" name="idcommande" value="<?php echo $idcommande; ?>" />

                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="example-select2">Select2</label>
                                        <div class="col-md-9">
                                            <select id="example-select2" name="idarticle" class="select-select2" style="width: 100%;" data-placeholder="Choisissez un article...">
                                                <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                <?php
                                                $sql_choix_article = mysql_query("SELECT * FROM article, menu WHERE article.idmenu = menu.idmenu")or die(mysql_error());
                                                while($donnee_choix_article = mysql_fetch_array($sql_choix_article))
                                                {
                                                ?>
                                                <option value="<?php echo $donnee_choix_article['idarticle']; ?>"><?php echo $donnee_choix_article['designation']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group form-actions">
                                        <div class="pull-left">
                                            <button type="submit" class="btn btn-success" name="add-article-control" value="Valider"><i class="fa fa-check-circle-o"></i> Valider</button>
                                        </div>
                                        <div class="pull-right">
                                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times-circle-o"></i> Fermer la boite de dialogue</button>
                                        </div>
                                    </div>

                                </form>
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
        <script>!window.jQuery && document.write(decodeURI('%3Cscript src="js/vendor/jquery-1.11.1.min.js"%3E%3C/script%3E'));</script>

        <!-- Bootstrap.js, Jquery plugins and Custom JS code -->
        <script src="<?php echo SITE,FOLDER,ASSETS; ?>js/vendor/bootstrap.min.js"></script>
        <script src="<?php echo SITE,FOLDER,ASSETS; ?>js/plugins.js"></script>
        <script src="<?php echo SITE,FOLDER,ASSETS; ?>js/app.js"></script>
        <script src="<?php echo SITE,FOLDER,ASSETS; ?>js/pages/formsValidation.js"></script>
        <script src="<?php echo SITE,FOLDER,ASSETS; ?>js/pages/tablesGeneral.js"></script>
        <script src="<?php echo SITE,FOLDER,ASSETS; ?>js/pages/formsGeneral.js"></script>
        <script>$(function(){ FormsGeneral.init(); });</script>
        <script>$(function(){ TablesGeneral.init(); });</script>
        <script>$(function(){ FormsValidation.init(); });</script>
    </body>
</html>