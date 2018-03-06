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

<!-- FOR DATATABLE START -->
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

$(".date-picker").datepicker({
    format: "yyyy-mm-dd",
    orientation: "bottom",
});

/* SHOW/HIDE DIV AFTER AJAX CALL */
$(document).ajaxStart( function() {
    $("#overlayDiv").show();
    $("#loading").show();
}).ajaxStop ( function(){
    setTimeout(function () {
        $("#overlayDiv").fadeOut();
        $("#loading").fadeOut();
        $("html, body").animate({scrollTop: 0});
    }, 0);
});

/* SHOW SUCCESS/ERROR MESSAGE */
function appendData(div,msg){
    $('div#'+div).css({ display: "block" });
    $('div#'+div).html(msg);
    setTimeout(function() {
        $('div#'+div).css({ display: "none" });
    }, 7000);
}


/* ======= START SAVINGS SECTION AREA ========= */
/* SAVING SECTION ONSCREEN MEMBER IMFORMATION SHOW */
$("#memberId").keyup(function () {
    var value = $(this).val();
    if(value){
        $.ajax({
            url: '<?php echo base_url('deposit/ajaxGetMemberInfo/'); ?>'+value,
            success: function (response) {
                var data = $.parseJSON(response);
                $('#memberInformationHolder').html(data.html);
            }
        });
    } else {
        $('#memberInformationHolder').html('');
    }

});

/* ADD SAVINGS */
$('#savingForm').ajaxForm({
    success: function (data) {
        var jData = JSON.parse(data);
        if(!jData.type) {
            appendData('errorMsgSaving',jData.msg);
        } else {
            appendData('successMsgSaving',jData.msg);
            $('#memberInformationHolder').html('');
            ajaxDataTable('saving-list', 'deposit/ajaxSavingList');
            $('#savingForm').resetForm();
        }
    }
});

/* SAVINGS SEARCH */
$('#savingSearchForm').ajaxForm({
    success: function (data) {
        var jData = JSON.parse(data);
        if(!jData.type) {
            appendData('errorMsgSearchSaving',jData.msg);
            $('#searchMemberSavingTableHolder').html('');
        } else {
            appendData('successMsgSearchSaving',jData.msg);
            $('#searchMemberSavingTableHolder').html(jData.html);
            // $('#savingSearchForm').resetForm();
        }
    }
});

/* ======= END SAVING SECTION AREA ======= */

/* ======= START DPS SECTION AREA ======= */
/* CREATE DPS */
$('#createDpsForm').ajaxForm({
    success: function(data) {
        var jData = JSON.parse(data);
        if(!jData.type) {
            appendData('applyErrorMsgDps',jData.msg);
            $('#memberDpsInformationHolder').html('');
        } else {
            appendData('applySuccessMsgDps',jData.msg);
            $('#memberDpsInformationHolder').html(jData.html);
            $(".date-picker").datepicker(); // reinitialized
        }
    }
});

/* MONTHLY DPS */
$('#monthlyDps').ajaxForm({
    success: function(data) {
        var jData = JSON.parse(data);
        if(!jData.type) {
            appendData('errorMsgDps',jData.msg);
        } else {
            appendData('successMsgDps',jData.msg);
            $('#memberInformationHolder').html('');
            ajaxDataTable('dps-list', 'deposit/ajaxDpsList');
            $('#monthlyDps').resetForm();
        }
    }
});

/* DPS SEARCH */
$('#dpsSearchForm').ajaxForm({
    success: function (data) {
        var jData = JSON.parse(data);
        if(!jData.type) {
            appendData('errorMsgSearchDps',jData.msg);
            $('#searchMemberdpsTableHolder').html('');
        } else {
            appendData('successMsgSearchDps',jData.msg);
            $('#searchMemberdpsTableHolder').html(jData.html);
            // $('#dpsSearchForm').resetForm();
        }
    }
});



/* ======= END DPS SECTION AREA ======== */

/* ======= START TDR SECTION AREA ======= */
/* CREATE TDR */
$('#createTdrForm').ajaxForm({
    success: function(data) {
        var jData = JSON.parse(data);
        if(!jData.type) {
            appendData('applyErrorMsgTdr',jData.msg);
            $('#memberTdrInformationHolder').html('');
        } else {
            appendData('applySuccessMsgTdr',jData.msg);
            $('#memberTdrInformationHolder').html(jData.html);
            $(".date-picker").datepicker(); // reinitialized
        }
    }
});

/* MONTHLY TDR */
$('#monthlyTdr').ajaxForm({
    success: function(data) {
        var jData = JSON.parse(data);
        if(!jData.type) {
            appendData('errorMsgTdr',jData.msg);
        } else {
            appendData('successMsgTdr',jData.msg);
            $('#memberInformationHolder').html('');
            ajaxDataTable('tdr-list', 'deposit/ajaxTdrList');
            $('#monthlyTdr').resetForm();
        }
    }
});

/* TDR SEARCH */
$('#tdrSearchForm').ajaxForm({
    success: function (data) {
        var jData = JSON.parse(data);
        if(!jData.type) {
            appendData('errorMsgSearchTdr',jData.msg);
            $('#searchMembertdrTableHolder').html('');
        } else {
            appendData('successMsgSearchTdr',jData.msg);
            $('#searchMembertdrTableHolder').html(jData.html);
            // $('#tdrSearchForm').resetForm();
        }
    }
});

/* ======= END TDR SECTION AREA ======== */

/* ======= START SDF SECTION AREA ======= */

/* CREATE SDF */
$('#createSdfForm').ajaxForm({
    success: function(data) {
        var jData = JSON.parse(data);
        if(!jData.type) {
            appendData('applyErrorMsgSdf',jData.msg);
            $('#memberSdfInformationHolder').html('');
        } else {
            appendData('applySuccessMsgSdf',jData.msg);
            $('#memberSdfInformationHolder').html(jData.html);
            $(".date-picker").datepicker(); // reinitialized
        }
    }
});

/* MONTHLY SDF */
$('#sdfForm').ajaxForm({
    success: function(data) {
        var jData = JSON.parse(data);
        if(!jData.type) {
            appendData('errorMsgSdf',jData.msg);
        } else {
            appendData('successMsgSdf',jData.msg);
            $('#memberInformationHolder').html('');
            ajaxDataTable('sdf-list', 'deposit/ajaxSdfList');
            $('#sdfForm').resetForm();
        }
    }
});


/* SDF SEARCH */
$('#sdfSearchForm').ajaxForm({
    success: function (data) {
        var jData = JSON.parse(data);
        if(!jData.type) {
            appendData('errorMsgSearchSdf',jData.msg);
            $('#searchMembersdfTableHolder').html('');
        } else {
            appendData('successMsgSearchSdf',jData.msg);
            $('#searchMembersdfTableHolder').html(jData.html);
            // $('#savingSearchForm').resetForm();
        }
    }
});

/* ======= END SDF SECTION AREA ======== */


/* ======= START TDR SECTION AREA ======= */

/* CREATE TDR */
$('#createTdrForm').ajaxForm({
    success: function(data) {
        var jData = JSON.parse(data);
        if(!jData.type) {
            appendData('applyErrorMsgTdr',jData.msg);
            $('#memberTdrInformationHolder').html('');
        } else {
            appendData('applySuccessMsgTdr',jData.msg);
            $('#memberTdrInformationHolder').html(jData.html);
            $(".date-picker").datepicker(); // reinitialized
        }
    }
});

/* ======= END TDR SECTION AREA ======== */


$(document).ready(function() {
    // datatables
    // savings
    var savingList = ajaxDataTable('saving-list', 'deposit/ajaxSavingList');
    //dps
    var dpsList = ajaxDataTable('dps-list', 'deposit/ajaxDpsList');
    //sdf
    var sdfList = ajaxDataTable('sdf-list', 'deposit/ajaxSdfList');
});

function ajaxDataTable(id, url){
   $('.'+id).DataTable({
       "destroy": true,
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
</script>
