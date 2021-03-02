
<script>
    var client_arr = [];
    var staff_arr = [];
    function choose_clients(field) {
        var i = client_arr.indexOf(field);
        if (i != -1) {
            client_arr.splice(i, 1);
            jQuery('#client_li_' + field).css("color", "black");
        }
        else {
            client_arr.push(field);
            jQuery('#client_li_' + field).css("color", "red");
        }
    }
    function choose_staffs(field) {
        var i = staff_arr.indexOf(field);
        if (i != -1) {
            staff_arr.splice(i, 1);
            jQuery('#staff_li_' + field).css("color", "black");
        }
        else {
            staff_arr.push(field);
            jQuery('#staff_li_' + field).css("color", "red");
        }
    }
</script>
<div class="content">
    <div class="row" style="margin: 25px 25px; border-bottom : 1px solid;"">
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal" href="<?php echo site_url('messages_create_templete') ?>">
        Create Template
        </button>
        <a class="btn btn-primary btn-sm" href="<?php echo site_url('messages_create_templete') ?>">Create Template</a>
        <a class="btn btn-primary btn-sm" href="#">Delete Templete</a>
        <a class="btn btn-primary btn-sm" href="#">Sent Messages</a>
        <div style="display: inline-block; text-align: center; margin-left: 20%">
            <p style="font-size: 20px; color: #b21472">Messages Page</p>
        </div>
        <div class="dropdown" style="display: inline-block; float: right">
            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" style="text-align: center; margin-right: 70px; margin-left: 30px">Choose Clients</button>
            <ul class="dropdown-menu" style="text-align: left; width: 200px">
                <?php for($i = 0; $i < sizeof($clients); $i++){
                    echo
                    ("<li><a href='#' id='client_li_".$i."' onclick='choose_clients(".$i.")'>".$clients[$i]->client_firstname."&nbsp".$clients[$i]->client_lastname."</a></li>");
                }
                ?>
            </ul>
        </div>
        <div class="dropdown" style="display: inline-block; float: right; margin-right: 10px;">
            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" style="text-align: center">Choose Staffs</button>
            <ul class="dropdown-menu" style="text-align: left; width: 200px">
                <?php
                for($i = 0; $i < sizeof($staffs); $i++){
                    echo
                    ("<li><a href='#' id='staff_li_".$i."' onclick='choose_staffs(".$i.")'>".$staffs[$i]->staff_firstname."&nbsp".$staffs[$i]->staff_lastname."</a></li>");
                }
                ?>
            </ul>
        </div>
    </div>
</div>
