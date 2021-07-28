$("form").submit(function(e) {

    var name = $('#name').val();
   
    if (name == '') {

        e.preventDefault();
        $('#name').addClass('is-invalid');
       // $('#pName').remove();
        $('#divName').append('<p id="pName" style="color:red;"><small>The subject name is required.</small></p>');
        $("#btnSubmit").attr("disabled", true);

        $("#name").keydown(function() {

            $(this).removeClass('is-invalid');
            $('#pName').remove();
            $("#btnSubmit").attr("disabled", false);

        });

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
            document.getElementById("name1").value = myArray[0];
           

        }

    };
    xhttp.open("GET", "../model/get_subject.php?id=" + id, true);
    xhttp.send();

};

function updateRecord1() {

    var id = document.getElementById("id1").value;
    var name = document.getElementById("name1").value;  

    if (name == '') {

        $('#name1').addClass('is-invalid');
        $('#divNameUpdate').append('<p id="pNameUpdate" style="color:red;"><small>The subject name is required.</small></p>');
        $("#btnUpdate").attr("disabled", true);

        $("#name1").keydown(function() {

            $(this).removeClass('is-invalid');
            $('#pNameUpdate').remove();
            $("#btnUpdate").attr("disabled", false);

        });

    }else{

        var do1 = "update_subject";

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {

            if (this.readyState == 4 && this.status == 200) {

                var myArray = JSON.parse(xhttp.responseText);
                var msg = myArray[0];

                if (msg == 1) {

                    $("#modalUpdateForm").modal('hide');
                    document.getElementById("td1_" + id).innerHTML = myArray[1];
                    Update_alert(msg);
                }

                if (msg == 2 || msg == 3 ) {
                    $("#modalUpdateForm").modal('hide');
                    Update_alert(msg);
                }

            }

        };
        xhttp.open("GET", "../model/update_subject.php?id=" + id + "&name=" + name + "&do=" + do1, true);
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

            toastr["warning"]("This subject already has in our Database.", "Warning!");

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
    var table_name = "subject"; //give data table name
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
                xhttp1.open("GET", "show_subject_table.php", true);
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