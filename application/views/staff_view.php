

<?php

?>
<div class="body" style="font-family: 'Times New Roman'; font-style: inherit;">
<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#update_staff" id="Update_Staff" style="display: none">
    Update  ( clients / staffs )
</button>
<div class="modal fade" id="update_staff" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?php echo site_url();?>/staff_add/update" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="myModalLabel">Update Staff</h2>
                    </div>
                    <div class="modal-body">
                        <label style="display: none"><b>PK staffID</b></label>
                        <input class="form-control" id="add_PK_staffID" type="text" name="PK_staffID" style="width: 100%; padding: 12px 12px; display:none">
                        <label><b>First Name</b></label>
                        <input class="form-control" id="add_staff_firstname" type="text" name="staff_firstname" style="width: 100%; padding: 12px 12px; display: inline-block">
                        <label><b>Last Name</b></label>
                        <input class="form-control" id="add_staff_lastname" type="text" name="staff_lastname" style="width: 100%; padding: 12px 12px; display: inline-block">
                        <label><b>Phone</b></label>
                        <input class="form-control" id="add_staff_phone" type="text" name="staff_phone" style="width: 100%; padding: 12px 12px; display: inline-block">
                        <label><b>Email</b></label>
                        <input class="form-control" id="add_staff_email" type="text" name="staff_email" style="width: 100%; padding: 12px 12px; display: inline-block">
                        <label><b>WeChat</b></label>
                        <input class="form-control" id="add_staff_wechat" type="text" name="staff_wechat" style="width: 100%; padding: 12px 12px; display: inline-block">
                        <label><b>Staff Employment Status</b></label>
                        <input class="form-control" id="add_staff_employment_status" type="text" name="staff_employment_status" style="width: 100%; padding: 12px 12px; display: inline-block">
                        <label><b>Staff Jobtitle</b></label>
                        <input class="form-control" id="add_staff_jobtitle" type="text" name="staff_jobtitle" style="width: 100%; padding: 12px 12px; display: inline-block">
                        <label><b>Staff Message to client</b></label>
                        <input class="form-control" id="add_staff_messagetoclient" type="text" name="staff_messagetoclient" style="width: 100%; padding: 12px 12px; display: inline-block">
                        <label><b>Staff Comments</b></label>
                        <input class="form-control" id="add_staff_comments" type="text" name="staff_comments" style="width: 100%; padding: 12px 12px; display: inline-block">
                        <label><b>Team ID</b></label>
                        <input class="form-control" id="add_FK_department" type="text" name="FK_department" style="width: 100%; padding: 12px 12px; display: inline-block">
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
    function update_staff(staff_id){

        var id = jQuery('#tr-' + staff_id).find(".PK_staffID").text();
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/ajax_post_controller/update_staff",
            dataType: 'json',
            data: {PK_staffID: id}
        }).done(function(data){
            var a = data;
            console.log(data[0]['PK_staffID']);
            $("#update_staff").find("input[name='PK_staffID']").val(data[0]['PK_staffID']);
            $("#update_staff").find("input[name='staff_firstname']").val(data[0]['staff_firstname']);
            $("#update_staff").find("input[name='staff_lastname']").val(data[0]['staff_lastname']);
            $("#update_staff").find("input[name='staff_phone']").val(data[0]['staff_phone']);
            $("#update_staff").find("input[name='staff_email']").val(data[0]['staff_email']);
            $("#update_staff").find("input[name='staff_wechat']").val(data[0]['staff_wechat']);
            $("#update_staff").find("input[name='staff_employment_status']").val(data[0]['staff_employment_status']);
            $("#update_staff").find("input[name='staff_jobtitle']").val(data[0]['staff_jobtitle']);
            $("#update_staff").find("input[name='staff_messagetoclient']").val(data[0]['staff_messagetoclient']);
            $("#update_staff").find("input[name='staff_comments']").val(data[0]['staff_comments']);
            $("#update_staff").find("input[name='FK_department']").val(data[0]['FK_department']);
            jQuery("#Update_Staff").focus().click();
        }).fail(function(){
            alert("Posting failed.")
        });
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
    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal" href="<?php echo site_url('csv/staffUpload') ?>">
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
        Add  ( clients )
    </button>
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?php echo site_url();?>/staff_add/save" method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title" id="myModalLabel">Add Staff</h2>
                        </div>
                        <div class="modal-body">
                            <label><b>First Name</b></label>
                            <input class="form-control" id="add_staff_firstname" type="text" name="staff_firstname" style="width: 100%; padding: 12px 12px; display: inline-block">
                            <label><b>Last Name</b></label>
                            <input class="form-control" id="add_client_lastname" type="text" name="staff_lastname" style="width: 100%; padding: 12px 12px; display: inline-block">
                            <label><b>Phone</b></label>
                            <input class="form-control" id="add_staff_phone" type="text" name="staff_phone" style="width: 100%; padding: 12px 12px; display: inline-block">
                            <label><b>Email</b></label>
                            <input class="form-control" id="add_staff_email" type="text" name="staff_email" style="width: 100%; padding: 12px 12px; display: inline-block">
                            <label><b>WeChat</b></label>
                            <input class="form-control" id="add_staff_wechat" type="text" name="staff_wechat" style="width: 100%; padding: 12px 12px; display: inline-block">
                            <label><b>Staff Employment Status</b></label>
                            <input class="form-control" id="add_staff_employment_status" type="text" name="staff_employment_status" style="width: 100%; padding: 12px 12px; display: inline-block">
                            <label><b>Staff Jobtitle</b></label>
                            <input class="form-control" id="add_staff_jobtitle" type="text" name="staff_jobtitle" style="width: 100%; padding: 12px 12px; display: inline-block">
                            <label><b>Staff Message to client</b></label>
                            <input class="form-control" id="add_staff_messagetoclient" type="text" name="staff_messagetoclient" style="width: 100%; padding: 12px 12px; display: inline-block">
                            <label><b>Staff Comments</b></label>
                            <input class="form-control" id="add_staff_comments" type="text" name="staff_comments" style="width: 100%; padding: 12px 12px; display: inline-block">
                            <label><b>Team ID</b></label>
                            <input class="form-control" id="add_FK_department" type="text" name="FK_department" style="width: 100%; padding: 12px 12px; display: inline-block">
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
    <a class="btn btn-primary btn-sm" href="#" onclick="mydelete()">Delete  ( clients )</a>
    <div style="display: inline-block; text-align: center; margin-left: 30%">
        <p style="font-size: 20px; color: #b21472">Staffs Page</p>
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
            <li><a href="#" id="choose_PK_staffID" onclick="choose_fields('PK_staffID')">Staff ID</a></li>
            <li><a href="#" id="choose_staff_firstname" onclick="choose_fields('staff_firstname')">First Name</a></li>
            <li><a href="#" id="choose_staff_lastname" onclick="choose_fields('staff_lastname')">Last Name</a></li>
            <li><a href="#" id="choose_staff_phone" onclick="choose_fields('staff_phone')">Phone</a></li>
            <li><a href="#" id="choose_staff_email" onclick="choose_fields('staff_email')">Email</a></li>
            <li><a href="#" id="choose_staff_wechat" onclick="choose_fields('staff_wechat')">WeChat</a></li>
            <li><a href="#" id="choose_staff_employment_status" onclick="choose_fields('staff_employment_status')">Staff Employment Status</a></li>
            <li><a href="#" id="choose_staff_jobtitle" onclick="choose_fields('staff_jobtitle')">Staff Jobtitle</a></li>
            <li><a href="#" id="choose_staff_messagetoclient" onclick="choose_fields('staff_messagetoclient')">Staff Message to client</a></li>
            <li><a href="#" id="choose_staff_comments" onclick="choose_fields('staff_comments')">Staff Comments</a></li>
            <li><a href="#" id="choose_dept_name" onclick="choose_fields('dept_name')">Department Name</a></li>
            <li><a href="#" id="choose_dept_leader" onclick="choose_fields('dept_leader')">Department Leader</a></li>
            <li><a href="#" id="choose_FK_department" onclick="choose_fields('FK_department')">Team ID</a></li>
        </ul>
    </div>
    <script>

        function mydelete(){
            jQuery("#delete_staff_id").focus().click();
        }
        function myexport(){
            jQuery("#export_staff_id").focus().click();
        }
        function allcheck(){
            if(document.getElementById('checkid').checked) {
                jQuery(".allcheck").attr('checked', true);
            } else {
                jQuery(".allcheck").attr('checked', false);
                location.reload();
            }
        }
    </script>
    <!-- Search Inputtext : HTML -->
</div>
<form action="<?php echo site_url()?>/staff_delete" method="post">
    <table id="myTable" style="font-size: <?php echo $fontsize;?>px;">

        <thead>
        <tr>
            <th class="check"><input type='checkbox' name='checkid' value='allcheck' id='checkid' onchange="allcheck()"></th>
            <th class="PK_staffID" style="cursor: pointer" onclick="sort_table(people, 1, asc3); asc3 *= -1; asc1 = 1; asc2 = 1;">Staff ID</th>
            <th class="staff_firstname" style="cursor: pointer" onclick="sort_table(people, 2, asc3); asc3 *= -1; asc1 = 1; asc2 = 1;">First Name</th>
            <th class="staff_lastname" style="cursor: pointer" onclick="sort_table(people, 3, asc3); asc3 *= -1; asc1 = 1; asc2 = 1;">Last Name</th>
            <th class="staff_phone" style="cursor: pointer" onclick="sort_table(people, 4, asc3); asc3 *= -1; asc1 = 1; asc2 = 1;">Phone</th>
            <th class="staff_email" style="cursor: pointer" onclick="sort_table(people, 5, asc3); asc3 *= -1; asc1 = 1; asc2 = 1;">Email</th>
            <th class="staff_wechat" style="cursor: pointer" onclick="sort_table(people, 6, asc3); asc3 *= -1; asc1 = 1; asc2 = 1;">WeChat</th>
            <th class="staff_employment_status" style="cursor: pointer" onclick="sort_table(people, 7, asc3); asc3 *= -1; asc1 = 1; asc2 = 1;">Staff Employment Status</th>
            <th class="staff_jobtitle" style="cursor: pointer" onclick="sort_table(people, 8, asc3); asc3 *= -1; asc1 = 1; asc2 = 1;">Staff Jobtitle</a></th>
            <th class="staff_messagetoclient" style="cursor: pointer" onclick="sort_table(people, 9, asc3); asc3 *= -1; asc1 = 1; asc2 = 1;">Staff Message to client</th>
            <th class="staff_comments">Staff Comments</th>
            <th class="dept_name" style="cursor: pointer" onclick="sort_table(people, 11, asc3); asc3 *= -1; asc1 = 1; asc2 = 1;">Department Name</th>
            <th class="dept_leader" style="cursor: pointer" onclick="sort_table(people, 12, asc3); asc3 *= -1; asc1 = 1; asc2 = 1;">Department Leader</th>
            <th class="FK_department" style="cursor: pointer" onclick="sort_table(people, 13, asc3); asc3 *= -1; asc1 = 1; asc2 = 1;">Team ID</th>
        </tr>
        <tr>
            <th class="check"></th>
            <th class="PK_staffID"><input autocomplete='off' class='filter' name='PK_staffID' placeholder='search' data-col='Staff ID'/></th>
            <th class="staff_firstname"><input autocomplete='off' class='filter' name='staff_firstname' placeholder='search' data-col='First Name'/></th>
            <th class="staff_lastname"><input autocomplete='off' class='filter' name='staff_lastname' placeholder='search' data-col='Last Name'/></th>
            <th class="staff_phone"><input autocomplete='off' class='filter' name='staff_phone' placeholder='search' data-col='Phone'/></th>
            <th class="staff_email"><input autocomplete='off' class='filter' name='staff_email' placeholder='search' data-col='Email'/></th>
            <th class="staff_wechat"><input autocomplete='off' class='filter' name='staff_wechat' placeholder='search' data-col='WeChat'/></th>
            <th class="staff_employment_status"><input autocomplete='off' class='filter' name='staff_employment_status' placeholder='search' data-col='Staff Employment Status'/></th>
            <th class="staff_jobtitle"><input autocomplete='off' class='filter' name='staff_jobtitle' placeholder='search' data-col='Staff Jobtitle'/></th>
            <th class="staff_messagetoclient"><input autocomplete='off' class='filter' name='staff_messagetoclient' placeholder='search' data-col='Staff Message to client'/></th>
            <th class="staff_comments"><input autocomplete='off' class='filter' name='staff_comments' placeholder='search' data-col='Staff Comments'/></th>
            <th class="dept_name"><input autocomplete='off' class='filter' name='FK_department' placeholder='search' data-col='Department Name'/></th>
            <th class="dept_leader"><input autocomplete='off' class='filter' name='FK_department' placeholder='search' data-col='Department Leader'/></th>
            <th class="FK_department"><input autocomplete='off' class='filter' name='FK_department' placeholder='search' data-col='Team ID'/></th>
        </tr>
        </thead>
        <tbody id="people">
        <?php
        for($i=0; $i<sizeof($staff) ; $i++)
        {
            echo ("<tr id='tr-".$staff[$i]->PK_staffID."' ondblclick='update_staff(". $staff[$i]->PK_staffID .")'>");
            echo
            ("<td class='check'><input class='allcheck' type='checkbox' name='checkid[]' value='".$staff[$i]->PK_staffID."' id='check'></td>"
                ."<td class='PK_staffID'>".$staff[$i]->PK_staffID."</td>"
                ."<td class='staff_firstname'>".$staff[$i]->staff_firstname."</td>"
                ."<td class='staff_lastname'>".$staff[$i]->staff_lastname."</td>"
                ."<td class='staff_phone'>".$staff[$i]->staff_phone."</td>"
                ."<td class='staff_email'>".$staff[$i]->staff_email."</td>"
                ."<td class='staff_wechat'>".$staff[$i]->staff_wechat."</td>"
                ."<td class='staff_employment_status'>".$staff[$i]->staff_employment_status."</td>"
                ."<td class='staff_jobtitle'>".$staff[$i]->staff_jobtitle."</td>"
                ."<td class='staff_messagetoclient'>".$staff[$i]->staff_messagetoclient."</td>"
                ."<td class='staff_comments'>".$staff[$i]->staff_comments."</td>"
                ."<td class='dept_name'>".$dept[$i][0]->dept_name."</td>"
                ."<td class='dept_leader'>".$dept[$i][0]->dept_leader."</td>"
                ."<td class='FK_department'>".$staff[$i]->FK_department."</td>"
            );
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
    <input style="display: none;" id="delete_staff_id" name="delete_submit" type="submit" value="staff_submit"/>
    <input style="display: none;" id="export_staff_id" name="export_submit" type="submit" value="export_submit"/>
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