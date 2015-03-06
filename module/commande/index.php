<?php include ('../../inc/header.php'); ?>
<?php
$iduser = $_GET['iduser'];
?>
<?php
define("TITLE_PAGE", "COMMANDE");
define("SUBTITLE_PAGE", "LISTE DE VOS COMMANDES");
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
                    <?php if(isset($_GET['add-commande']) && $_GET['add-commande'] == 'false')
                    {
                        ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="fa fa-times-circle"></i> Erreur</h4> Une erreur à eu lieu lors de la création de la commande.<br>
                            Veuillez Contacter le support technique. <strong>Erreur EX8880</strong>.
                        </div>
                    <?php
                    }
                    ?>
                    <!-- Example Block -->
                    <div class="block">
                        <!-- Example Title -->
                        <div class="block-title">
                            <h2>Liste de vos commandes</h2>
                            <div class="pull-right">
                                <a href="#add-commande" data-toggle="modal" class="btn btn-info"><i class="fa fa-plus-circle"></i> Nouvelle commande</a>
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
                                        <th>Numero de Commande</th>
                                        <th>Date de la commande</th>
                                        <th>Montant total de la commande</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql_commande = mysql_query("SELECT * FROM commande, menu, utilisateur WHERE commande.idmenu = menu.idmenu
                                                AND commande.iduser = utilisateur.iduser
                                                AND utilisateur.iduser = '$iduser'")or die(mysql_error());
                                while($donnee_commande = mysql_fetch_array($sql_commande)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $donnee_commande['num_commande']; ?></td>
                                        <td>
                                            <strong>Semaine <?php echo $donnee_commande['semaine']; ?></strong><br>
                                            <?php
                                            if(empty($donnee_commande['date_commande']))
                                            {
                                            ?>
                                            <h5><i>Pas de date séléctionner, commande invalide</i></h5>
                                            <?php }else{ ?>
                                                <h5><i><?php echo date("d-m-Y", $donnee_commande['date_commande']); ?></i></h5>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php echo number_format($donnee_commande['montant_total'], 2, ',', ' ')." €"; ?>
                                        </td>
                                        <td>
                                            <a class="btn btn-default btn-xs" href="view.php?idcommande=<?php echo $donnee_commande['idcommande']; ?>"><i class="fa fa-eye"></i></a>
                                            <a class="btn btn-danger btn-xs" href=""><i class="fa fa-times-circle-o"></i></a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- END Example Content -->
                    </div>
                    <!-- END Example Block -->
                </div>
                <div id="add-commande" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h3 class="modal-title">Nouvelle Commande</h3>
                            </div>
                            <div class="modal-body">
                               <form class="form-horizontal form-bordered" action="<?php echo SITE,FOLDER; ?>inc/control/commande.php" method="POST">

                                   <input type="hidden" name="iduser" value="<?php echo $iduser; ?>" />

                                   <div class="form-group">
                                       <label class="col-md-4 control-label" for="example-select2">Selection de la semaine</label>
                                       <div class="col-md-6">
                                           <select id="example-select2" name="idmenu" class="select-select2" style="width: 100%;" data-placeholder="Selectionner la semaine du menu">
                                               <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                               <?php
                                               $sql_menu = mysql_query("SELECT * FROM menu WHERE etat_menu = 0")or die(mysql_error());
                                               while($donnee_menu = mysql_fetch_array($sql_menu))
                                               {
                                               ?>
                                               <option value="<?php echo $donnee_menu['idmenu']; ?>">Semaine <?php echo $donnee_menu['semaine']; ?></option>
                                               <?php } ?>
                                           </select>
                                       </div>
                                   </div>

                                   <div class="form-group form-actions">
                                       <div class="pull-left">
                                           <button type="submit" class="btn btn-success" name="add-commande-control" value="Valider"><i class="fa fa-check-circle-o"></i> Valider</button>
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
        <script src="<?php echo SITE,FOLDER,ASSETS; ?>js/pages/tablesGeneral.js"></script>
        <script>$(function(){ TablesGeneral.init(); });</script>
    </body>
</html>