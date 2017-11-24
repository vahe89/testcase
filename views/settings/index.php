<?php Session::init(); ?>
<h1>User Settingts</h1>

<?php $id = $_SESSION['user_id'];

?>

<form method="post" action="<?php echo URL;?>userEdit">

    <label >Edit My Account </label><input class="btn btn-primary" type="submit" name = "edit" value="Edit" />
</form>
    <form method="post" action="<?php echo URL;?>userDelete/delete?id=<?php echo $id; ?>">
        <label>Delete My Account</label><input onclick="return confirm('Are you sure you want to delete your account?')" class="btn btn-danger" type="submit" name = "delete" value="Delete"/ ><br />


    </form>
