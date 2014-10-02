<?php $this->load->view('admin/components/page_head'); ?>

    <div id="wrapper">

        <!-- Sidebar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><?php echo $this->data['site_name']; ?></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active"><a href="index.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Dropdown <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Dropdown Item</a></li>
                        </ul>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right navbar-user">
                    <li class="dropdown messages-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> Messages <span class="badge">7</span> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-header">7 New Messages</li>
                            <li class="message-preview">
                                <a href="#">
                                    <span class="avatar"><img src="http://placehold.it/50x50"></span>
                                    <span class="name">John Smith:</span>
                                    <span class="message">Hey there, I wanted to ask you something...</span>
                                    <span class="time"><i class="fa fa-clock-o"></i> 4:34 PM</span>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li class="message-preview">
                                <a href="#">
                                    <span class="avatar"><img src="http://placehold.it/50x50"></span>
                                    <span class="name">John Smith:</span>
                                    <span class="message">Hey there, I wanted to ask you something...</span>
                                    <span class="time"><i class="fa fa-clock-o"></i> 4:34 PM</span>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li class="message-preview">
                                <a href="#">
                                    <span class="avatar"><img src="http://placehold.it/50x50"></span>
                                    <span class="name">John Smith:</span>
                                    <span class="message">Hey there, I wanted to ask you something...</span>
                                    <span class="time"><i class="fa fa-clock-o"></i> 4:34 PM</span>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="#">View Inbox <span class="badge">7</span></a></li>
                        </ul>
                    </li>
                    <li class="dropdown alerts-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> Alerts <span class="badge">3</span> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Default <span class="label label-default">Default</span></a></li>
                            <li><a href="#">Primary <span class="label label-primary">Primary</span></a></li>
                            <li><a href="#">Success <span class="label label-success">Success</span></a></li>
                            <li><a href="#">Info <span class="label label-info">Info</span></a></li>
                            <li><a href="#">Warning <span class="label label-warning">Warning</span></a></li>
                            <li><a href="#">Danger <span class="label label-danger">Danger</span></a></li>
                            <li class="divider"></li>
                            <li><a href="#">View All</a></li>
                        </ul>
                    </li>
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> Inbox <span class="badge">7</span></a></li>
                            <li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo base_url('admin/user/logout'); ?>"><i class="fa fa-power-off"></i> Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="row">
                <div class="col-lg-12">
                    <h1>Dashboard <small>Statistics Overview</small></h1>
                    <ol class="breadcrumb">
                        <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
                    </ol>
                </div>
            </div><!-- /.row -->
            <div class="row">
                <div class="col-lg-3">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-6">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <p class="announcement-heading">456</p>
                                    <p class="announcement-text">Total Post</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-6">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <p class="announcement-heading">456</p>
                                    <p class="announcement-text">Total Post</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-6">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <p class="announcement-heading">456</p>
                                    <p class="announcement-text">Total Post</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-6">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <p class="announcement-heading">456</p>
                                    <p class="announcement-text">Total Post</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.row -->

            <div class="row">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped tablesorter">
                        <thead>
                            <tr>
                                <th>Order # <i class="fa fa-sort"></i></th>
                                <th>Order Date <i class="fa fa-sort"></i></th>
                                <th>Order Time <i class="fa fa-sort"></i></th>
                                <th>Amount (USD) <i class="fa fa-sort"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>3326</td>
                                <td>10/21/2013</td>
                                <td>3:29 PM</td>
                                <td>$321.33</td>
                            </tr>
                            <tr>
                                <td>3325</td>
                                <td>10/21/2013</td>
                                <td>3:20 PM</td>
                                <td>$234.34</td>
                            </tr>
                            <tr>
                                <td>3324</td>
                                <td>10/21/2013</td>
                                <td>3:03 PM</td>
                                <td>$724.17</td>
                            </tr>
                            <tr>
                                <td>3323</td>
                                <td>10/21/2013</td>
                                <td>3:00 PM</td>
                                <td>$23.71</td>
                            </tr>
                            <tr>
                                <td>3322</td>
                                <td>10/21/2013</td>
                                <td>2:49 PM</td>
                                <td>$8345.23</td>
                            </tr>
                            <tr>
                                <td>3321</td>
                                <td>10/21/2013</td>
                                <td>2:23 PM</td>
                                <td>$245.12</td>
                            </tr>
                            <tr>
                                <td>3320</td>
                                <td>10/21/2013</td>
                                <td>2:15 PM</td>
                                <td>$5663.54</td>
                            </tr>
                            <tr>
                                <td>3319</td>
                                <td>10/21/2013</td>
                                <td>2:13 PM</td>
                                <td>$943.45</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div><!-- /.row -->

        </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->






    <?php $this->load->view('admin/components/page_tail'); ?>
