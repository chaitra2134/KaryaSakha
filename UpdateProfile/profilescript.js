// Updating Profile In The Database
/*
document.getElementById("saveChanges").addEventListener("click", updateProfile);
function updateProfile(e)
{
    e.preventDefault();
    let userName = document.getElementById('userName').value;
    let firstName = document.getElementById('firstName').value;
    let lastName = document.getElementById('lastName').value;
    let dob = document.getElementById('dob').value;
    let gender = document.getElementById('gender').value;
    let profession = document.getElementById('profession').value;

    console.log("This is a sample output");
    console.log(userName);
    console.log(firstName);
    console.log(lastName);
    console.log(dob);
    console.log(gender);
    console.log(profession);
    

    const xhr = new XMLHttpRequest();
    console.log("xhr object created");
    xhr.open("POST", "updateProfile.php", true);
    console.log("xhr object opened");
    xhr.setRequestHeader("Content-Type", "application/json");
    console.log("xhr object header");
    xhr.onload = () => {
        //x = xhr.response;
        //console.log(x);
        console.log("xhr object loaded");
        if (xhr.status === 200) {
            console.log("hello");
            console.log("Request Processed");  
            resetForm();     
            document.getElementById("alertBox").innerHTML = "<div class='alert alert-dark mt-3' role='alert'>" + xhr.responseText + "</div>";
            //document.getElementById("profileForm").reset();
            resetForm();
            
        }
        else
            console.log("Error Updating Profile!");
    };

    function resetForm()
    {
        const clearForm = document.getElementById("profileForm");
        clearForm.reset();
        console.log("Form Cleared");
    }
    const data = { 
        userName : userName, 
        firstName : firstName,
        lastName : lastName,
        dob : dob,
        gender : gender,
        profession : profession 
    };
    console.log(data);

    const jdata = JSON.stringify(data);
    console.log(jdata);

    //xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send(jdata);
    
}

*/

document.getElementById("discardChanges").addEventListener("click", resetForm);
function resetForm()
{
    const clearForm = document.getElementById("profileForm");
        clearForm.reset();
        console.log("Form Cleared");
        location.replace("profile2.php");
}

