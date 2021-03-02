

<?php
//var_dump($clients);
//echo '</br>';
//echo '</br>';
//echo sizeof($clients);
//echo $clients[0]->PK_clientID;
$checks = array();
for($i=0;$i<sizeof($clients);$i++){
    $checks[$i] = $clients[$i]->PK_clientID;
}
?>
<style>
    /* The Modal (background) */
    .emodal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    /* Modal Content */
    .emodal-content {
        position: relative;
        background-color: #fefefe;
        margin: auto;
        padding: 0;
        border: 1px solid #888;
        width: 50%;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
        -webkit-animation-name: animatetop;
        -webkit-animation-duration: 0.4s;
        animation-name: animatetop;
        animation-duration: 0.4s
    }

    /* Add Animation */
    @-webkit-keyframes animatetop {
        from {top:-300px; opacity:0}
        to {top:0; opacity:1}
    }

    @keyframes animatetop {
        from {top:-300px; opacity:0}
        to {top:0; opacity:1}
    }

    /* The Close Button */
    .eclose {
        color: white;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .eclose:hover,
    .eclose:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    .emodal-header {
        padding: 2px 16px;
        background-color: #b88780;
        color: white;
    }

    .emodal-body {padding: 20px 60px;}
</style>
<!-- Trigger/Open The Modal -->
<button id="emyBtn" style="display: none">Open Modal</button>

<!-- The Modal -->
<div id="emyModal" class="emodal">

    <!-- Modal content -->
    <div class="emodal-content">
        <div class="emodal-header">
            <span class="eclose">&times;</span>
            <h3 style="text-align: center">Existing Clients In This System</h3>
        </div>
        <div class="emodal-body">

        </div>
    </div>

</div>

<script>
    // Get the modal
    var emodal = document.getElementById('emyModal');

    // Get the button that opens the modal
    var ebtn = document.getElementById("emyBtn");

    // Get the <span> element that closes the modal
    var espan = document.getElementsByClassName("eclose")[0];

    // When the user clicks the button, open the modal
    ebtn.onclick = function() {
        emodal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    espan.onclick = function() {
        emodal.style.display = "none";
    }
</script>


<div class="body" style="font-family: Arial; font-style: inherit">
<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#update_client" id="Update_Client" style="display: none">
</button>
<div class="modal fade" id="update_client" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?php echo site_url();?>/add_clients/update" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="myModalLabel">Update Client</h2>
                    </div>
                    <div class="modal-body">
                        <label style="display: none"><b>Client ID</b></label>
                        <input class="form-control" id="add_PK_clientID" type="text" name="PK_clientID" style="width: 100%; padding: 12px 12px; display:none">
                        <label><b>Title</b></label>
                        <input class="form-control" id="update_client_title" type="text" name="client_title" style="width: 100%; padding: 12px 12px; display: inline-block">
                        <label><b>First Name</b></label>
                        <input class="form-control" id="add_client_firstname" type="text" name="client_firstname" style="width: 100%; padding: 12px 12px; display: inline-block">
                        <label><b>Last Name</b></label>
                        <input class="form-control" id="add_client_lastname" type="text" name="client_lastname" style="width: 100%; padding: 12px 12px; display: inline-block">
                        <label><b>Phone</b></label>
                        <input class="form-control" id="add_client_phone" type="text" name="client_phone" style="width: 100%; padding: 12px 12px; display: inline-block">
                        <label><b>Email</b></label>
                        <input class="form-control" id="add_client_email" type="text" name="client_email" style="width: 100%; padding: 12px 12px; display: inline-block">
                        <label><b>Wechat</b></label>
                        <input class="form-control" id="add_client_wechat" type="text" name="client_wechat" style="width: 100%; padding: 12px 12px; display: inline-block">
                        <label><b>Address</b></label>
                        <input class="form-control" id="add_client_address" type="text" name="client_address" style="width: 100%; padding: 12px 12px; display: inline-block">
                        <label><b>No Of Purchased</b></label>
                        <input class="form-control" id="add_client_NoOfPurchased" type="text" name="client_NoOfPurchased" style="width: 100%; padding: 12px 12px; display: inline-block">
                        <label><b>FIRB</b></label>
                        <input class="form-control" id="add_client_firb" type="text" name="client_firb" style="width: 100%; padding: 12px 12px; display: inline-block">
                        <label><b>Email Subscription</b></label>
                        <input class="form-control" id="add_client_Subscriptions" type="text" name="client_Subscriptions" style="width: 100%; padding: 12px 12px; display: inline-block">
                        <label><b>Comments</b></label>
                        <input class="form-control" id="add_client_comments" type="text" name="client_comments" style="width: 100%; padding: 12px 12px; display: inline-block">
                        <label><b>Sales ID</b></label>
                        <input class="form-control" id="add_FK_saleID" type="text" name="FK_saleID" style="width: 100%; padding: 12px 12px; display: inline-block">
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
    function updata_clients(client_id){

        var id = jQuery('#tr-' + client_id).find(".PK_clientID").text();
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/ajax_post_controller/update_clients",
            dataType: 'json',
            data: {PK_clientID: id}
        }).done(function(data){
            var client_firb = "";
            var client_Subscriptions = "";
            if(data[0]['client_firb'] == 1) client_firb = "Yes";
            else if(data[0]['client_firb'] == 0) client_firb = "No";
            if(data[0]['client_Subscriptions'] == 1) client_Subscriptions = "Yes";
            else if(data[0]['client_Subscriptions'] == 0) client_Subscriptions = "No";
            $("#update_client").find("input[name='PK_clientID']").val(data[0]['PK_clientID']);
            $("#update_client").find("input[name='client_title']").val(data[0]['client_title']);
            $("#update_client").find("input[name='client_firstname']").val(data[0]['client_firstname']);
            $("#update_client").find("input[name='client_lastname']").val(data[0]['client_lastname']);
            $("#update_client").find("input[name='client_phone']").val(data[0]['client_phone']);
            $("#update_client").find("input[name='client_email']").val(data[0]['client_email']);
            $("#update_client").find("input[name='client_wechat']").val(data[0]['client_wechat']);
            $("#update_client").find("input[name='client_address']").val(data[0]['client_address']);
            $("#update_client").find("input[name='client_NoOfPurchased']").val(data[0]['client_NoOfPurchased']);
            $("#update_client").find("input[name='client_firb']").val(client_firb);
            $("#update_client").find("input[name='client_Subscriptions']").val(client_Subscriptions);
            $("#update_client").find("input[name='client_comments']").val(data[0]['client_comments']);
            $("#update_client").find("input[name='FK_saleID']").val(data[0]['FK_saleID']);
            jQuery("#Update_Client").focus().click();
        }).fail(function(){
            alert("Posting failed.")
        });

        console.log(id);
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
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal" href="<?php echo site_url('csv') ?>">
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
            Add Client
        </button>
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="<?php echo site_url();?>/add_clients/save" method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="modal-title" id="myModalLabel">Add Client</h2>
                            </div>
                            <div class="modal-body">
                                <label><b>Title</b></label>
                                <input class="form-control" id="add_client_title" type="text" name="client_title" style="width: 100%; padding: 12px 12px; display: inline-block">
                                <label><b>First Name</b></label>
                                <input class="form-control" id="add_client_firstname" type="text" name="client_firstname" style="width: 100%; padding: 12px 12px; display: inline-block">
                                <label><b>Last Name</b></label>
                                <input class="form-control" id="add_client_lastname" type="text" name="client_lastname" style="width: 100%; padding: 12px 12px; display: inline-block">
                                <label><b>Phone</b></label>
                                <input class="form-control" id="add_client_phone" type="text" name="client_phone" style="width: 100%; padding: 12px 12px; display: inline-block">
                                <label><b>Email</b></label>
                                <input class="form-control" id="add_client_email" type="text" name="client_email" style="width: 100%; padding: 12px 12px; display: inline-block">
                                <label><b>Wechat</b></label>
                                <input class="form-control" id="add_client_wechat" type="text" name="client_wechat" style="width: 100%; padding: 12px 12px; display: inline-block">
                                <label><b>Address</b></label>
                                <input class="form-control" id="add_client_address" type="text" name="client_address" style="width: 100%; padding: 12px 12px; display: inline-block">
<!--                                <label><b>No Of Purchased</b></label>-->
<!--                                <input class="form-control" id="add_client_NoOfPurchased" type="text" name="client_NoOfPurchased" style="width: 100%; padding: 12px 12px; display: inline-block">-->
                                <label><b>FIRB</b></label>
                                <input class="form-control" id="add_client_firb" type="text" name="client_firb" style="width: 100%; padding: 12px 12px; display: inline-block">
                                <label><b>Email Subscription</b></label>
                                <input class="form-control" id="add_client_Subscriptions" type="text" name="client_Subscriptions" style="width: 100%; padding: 12px 12px; display: inline-block">
                                <label><b>Comments</b></label>
                                <input class="form-control" id="add_client_comments" type="text" name="client_comments" style="width: 100%; padding: 12px 12px; display: inline-block">
                                <label><b>Sales ID</b></label>
                                <input class="form-control" id="add_FK_saleID" type="text" name="FK_saleID" style="width: 100%; padding: 12px 12px; display: inline-block">

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="history.go(0)">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <a class="btn btn-primary btn-sm" href="#" onclick="mydelete()">Delete Client</a>
        <div style="display: inline-block; text-align: center; margin-left: 30%">
            <p style="font-size: 20px; color: #b21472">Clients Page</p>
        </div>
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
        <div class="dropdown" style="display: inline-block; float: right; margin-right: 10px;">
            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" style="text-align: center">Choose Fields</button>
            <ul class="dropdown-menu" style="text-align: left; width: 200px">
                <li><a href="#" id="choose_PK_clientID" onclick="choose_fields('PK_clientID')">Client ID</a></li>
                <li><a href="#" id="choose_client_title" onclick="choose_fields('client_title')">Title</a></li>
                <li><a href="#" id="choose_client_firstname" onclick="choose_fields('client_firstname')">First Name</a></li>
                <li><a href="#" id="choose_client_lastname" onclick="choose_fields('client_lastname')">Last Name</a></li>
                <li><a href="#" id="choose_client_phone" onclick="choose_fields('client_phone')">Phone</a></li>
                <li><a href="#" id="choose_client_email" onclick="choose_fields('client_email')">Email</a></li>
                <li><a href="#" id="choose_client_wechat" onclick="choose_fields('client_wechat')">Wechat</a></li>
                <li><a href="#" id="choose_client_address" onclick="choose_fields('client_address')">Address</a></li>
                <li><a href="#" id="choose_client_NoOfPurchased" onclick="choose_fields('client_NoOfPurchased')">No Of Purchased</a></li>
                <li><a href="#" id="choose_client_firb" onclick="choose_fields('client_firb')">FIRB</a></li>
                <li><a href="#" id="choose_client_Subscriptions" onclick="choose_fields('client_Subscriptions')">Email Subscription</a></li>
                <li><a href="#" id="choose_client_comments" onclick="choose_fields('client_comments')">Comments</a></li>
                <li><a href="#" id="choose_staff_firstname" onclick="choose_fields('staff_firstname')">Staff First Name</a></li>
                <li><a href="#" id="choose_staff_lastname" onclick="choose_fields('staff_lastname')">Staff Last Name</a></li>
                <li><a href="#" id="choose_FK_saleID" onclick="choose_fields('FK_saleID')">Sales ID</a></li>
            </ul>
        </div>
    <script>

        function mydelete(){
            jQuery("#delete_client_id").focus().click();
        }
        function myexport(){
            jQuery("#export_client_id").focus().click();
        }
        function allcheck(n){
            console.log(n);
            var ch_arr = <?php echo json_encode($checks); ?>;
            console.log(ch_arr[0]);

            if(document.getElementById('checkid').checked) {
                for(var i = 0; i < n; i++){
                    if(jQuery('#tr-' + ch_arr[i]).css('display') != "none"){
                        jQuery('#check-' + ch_arr[i]).attr('checked', true);
                    }
                }
            }
            else {
                jQuery(".checkitem").attr('checked', false);
                location.reload();
            }
        }
    </script>
<!-- Search Inputtext : HTML -->
    </div>

    <form action="<?php echo site_url()?>/delete_clients" method="post">
    <table id="myTable" style="font-size: <?php echo $fontsize;?>px;">

        <thead>
        <tr>
            <th class="check"><input type='checkbox' name='checkid' id='checkid' onchange="allcheck(<?php echo sizeof($checks); ?>)"></th>
            <th class="PK_clientID" style="cursor: pointer" onclick="sort_table(people, 1, asc3); asc3 *= -1; asc1 = 1; asc2 = 1;">Client ID</th>
            <th class="client_title" style="cursor: pointer" onclick="sort_table(people, 2, asc3); asc3 *= -1; asc1 = 1; asc2 = 1;">Title</th>
            <th class="client_firstname" style="cursor: pointer" onclick="sort_table(people, 3, asc3); asc3 *= -1; asc1 = 1; asc2 = 1;">First Name</th>
            <th class="client_lastname" style="cursor: pointer" onclick="sort_table(people, 4, asc3); asc3 *= -1; asc1 = 1; asc2 = 1;">Last Name</th>
            <th class="client_phone" style="cursor: pointer" onclick="sort_table(people, 5, asc3); asc3 *= -1; asc1 = 1; asc2 = 1;">Phone</th>
            <th class="client_email" style="cursor: pointer" onclick="sort_table(people, 6, asc3); asc3 *= -1; asc1 = 1; asc2 = 1;">Email</th>
            <th class="client_wechat"style="cursor: pointer" onclick="sort_table(people, 7, asc3); asc3 *= -1; asc1 = 1; asc2 = 1;">Wechat</th>
            <th class="client_address" style="cursor: pointer" onclick="sort_table(people, 8, asc3); asc3 *= -1; asc1 = 1; asc2 = 1;">Address</th>
            <th class="client_NoOfPurchased" style="cursor: pointer" onclick="sort_table(people, 9, asc3); asc3 *= -1; asc1 = 1; asc2 = 1;">No Of Purchased</th>
            <th class="client_firb" style="cursor: pointer" onclick="sort_table(people, 10, asc3); asc3 *= -1; asc1 = 1; asc2 = 1;">FIRB</a></th>
            <th class="client_Subscriptions" style="cursor: pointer" onclick="sort_table(people, 11, asc3); asc3 *= -1; asc1 = 1; asc2 = 1;">Email Subscription</th>
            <th class="client_comments">Comments</th>
            <th class="staff_firstname" style="cursor: pointer" onclick="sort_table(people, 13, asc3); asc3 *= -1; asc1 = 1; asc2 = 1;">Staff First Name</a></th>
            <th class="staff_lastname" style="cursor: pointer" onclick="sort_table(people, 14, asc3); asc3 *= -1; asc1 = 1; asc2 = 1;">Staff Last Name</th>
            <th class="FK_saleID" style="cursor: pointer" onclick="sort_table(people, 15, asc3); asc3 *= -1; asc1 = 1; asc2 = 1;">Sales ID</th>
        </tr>
        <tr>
            <th class="check"></th>
            <th class="PK_clientID"><input autocomplete='off' class='filter' name='PK_clientID' placeholder='search' data-col='Client ID'/></th>
            <th class="client_title"><input autocomplete='off' class='filter' name='client_tiltle' placeholder='search' data-col='Title'/></th>
            <th class="client_firstname"><input autocomplete='off' class='filter' name='client_firstname' placeholder='search' data-col='First Name'/></th>
            <th class="client_lastname"><input autocomplete='off' class='filter' name='client_lastname' placeholder='search' data-col='Last Name'/></th>
            <th class="client_phone"><input autocomplete='off' class='filter' name='client_phone' placeholder='search' data-col='Phone'/></th>
            <th class="client_email"><input autocomplete='off' class='filter' name='client_email' placeholder='search' data-col='Email'/></th>
            <th class="client_wechat"><input autocomplete='off' class='filter' name='client_wechat' placeholder='search' data-col='Wechat'/></th>
            <th class="client_address"><input autocomplete='off' class='filter' name='client_address' placeholder='search' data-col='Address'/></th>
            <th class="client_NoOfPurchased"><input autocomplete='off' class='filter' name='client_NoOfPurchased' placeholder='search' data-col='No Of Purchased'/></th>
            <th class="client_firb"><input autocomplete='off' class='filter' name='client_firb' placeholder='search' data-col='FIRB'/></th>
            <th class="client_Subscriptions"><input autocomplete='off' class='filter' name='client_Subscriptions' placeholder='search' data-col='Email Subscription'/></th>
            <th class="client_comments"><input autocomplete='off' class='filter' name='client_comments' placeholder='search' data-col='Comments'/></th>
            <th class="staff_firstname"><input autocomplete='off' class='filter' name='staff_firstname' placeholder='search' data-col='Staff First Name'/></th>
            <th class="staff_lastname"><input autocomplete='off' class='filter' name='staff_lastname' placeholder='search' data-col='Staff Last Name'/></th>
            <th class="FK_saleID"><input autocomplete='off' class='filter' name='FK_saleID' placeholder='search' data-col='Sales ID'/></th>
        </tr>
        </thead>
        <tbody id="people">
        <?php
        for($i=0; $i<sizeof($clients) ; $i++)
        {
        echo ("<tr class='tr-header' id='tr-".$clients[$i]->PK_clientID."' ondblclick='updata_clients(". $clients[$i]->PK_clientID .")'>");
            if($clients[$i]->client_firb == 1) $client_firb = "Yes";
            else if($clients[$i]->client_firb == null) $client_firb = "";
            else if($clients[$i]->client_firb == 0) $client_firb = "No";

            if($clients[$i]->client_Subscriptions == 1) $client_Subscriptions = "Yes";
            else if($clients[$i]->client_Subscriptions == null) $client_Subscriptions = "";
            else if($clients[$i]->client_Subscriptions == 0) $client_Subscriptions = "No";
            echo
            ("<td class='check'><input class='checkitem' type='checkbox' name='checkid[]' value='".$clients[$i]->PK_clientID."' id='check-".$clients[$i]->PK_clientID."'></td>"
                ."<td class='PK_clientID'>".$clients[$i]->PK_clientID."</td>"
                ."<td class='client_title'>".$clients[$i]->client_title."</td>"
                ."<td class='client_firstname'>".$clients[$i]->client_firstname."</td>"
                ."<td class='client_lastname'>".$clients[$i]->client_lastname."</td>"
                ."<td class='client_phone'>".$clients[$i]->client_phone."</td>"
                ."<td class='client_email'>".$clients[$i]->client_email."</td>"
                ."<td class='client_wechat'>".$clients[$i]->client_wechat."</td>"
                ."<td class='client_address'>".$clients[$i]->client_address."</td>"
                ."<td class='client_NoOfPurchased' id='property-".$clients[$i]->PK_clientID."' onclick='property_details(".$clients[$i]->PK_clientID.")'>".$clients[$i]->client_NoOfPurchased."</td>"
                ."<td class='client_firb'>".$client_firb."</td>"
                ."<td class='client_Subscriptions'>".$client_Subscriptions."</td>"
                ."<td class='client_comments'>".$clients[$i]->client_comments."</td>"
                ."<td class='staff_firstname'>".$staffs[$i][0]->staff_firstname."</td>"
                ."<td class='staff_lastname'>".$staffs[$i][0]->staff_lastname."</td>"
                ."<td class='FK_saleID'>".$clients[$i]->FK_saleID."</td>"
            );
        echo "</tr>";
    }
    ?>
    </tbody>
    </table>
        <input style="display: none;" id="delete_client_id" name="delete_submit" type="submit" value="delete_submit"/>
        <input style="display: none;" id="export_client_id" name="export_submit" type="submit" value="export_submit"/>
    </form>
    </div>
<button id="myBtn" style="display: none">Open Modal</button>

<!-- The Modal -->
<div id="myProModal" class="pmodal">

    <!-- Modal content -->
    <div class="pmodal-content">
<!--        <div class="modal-header">-->
            <span class="close">&times;</span>
            <h3 style="text-align: center">Property Details</h3>
<!--        </div>-->
        <div class="pmodal-body">

        </div>
        <div class="pmodal-footer">

        </div>
    </div>

</div></div>
</div>
    <script>
        // Get the modal
        var modal = document.getElementById('myProModal');

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
            if (event.target == emodal) {
                emodal.style.display = "none";
            }
        }
    </script>

    <style>
        /* The Modal (background) */
        .pmodal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
            -webkit-animation-name: fadeIn; /* Fade in the background */
            -webkit-animation-duration: 0.4s;
            animation-name: fadeIn;
            animation-duration: 4s;
        }

        /* Modal Content */
        .pmodal-content {
            position: fixed;
            bottom: 20px;
            background-color: #fefefe;
            margin-left: 20%;
            margin-left: 20%;
            width: 60%;
            text-align: center;
            -webkit-animation-name: slideIn;
            -webkit-animation-duration: 0.4s;
            animation-name: slideIn;
            animation-duration: 0.4s
        }

        /* The Close Button */
        .close {
            color: white;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
        .pmodal-footer {
            height: 10px;
            color: white;
        }

        /* Add Animation */
        @-webkit-keyframes slideIn {
            from {bottom: -300px; opacity: 0}
            to {bottom: 20px; opacity: 1}
        }

        @keyframes slideIn {
            from {bottom: -300px; opacity: 0}
            to {bottom: 20px; opacity: 1}
        }

        @-webkit-keyframes fadeIn {
            from {opacity: 0}
            to {opacity: 1}
        }

        @keyframes fadeIn {
            from {opacity: 0}
            to {opacity: 1}
        }
        #property {
            border-collapse: collapse;
            margin-left: 5%;
            margin-right: 5%;
            width: 90%;
            table-layout: fixed;
            border: 2px solid #ddd;
            font-size: 12px;
            text-align: center;
        }

        #property th, #property td {
            border: 1px solid #ddd;
            text-align: center;
            /*// padding: 12px;*/
            padding-bottom: 12px;
            padding-top: 12px;
        }

        #property tr {
            border-bottom: 1px solid #ddd;
        }

        #property tr.header, #property tr:hover {
            background-color: #f1f1f1;
        }
    </style>
    <script>
        function property_details(id){
            var clientID = jQuery('#tr-' + id).find(".PK_clientID").text();
            var output = "";
            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "index.php/ajax_post_controller/get_property",
                dataType: 'json',
                data: {FK_clientID: clientID},
            }).done(function(data){
                var len = data.length;
                output = "<table id='property'><thead><tr><th>Property Number</th><th>Lot Number</td><th>App Number</th><th>Price</th><th>Comments</th></tr></thead>";

                for(i = 0; i < len; i++){
                    output += "<tr><td>"+data[i]['PK_PPID']+"</td><td>"+data[i]['PP_lotnumber']+"</td><td>"+data[i]['PP_apptnumber']+"</td><td>"+data[i]['PP_price']+"</td><td>"+data[i]['PP_comments']+"</td></tr>";
                }
                $(".pmodal-body").html(output);
                $("#myBtn").focus().click();
//                $("#propertydetails").html(output);
            }).fail(function(){
                alert("Posting Failed.");
            });

        }
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
<?php
if(isset($err_msg)){
    if(sizeof($err_msg)>1){?>
    <script>
        var err_msg = <?php echo json_encode($err_msg)?>;
        var err_str = '';
        for(var j = 0; j < err_msg.length; j++){
            err_str += '<p style="color: red; display: inline-block;">Client ID:</p> '+err_msg[j]['PK_clientID']+'\t'+'<p style="color: red; margin-left: 10px; display: inline-block">First Name:</p> '+err_msg[j]['client_firstname']+'\t\t'+'<p style="color: red; margin-left: 10px; display: inline-block">Last Name:</p> '+err_msg[j]['client_lastname'];
            err_str += '\t'+'<p style="color: red; margin-left: 10px; display: inline-block">Phone:</p> '+err_msg[j]['client_phone']+'\t'+'<p style="color: red; margin-left: 10px; display: inline-block">Email:</p> '+err_msg[j]['client_email']+'\t'+'<p style="color: red; margin-left: 10px; display: inline-block">Address:</p> '+err_msg[j]['client_address']+'</br>';
        }
        console.log(err_str);
        $(".emodal-body").html(err_str);
        $("#emyBtn").focus().click();
    </script>
<?php }
}
?>