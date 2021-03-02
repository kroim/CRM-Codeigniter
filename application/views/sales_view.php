<?php
$checks = array();
for($i=0;$i<sizeof($property);$i++){
    $checks[$i] = $property[$i]->PK_PPID;
}
?>
<div class="body" style="font-family: Arial; font-style: inherit">
<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#update_sales" id="Update_Sales" style="display: none">
    Update  ( clients / staffs )
</button>
<div class="modal fade" id="update_sales" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?php echo site_url();?>/sales_add/update" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="myModalLabel">Update Sales</h2>
                    </div>
                    <div class="modal-body">
                        <label style="display: none"><b>No</b></label>
                        <input class="form-control" id="add_PK_PPID" type="text" name="PK_PPID" style="width: 100%; padding: 12px 12px; display:none">
                        <label><b>Lot No.</b></label>
                        <input class="form-control" id="add_PP_lotnumber" type="text" name="PP_lotnumber" style="width: 100%; padding: 12px 12px; display: inline-block">
                        <label><b>Appartment No.</b></label>
                        <input class="form-control" id="add_PP_apptnumber" type="text" name="PP_apptnumber" style="width: 100%; padding: 12px 12px; display: inline-block">
                        <label><b>Price</b></label>
                        <input class="form-control" id="add_PP_price" type="text" name="PP_price" style="width: 100%; padding: 12px 12px; display: inline-block">
                        <label><b>Staff ID</b></label>
                        <input class="form-control" id="add_FK_staffID" type="text" name="FK_staffID" style="width: 100%; padding: 12px 12px; display: inline-block">
                        <label><b>Client ID</b></label>
                        <input class="form-control" id="add_FK_clientID" type="text" name="FK_clientID" style="width: 100%; padding: 12px 12px; display: inline-block">
                        <label><b>Property Comments</b></label>
                        <input class="form-control" id="add_PP_comments" type="text" name="PP_comments" style="width: 100%; padding: 12px 12px; display: inline-block">
                        <label><b>Project ID</b></label>
                        <input class="form-control" id="add_FK_SPID" type="text" name="FK_SPID" style="width: 100%; padding: 12px 12px; display: inline-block">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="history.go(0)">CANCEL</button>
                        <button type="submit" class="btn btn-primary">UPDATE</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
<script>
    function set_font(font){
        /// Ajax php send post
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/ajax_post_controller/user_data_submit",
            dataType: 'json',
            data: {fontsize: font}
        });
        ///
        jQuery('#myTable').css("font-size", font + "px");
    }
    function choose_fields(field){
        if(jQuery('.'+ field).css("display") == "none"){
            jQuery('.'+ field).css("display", " ");
            jQuery('#choose_'+ field).css("color", "black");
        }
        else{
            jQuery('.'+ field).css("display", "none");
            jQuery('#choose_'+ field).css("color", "red");
        }

    }
    function update_property(property_id){

        var id = jQuery('#tr-' + property_id).find(".No_id").text();
        console.log(id);
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/ajax_post_controller/update_sales",
            dataType: 'json',
            data: {PK_PPID: id}
        }).done(function(data){
            var a = data;
            console.log('kkk');
            $("#update_sales").find("input[name='PK_PPID']").val(data[0]['PK_PPID']);
            $("#update_sales").find("input[name='PP_lotnumber']").val(data[0]['PP_lotnumber']);
            $("#update_sales").find("input[name='PP_apptnumber']").val(data[0]['PP_apptnumber']);
            $("#update_sales").find("input[name='PP_price']").val(data[0]['PP_price']);
            $("#update_sales").find("input[name='FK_staffID']").val(data[0]['FK_staffID']);
            $("#update_sales").find("input[name='FK_clientID']").val(data[0]['FK_clientID']);
            $("#update_sales").find("input[name='PP_comments']").val(data[0]['PP_comments']);
            $("#update_sales").find("input[name='FK_SPID']").val(data[0]['FK_SPID']);
            jQuery("#Update_Sales").focus().click();
        }).fail(function(){
            alert("Posting failed.")
        });

        //console.log(id);
    }
</script>

<link href="<?php echo base_url('access/multifilter/mysearch.css')?>" rel="stylesheet">
<script src="<?php echo base_url('access/multifilter/multi.js')?>"></script>
<script src="<?php echo base_url('access/multifilter/multifilter.js')?>"></script>
<script src="<?php echo base_url('access/js/excellentexport.js')?>"></script>
<script type='text/javascript'>
    //<![CDATA[
    $(document).ready(function() {
        $('.filter').multifilter()
    })
</script>
<div class="content">
    <div class="row" style="margin: 25px 25px; border-bottom : 1px solid;"">
    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal" href="<?php echo site_url('csv/salesUpload') ?>">
        Import
    </button>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div>

    <a class="btn btn-primary btn-sm" href="#" onclick="myexport()">Export</a>

    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addModal" id="Add_Clients">
        Add Sales
    </button>
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?php echo site_url();?>/sales_add/save" method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title" id="myModalLabel">Add Sales</h2>
                        </div>
                        <div class="modal-body">
                            <label><b>Lot No.</b></label>
                            <input class="form-control" id="add_PP_lotnumber" type="text" name="PP_lotnumber" style="width: 100%; padding: 12px 12px; display: inline-block">
                            <label><b>Appartment No.</b></label>
                            <input class="form-control" id="add_PP_apptnumber" type="text" name="PP_apptnumber" style="width: 100%; padding: 12px 12px; display: inline-block">
                            <label><b>Price</b></label>
                            <input class="form-control" id="add_PP_price" type="text" name="PP_price" style="width: 100%; padding: 12px 12px; display: inline-block">
                            <label><b>Staff ID</b></label>
                            <input class="form-control" id="add_FK_staffID" type="text" name="FK_staffID" style="width: 100%; padding: 12px 12px; display: inline-block">
                            <label><b>Client ID</b></label>
                            <input class="form-control" id="add_FK_clientID" type="text" name="FK_clientID" style="width: 100%; padding: 12px 12px; display: inline-block">
                            <label><b>Property Comments</b></label>
                            <input class="form-control" id="add_PP_comments" type="text" name="PP_comments" style="width: 100%; padding: 12px 12px; display: inline-block">
                            <label><b>Project ID</b></label>
                            <input class="form-control" id="add_FK_SPID" type="text" name="FK_SPID" style="width: 100%; padding: 12px 12px; display: inline-block">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="history.go(0)">Close</button>
                            <button type="submit" class="btn btn-primary">Save Adding</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <a class="btn btn-primary btn-sm" href="#" onclick="mydelete()">Delete Sales</a>
    <div class="dropdown" style="display: inline-block; float: right">
        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" style="text-align: center">Font Size</button>
        <ul class="dropdown-menu" style="text-align: left; width: 200px">
            <li><a href="#" onclick="set_font(8)">8</a></li>
            <li><a href="#" onclick="set_font(10)">10</a></li>
            <li><a href="#" onclick="set_font(12)">12</a></li>
            <li><a href="#" onclick="set_font(14)">14</a></li>
            <li><a href="#" onclick="set_font(16)">16</a></li>
            <li><a href="#" onclick="set_font(18)">18</a></li>
            <li><a href="#" onclick="set_font(20)">20</a></li>
            <li><a href="#" onclick="set_font(22)">22</a></li>
        </ul>
    </div>
    <div style="display: inline-block; text-align: center; margin-left: 30%">
        <p style="font-size: 20px; color: #b21472">Sales Page</p></div>
    <div class="dropdown" style="display: inline-block; float: right; margin-right: 10px;">
        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" style="text-align: center">Choose Fields</button>
        <ul class="dropdown-menu" style="text-align: left; width: 200px">
<!--            <li><a href="#" id="choose_No_id" onclick="choose_fields('No_id')">No</a></li>-->
            <li><a href="#" id="choose_client_firstname" onclick="choose_fields('client_firstname')">Client First Name</a></li>
            <li><a href="#" id="choose_client_lastname" onclick="choose_fields('client_lastname')">Client Last Name</a></li>
            <li><a href="#" id="choose_client_phone" onclick="choose_fields('client_phone')">Client Phone</a></li>
            <li><a href="#" id="choose_client_email" onclick="choose_fields('client_email')">Client Email</a></li>
            <li><a href="#" id="choose_client_wechat" style="color: red" onclick="choose_fields('client_wechat')">Client WeChat</a></li>
            <li><a href="#" id="choose_client address" onclick="choose_fields('client_address')">Client Address</a></li>
            <li><a href="#" id="choose_client_firb" onclick="choose_fields('client_firb')">Client FIRB</a></li>
            <li><a href="#" id="choose_client_comments" style="color: red" onclick="choose_fields('client_comments')">Client Comments</a></li>
            <li><a href="#" id="choose_staff_firstname" onclick="choose_fields('staff_firstname')">Staff First Name</a></li>
            <li><a href="#" id="choose_staff_lastname" onclick="choose_fields('staff_lastname')">Staff Last Name</a></li>
            <li><a href="#" id="choose_staff_phone" onclick="choose_fields('staff_phone')">Staff Phone</a></li>
            <li><a href="#" id="choose_staff_email" style="color: red" onclick="choose_fields('staff_email')">Staff Email</a></li>
            <li><a href="#" id="choose_staff_wechat" style="color: red" onclick="choose_fields('staff_wechat')">Staff WeChat</a></li>
            <li><a href="#" id="choose_staff_employment_status" style="color: red" onclick="choose_fields('staff_employment_status')">Staff Employment Status</a></li>
            <li><a href="#" id="choose_staff_jobtitle" style="color: red" onclick="choose_fields('staff_jobtitle')">Staff Job Title</a></li>
            <li><a href="#" id="choose_staff_messagetoclient" style="color: red" onclick="choose_fields('staff_messagetoclient')">Staff Message To client</a></li>
            <li><a href="#" id="choose_staff_comments" style="color: red" onclick="choose_fields('staff_comments')">Staff Comments</a></li>
            <li><a href="#" id="choose_dept_leader" onclick="choose_fields('dept_leader')">Staff Comments</a></li>
            <li><a href="#" id="choose_PP_lotnumber" onclick="choose_fields('PP_lotnumber')">Lot No.</a></li>
            <li><a href="#" id="choose_PP_apptnumber" onclick="choose_fields('PP_apptnumber')">Appartment No.</a></li>
            <li><a href="#" id="choose_PP_price" onclick="choose_fields('PP_price')">Price</a></li>
            <li><a href="#" id="choose_PP_comments" style="color: red" onclick="choose_fields('PP_comments')">Property Comments</a></li>
            <li><a href="#" id="choose_SP_name" onclick="choose_fields('SP_name')">Project Name</a></li>
            <li><a href="#" id="choose_SP_stage" onclick="choose_fields('SP_stage')">Project Stage</a></li>
            <li><a href="#" id="choose_SP_comments" style="color: red" onclick="choose_fields('SP_comments')">Project comments</a></li>
            <li><a href="#" id="choose_SD_name" style="color: red" onclick="choose_fields('SD_name')">Deverloper</a></li>
            <li><a href="#" id="choose_SD_comments" style="color: red" onclick="choose_fields('SD_comments')">Deverloper comments</a></li>
        </ul>
    </div>
    <script>

        function mydelete(){
            jQuery("#delete_No_id").focus().click();
        }
        function myexport(){
            jQuery("#export_No_id").focus().click();
        }
        function allcheck(n){
            console.log(n);
            var ch_arr = <?php echo json_encode($checks);?>;
            console.log(ch_arr);
            if(document.getElementById('checkid').checked) {
                for(var i = 0; i < n; i++){
                    if(jQuery("#tr-"+ch_arr[i]).css('display') != 'none'){
                        jQuery("#check-"+ch_arr[i]).attr('checked', true);
                    }
                }

            } else {
                jQuery(".allcheck").attr('checked', false);
                location.reload();
            }
        }
    </script>
    <!-- Search Inputtext : HTML -->
</div>
<form id="table-scroll" action="<?php echo site_url()?>/sales_delete" method="post">
    <table id="myTable" style="font-size: <?php echo $fontsize;?>px;">

        <thead>
        <tr>
            <th class="check"><input type='checkbox' name='checkid' value='allcheck' id='checkid' onchange="allcheck(<?php echo sizeof($checks);?>)"></th>
            <th class="No_id" style="cursor: pointer; display: none" onclick="sort_table(people, 1, asc3); asc3 *= -1; asc1 = 1; asc2 = 1;">No</th>
            <th class="client_firstname" style="cursor: pointer" onclick="sort_table(people, 2, asc3); asc3 *= -1; asc1 = 1; asc2 = 1;">Client First Name</th>
            <th class="client_lastname" style="cursor: pointer" onclick="sort_table(people, 3, asc3); asc3 *= -1; asc1 = 1; asc2 = 1;">Client Last Name</th>
            <th class="client_phone" style="cursor: pointer" onclick="sort_table(people, 4, asc3); asc3 *= -1; asc1 = 1; asc2 = 1;">Client Phone</th>
            <th class="client_email" style="cursor: pointer" onclick="sort_table(people, 5, asc3); asc3 *= -1; asc1 = 1; asc2 = 1;">Client Email</th>
            <th class="client_wechat" style="cursor: pointer; display: none" onclick="sort_table(people, 6, asc3); asc3 *= -1; asc1 = 1; asc2 = 1;">Client WeChat</th>
            <th class="client_address"style="cursor: pointer" onclick="sort_table(people, 7, asc3); asc3 *= -1; asc1 = 1; asc2 = 1;">Client Address</th>
            <th class="client_firb" style="cursor: pointer" onclick="sort_table(people, 8, asc3); asc3 *= -1; asc1 = 1; asc2 = 1;">Client FIRB</th>
            <th class="client_comments" style="cursor: pointer; display: none" onclick="sort_table(people, 9, asc3); asc3 *= -1; asc1 = 1; asc2 = 1;">Client Comments</th>
            <th class="staff_firstname" style="cursor: pointer" onclick="sort_table(people, 2, asc3); asc3 *= -1; asc1 = 1; asc2 = 1;">Staff First Name</th>
            <th class="staff_lastname" style="cursor: pointer" onclick="sort_table(people, 3, asc3); asc3 *= -1; asc1 = 1; asc2 = 1;">Staff Last Name</th>
            <th class="staff_phone" style="cursor: pointer" onclick="sort_table(people, 4, asc3); asc3 *= -1; asc1 = 1; asc2 = 1;">Staff Phone</th>
            <th class="staff_email" style="cursor: pointer; display: none" onclick="sort_table(people, 5, asc3); asc3 *= -1; asc1 = 1; asc2 = 1;">Staff Email</th>
            <th class="staff_wechat" style="cursor: pointer; display: none" onclick="sort_table(people, 6, asc3); asc3 *= -1; asc1 = 1; asc2 = 1;">Staff WeChat</th>
            <th class="staff_employment_status"style="cursor: pointer; display: none" onclick="sort_table(people, 7, asc3); asc3 *= -1; asc1 = 1; asc2 = 1;">Staff Employment Status</th>
            <th class="staff_jobtitle" style="cursor: pointer; display: none" onclick="sort_table(people, 8, asc3); asc3 *= -1; asc1 = 1; asc2 = 1;">Staff Job Title</th>
            <th class="staff_messagetoclient" style="cursor: pointer; display: none" onclick="sort_table(people, 9, asc3); asc3 *= -1; asc1 = 1; asc2 = 1;">Staff Message To client</th>
            <th class="staff_comments" style="cursor: pointer; display: none" onclick="sort_table(people, 5, asc3); asc3 *= -1; asc1 = 1; asc2 = 1;">Staff Comments</th>
            <th class="dept_leader" style="cursor: pointer" onclick="sort_table(people, 6, asc3); asc3 *= -1; asc1 = 1; asc2 = 1;">Team leader</th>
            <th class="PP_lotnumber"style="cursor: pointer" onclick="sort_table(people, 7, asc3); asc3 *= -1; asc1 = 1; asc2 = 1;">Lot No.</th>
            <th class="PP_apptnumber" style="cursor: pointer" onclick="sort_table(people, 8, asc3); asc3 *= -1; asc1 = 1; asc2 = 1;">Appartment No.</th>
            <th class="PP_price" style="cursor: pointer" onclick="sort_table(people, 9, asc3); asc3 *= -1; asc1 = 1; asc2 = 1;">Price</th>
            <th class="PP_comments" style="cursor: pointer; display: none" onclick="sort_table(people, 2, asc3); asc3 *= -1; asc1 = 1; asc2 = 1;">Property Comments</th>
            <th class="SP_name" style="cursor: pointer" onclick="sort_table(people, 3, asc3); asc3 *= -1; asc1 = 1; asc2 = 1;">Project Name</th>
            <th class="SP_stage" style="cursor: pointer" onclick="sort_table(people, 4, asc3); asc3 *= -1; asc1 = 1; asc2 = 1;">Project Stage</th>
            <th class="SP_comments" style="cursor: pointer; display: none" onclick="sort_table(people, 5, asc3); asc3 *= -1; asc1 = 1; asc2 = 1;">Project comments</th>
            <th class="SD_name" style="cursor: pointer; display: none" onclick="sort_table(people, 6, asc3); asc3 *= -1; asc1 = 1; asc2 = 1;">Deverloper</th>
            <th class="SD_comments"style="cursor: pointer; display: none" onclick="sort_table(people, 7, asc3); asc3 *= -1; asc1 = 1; asc2 = 1;">Deverloper Comments</th>
        </tr>
        <tr>
            <th class="check"></th>
            <th class="No_id" style="display: none"><input autocomplete='off' class='filter' name='No_id' placeholder='search' data-col='No'/></th>
            <th class="client_firstname"><input autocomplete='off' class='filter' name='client_firstname' placeholder='search' data-col='Client First Name'/></th>
            <th class="client_lastname"><input autocomplete='off' class='filter' name='client_lastname' placeholder='search' data-col='Client Last Name'/></th>
            <th class="client_phone"><input autocomplete='off' class='filter' name='client_phone' placeholder='search' data-col='Client Phoneb '/></th>
            <th class="client_email"><input autocomplete='off' class='filter' name='client_email' placeholder='search' data-col='Client Email'/></th>
            <th class="client_wechat" style="display: none"><input autocomplete='off' class='filter' name='client_wechat' placeholder='search' data-col='Client WeChat'/></th>
            <th class="client_address"><input autocomplete='off' class='filter' name='client_address' placeholder='search' data-col='Client Address'/></th>
            <th class="client_firb"><input autocomplete='off' class='filter' name='client_firb' placeholder='search' data-col='Client firb'/></th>
            <th class="client_comments" style="display: none"><input autocomplete='off' class='filter' name='client_comments' placeholder='search' data-col='Client Comments'/></th>
            <th class="staff_firstname"><input autocomplete='off' class='filter' name='staff_firstname' placeholder='search' data-col='Staff First Name'/></th>
            <th class="staff_lastname"><input autocomplete='off' class='filter' name='staff_lastname' placeholder='search' data-col='Staff Last Name'/></th>
            <th class="staff_phone"><input autocomplete='off' class='filter' name='staff_phone' placeholder='search' data-col='Staff Phone'/></th>
            <th class="staff_email" style="display: none"><input autocomplete='off' class='filter' name='staff_email' placeholder='search' data-col='Staff Email'/></th>
            <th class="staff_wechat" style="display: none"><input autocomplete='off' class='filter' name='staff_wechat' placeholder='search' data-col='Staff WeChat'/></th>
            <th class="staff_employment_status" style="display: none"><input autocomplete='off' class='filter' name='staff_employment_status' placeholder='search' data-col='Staff Employment Status'/></th>
            <th class="staff_jobtitle" style="display: none"><input autocomplete='off' class='filter' name='staff_jobtitle' placeholder='search' data-col='Staff Job Title'/></th>
            <th class="staff_messagetoclient" style="display: none"><input autocomplete='off' class='filter' name='staff_messagetoclient' placeholder='search' data-col='Staff Message To client'/></th>
            <th class="staff_comments" style="display: none"><input autocomplete='off' class='filter' name='staff_comments' placeholder='search' data-col='Staff Comments'/></th>
            <th class="dept_leader"><input autocomplete='off' class='filter' name='dept_leader' placeholder='search' data-col='Team leader'/></th>
            <th class="PP_lotnumber"><input autocomplete='off' class='filter' name='PP_lotnumber' placeholder='search' data-col='Lot No.'/></th>
            <th class="PP_apptnumber"><input autocomplete='off' class='filter' name='PP_apptnumber' placeholder='search' data-col='Appartment No.'/></th>
            <th class="PP_price"><input autocomplete='off' class='filter' name='PP_price' placeholder='search' data-col='Price'/></th>
            <th class="PP_comments" style="display: none"><input autocomplete='off' class='filter' name='PP_comments' placeholder='search' data-col='Property Comments'/></th>
            <th class="SP_name"><input autocomplete='off' class='filter' name='SP_name' placeholder='search' data-col='Project Name'/></th>
            <th class="SP_stage"><input autocomplete='off' class='filter' name='SP_stage' placeholder='search' data-col='Project Stage'/></th>
            <th class="SP_comments" style="display: none"><input autocomplete='off' class='filter' name='SP_comments' placeholder='search' data-col='Project comments'/></th>
            <th class="SD_name" style="display: none"><input autocomplete='off' class='filter' name='SD_name' placeholder='search' data-col='Deverloper'/></th>
            <th class="SD_comments" style="display: none"><input autocomplete='off' class='filter' name='SD_comments' placeholder='search' data-col='Deverloper Comments'/></th>
        </tr>
        </thead>
        <tbody id="people">
        <?php
        for($i=0; $i<sizeof($property) ; $i++)
        {
            echo ("<tr id='tr-".$property[$i]->PK_PPID."' ondblclick='update_property(". $property[$i]->PK_PPID .")'>");
            if($clients[$i][0]->client_firb == 1) $client_firb = "Yes";
            else if($clients[$i][0]->client_firb == 0) $client_firb = "No";
            echo
            ("<td class='check'><input class='allcheck' type='checkbox' name='checkid[]' value='".$property[$i]->PK_PPID."' id='check-".$property[$i]->PK_PPID."'></td>"
                ."<td class='No_id' style='display: none'>".$property[$i]->PK_PPID."</td>"
                ."<td class='client_firstname'>".$clients[$i][0]->client_firstname."</td>"
                ."<td class='client_lastname'>".$clients[$i][0]->client_lastname."</td>"
                ."<td class='client_phone'>".$clients[$i][0]->client_phone."</td>"
                ."<td class='client_email'>".$clients[$i][0]->client_email."</td>"
                ."<td class='client_wechat' style='display: none'>".$clients[$i][0]->client_wechat."</td>"
                ."<td class='client_address'>".$clients[$i][0]->client_address."</td>"
                ."<td class='client_firb'>".$client_firb."</td>"
                ."<td class='client_comments' style='display: none'>".$clients[$i][0]->client_comments."</td>"
                ."<td class='staff_firstname'>".$staffs[$i][0]->staff_firstname."</td>"
                ."<td class='staff_lastname'>".$staffs[$i][0]->staff_lastname."</td>"
                ."<td class='staff_phone'>".$staffs[$i][0]->staff_phone."</td>"
                ."<td class='staff_email' style='display: none'>".$staffs[$i][0]->staff_email."</td>"
                ."<td class='staff_wechat' style='display: none'>".$staffs[$i][0]->staff_wechat."</td>"
                ."<td class='staff_employment_status' style='display: none'>".$staffs[$i][0]->staff_employment_status."</td>"
                ."<td class='staff_jobtitle' style='display: none'>".$staffs[$i][0]->staff_jobtitle."</td>"
                ."<td class='staff_messagetoclient' style='display: none'>".$staffs[$i][0]->staff_messagetoclient."</td>"
                ."<td class='staff_comments' style='display: none'>".$staffs[$i][0]->staff_comments."</td>"
                ."<td class='dept_leader'>".$department[$i][0]->dept_leader."</td>"
                ."<td class='PP_lotnumber'>".$property[$i]->PP_lotnumber."</td>"
                ."<td class='PP_apptnumber'>".$property[$i]->PP_apptnumber."</td>"
                ."<td class='PP_price'>".$property[$i]->PP_price."</td>"
                ."<td class='PP_comments' style='display: none'>".$property[$i]->PP_comments."</td>"
                ."<td class='SP_name'>".$project[$i][0]->SP_name."</td>"
                ."<td class='SP_stage'>".$project[$i][0]->SP_stage."</td>"
                ."<td class='SP_comments' style='display: none'>".$project[$i][0]->SP_comments."</td>"
                ."<td class='SD_name' style='display: none'>".$projectdeveloper[$i][0]->SD_name."</td>"
                ."<td class='SD_comments' style='display: none'>".$projectdeveloper[$i][0]->SD_comments."</td>"
            );
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
    <input style="display: none;" id="delete_No_id" name="delete_submit" type="submit" value="delete_submit"/>
    <input style="display: none;" id="export_No_id" name="export_submit" type="submit" value="export_submit"/>
</form>
</div>
</div>
<script>
    var people, asc1 = 1,
        asc2 = 1,
        asc3 = 1;
    window.onload = function () {
        people = document.getElementById("people");
    }
    function sort_table(tbody, col, asc)
    {
        var rows = tbody.rows;
        var rlen = rows.length;
        var arr = new Array();
        var i, j, cells, clen;
        // fill the array with values from the table
        for(i = 0; i < rlen; i++)
        {
            cells = rows[i].cells;
            clen = cells.length;
            arr[i] = new Array();
            for(j = 0; j < clen; j++) { arr[i][j] = cells[j].innerHTML; }
        }
        // sort the array by the specified column number (col) and order (asc)
        arr.sort(function(a, b)
        {
            var retval=0;
            var fA=parseFloat(a[col]);
            var fB=parseFloat(b[col]);
            if(a[col] != b[col])
            {
                if((fA==a[col]) && (fB==b[col]) ){ retval=( fA > fB ) ? asc : -1*asc; } //numerical
                else { retval=(a[col] > b[col]) ? asc : -1*asc;}
            }
            return retval;
        });
        for(var rowidx=0;rowidx<rlen;rowidx++)
        {
            for(var colidx=0;colidx<arr[rowidx].length;colidx++){ tbody.rows[rowidx].cells[colidx].innerHTML=arr[rowidx][colidx]; }
        }
    }
</script>