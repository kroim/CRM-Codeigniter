<form action="<?php echo site_url();?>/csv/uploadData" method="post" enctype="multipart/form-data" name="form1" id="form1">
    <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="modal-title" id="myModalLabel">Client File Import</h2>
                            </div>
                            <div class="modal-body">
                                <div><input type="file" class="form-control" name="userfile" id="userfile"/></div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">File Import</button>
                            </div>
    </div>

</form>