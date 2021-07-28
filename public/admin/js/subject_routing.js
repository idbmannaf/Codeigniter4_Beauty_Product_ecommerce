$("form").submit(function(e) {
    
    var grade = $('#grade_id').val();
    var subject = $('#subject_id').val();
    var teacher = $('#teacher_id').val();
    var fee = $('#fee').val();

    if (grade == '') {

        $('#grade_id').addClass('is-invalid');
        $("#btnSubmit").attr("disabled", true);

        $("#grade_id").change(function() {

            $(this).removeClass('is-invalid');
            $("#btnSubmit").attr("disabled", false);

        });

    }

    if ( subject == '') {

        $('#subject_id').addClass('is-invalid');
        $("#btnSubmit").attr("disabled", true);

        $("#subject_id").change(function() {

            $(this).removeClass('is-invalid');
            $("#btnSubmit").attr("disabled", false);

        });

    }

    if ( teacher == '') {

        $('#teacher_id').addClass('is-invalid');
        $("#btnSubmit").attr("disabled", true);

        $("#teacher_id").change(function() {

            $(this).removeClass('is-invalid');
            $("#btnSubmit").attr("disabled", false);

        });

    }

    if (fee == '') {

        $('#fee').addClass('is-invalid');
        $("#btnSubmit").attr("disabled", true);

        $("#fee").keydown(function() {

            $(this).removeClass('is-invalid');
            $("#btnSubmit").attr("disabled", false);

        });

    }

    

    if (grade == '' || subject == '' || teacher == '' || fee == '') {

        e.preventDefault();

    }

});

//Update Record
function updateRecord(recordID) {

    var id = $(recordID).data('id');

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {

            var myArray = JSON.parse(xhttp.responseText);

            document.getElementById("id1").value = id;
            document.getElementById("grade_id1").value = myArray[0];
            document.getElementById("subject_id1").value = myArray[1];
            document.getElementById("teacher_id1").value = myArray[2];
            document.getElementById("fee1").value = myArray[3];

        }

    };
    xhttp.open("GET", "../model/get_subject_routing.php?id=" + id, true);
    xhttp.send();

};

function updateRecord1() {

    var id = document.getElementById("id1").value;
    var grade = document.getElementById("grade_id1").value;
    var subject = document.getElementById("subject_id1").value;
    var teacher = document.getElementById("teacher_id1").value;
    var fee = document.getElementById("fee1").value;

    if (fee == '') {

        $('#fee1').addClass('is-invalid');
        $("#btnUpdate").attr("disabled", true);

        $("#fee1").keydown(function() {

            $(this).removeClass('is-invalid');
            $("#btnUpdate").attr("disabled", false);

        });

    }else{
        var do1 = "update_subject_routing";

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {

            if (this.readyState == 4 && this.status == 200) {

                var myArray = JSON.parse(xhttp.responseText);
                var msg = myArray[0];

                if (msg == 1) {

                    $("#modalUpdateForm").modal('hide');
                    document.getElementById("td1_" + id).innerHTML = myArray[1];
                    document.getElementById("td2_" + id).innerHTML = myArray[2];
                    document.getElementById("td3_" + id).innerHTML = myArray[3];
                    document.getElementById("td4_" + id).innerHTML = myArray[4];
                    Update_alert(msg);
                }

                if (msg == 2 || msg == 3 ) {
                    $("#modalUpdateForm").modal('hide');
                    Update_alert(msg);
                }

            }

        };
        xhttp.open("GET", "../model/update_subject_routing.php?id=" + id + "&grade_id=" + grade + "&subject_id=" + subject + "&teacher_id=" + teacher + "&fee=" + fee + "&do=" + do1, true);
        xhttp.send();

    }

};

function Update_alert(msg) {

    if (msg == 1) {

        $(function() {

            toastr.options = {

                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "show",
                "hideMethod": "fadeOut"
            }

            toastr["success"]("Your information has been successfully updated in our database.", "Success!");

        });
    }

    if (msg == 2) {

        $(function() {

            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "show",
                "hideMethod": "fadeOut"
            }

            toastr["info"]("Check your internet connection and try again.", "Something is wrong!");

        });
    }

    if (msg == 3) {

        $(function() {

            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "show",
                "hideMethod": "fadeOut"
            }

            toastr["warning"]("The record hs been duplicated.", "Warning!");

        });
    }

};

//Delete Record
function deleteRecord(recordID) {

    var id = $(recordID).data('id');
    $('#deleteConfirm').data('id1', id).modal('show');

};

$('#btnYes').click(function() {

    var id = $('#deleteConfirm').data('id1');

    var info = $('#dTable').DataTable().page.info();
    var currentPageNumber = (info.page + 1);

    var rowCount = (info.recordsTotal);
    var table_name = "subject_routing"; //give data table name
    var do1 = "delete_record";

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {

            var myArray = JSON.parse(xhttp.responseText);
            var msg = myArray[0];

            if (msg == 1) {

                var xhttp1 = new XMLHttpRequest();
                xhttp1.onreadystatechange = function() {

                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById('table1').innerHTML = this.responseText;
                        cTablePage(currentPageNumber, rowCount);
                        Delete_alert(msg);

                    }

                };
                xhttp1.open("GET", "show_subject_routing_table.php", true);
                xhttp1.send();

            }

            if (msg == 2) {

                Delete_alert(msg);
            }

        }

    };
    xhttp.open("GET", "../model/delete_record.php?id=" + id + "&table_name=" + table_name + "&do=" + do1, true);
    xhttp.send();
});

function Delete_alert(msg) {

    if (msg == 1) {

        $(function() {

            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "show",
                "hideMethod": "fadeOut"
            }

            toastr["success"]("Your information has been successfully deleted in our database.", "Success!");

        });
    }

    if (msg == 2) {

        $(function() {
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "show",
                "hideMethod": "fadeOut"
            }

            toastr["info"]("Check your internet connection and try again.", "Something is wrong!");

        });
    }

};

function cTablePage(currentPageNumber, rowCount) {

    var startPoint = (currentPageNumber - 1) * 10;

    if (rowCount == (startPoint + 1)) {

        startPoint -= 10;
    }

    $(function() {
        $('#dTable').DataTable({
            "displayStart": startPoint
        });

    });

};