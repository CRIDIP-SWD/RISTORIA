<?php include ('../../../../inc/header.php'); ?>
<?php
$sql_center = mysql_query("SELECT * FROM setting WHERE idsetting = '1'")or die(mysql_error());
$donnee_center = mysql_fetch_array($sql_center);
?>
<?php
define("TITLE_PAGE", "CENTRE DE GESTION");
define("SUBTITLE_PAGE", "ETAT - COMMANDE");
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

            <?php include ('../../../../inc/sidebar.php'); ?>

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
                <?php include ('../../../../inc/headerbar.php'); ?>

                <!-- Page content -->
                <div id="page-content">
                    <!-- Blank Header -->
                    <div class="content-header">
                        <div class="header-section">
                            <h1>
                                <i class="fa fa-building"></i><?php echo TITLE_PAGE; ?><br><small><?php echo SUBTITLE_PAGE; ?></small>
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
                    <!-- RESULTAT DES ETATS -->

                    <a href="commande-general.php" class="btn btn-block btn-info"><i class="fi fi-pdf"></i> Listing des Commandes (Général)</a>
                    <a href="commande-presta.php" class="btn btn-block btn-info"><i class="fi fi-pdf"></i> Listing des Commandes (A commander au prestataire)</a>
                    <a href="#choix-user" data-toggle="modal" class="btn btn-block btn-info"><i class="fi fi-pdf"></i> Listing des Commandes (par utilisateur)</a>
                    <hr>
                    <a href="#date-presta" data-toggle="modal" class="btn btn-block btn-info"><i class="fi fi-pdf"></i> Liste des Articles à commander au prestataire (par date)</a>


                    <div id="choix-user" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h3 class="modal-title">Choix de l'utilisateur</h3>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal form-bordered" action="commande-user.php" method="POST">

                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label" for="example-select2">Selection de l'utilisateur</label>
                                                        <div class="col-md-6">
                                                            <select id="example-select2" name="iduser" class="select-select2" style="width: 100%;" data-placeholder="Choisissez l'utilisateur">
                                                                <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                                <?php
                                                                $sql_user = mysql_query("SELECT * FROM utilisateur WHERE groupe = '0'")or die(mysql_error());
                                                                while($donnee_user = mysql_fetch_array($sql_user))
                                                                {
                                                                ?>
                                                                <option value="<?php echo $donnee_user['iduser']; ?>"><?php echo $donnee_user['nom_user']; ?> <?php echo $donnee_user['prenom_user']; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group form-actions">
                                                        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Voir l'état par utilisateur</button>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="date-presta" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h3 class="modal-title">Choix de l'utilisateur</h3>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal form-bordered" action="commande-prestataire.php" method="POST">

                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label" for="example-daterange1">Date</label>
                                                        <div class="col-md-8">
                                                            <div class="input-group input-daterange" data-date-format="dd-mm-yyyy">
                                                                <input type="text" id="example-daterange1" name="date_commande1" class="form-control text-center" placeholder="De">
                                                                <span class="input-group-addon"><i class="fa fa-angle-right"></i></span>
                                                                <input type="text" id="example-daterange2" name="date_commande2" class="form-control text-center" placeholder="au">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group form-actions">
                                                        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Afficher les résultats</button>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                </div>
                <!-- END Page Content -->

                <?php include ('../../../../inc/footer.php'); ?>
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
        <script src="<?php echo SITE,FOLDER,ASSETS; ?>js/pages/tablesDatatables.js"></script>
        <script src="<?php echo SITE,FOLDER,ASSETS; ?>js/pages/compAnimations.js"></script>
        <script src="<?php echo SITE,FOLDER,ASSETS; ?>js/pages/formsValidation.js"></script>
        <script src="<?php echo SITE,FOLDER,ASSETS; ?>js/pages/widgetsStats.js"></script>
        <script src="<?php echo SITE,FOLDER,ASSETS; ?>js/pages/formsGeneral.js"></script>
        <script>$(function(){ FormsGeneral.init(); });</script>
        <script>$(function(){ WidgetsStats.init(); });</script>
        <script>$(function(){ FormsValidation.init(); });</script>
        <script>$(function(){ CompAnimations.init(); });</script>
        <script>$(function(){ TablesDatatables.init(); });</script>
    </body>
</html>