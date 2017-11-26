<form>
    <div class="form-group">
        <label for="op_name">Name:</label>
        <input type="text" class="form-control" id="op_name" name="name" value="<?php echo $data->name;?>">
    </div>
    <div class="form-group">
        <label for="op_phone">Phone:</label>
        <input type="text" class="form-control" id="op_phone" name="phone" value="<?php echo $data->phone;?>">
    </div>
<input type="hidden" name="op_id" id="op_id" value="<?php echo $data->id;?>"/>
    <button type="button" class="btn btn-default" id="save_operator"  >Save</button>
</form>