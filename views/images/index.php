<?php Session::init(); ?>
<?php ; ?>
<!--<h1>You are logged in </h1><br />-->
<!--<script type="text/javascript" src="<?php /*echo URL; */?>public/js/jquery.js">    </script>
<link rel="stylesheet" type="text/css" href = "<?php /*echo URL; */?>public/bootstrap/css/bootstrap.css" />-->
<div id="listInserts">

</div>
<div align="center">
    <button type="button" name="add" id="add" class="btn btn-success">Add</button>
</div>
<br />
<table class="table table-bordered table-striped">
    <tr>
        <th width=\"40%\">Image</th>
        <th width=\"10%\">Text</th>
        <th width=\"10%\">Change</th>
        <th width=\"10%\">Remove</th>
    </tr>
    <?php
    /*foreach ($link->query(' SELECT * FROM ' . DB_TABLE2) as $row) {
        //$output .='
        echo "
				<tr>
				<td>";
        //echo '<img  src="data:image;base64,' . base64_encode($row["name"]) . '" height="60" width="75" class="img-thumbnail" >';
        echo '<img  src="data:image;base64,' .$row["image"] . '" height="60" width="75" class="img-thumbnail" >';

        echo " </td>
				<td><button type='button' name='update' class='btn btn-warning bt-xs update' id=" . $row["id"] . ">
				Change</button></td>
				<td><button type='button' name='delete' class='btn btn-danger bt-xs delete' id=" . $row["id"] . ">
				Remove</button></td>
				</tr>
				";
    }*/
    ?>

<h1><?php
    $user_id = $_SESSION['user_id'];
    $array = $_SESSION['array'];
    //$image_id = $_SESSION['array'];
   // var_dump($array['text']);
    //var_dump($_SESSION['array']);

   // if(isset($_SESSION['array'])){
        //Loop through it like any other array.
    /*    foreach($array as &$text){
            //Print out the product ID.
            //var_dump($text). '<br>';
            //print_r($text). '<br>';
            //echo json_encode($text). '<br>';
            echo $text["text"]. '<br>';
        }*/
   /* foreach($array as &$image){
        //Print out the product ID.
        //var_dump($text). '<br>';
        //print_r($text). '<br>';
        //echo json_encode($text). '<br>';
        echo '<img  src="data:image;base64,' .$image["image"] . '" height="60" width="75" class="img-thumbnail" > <br>';
    }*/
    //}
    foreach($array as &$data) {
        echo "
				<tr>
				<td>";
        //echo '<img  src="data:image;base64,' . base64_encode($row["name"]) . '" height="60" width="75" class="img-thumbnail" >';
        echo '<img  src="data:image;base64,' . $data["image"] . '" height="60" width="75" class="img-thumbnail" >';
    echo " </td>";
        echo " </td>
                <td>".$data["text"]."</td>
				<td><button type='button' name='update' class='btn btn-warning bt-xs update' id=" . $data["id"] . ">
				Change</button></td>
				<td><button type='button' name='delete' class='btn btn-danger bt-xs delete' id=" . $data["id"] . ">
				Remove</button></td>
				</tr>
				";
        //var_dump($data['text']);
    }
    //var_dump($data['text'][14]);



    ?>
</table>


<br />


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
                    <input type="text" name="text" id="text" placeholder="Write a comment"/><br />
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
                        url:"<?php echo URL;?>userImages/imageInsertEditDelete?user_id=<?php echo $user_id; ?>",
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
                    url:"<?php echo URL;?>userImages/imageInsertEditDelete",
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
<?php /*if(isset($_POST["action"])) {

}
*/?>

<div id="listInserts">

</div>
