<?php Session::init();
if (isset($_SESSION["username"]))
{
    header('location:' . URL . 'dashboard');
}
?>

<h1>Login page</h1>

<div style = "padding: 100px 100px 10px;">

    <form class = "bs-example bs-example-form" action="login/run"  method="post" id="MyForm">
        <div class = "row">

            <div class = "col-lg-8">
                <div class = "form-inline">


                  <label >Username</label>


                    <input type = "text" class = "form-control" name = "username" placeholder="Enter username" id="username" />
                </div><!-- /input-group -->
            </div><!-- /.col-lg-6 --><br>
            <div class = "col-lg-8">
                <div class = "form-inline">
                  <label >Password</label>
                    <input type="password" name = "password" placeholder="Enter password" class = "form-control" id="password" />
                </div><!-- /input-group -->

                <div class="container" id="error">    </div>
                <div class="checkbox">
                    <label></label><label><input type="checkbox" name="remember"> Remember me</label>
                </div>
                <br />
                <label></label><input class="btn btn-primary"  type="submit" value="Log In" name="login" />
            </div><!-- /.col-lg-6 -->

        </div><!-- /.row -->

    </form>

</div>

