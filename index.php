<?php include ('inc/header.php'); ?>
    <body>
        <!-- Preloader -->
        <!-- Preloader functionality (initialized in js/app.js) - pageLoading() -->
        <!-- Used only if page preloader is enabled from inc/config (PHP version) or the class 'page-loading' is added in body element (HTML version) -->
        <div class="preloader themed-background">
            <h1 class="push-top-bottom text-light text-center"><strong><?php echo $logiciel; ?></strong></h1>
            <div class="inner">
                <h3 class="text-light visible-lt-ie9 visible-lt-ie10"><strong>Chargement en cours..</strong></h3>
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

            <?php include ('inc/sidebar.php'); ?>

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
                <?php include ('inc/headerbar.php'); ?>

                <!-- Page content -->
                <div id="page-content">
                    <!-- Dashboard Header -->
                    <!-- For an image header add the class 'content-header-media' and an image as in the following example -->
                    <div class="content-header content-header-media">
                        <div class="header-section">
                            <div class="row">
                                <!-- Main Title (hidden on small devices for the statistics to fit) -->
                                <div class="col-md-4 col-lg-6 hidden-xs hidden-sm">
                                    <h1><?php 
                                    if($heure_systeme > "18:00"){echo "Bonsoir";}else{echo "Bonjour";}
                                        ?>
                                     <strong><?php echo $donnee_utilisateur['prenom_user']; ?> <?php echo $donnee_utilisateur['nom_user']; ?></strong><br>
                                     <small>Dernière connexion: <?php echo $donnee_utilisateur['last_connect']; ?></small><br>
                                     <small>Groupe: 
                                        <?php
                                        if($groupe == 1){echo "Administrateur";}
                                        if($groupe == 0){echo "Utilisateur";}
                                        ?>
                                        - <?php echo $raison_social; ?>
                                     </small></h1>
                                </div>
                                <!-- END Main Title -->

                                <!-- Top Stats -->
                                <div class="col-md-8 col-lg-6">
                                    <div class="row text-center">
                                        <div class="col-xs-4 col-sm-3">
                                            <h2 class="animation-hatch">
                                                <strong><?php echo $date_systeme; ?></strong><br>
                                            </h2>
                                        </div>
                                        <div class="col-xs-4 col-sm-3">
                                            <h2 class="animation-hatch">
                                                <strong><?php echo $heure_systeme; ?></strong><br>
                                                
                                            </h2>
                                        </div>
                                        <!-- We hide the last stat to fit the other 3 on small devices -->
                                        <div class="col-sm-3 hidden-xs">
                                            <h2 class="animation-hatch">
                                                <strong><?php echo $xml->current_condition->temp_C; ?>&deg; C</strong><br>
                                                <small><i class="fa fa-map-marker"></i> LES SABLES D'OLONNE</small>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                                <!-- END Top Stats -->
                            </div>
                        </div>
                        <!-- For best results use an image with a resolution of 2560x248 pixels (You can also use a blurred image with ratio 10:1 - eg: 1000x100 pixels - it will adjust and look great!) -->
                        <img src="<?php echo SITE,FOLDER,ASSETS; ?>img/placeholders/headers/dashboard_header.jpg" alt="header image" class="animation-pulseSlow">
                    </div>
                    <!-- END Dashboard Header -->

                    <!-- Widgets Row -->
                    <?php
                    if($donnee_utilisateur['groupe'] == 0){
                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <a class="widget widget-hover-effect1" href="<?php echo SITE, FOLDER; ?>/module/commande/index.php#add-cmd">
                                <div class="widget-simple">
                                    <div class="widget-icon pull-left themed-background animation-fadeIn">
                                        <i class="gi gi-circle_plus"></i>
                                    </div>
                                    <h3 class="widget-content text-right animation-pullDown">
                                        Nouvelle <strong>Commande</strong><br>
                                    </h3>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php } ?>
                    <?php
                    if($donnee_utilisateur['groupe'] == 1){
                    ?>
                    <div class="row">
                        <div class="col-md-4">
                            <a class="widget widget-hover-effect1" href="<?php echo SITE, FOLDER; ?>/module/admin/menu/index.php#add-menu">
                                <div class="widget-simple">
                                    <div class="widget-icon pull-left themed-background animation-fadeIn">
                                        <i class="gi gi-circle_plus"></i>
                                    </div>
                                    <h3 class="widget-content text-right animation-pullDown">
                                        Nouveau <strong>Menu</strong><br>
                                    </h3>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a class="widget widget-hover-effect1" href="<?php echo SITE, FOLDER; ?>/module/admin/article/index.php#add-article">
                                <div class="widget-simple">
                                    <div class="widget-icon pull-left themed-background animation-fadeIn">
                                        <i class="gi gi-circle_plus"></i>
                                    </div>
                                    <h3 class="widget-content text-right animation-pullDown">
                                        Nouvel <strong>Article</strong><br>
                                    </h3>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a class="widget widget-hover-effect1" href="<?php echo SITE, FOLDER; ?>/module/admin/commande/presta/index.php#add-cmd-presta">
                                <div class="widget-simple">
                                    <div class="widget-icon pull-left themed-background animation-fadeIn">
                                        <i class="gi gi-circle_plus"></i>
                                    </div>
                                    <h3 class="widget-content text-right animation-pullDown">
                                        Nouvelle <strong>Commande prestataire</strong><br>
                                    </h3>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="row">
                        <div class="col-md-12">

                            <!-- Weather Widget -->
                            <div class="widget">
                                <div class="widget-advanced widget-advanced-alt">
                                    <!-- Widget Header -->
                                    <div class="widget-header text-left">
                                        <!-- For best results use an image with at least 150 pixels in height (with the width relative to how big your widget will be!) - Here I'm using a 1200x150 pixels image -->
                                        <img src="<?php echo SITE,FOLDER,ASSETS; ?>img/placeholders/headers/widget5_header.jpg" alt="background" class="widget-background animation-pulseSlow">
                                        <h3 class="widget-content widget-content-image widget-content-light clearfix">
                                            <span class="widget-icon pull-right">
                                            <?php
                                                switch ($xml->current_condition->weatherDesc) {
                                                    case 'Sunny':
                                                        echo "<i class='wi wi-day-sunny'></i>";
                                                        break;

                                                    case 'Overcast':
                                                        echo "<i class='wi wi-day-sunny-overcast'></i>";
                                                        break;

                                                    case 'Cloudy':
                                                        echo "<i class='wi wi-cloudy'></i>";
                                                        break;

                                                    case 'Light freezing rain':
                                                        echo "<i class='wi wi-rain'></i>";
                                                        break;
                                                    
                                                    case 'Clear':
                                                        echo "<i class='wi wi-night-clear'></i>";
                                                        break;

                                                    case 'Mist':
                                                        echo "<i class='wi wi-fog'></i>";
                                                        break;

                                                    default:
                                                        # code...
                                                        break;
                                                }
                                            ?>
                                            </span>
                                            Station <strong>Météo</strong><br>
                                            <small><i class="fa fa-location-arrow"></i> Les Sables d'Olonne</small>
                                        </h3>
                                    </div>
                                    <!-- END Widget Header -->

                                    <!-- Widget Main -->
                                    <div class="widget-main">
                                        <div class="row text-center">
                                            <div class="col-xs-6 col-lg-3">
                                                <h3>
                                                    <strong><?php echo $xml->current_condition->temp_C; ?>&deg;</strong> <small>C</small><br>
                                                    <small>Température</small>
                                                </h3>
                                            </div>
                                            <div class="col-xs-6 col-lg-3">
                                                <h3>
                                                    <strong><?php echo $xml->current_condition->humidity; ?></strong> <small>%</small><br>
                                                    <small>Humidité</small>
                                                </h3>
                                            </div>
                                            <div class="col-xs-6 col-lg-3">
                                                <h3>
                                                    <strong><?php echo $xml->current_condition->windspeedKmph; ?></strong> <small>km/h</small><br>
                                                    <small>Vent</small>
                                                </h3>
                                            </div>
                                            <div class="col-xs-6 col-lg-3">
                                                <h3>
                                                    <strong><?php echo $xml->current_condition->visibility; ?></strong> <small>km</small><br>
                                                    <small>Visibilité</small>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Widget Main -->
                                </div>
                            </div>
                            <!-- END Weather Widget-->
                        </div>
                    </div>

                    <!-- END Widgets Row -->
                </div>
                <!-- END Page Content -->

                <!-- Footer -->
                <?php include ('inc/footer.php'); ?>
                <!-- END Footer -->
            </div>
            <!-- END Main Container -->
        </div>
        <!-- END Page Container -->

        <!-- Scroll to top link, initialized in js/app.js - scrollToTop() -->
        <a href="#" id="to-top"><i class="fa fa-angle-double-up"></i></a>

        <!-- User Settings, modal which opens from Settings link (found in top right user menu) and the Cog link (found in sidebar user info) -->
        <div id="modal-user-settings" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header text-center">
                        <h2 class="modal-title"><i class="fa fa-pencil"></i> Settings</h2>
                    </div>
                    <!-- END Modal Header -->

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <form action="index.html" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" onsubmit="return false;">
                            <fieldset>
                                <legend>Vital Info</legend>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Username</label>
                                    <div class="col-md-8">
                                        <p class="form-control-static">Admin</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="user-settings-email">Email</label>
                                    <div class="col-md-8">
                                        <input type="email" id="user-settings-email" name="user-settings-email" class="form-control" value="admin@example.com">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="user-settings-notifications">Email Notifications</label>
                                    <div class="col-md-8">
                                        <label class="switch switch-primary">
                                            <input type="checkbox" id="user-settings-notifications" name="user-settings-notifications" value="1" checked>
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend>Password Update</legend>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="user-settings-password">New Password</label>
                                    <div class="col-md-8">
                                        <input type="password" id="user-settings-password" name="user-settings-password" class="form-control" placeholder="Please choose a complex one..">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="user-settings-repassword">Confirm New Password</label>
                                    <div class="col-md-8">
                                        <input type="password" id="user-settings-repassword" name="user-settings-repassword" class="form-control" placeholder="..and confirm it!">
                                    </div>
                                </div>
                            </fieldset>
                            <div class="form-group form-actions">
                                <div class="col-xs-12 text-right">
                                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- END Modal Body -->
                </div>
            </div>
        </div>
        <!-- END User Settings -->

        <!-- Remember to include excanvas for IE8 chart support -->
        <!--[if IE 8]><script src="js/helpers/excanvas.min.js"></script><![endif]-->

        <!-- Include Jquery library from Google's CDN but if something goes wrong get Jquery from local file (Remove 'http:' if you have SSL) -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script>!window.jQuery && document.write(decodeURI('%3Cscript src="js/vendor/jquery-1.11.1.min.js"%3E%3C/script%3E'));</script>

        <!-- Bootstrap.js, Jquery plugins and Custom JS code -->
        <script src="<?php echo SITE,FOLDER,ASSETS; ?>js/vendor/bootstrap.min.js"></script>
        <script src="<?php echo SITE,FOLDER,ASSETS; ?>js/plugins.js"></script>
        <script src="<?php echo SITE,FOLDER,ASSETS; ?>js/app.js"></script>

        <!-- Google Maps API + Gmaps Plugin, must be loaded in the page you would like to use maps (Remove 'http:' if you have SSL) -->
        <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        <script src="<?php echo SITE,FOLDER,ASSETS; ?>js/helpers/gmaps.min.js"></script>

        <!-- Load and execute javascript code used only in this page -->
        <script src="<?php echo SITE,FOLDER,ASSETS; ?>js/pages/index.js"></script>
        <script>$(function(){ Index.init(); });</script>
    </body>
</html>