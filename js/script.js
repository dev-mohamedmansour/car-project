let btnClick = document.querySelectorAll(".service-box");
let form = document.querySelector(".Form");
let serviceInput = document.querySelector(".service");

for (let i = 0; i < btnClick.length; i++) {
    btnClick[i].addEventListener("click", function(e) {
        e.preventDefault(); // Prevent default anchor behavior

        // Show the form
        form.style.display = "block";

        // Extract service name from the HTML content
        let serviceText = btnClick[i].textContent.trim();
        // Remove emoji and extra whitespace
        serviceText = serviceText.replace(/[^\w\s]/g, '').replace(/\s+/g, ' ').trim();

        // Set the service input value
        serviceInput.value = serviceText;

        // Scroll to form if needed
        document.querySelector("#form").scrollIntoView({ behavior: 'smooth' });
    });
}

function formValidate3() {
    var firstName = document.getElementById("firstName").value;
    var lastName = document.getElementById("lastName").value;
    var phone = document.getElementById("phone").value;
    var email = document.getElementById("email").value;
    var error = document.getElementById("error");
    var text = "";
    error.classList.add("error-message");
    error.style.display = "block";

    if (firstName.length < 3) {
        text = "Please Enter a Valid First Name";
        error.innerHTML = text;
        return false;
    }

    if (lastName.length < 3) {
        text = "Please Enter a Valid Last Name";
        error.innerHTML = text;
        return false;
    }

    let egyptPhoneRegex = /^(010|011|012|015)[0-9]{8}$/;
    if (!egyptPhoneRegex.test(phone)) {
        text = "Please Enter a Valid Phone Number";
        error.innerHTML = text;
        return false;
    }

    let emailRegex = /^[a-zA-Z0-9._%+-]+@(gmail|yahoo|hotmail|outlook|icloud|protonmail)+(\.com)$/;
    if (!emailRegex.test(email)) {
        text = "Please Enter a Valid Email";
        error.innerHTML = text;
        return false;
    }
    alert("Form submitted successfully");
    return true;
}

{
// Form

// function loginValidate() {
//     var Email = document.getElementById("Email").value;
//     var Password = document.getElementById("Password").value;
//     var error = document.getElementById("error");
//     var text = "";
//     error.classList.add("error-message");
//     error.style.display = "block";
//
//     let emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
//     if (!emailRegex.test(Email)) {
//         text = "Please Enter a Valid Email";
//         error.innerHTML = text;
//         return false;
//     }

// let passwordRegex = /^[A-Z]+[a-zA-Z0-9._%+-]{8,}$/
// if (!passwordRegex.test(Password)) {
//   text = "Please Enter a Valid Password";
//   error.innerHTML = text;
//   return false;
// }
// alert("Form submitted successfully");
// return true;

// Validate registration form

function registerValidate2() {
    var Username2 = document.getElementById("Username2").value;
    var Email2 = document.getElementById("Email2").value;
    var Password2 = document.getElementById("Password2").value;
    var error2 = document.getElementById("error2");
    var text = "";

    error2.classList.add("error-message");
    error2.style.display = "block";

    // ✅ التحقق من اسم المستخدم
    if (Username2.length === 3) {
        text = "Please Enter a Valid Username (at least 5 characters)";
        error2.innerHTML = text;
        return false;
    }

    // ✅ التحقق من البريد الإلكتروني
    let emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (!emailRegex.test(Email2)) {
        text = "Please Enter a Valid Email";
        error2.innerHTML = text;
        return false;
    }

    // ✅ التحقق من كلمة المرور
    let passwordRegex = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    if (!passwordRegex.test(Password2)) {
      text = "Password must be at least 8 characters, contain a capital letter, a number, and a special character.";
      error2.innerHTML = text;
      return false;
    }

    // ✅ إخفاء الخطأ عند نجاح التحقق
    error2.style.display = "none";
    alert("Form submitted successfully");
    return true;
}
}