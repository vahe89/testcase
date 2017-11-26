<section class="hbox stretch">
    <section class="vbox">
        <section class="scrollable padder">
            <div class="m-b-md">
                <h3 class="m-b-none">New message</h3>
            </div>
            <section class="panel panel-default">


                <form id="new_message" action="#" method="post">
                    <div class="form-group">
                        <select id="select2_operators" class="form-control col-md-6 col-lg-6" name="operator_id">
                            <option value="0">Select Operator</option>
                            <?php foreach ($operators as $operator):?>
                                <option value="<?php echo $operator->id;?>"><?php echo $operator->name;?></option>
                            <?php endforeach; ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Message:</label>
                        <textarea name="message" class="form-control col-md-6 col-lg-6" ></textarea>
                    </div>

                    <button type="button" class="btn btn-default right" id="show_message">Show Message</button>

                </form>
            </section>
        </section>
    </section>
    <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
