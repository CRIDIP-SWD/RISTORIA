<?php include ('../../../inc/header.php'); ?>
<?php
define("TITLE_PAGE", "ARTICLE");
define("SUBTITLE_PAGE", "GESTION DES FAMILLES D'ARTICLES & DES ARTICLES");
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

            <?php include ('../../../inc/sidebar.php'); ?>

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
                <?php include ('../../../inc/headerbar.php'); ?>

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
                    <!-- RESULTAT DES ETATS -->
                    <?php
                    if(isset($_GET['supp-famille-article']) && $_GET['supp-famille-article'] == 'true')
                    {
                    ?>
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="fa fa-check-circle"></i> Succès</h4> La famille d'article à bien été supprimer
                    </div>
                    <?php } ?>
                    <?php
                    if(isset($_GET['supp-famille-article']) && $_GET['supp-famille-article'] == 'false')
                    {
                    ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="fa fa-times-circle"></i> Erreur</h4> Une erreur à été detectée lors de la suppression de la famille d'article.<br>Contactez le support technique.
                    </div>
                    <?php } ?>
                    <?php
                    if(isset($_GET['supp-famille-article']) && $_GET['supp-famille-article'] == 'util')
                    {
                    ?>
                    <div class="alert alert-warning alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="fa fa-warning"></i> Attention</h4> Cette famille d'article est utilisée dans un ou plusieurs article.<br>Veuillez supprimer les articles avant de supprimer la famille qui lui correspond.
                    </div>
                    <?php } ?>

                    <?php
                    if(isset($_GET['add-famille-article']) && $_GET['add-famille-article'] == 'true')
                    {
                    ?>
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="fa fa-check-circle"></i> Succès</h4> La famille d'article à bien été ajouter
                    </div>
                    <?php } ?>
                    <?php
                    if(isset($_GET['add-famille-article']) && $_GET['add-famille-article'] == 'false')
                    {
                    ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="fa fa-times-circle"></i> Erreur</h4> Une erreur à été detectée lors de l'ajout de la famille d'article.<br>Contactez le support technique.
                    </div>
                    <?php } ?>

                    <?php
                    if(isset($_GET['supp-article']) && $_GET['supp-article'] == 'true')
                    {
                    ?>
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="fa fa-check-circle"></i> Succès</h4> L'article à bien été supprimer
                    </div>
                    <?php } ?>
                    <?php
                    if(isset($_GET['supp-article']) && $_GET['supp-article'] == 'false')
                    {
                    ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="fa fa-times-circle"></i> Erreur</h4> Une erreur à été detectée lors de la suppression de l'article.<br>Contactez le support technique.
                    </div>
                    <?php } ?>
                    <?php
                    if(isset($_GET['supp-article']) && $_GET['supp-article'] == 'util')
                    {
                    ?>
                    <div class="alert alert-warning alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="fa fa-warning"></i> Attention</h4> Cette article est utilisée dans un ou plusieurs menus.<br>Veuillez supprimer les menus avant de supprimer l'article qui lui correspond.
                    </div>
                    <?php } ?>
                    
                    <?php
                    if(isset($_GET['add-article']) && $_GET['add-article'] == 'true')
                    {
                    ?>
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="fa fa-check-circle"></i> Succès</h4> La l'article à bien été ajouter
                    </div>
                    <?php } ?>
                    <?php
                    if(isset($_GET['add-article']) && $_GET['add-article'] == 'false')
                    {
                    ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="fa fa-times-circle"></i> Erreur</h4> Une erreur à été detectée lors de l'ajout de l'article.<br>Contactez le support technique.
                    </div>
                    <?php } ?>
                    


                    <div class="block">
                        <div class="block-title">
                            <h2>Liste des Familles D'article</h2>
                            <div class="pull-right">
                                <a href="#add-famille-article" data-toggle="modal" class="btn btn-primary"><i class="fa fa-plus"></i> Ajouter une famille d'article</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="famille-article" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">Désignation</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql_famille_article = mysql_query("SELECT * FROM famille_article")or die(mysql_error());
                                while($donnee_famille_article = mysql_fetch_array($sql_famille_article))
                                {
                                ?>
                                    <tr>
                                        <td><?php echo $donnee_famille_article['designation']; ?></td>
                                        <td>
                                            <a href="<?php echo SITE, FOLDER; ?>inc/control/famille-article.php?idfamillearticle=<?php echo $donnee_famille_article['idfamillearticle']; ?>&supp-famille-article=valider" class="btn btn-danger"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="block">
                        <div class="block-title">
                            <h2>Liste des Articles</h2>
                            <div class="pull-right">
                                <a href="#add-article" data-toggle="modal" class="btn btn-primary"><i class="fa fa-plus"></i> Ajouter un article</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="article" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">Famille d'article</th>
                                        <th class="text-center">Désignation d'article</th>
                                        <th class="text-center">Prix Unitaire</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql_article = mysql_query("SELECT * FROM article, famille_article WHERE article.idfamillearticle = famille_article.idfamillearticle")or die(mysql_error());
                                while($donnee_article = mysql_fetch_array($sql_article))
                                {
                                ?>
                                    <tr>
                                        <td><?php echo $donnee_article['designation']; ?></td>
                                        <td>
                                            <strong><?php echo $donnee_article['designation_article']; ?></strong><br>
                                            <h5><em><?php echo $donnee_article['description_article']; ?></em></h5>
                                        </td>
                                        <td style="text-align: right;"><?php echo number_format($donnee_article['prix_unitaire'], 2, ',', ' ')." €"; ?></td>
                                        <td>
                                            <a href="<?php echo SITE, FOLDER; ?>inc/control/article.php?idarticle=<?php echo $donnee_article['idarticle']; ?>&supp-article=valider" class="btn btn-danger"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div id="add-famille-article" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h3 class="modal-title">Ajout d'une famille d'article</h3>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal form-bordered" action="<?php echo SITE, FOLDER; ?>inc/control/famille-article.php" method="POST">

                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="example-text-input">Designation de la famille</label>
                                        <div class="col-md-9">
                                            <input type="text" id="example-text-input" name="designation" class="form-control" placeholder="Designation">
                                        </div>
                                    </div>

                                    <div class="form-group form-actions">
                                        <button type="submit" class="btn btn-success" name="add-famille-article" value="Valider"><i class="fa fa-check"></i> Ajout de la famille d'article</button>
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
                                <h3 class="modal-title">Ajout d'un article</h3>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal form-bordered" action="<?php echo SITE, FOLDER; ?>inc/control/article.php" method="POST">

                                    <div class="form-group">
                                                            <label class="col-md-4 control-label" for="example-select2">Famille d'article</label>
                                                            <div class="col-md-6">
                                                                <select id="example-select2" name="idfamillearticle" class="select-select2" style="width: 100%;" data-placeholder="Choose one..">
                                                                    <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                                    <?php
                                                                    $sql_famille_article_show = mysql_query("SELECT * FROM famille_article")or die(mysql_error());
                                                                    while($famille_article_show = mysql_fetch_array($sql_famille_article_show))
                                                                    {
                                                                    ?>
                                                                    <option value="<?php echo $famille_article_show['idfamillearticle']; ?>"><?php echo $famille_article_show['designation']; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>


                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="example-text-input">Désignation de l'article</label>
                                                            <div class="col-md-6">
                                                                <input type="text" id="example-text-input" name="designation_article" class="form-control">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="example-textarea-input">Description de l'article</label>
                                                            <div class="col-md-6">
                                                                <textarea id="example-textarea-input" name="description_article" rows="4" class="form-control"></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="val_number">Prix Unitaire </label>
                                                            <div class="col-md-6">
                                                                <div class="input-group">
                                                                    <input type="text" id="val_number" name="prix_unitaire" class="form-control">
                                                                    <span class="input-group-addon"><i class="gi gi-euro"></i></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group form-actions">
                                                            <button type="submit" class="btn btn-success" name="add-article" value="Valider"><i class="fa fa-check"></i> Ajouter l'article</button>
                                                        </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Page Content -->

                <?php include ('../../../inc/footer.php'); ?>
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
        <script>$(function(){ FormsValidation.init(); });</script>
        <script>$(function(){ CompAnimations.init(); });</script>
        <script>$(function(){ TablesDatatables.init(); });</script>
    </body>
</html>