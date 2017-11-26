<?php
//echo"<pre>";print_r($operators_list);die;
?>


<section class="hbox stretch">
    <section class="vbox">

        <ul class="nav nav-tabs">

            <li class="active"><a data-toggle="tab" href="#menu1">Operators List</a></li>
            <li><a data-toggle="tab" href="#menu2">Call logs List</a></li>
        </ul>

        <div class="tab-content">
            <div id="menu1" class="tab-pane fade in active">
                <section class="scrollable padder">
                    <div class="m-b-md">
                        <h3 class="m-b-none">Operators list</h3>
                    </div>
                    <section class="panel panel-default">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped m-b-none" data-ride="datatables">
                                <thead>
                                <tr>
                                    <th >Id</th>
                                    <th >Name</th>
                                    <th >Phone number</th>
                                    <th >Last call time</th>
                                    <th>Calls Count /  6h</th>
                                    <th >Calls Count / 24h</th>
                                    <th>Calls Count / 48h</th>
                                    <th >Last Call Time</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </section>
                </section>
            </div>
            <div id="menu2" class="tab-pane fade">
                <section class="scrollable padder">
                    <div class="m-b-md">
                        <h3 class="m-b-none">Call Logs list</h3>
                    </div>
                    <section class="panel panel-default">
                        <div class="table-responsive">
                            <table id="example_2" class="table table-striped m-b-none" data-ride="datatables">
                                <thead>
                                <tr>
                                    <th >Id</th>
                                    <th >Operator</th>
                                    <th >Inbound Number</th>
                                    <th >Outbound Number</th>
                                    <th >Duration</th>
                                    <th>Call Time</th>


                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </section>
                </section>
            </div>
        </div>

</section>
<a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
