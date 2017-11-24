<?php
//echo"<pre>";print_r($operators_list);die;
?>
<script>
  var operators_list = <?php echo $operators_list; ?>;
</script>

<section class="hbox stretch">
    <section class="vbox">
        <section class="scrollable padder">
            <div class="m-b-md">
                <h3 class="m-b-none">Operators list</h3>
            </div>
            <section class="panel panel-default">
                <div class="table-responsive">
                    <table id="example" class="table table-striped m-b-none" data-ride="datatables">
                        <thead>
                        <tr>
                            <th width="5%">Id</th>
                            <th width="12%">Name</th>
                            <th width="12%">Phone number</th>
                            <th width="12%">Last call time</th>
                            <th width="15%">Count of calls for 6 hours</th>
                            <th width="15%">Count of calls for 24 hours</th>
                            <th width="15%">Count of calls for 48 hours</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </section>
        </section>
</section>
<a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
