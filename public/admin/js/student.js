$('#image').change(function(){

    var fileSize = this.files[0].size;
    var maxSize = 1000000;// bytes
    var filename = $(this).val();

    var ext = filename.split('.').pop();
    
   
    if($.inArray(ext, ['png','jpg','jpeg']) == -1) {
        //The file type is not allowed
       
        $('#profile_pic').attr("src", "../uploads/image_error.png");
        $('#pImage').remove();
        $('#divImage').append('<p id="pImage" style="color:red;"><small>The file type is not allowed.</small></p>');
        $("#btnSubmit").attr("disabled", true);
    
    }else{

        if(fileSize > maxSize) {
            //The file size is too large
            $('#profile_pic').attr("src", "../uploads/image_error.png");
            $('#pImage').remove();
            $('#divImage').append('<p id="pImage" style="color:red;"><small>The file size is too large.</small></p>');
            $("#btnSubmit").attr("disabled", true);

        }else{
            //Display the selected image
            $('#pImage').remove();
            $("#btnSubmit").attr("disabled", false);
            document.getElementById('profile_pic').src = URL.createObjectURL(this.files[0]);

        }
    }

});

$("form").submit(function(e) {
    
    var index_number = $('#index_number').val();
    var name = $('#name').val();
    var address = $('#address').val();
    var gender = $('#gender').val();
    var phone = $('#phone').val();
    var email = $('#email').val();
    var image = $('#image').val();

    var telformat = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;


    if (index_number == '') {

        $('#index_number').addClass('is-invalid');
        $('#pIndexNumber').remove();
        $('#divIndexNumber').append('<p id="pIndexNumber" style="color:red;"><small>The index number is required.</small></p>');
        $("#btnSubmit").attr("disabled", true);

        $("#index_number").keydown(function() {

            $(this).removeClass('is-invalid');
            $('#pIndexNumber').remove();
            $("#btnSubmit").attr("disabled", false);

        });

    }

    if (name == '') {

        $('#name').addClass('is-invalid');
        $('#pName').remove();
        $('#divName').append('<p id="pName" style="color:red;"><small>The student name is required.</small></p>');
        $("#btnSubmit").attr("disabled", true);

        $("#name").keydown(function() {

            $(this).removeClass('is-invalid');
            $('#pName').remove();
            $("#btnSubmit").attr("disabled", false);

        });

    }

    if (address == '') {

        $('#address').addClass('is-invalid');
        $('#pAddress').remove();
        $('#divAddress').append('<p id="pAddress" style="color:red;"><small>The address is required.</small></p>');
        $("#btnSubmit").attr("disabled", true);

        $("#address").keydown(function() {

            $(this).removeClass('is-invalid');
            $('#pAddress').remove();
            $("#btnSubmit").attr("disabled", false);

        });

    }

    if (gender == 'Select Gender') {

        $('#gender').addClass('is-invalid');
        $('#pGender').remove();
        $('#divGender').append('<p id="pGender" style="color:red;"><small>The gender is required.</small></p>');
        $("#btnSubmit").attr("disabled", true);

        $("#gender").change(function() {

            $(this).removeClass('is-invalid');
            $('#pGender').remove();
            $("#btnSubmit").attr("disabled", false);

        });

    }

    if (phone == '') {

        $('#phone').addClass('is-invalid');
        $('#pPhone').remove();
        $('#divPhone').append('<p id="pPhone" style="color:red;"><small>The phone number is required.</small></p>');
        $("#btnSubmit").attr("disabled", true);

        $("#phone").keydown(function() {

            $(this).removeClass('is-invalid');
            $('#pPhone').remove();
            $("#btnSubmit").attr("disabled", false);

        });

    }else{
        if(telformat.test(phone) == false){
            //Enter valid phone number
            $('#phone').addClass('is-invalid');
            $('#pPhone').remove();
            $('#divPhone').append('<p id="pPhone" style="color:red;"><small>Enter valid phone number.</small></p>');
            $("#btnSubmit").attr("disabled", true);

            $("#phone").keydown(function() {

                var field = $(this);
    
                setTimeout(function() {

                    var afterVal= field.val();
                    
                    if(telformat.test(afterVal) == true){
                        
                        field.removeClass('is-invalid');
                        $('#pPhone').remove();
                        $("#btnSubmit").attr("disabled", false);
                        field.addClass('is-valid');
                    }else{
                        field.removeClass('is-valid');
                        field.addClass('is-invalid');
                        $('#pPhone').remove();
                        $('#divPhone').append('<p id="pPhone" style="color:red;"><small>Enter valid phone number.</small></p>');
                        $("#btnSubmit").attr("disabled", true);

                    }
                
                }, 0);
    
            });
    

        }

    }

    if (email == '') {

        $('#email').addClass('is-invalid');
        $('#pEmail').remove();
        $('#divEmail').append('<p id="pEmail" style="color:red;"><small>The email address is required.</small></p>');
        $("#btnSubmit").attr("disabled", true);

        $("#email").keydown(function() {

            $(this).removeClass('is-invalid');
            $('#pEmail').remove();
            $("#btnSubmit").attr("disabled", false);

        });

    }else{
       if(mailformat.test(email) == false){

            $('#email').addClass('is-invalid');
            $('#pEmail').remove();
            $('#divEmail').append('<p id="pEmail" style="color:red;"><small>Enter valid email address.</small></p>');
            $("#btnSubmit").attr("disabled", true);

            $("#email").keydown(function() {

                var field = $(this);

                setTimeout(function() {

                    var afterVal = field.val();
                    
                    if(mailformat.test(afterVal) == true){

                        field.removeClass('is-invalid');
                        $('#pEmail').remove();
                        $("#btnSubmit").attr("disabled", false);
                        field.addClass('is-valid');

                    }else{
                        field.removeClass('is-valid');
                        field.addClass('is-invalid');
                        $('#pEmail').remove();
                        $('#divEmail').append('<p id="pEmail" style="color:red;"><small>Enter valid email address.</small></p>');
                        $("#btnSubmit").attr("disabled", true);

                    }

                }, 0);


            });

       }

    }

    if(image == ''){
        $('#profile_pic').attr("src", "../uploads/image_error.png");
        $('#pImage').remove();
        $('#divImage').append('<p id="pImage" style="color:red;"><small>The profile picture is required.</small></p>');

    }

    if (index_number == '' || name == '' || address == '' || gender == 'Select Gender' ||  phone == '' || email == '' || image == '' || telformat.test(phone) == false || mailformat.test(email) == false) {

        e.preventDefault();

    }

});

$('#grade_id').change(function(){

    var student_id = $('#modalSelectGrade').data("id");
    var grade_id = $(this).val();

    $('#modalSelectGrade').modal('hide');

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {

            document.getElementById('divSelectSubject').innerHTML = this.responseText;
            $('#modalSelectSubject').modal('show');
            $('body').css('overflow-y', 'hidden');

        }

    };
    xhttp.open("GET", "show_student_subject.php?id=" + grade_id + "&student_id=" + student_id, true);
    xhttp.send();

});

function showModal(){

    $('#modalSelectGrade').modal('show');

};

function addStudentSubject(){

    $('#modalSelectSubject').modal('hide');

    var student_id = $('#student_id1').val();
    var grade_id = $('#grade_id1').val();
    
    var myArray = new Array();
     
    
	$("input:checked").each(function(){
		
		myArray.push($(this).val());
		
    });

    var myJSON = JSON.stringify(myArray);
    var do1 = "add_student_subject";
    
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {

            var myArray = JSON.parse(xhttp.responseText);

            var monthly_fee = myArray[0];

            addPayment(student_id,grade_id,monthly_fee);
           

        }

    };
    xhttp.open("GET", "../model/add_student_subject.php?student_id=" + student_id + "&grade_id=" + grade_id + "&sr_id=" + myJSON + "&do=" + do1, true);
    xhttp.send();



};

function addPayment(student_id,grade_id,monthly_fee){
    
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {

           document.getElementById('divShowInvoice').innerHTML = this.responseText;
           $('#modalInvoice').modal('show');
           $('#modalInvoice').css('overflow-y', 'auto');
          
        }

    };
    xhttp.open("GET", "student_first_payment.php?grade_id=" + grade_id + "&student_id=" + student_id + "&monthly_fee=" + monthly_fee, true);
    xhttp.send();


};

function addPayment1(){

    var student_id = $('#student_id').val();
    var admission_fee = $('#admission_fee').val();
    var monthly_fee = $('#monthly_fee').val();

    var do1 = "add_student_first_payment";


    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {

            var myArray = JSON.parse(xhttp.responseText);

            var msg = myArray[0];

            if(msg==1){
                window.print();
                $('#modalInvoice').modal('hide');
                Insert_alert(msg);
            }

            if(msg==2){
               
                Insert_alert(msg);
            }

            $('body').css('overflow-y', 'auto');
           
        }

    };
    xhttp.open("GET", "../model/add_student_first_payment.php?student_id=" + student_id + "&admission_fee=" + admission_fee + "&monthly_fee=" + monthly_fee + "&do=" + do1, true);
    xhttp.send();


};

function Insert_alert(msg) {

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

            toastr["success"]("Your information has been successfully inserted in our database.", "Success!");

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