<?php Session::init(); ?>
<h1>Register page</h1>

<div style = "padding: 100px 100px 10px;">

    <form class = "bs-example bs-example-form" action="register/run" method="post" id="MyForm">
        <div class = "row">

            <div class = "col-lg-8">
                <div class = "form-inline">
                    <label >Username</label>
                    <input type = "text" class = "form-control" name = "username" placeholder="Enter username" id="username" />
                </div><!-- /inline-group -->
            </div><!-- /.col-lg-8 --><br>
            <div class = "col-lg-8">
                <div class = "form-inline">
                    <label >Password</label>
                    <input type="password" name = "password" placeholder="Enter password" class = "form-control" id="password" />
                </div><!-- /inline-group -->
                <div class = "form-inline">
                    <label >Repeat Password</label>
                    <input type = "password" class = "form-control" name = "password1" placeholder="Repeat password" />
                </div>
                <div class = "form-inline">
                    <label >First Name</label>
                    <input type = "text" class = "form-control" name = "first_name" placeholder="Enter first name" />
                </div>
                <div class = "form-inline">
                    <label >Last Name</label>
                    <input type = "text" class = "form-control" name = "last_name" placeholder="Enter last name" />
                </div>
                <div class="checkbox">
                    <label></label><label><input type="checkbox" name="remember"> Remember me</label>
                </div>
                <br />
                <label></label><input class="btn btn-primary"  type="submit" value="Register" name="register"/>
            </div><!-- /.col-lg-8 -->

        </div><!-- /.row -->

    </form>

</div>
