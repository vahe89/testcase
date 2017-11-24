<?php Session::init();
if (!isset($_SESSION["user_id"]))
{
    header('location: ' . URL . 'login');
}
?>
<?php
if (isset($_COOKIE["username"]) && isset($_COOKIE["password"]))
{
    $username1 = $_COOKIE["username"];
    $password1 = $_COOKIE["password"];
    echo $username1.','.$password1;
}
?>

<h1><?php
    $id = $_SESSION['user_id'];
    /*try {
        // $sth = $this->db->query("SELECT `id` FROM ".DB_TABLE." WHERE `username` = '$username' AND `password` = '$password' " );
        $sth = $this->db->query("SELECT * FROM " . DB_TABLE1 . " WHERE `id` = $id ");

    } catch (PDOException $e) {
        die($e->getMessage());
    }
    var_dump($sth) ;

    $data = $sth->fetch();
    $username = $data['username'];
    $password = $data['password'];
    $firstname = $data['first_name'];
    $lastname = $data['last_name'];*/

   // $username = $_COOKIE['username']; $password = $_COOKIE['password'];
   // echo 'username:'.$username.'<br />password: ' .$password;
    $username = $_SESSION['username']; $password = $_SESSION['password'];
    //$firstname = $_COOKIE['firstname']; $lastname = $_COOKIE['lastname'];
    $firstname = $_SESSION['firstname']; $lastname = $_SESSION['lastname'];
    //var_dump($firstname);
    //var_dump($lastname);
    $profile = $_SESSION['profile'];
    echo '<span style="color:darkred;text-align:center;">Welcome '.$firstname.'  '.$lastname.'</span>' ; ?></h1>

<br />
<?php if (empty($profile)):?>
    <div align="center">
        <button type="button" name="add" id="add" class="btn btn-success">Add a profile picture</button>
    </div>
    <br />
<?php else:?>

    <?php
    $profile = $_SESSION['profile'];
    $comment = $_SESSION['comment'];
    if (!empty($comment))
    {
        echo '<table><th rowspan="2">'. $comment.'</th></table>';
    }
    echo '<table><td rowspan="2"><img  src="data:image;base64,' . $profile . '" height="300" width="300" class="img-thumbnail" ></td></table>'; ?>
    <table><td><input type='button' name='update' value="Change" class='btn btn-warning bt-xs update' id="<?php echo $id; ?>">
    <input type='button' name='delete' value="Delete" class='btn btn-danger bt-xs delete' id="<?php echo $id; ?>">
    </td></table>
<?php endif; ?>
<div id="image_data">
</div>
<div id="imageModal" class="modal fade" role="dialog">

    <div class="modal-dialog">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss ="modal">&times</button>
            <h4 class="modal-title">Add image</h4>
        </div>
        <div class="modal-body">
            <form id="image_form" method="post" enctype="multipart/form-data">
                <p><label>Select Image</label><br />
                    <input type="file" name="image" id="image"/></p><br />
                <p><label>Comment</label><br />
                <input type="text" name="text" id="text" placeholder="Write a comment" /><br />
                <input type="hidden" name="action" id="action" value="insert"/>
                <input type="hidden" name="image_id" id="image_id"/>
                <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" />

            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss ="modal">Close</button>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        //fetch_data();
        function fetch_data()
        {
            /*     var action = "fetch";
                 $.ajax({
                     url:"userImages?user_id=",
                     method:"POST",
                     data:{action:action},
                     success:function(data)
                     {
                         $('#image_data').html(data);
                     }
                 })*/
        }
        $('#add').click(function () {
            $('#imageModal').modal('show');
            $('#image_form')[0].reset();
            $('.modal-title').text("Add Image");
            $('#image_id').val('');
            $('#action').val('insert');
            $('#insert').val('Insert');
        });
        $('#image_form').submit(function (event) {
            event.preventDefault();
            var image_name = $('#image').val();
            if (image_name == '')
            {
                alert("Please Select Image");
                return false;
            }
            else
            {
                var extention = $('#image').val().split('.').pop().toLowerCase();
                if (jQuery.inArray(extention,['gif','png','jpg','jpeg'])==-1)
                {
                    alert("Invalid Image File");
                    $('#image').val('');
                    return false;
                }
                else
                {
                    $.ajax({
                        url:"<?php echo URL;?>login/profile?user_id=<?php echo $id; ?>",
                        method:"POST",
                        data:new FormData(this),
                        contentType:false,
                        processData:false,
                        success:function (data) {
                            //alert("Image inserted successfully");
                            alert(data);
                            fetch_data();
                            $('#image_form')[0].reset();
                            $('#imageModal').modal('hide');
                            location.reload();
                        }
                    })
                }
            }
        });
        $(document).on('click','.update',function () {
            $('#image_id').val($(this).attr("id"));
            $('#action').val("update");
            $('.modal-title').text("Update Image");
            $('#insert').val("Update");
            $('#imageModal').modal("show");

        });
        $(document).on('click','.delete',function () {
            var image_id = $(this).attr("id");
            var action = "delete";
            if (confirm("Are you sure you want to remove this image from database?"))
            {
                $.ajax({
                    url:"<?php echo URL;?>login/profile?user_id=<?php echo $id; ?>",
                    method:"POST",
                    data:{image_id:image_id,action:action},
                    success:function(data)
                    {
                        alert(data);
                        fetch_data();
                        location.reload();
                    }
                })
            }
            else
            {
                return false;
            }

        });
    });
</script>
   <!-- <form id="randomInsert" action="dashboard/xhrInsert" method="post">
        <!--<label>Login</label><input type="text" name = "login" /><br />
        <label>Password</label><input type="password" name = "password" /><br />-->
       <!-- <label>Text</label><input type="text" name = "text" /><br />
        <label></label><input type="submit" />
    </form>-->
<!--<form action="<?php /*echo URL;*/?>userImages/display?user_id=<?php /*echo $id; */?>" method="post">
<div align="center">
    <input type="submit" name="images" id="images" class="button" value="My Photos" />
</div>
<br />

</form>-->

<!--</form>
<input class="button1" type="submit" name="ed" value="del"/>


<form id="randomInsert" action="UserEdit" method="post">
    <label></label><input class="button" type="submit" name="edit" value="Edit" onclick="return confirmation()"/>
</form>-->
<!--<script>
    function confirmation()
    {
       // $(document).on("click", ".button1", function(e) {

        bootbox.dialog({
            message: "are you sure",
            title: "are you sure",
            buttons: {
                success: {
                    label: "Confirm",
                    className: "btn-success"
                },
                danger: {
                    label: "Cancel",
                    className: "btn-danger"
                }
            }
        });

/*        e.preventDefault();
        var link = $(this).attr("UserEdit"); // "get" the intended link in a var
        bootbox.confirm({
            closeButton: false,
            message: "Do you want to delete your account now? ",
            buttons: {
                confirm: {
                    label: 'Yes',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'No',
                    className: 'btn-danger'
          /!*          callback:function() {
                        return false;
                    }*!/
                }
            },
            callback: function (result) {
                console.log('This was logged in the callback: ' + result);
                //document.write(result);
            }
        });*/
   // });
    }
    /* bootbox.confirm({
       title: "Delete your account?",
       message: "Do you want to delete your account now? ",
       buttons: {
           cancel: {
               label: '<i class="fa fa-times"></i> Cancel'
           },
           confirm: {
               label: '<i class="fa fa-check"></i> Confirm'
           }
       },
       callback: function (result) {
           console.log('This was logged in the callback: ' + result);
       }
   });*/
</script>-->

