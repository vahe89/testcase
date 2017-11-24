<?php Session::init(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Test</title>
    <link rel="stylesheet" type="text/css" href = "<?php echo URL; ?>public/css/default.css" />
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
    <script type="text/javascript" src="<?php echo URL; ?>public/js/jquery.js">    </script>
    <script type="text/javascript" src="<?php echo URL; ?>public/js/jquery-ui.js">    </script>
    <link rel="stylesheet" href = "<?php echo URL; ?>public/bootstrap/css/bootstrap.min.css" />
    <script type="text/javascript" src="<?php echo URL; ?>public/bootstrap/js/bootstrap.min.js">    </script>
<!--    <script type="text/javascript" src="<?php /*echo URL; */?>public/js/bootbox.js">    </script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>

<!--    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" />
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script>-->
</head>

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <button type="button" class="navbar-toggle"
                data-toggle="collapse"
                data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>

        </button>
        <?php if (Session::get('loggedIn')==true):?>
            <a class="navbar-brand" href="<?php echo URL; ?>dashboard">My account</a>
        <?php else:?>
            <a class="navbar-brand" href="<?php echo URL; ?>login">Login</a>
            <a class="navbar-brand" href="<?php echo URL; ?>register">Register</a>
        <?php endif; ?>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"> <a  href="<?php echo URL; ?>index">Home</a></li>
                <li><a  href="<?php echo URL; ?>help">About</a></li>
                <?php if (Session::get('loggedIn')==true):

                $id = $_SESSION['user_id'];?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle"
                       data-toggle="dropdown">More <b class="caret"></b>
                        <ul class="dropdown-menu">

                            <li><a  href="<?php echo URL; ?>userImages/display?user_id=<?php echo $id; ?>">My Photos</a></li>
                            <li><a  href="<?php echo URL; ?>settings">Settings</a></li>
                            <li><a href="<?php echo URL; ?>dashboard/logout">Log out</a></li>
                        </ul>
                    </a>
                </li>
            </ul>
        </div>
    <?php endif; ?>


    </div>

</nav>
<body>

<!--<div id="header">-->


    <!-- <input class="button" type="button" value="submit" />

 <a href="views/index/index.php">Index</a>
   <!--<form action='http://localhost/modelviewcontroller/controllers/help.php'><input type="submit"  value='Help' > </form>-->
  <!--  <a href="views/help/index.php">Help</a>
    <a href="views/login/index.php">Login</a>-->


<!--</div>-->
<div id="content">

