/*
  Author- Pranav
  Edited by Prizam
  date and time unknown

*/

const inputs = document.querySelectorAll(".otp-input");
const otpForm = document.getElementById("otp-form"); // Get the form element

const isAllInputFilled = () => {
  return Array.from(inputs).every((item) => item.value !== "");
};

const verifyOTP = () => {
  if (isAllInputFilled()) {
  } else {
    alert("Please fill all the OTP fields before submitting.");
  }
};

const toggleFilledClass = (field) => {
  if (field.value) {
    field.classList.add("filled");
  } else {
    field.classList.remove("filled");
  }
};

inputs.forEach((input, currentIndex) => {
  // fill check
  toggleFilledClass(input);

  // paste event
  input.addEventListener("paste", (e) => {
    e.preventDefault();
    const text = e.clipboardData.getData("text");
    inputs.forEach((item, index) => {
      if (index >= currentIndex && text[index - currentIndex]) {
        item.focus();
        item.value = text[index - currentIndex];
        toggleFilledClass(item);
      }
    });
    verifyOTP(); // Move this inside the paste event
  });

  // input event
  input.addEventListener("input", (e) => {
    const target = e.target;
    const value = target.value;
    toggleFilledClass(target);

    // Move to the next input field when a character is entered
    if (target.nextElementSibling && value !== "") {
      target.nextElementSibling.focus();
    }

    
  });

  // backspace event
  input.addEventListener("keydown", (e) => {
    if (e.keyCode === 8) {
      e.preventDefault();
      input.value = "";
      toggleFilledClass(input);
      if (input.previousElementSibling) {
        input.previousElementSibling.focus();
      }
    }
  });
});

otpForm.addEventListener("submit", (e) => {
  if (!isAllInputFilled()) {
    e.preventDefault(); // Prevent form submission if all fields are not filled
    alert("Please fill all the OTP fields before submitting.");
  }
});
