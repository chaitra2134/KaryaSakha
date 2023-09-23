/*
    Author - Chaitrali
    01/08/2023 @12:34
    
    Edited by Prizam
    01/08/2023 12:48

*/

const passwordForm = document.getElementById("formNewPassword");
const passwordInput = document.getElementById("password");
const confirmPasswordInput = document.getElementById("cPassword");

passwordForm.addEventListener("submit", function (event) {
    event.preventDefault();

    const password = passwordInput.value;
    const confirmPassword = confirmPasswordInput.value;

    if (password !== confirmPassword) {
        alert("Password and Confirm Password do not match!");
    } else {
        passwordForm.submit();
    }
});
  

