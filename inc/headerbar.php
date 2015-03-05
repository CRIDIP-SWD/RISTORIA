                <header class="navbar navbar-default">
                    <!-- Left Header Navigation -->
                    <ul class="nav navbar-nav-custom">
                        <!-- Main Sidebar Toggle Button -->
                        <li>
                            <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');">
                                <i class="fa fa-bars fa-fw"></i>
                            </a>
                        </li>
                        <!-- END Main Sidebar Toggle Button -->
                    </ul>
                    <!-- END Left Header Navigation -->

                    <!-- Right Header Navigation -->
                        <!-- User Dropdown -->
                        <li class="dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?php echo SITE,FOLDER,ASSETS; ?>img/placeholders/avatars/avatar2.jpg" alt="avatar"> <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                                <li>
                                    <a href="<?php echo SITE,FOLDER; ?>logout.php?iduser=<?php echo $iduser; ?>"><i class="fa fa-ban fa-fw pull-right"></i> Déconnexion</a>
                                </li>
                                <!-- <li class="dropdown-header text-center">Activity</li>
                                <li>
                                    <div class="alert alert-success alert-alt">
                                        <small>5 min ago</small><br>
                                        <i class="fa fa-thumbs-up fa-fw"></i> You had a new sale ($10)
                                    </div>
                                    <div class="alert alert-info alert-alt">
                                        <small>10 min ago</small><br>
                                        <i class="fa fa-arrow-up fa-fw"></i> Upgraded to Pro plan
                                    </div>
                                    <div class="alert alert-warning alert-alt">
                                        <small>3 hours ago</small><br>
                                        <i class="fa fa-exclamation fa-fw"></i> Running low on space<br><strong>18GB in use</strong> 2GB left
                                    </div>
                                    <div class="alert alert-danger alert-alt">
                                        <small>Yesterday</small><br>
                                        <i class="fa fa-bug fa-fw"></i> <a href="javascript:void(0)" class="alert-link">New bug submitted</a>
                                    </div>
                                </li> -->
                            </ul>
                        </li>
                        <!-- END User Dropdown -->
                    </ul>
                    <!-- END Right Header Navigation -->
                </header>
                <!-- END Header -->