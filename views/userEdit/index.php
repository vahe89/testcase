<?php Session::init(); ?>
<h1>User</h1>

<?php $id = $_SESSION['user_id']; $username = $_SESSION['username'];
$password = $_SESSION['password'];
$firstname = $_SESSION['firstname']; $lastname = $_SESSION['lastname'];

// echo "

//";
?>

<div style = "padding: 100px 100px 10px;">

    <form class = "bs-example bs-example-form" action="<?php echo URL;?>userEdit/edit?id=<?php echo $id; ?>" method="post">
        <div class = "row">

            <div class = "col-lg-8">
                <div class = "form-inline">
                    <label >Username</label>
                    <input type = "text" class = "form-control" name = "username" placeholder="Enter username" value="<?php echo $username; ?>" required/>
                </div><!-- /inline-group -->
            </div><!-- /.col-lg-8 --><br>
            <div class = "col-lg-8">
                <div class = "form-inline">
                    <label >Password</label>
                    <input type="password" name = "password" placeholder="Enter password" class = "form-control" value="<?php echo $password; ?>" required />
                </div><!-- /inline-group -->
                <div class = "form-inline">
                    <label >First Name</label>
                    <input type = "text" class = "form-control" name = "first_name" placeholder="Enter first name" value="<?php echo $firstname; ?>" />
                </div>
                <div class = "form-inline">
                    <label >Last Name</label>
                    <input type = "text" class = "form-control" name = "last_name" placeholder="Enter last name" value="<?php echo $lastname; ?>" />
                </div>
                <div class="checkbox">
                    <label></label><label><input type="checkbox" name="remember"> Remember me</label>
                </div>
                <br />
                <label></label><input onclick="return confirm('Are you sure you want to submit changes?')" class="btn btn-primary" type="submit" value="Submit changes" name="submitchanges"/>

            </div><!-- /.col-lg-8 -->

        </div><!-- /.row -->

    </form>

</div>
