<!DOCTYPE html>
<html>
<head>
    <title>Test</title>
    <link rel="stylesheet" type="text/css" href = "<?php echo URL; ?>public/css/default.css" />
    <script type="text/javascript" src="<?php echo URL; ?>public/js/jquery.js">    </script>
    <script type="text/javascript" src="<?php echo URL; ?>public/js/jquery-ui.js">    </script>
    <link rel="stylesheet" href = "<?php echo URL; ?>public/bootstrap/css/bootstrap.min.css" />
    <script type="text/javascript" src="<?php echo URL; ?>public/bootstrap/js/bootstrap.min.js">    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>

<!--    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" />
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script>-->
</head>
<body class="">
<section class="vbox">
    <header class="bg-white header header-md navbar navbar-fixed-top-xs box-shadow">
        <div class="navbar-header aside-md dk">
            <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav">
                <i class="fa fa-bars"></i>
            </a>
            <a href="index.html" class="navbar-brand">
                <img src="../public/theme/admin_panel/images/logo.png" class="m-r-sm" alt="scale">
                <span class="hidden-nav-xs">Logo</span>
            </a>
            <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user">
                <i class="fa fa-cog"></i>
            </a>
        </div>
        <ul class="nav navbar-nav hidden-xs">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="i i-grid"></i>
                </a>
                <section class="dropdown-menu aside-lg bg-white on animated fadeInLeft">
                    <div class="row m-l-none m-r-none m-t m-b text-center">
                        <div class="col-xs-4">
                            <div class="padder-v">
                                <a href="#">
                    <span class="m-b-xs block">
                      <i class="i i-mail i-2x text-primary-lt"></i>
                    </span>
                                    <small class="text-muted">Mailbox</small>
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="padder-v">
                                <a href="#">
                    <span class="m-b-xs block">
                      <i class="i i-calendar i-2x text-danger-lt"></i>
                    </span>
                                    <small class="text-muted">Calendar</small>
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="padder-v">
                                <a href="#">
                    <span class="m-b-xs block">
                      <i class="i i-map i-2x text-success-lt"></i>
                    </span>
                                    <small class="text-muted">Map</small>
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="padder-v">
                                <a href="#">
                    <span class="m-b-xs block">
                      <i class="i i-paperplane i-2x text-info-lt"></i>
                    </span>
                                    <small class="text-muted">Trainning</small>
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="padder-v">
                                <a href="#">
                    <span class="m-b-xs block">
                      <i class="i i-images i-2x text-muted"></i>
                    </span>
                                    <small class="text-muted">Photos</small>
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="padder-v">
                                <a href="#">
                    <span class="m-b-xs block">
                      <i class="i i-clock i-2x text-warning-lter"></i>
                    </span>
                                    <small class="text-muted">Timeline</small>
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
            </li>
        </ul>
        <form class="navbar-form navbar-left input-s-lg m-t m-l-n-xs hidden-xs" role="search">
            <div class="form-group">
                <div class="input-group">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-sm bg-white b-white btn-icon"><i class="fa fa-search"></i></button>
            </span>
                    <input type="text" class="form-control input-sm no-border" placeholder="Search apps, projects...">
                </div>
            </div>
        </form>
        <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user user">
            <li class="hidden-xs">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="i i-chat3"></i>
                    <span class="badge badge-sm up bg-danger count">2</span>
                </a>
                <section class="dropdown-menu aside-xl animated flipInY">
                    <section class="panel bg-white">
                        <div class="panel-heading b-light bg-light">
                            <strong>You have <span class="count">2</span> notifications</strong>
                        </div>
                        <div class="list-group list-group-alt">
                            <a href="#" class="media list-group-item">
                  <span class="pull-left thumb-sm">
                    <img src="images/a0.png" alt="..." class="img-circle">
                  </span>
                                <span class="media-body block m-b-none">
                    Use awesome animate.css<br>
                    <small class="text-muted">10 minutes ago</small>
                  </span>
                            </a>
                            <a href="#" class="media list-group-item">
                  <span class="media-body block m-b-none">
                    1.0 initial released<br>
                    <small class="text-muted">1 hour ago</small>
                  </span>
                            </a>
                        </div>
                        <div class="panel-footer text-sm">
                            <a href="#" class="pull-right"><i class="fa fa-cog"></i></a>
                            <a href="#notes" data-toggle="class:show animated fadeInRight">See all the notifications</a>
                        </div>
                    </section>
                </section>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span class="thumb-sm avatar pull-left">
              <img src="images/a0.png" alt="...">
            </span>
                    John.Smith <b class="caret"></b>
                </a>
                <ul class="dropdown-menu animated fadeInRight">
                    <li>
                        <span class="arrow top"></span>
                        <a href="#">Settings</a>
                    </li>
                    <li>
                        <a href="profile.html">Profile</a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="badge bg-danger pull-right">3</span>
                            Notifications
                        </a>
                    </li>
                    <li>
                        <a href="docs.html">Help</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="modal.lockme.html" data-toggle="ajaxModal">Logout</a>
                    </li>
                </ul>
            </li>
        </ul>
    </header>
    <section>
        <section class="hbox stretch">
            <!-- .aside -->
            <aside class="bg-black aside-md hidden-print" id="nav">
                <section class="vbox">
                    <section class="w-f scrollable">
                        <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0"
                             data-size="10px" data-railOpacity="0.2">
                            <div class="clearfix wrapper dk nav-user hidden-xs">
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <span class="thumb avatar pull-left m-r">
                        <img src="images/a0.png" class="dker" alt="...">
                        <i class="on md b-black"></i>
                      </span>
                                        <span class="hidden-nav-xs clear">
                        <span class="block m-t-xs">
                          <strong class="font-bold text-lt">John.Smith</strong>
                          <b class="caret"></b>
                        </span>
                        <span class="text-muted text-xs block">Art Director</span>
                      </span>
                                    </a>
                                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                        <li>
                                            <span class="arrow top hidden-nav-xs"></span>
                                            <a href="#">Settings</a>
                                        </li>
                                        <li>
                                            <a href="profile.html">Profile</a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="badge bg-danger pull-right">3</span>
                                                Notifications
                                            </a>
                                        </li>
                                        <li>
                                            <a href="docs.html">Help</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="modal.lockme.html" data-toggle="ajaxModal">Logout</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

</nav>
<body>

<div id="content">

