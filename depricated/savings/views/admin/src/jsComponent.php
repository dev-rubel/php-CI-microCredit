<script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url();?>assets/pages/scripts/form-validation.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->

<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>



<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-sweetalert/sweetalert.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="<?php echo base_url();?>assets/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url();?>assets/pages/scripts/ui-sweetalert.min.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>assets/tanvir/malsup/jquery.form.min.js" type="text/javascript"></script>



<script>
    //var editableData = [];
    window.editableData = [];
    $(document).ready(function() {
        $(document).on('click', 'a', function () {
            var obj = $(this);
            var myAction = obj.attr('myAction');
            var myTable = obj.attr('myTable');
            var myUrl = obj.attr('myUrl');
            var myId = obj.attr('myId');
            if (myAction == 'delete') {
                swal({
                        title: "Are you sure?",
                        text: "You will not be able to recover this imaginary file!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes, delete it!",
                        closeOnConfirm: false
                    },
                    function(){
                        $.ajax({
                            url: myUrl,
                            success: function () {
                                swal("Deleted!", "Your "+myTable+" data has been deleted.", "success");
                                obj.closest('tr').remove();
                            }
                        });
                    });
            }
            if (myAction == 'editable') {
                editableData.push(myId);
                obj.closest('tr').children('.editable').each(function () {
                    var edtObj = $(this);
                    var txt = edtObj.text();
                    editableData.push(txt);
                });
            }

            /*if (myAction == 'editable') {
                obj.closest('tr').children('.editable').each(function () {
                    var edtObj = $(this);
                    var txt = edtObj.text();
                    edtObj.html('<input size="10" value="'+txt+'">');
                    var datePicker = edtObj.hasClass('datePickerTd');
                    if (datePicker) {
                        edtObj.html('<input class="date date-picker" data-date-format="yyyy-mm-dd" data-date-viewmode="years" onclick=""  size="10" value="'+txt+'">');
                    }
                });
            }*/
        });



        //$('#dp').datepicker('show');


        $(document).on('click', '.clsCenterFrJs', function () {
            var dataTargetId = $(this).attr("data-target");
            $(dataTargetId).children().removeAttr('style');
        });

        $(document).on('click', '.clsRightFrJs', function () {
            var dataTargetId = $(this).attr("data-target");
            $(dataTargetId).children().css('margin-right', '0');
        });

    });
</script>