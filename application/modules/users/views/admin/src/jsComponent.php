<div class="modal fade bs-modal-lg" id="ajax" role="basic" aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-body">
            <img src="../assets/global/img/loading-spinner-grey.gif" alt="" class="loading">
            <span> &nbsp;&nbsp;Loading... </span>
        </div>
    </div>
</div>
</div>

<!-- FOR DATATABLE -- START -->
<script src="<?php echo base_url();?>assets/global/scripts/datatable.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/pages/scripts/table-datatables-buttons.min.js" type="text/javascript"></script>

<!-- BOOTSTRAP CONFIRMATION -->
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-confirmation/bootstrap-confirmation.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/pages/scripts/ui-confirmations.min.js" type="text/javascript"></script>

<!-- FOR FORM VALIDATION -->
<script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url();?>assets/pages/scripts/form-validation.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<!-- AJAX FORM SUBMIT PLUGIN -->
<script src="<?php echo base_url();?>assets/apps/scripts/jquery.form.js"></script>

<script>

    /* VALIDATION SPAN COLOR CLASS */
    $(".validateForm").validate({
        errorClass: "error-lavel",
    });

    /* SHOW/HIDE DIV AFTER AJAX CALL */
    $(document).ajaxStart( function() {
        // $("#overlayDiv").show();
        $("img#memberLoader").removeClass("display-hide");
        $("#overlayDiv").show();
        $("#loading").show();
    }).ajaxStop ( function(){
        setTimeout(function () {
            $("#overlayDiv").fadeOut();
            $("#loading").fadeOut();
            $("img#memberLoader").addClass("display-hide");
            $("html, body").animate({scrollTop: 0});
        }, 0);
    });

    /* SHOW SUCCESS/ERROR MESSAGE */
    function appendData(div,msg){
        $('div#'+div).css({ display: "block" });
        $('div#'+div).text(msg);
        setTimeout(function() {
            $('div#'+div).css({ display: "none" });
        }, 7000);
    }

    function ajaxDataTable(id, url){
        $('.'+id).DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo base_url(); ?>"+url,
                "type": "POST"
            },
            //Set column definition initialisation properties.
            "columnDefs": [
            {
                "targets": [ 0 ], //first column / numbering column
                "orderable": false, //set not orderable
            },
            ],

        });
    }

    $(document).ready(function() {

         //datatables
        var userList = ajaxDataTable('member-list', 'users/ajaxMemberList');

        /* DELETE MEMBER */
        var last_clicked_id = null;
        var function_name   = null;
        $('.confirmation_but').click(function () {
            last_clicked_id = $(this).data("id");
            function_name = $(this).data("func");
        });
        $('.confirmation_but').confirmation({
            onConfirm: function () {
                var options = {
                    url:        '<?php echo base_url('users/'); ?>'+function_name+'/'+last_clicked_id,
                    success:    function(data) {
                        appendData('successMsg','Delete Successfully.');
                    }
                };

                $(this).ajaxSubmit(options);
                $('#rowId-'+last_clicked_id).remove();
            }
        });



        /* ADD MEMBER */
        $('#membersForm').ajaxForm({
            success: function (data) {
                var jData = JSON.parse(data);
                if(!jData.type) {
                    appendData('errorMsg',jData.msg);
                } else {
                    appendData('successMsg',jData.msg);
                    $('#membersForm').resetForm();
                }
            }
        });

        /* UPDATE MEMBER */
        $('#memberEditForm').ajaxForm({
            success: function (data){
                var jData = JSON.parse(data);
                if(!jData.type) {
                    appendData('errorMsg',jData.msg);
                } else {
                    appendData('successMsg',jData.msg);
                    window.location = '<?php echo base_url('users/memberList');?>';
                }
            }
        });

        /* ADD USER */
        $('#usersForm').ajaxForm({
            success: function (data){
                var jData = JSON.parse(data);
                if(!jData.type) {
                    appendData('errorMsg',jData.msg);
                } else {
                    appendData('successMsg',jData.msg);
                    $('#usersForm').resetForm();
                }
            }
        });
    });


</script>
