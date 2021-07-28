function teacherDetails(recordID) {

    var id = $(recordID).data('id');

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {

            var myArray = JSON.parse(xhttp.responseText);

            
            document.getElementById("tIndex").innerHTML = myArray[0];
            document.getElementById("tName").innerHTML = myArray[1];
            document.getElementById("tName1").innerHTML = myArray[1];
            document.getElementById("tAddress").innerHTML = myArray[2];
            document.getElementById("tGender").innerHTML = myArray[3];
            document.getElementById("tPhone").innerHTML = myArray[4];
            document.getElementById("tEmail").innerHTML = myArray[5];
            document.getElementById("tImage").src = "../"+myArray[6];
            document.getElementById("tRegDate").innerHTML = myArray[7];

        }

    };
    xhttp.open("GET", "../model/get_teacher.php?id=" + id, true);
    xhttp.send();

};