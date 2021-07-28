function editMyProfile(recordID){

    var id = $(recordID).data('id');
	
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {		
				
		if (this.readyState == 4 && this.status == 200) {
				
            document.getElementById('my_profile').innerHTML = this.responseText;

            var xhttp1 = new XMLHttpRequest(); 
			xhttp1.onreadystatechange = function() {		
							
				if (this.readyState == 4 && this.status == 200) {
													
                    var myArray = eval(xhttp1.responseText);
                    
					document.getElementById("index_number").value =myArray[0];
                    document.getElementById("name").value =myArray[1];
					document.getElementById("address").value =myArray[2];
					document.getElementById("gender").value =myArray[3];
					document.getElementById("phone").value =myArray[4];
                    document.getElementById("email").value =myArray[5];
					document.getElementById("profile_pic").src ="../"+myArray[6];
                    document.getElementById("id").value =id;

                    validation();

                }
											
            };
            
            xhttp1.open("GET", "../model/get_admin.php?id=" + id , true);												
            xhttp1.send();
                
        }

    };

    xhttp.open("GET", "my_profile_update_form.php" , true);												
    xhttp.send();
      
};



function validation(){

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
            $("#btnUpdate").attr("disabled", true);
        
        }else{
    
            if(fileSize > maxSize) {
                //The file size is too large
                $('#profile_pic').attr("src", "../uploads/image_error.png");
                $('#pImage').remove();
                $('#divImage').append('<p id="pImage" style="color:red;"><small>The file size is too large.</small></p>');
                $("#btnUpdate").attr("disabled", true);
    
            }else{
                //Display the selected image
                $('#pImage').remove();
                $("#btnUpdate").attr("disabled", false);
                document.getElementById('profile_pic').src = URL.createObjectURL(this.files[0]);
    
            }
        }
    
    });

    $("form").submit(function(e) {
    
        var index_number = $('#index_number').val();
        var name = $('#name').val();
        var address = $('#address').val();
        var phone = $('#phone').val();
        var email = $('#email').val();
        
        var telformat = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    
    
        if (index_number == '') {
    
            $('#index_number').addClass('is-invalid');
            $("#btnUpdate").attr("disabled", true);
    
            $("#index_number").keydown(function() {
    
                $(this).removeClass('is-invalid');
                $("#btnUpdate").attr("disabled", false);
    
            });
    
        }
    
        if (name == '') {
    
            $('#name').addClass('is-invalid');
            $("#btnUpdate").attr("disabled", true);
    
            $("#name").keydown(function() {
    
                $(this).removeClass('is-invalid');
                $("#btnUpdate").attr("disabled", false);
    
            });
    
        }
    
        if (address == '') {
    
            $('#address').addClass('is-invalid');
            $("#btnUpdate").attr("disabled", true);
    
            $("#address").keydown(function() {
    
                $(this).removeClass('is-invalid');
                $("#btnUpdate").attr("disabled", false);
    
            });
    
        }
    
        if (phone == '') {
    
            $('#phone').addClass('is-invalid');
            $("#btnUpdate").attr("disabled", true);
    
            $("#phone").keydown(function() {
    
                $(this).removeClass('is-invalid');
                $("#btnUpdate").attr("disabled", false);
    
            });
    
        }else{
            if(telformat.test(phone) == false){
                //Enter valid phone number
                $('#phone').addClass('is-invalid');
                $("#btnUpdate").attr("disabled", true);
    
                $("#phone").keydown(function() {
    
                    var field = $(this);
        
                    setTimeout(function() {
    
                        var afterVal= field.val();
                        
                        if(telformat.test(afterVal) == true){
                            
                            field.removeClass('is-invalid');
                            $("#btnUpdate").attr("disabled", false);
                            field.addClass('is-valid');
                        }else{
                            field.removeClass('is-valid');
                            field.addClass('is-invalid');
                            $("#btnUpdate").attr("disabled", true);
    
                        }
                    
                    }, 0);
        
                });
        
    
            }
    
        }
    
        if (email == '') {
    
            $('#email').addClass('is-invalid');
            $("#btnUpdate").attr("disabled", true);
    
            $("#email").keydown(function() {
    
                $(this).removeClass('is-invalid');
                $("#btnUpdate").attr("disabled", false);
    
            });
    
        }else{
           if(mailformat.test(email) == false){
    
                $('#email').addClass('is-invalid');
                $("#btnUpdate").attr("disabled", true);
    
                $("#email").keydown(function() {
    
                    var field = $(this);
    
                    setTimeout(function() {
    
                        var afterVal = field.val();
                        
                        if(mailformat.test(afterVal) == true){
    
                            field.removeClass('is-invalid');
                            $("#btnUpdate").attr("disabled", false);
                            field.addClass('is-valid');
    
                        }else{
                            field.removeClass('is-valid');
                            field.addClass('is-invalid');
                            $("#btnUpdate").attr("disabled", true);
    
                        }
    
                    }, 0);
    
    
                });
    
           }
    
        }

        if (index_number == '' || name == '' || address == '' ||  phone == '' || email == '' ||  telformat.test(phone) == false || mailformat.test(email) == false) {
    
            e.preventDefault();
    
        }
    
    });


};

function editPassword(recordID){

    var username = $(recordID).data('id');
    $('#modalEditPassword').data('id1',username).modal('show');
  
};

function updatePassword(){

    var current_password = $('#current_password').val();
    var new_password = $('#new_password').val();
    var confirm_password = $('#confirm_password').val();

    var username = $('#modalEditPassword').data('id1');

    if (current_password == '') {

        $('#current_password').addClass('is-invalid');
        $("#btnUpdate").attr("disabled", true);

        $("#current_password").keydown(function() {

            $(this).removeClass('is-invalid');
            $("#btnUpdate").attr("disabled", false);

        });

    }

    if (new_password == '') {

        $('#new_password').addClass('is-invalid');
        $("#btnUpdate").attr("disabled", true);

        $("#new_password").keydown(function() {

            $(this).removeClass('is-invalid');
            $("#btnUpdate").attr("disabled", false);

        });

    }

    if (confirm_password == '') {

        $('#confirm_password').addClass('is-invalid');
        $("#btnUpdate").attr("disabled", true);

        $("#confirm_password").keydown(function() {

            $(this).removeClass('is-invalid');
            $("#btnUpdate").attr("disabled", false);

        });

    }

    if (current_password !== '' && new_password !== '' && confirm_password !== '') {

        var do1 = "update_password";

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {

            if (this.readyState == 4 && this.status == 200) {

                var myArray = JSON.parse(xhttp.responseText);
                var msg = myArray[0];
                
                if (msg == 1 ) {

                    $("#modalEditPassword").modal('hide');
                    Update_alert(msg);

                    setTimeout(function(){

                        $(location).attr('href', 'http://localhost/std/view/login.php');  
                         
                    },3000);
  

                }

                if(msg == 2 || msg == 3 || msg == 4) {

                    $("#modalEditPassword").modal('hide');
                    Update_alert(msg);

                }

            }

        };
        xhttp.open("GET", "../model/update_password.php?username=" + username + "&current_password=" + current_password + "&new_password=" + new_password + "&confirm_password=" + confirm_password + "&do=" + do1, true);
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
                "positionClass": "toast-top-left",
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

            toastr["success"]("Your password has been successfully updated in our database, Please Re-Login!", "Success!");

        });
    }

    if (msg == 2) {

        $(function() {

            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-left",
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
                "positionClass": "toast-top-left",
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

            toastr["error"]("Your password and confirmation password do not match.", "Something is wrong!");

        });
    }

    if (msg == 4) {

        $(function() {

            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-left",
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

            toastr["error"]("Your current password is incorrect.", "Something is wrong!");

        });
    }

};