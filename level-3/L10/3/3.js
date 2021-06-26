solve = () => {
    let content = document.getElementsByClassName('content');
    let checkbox = document.getElementsByClassName("checkbox");

    console.log(content);
    console.log(content[0].checked);

    if (checkbox[0].checked) {
        content[0].style.display = "block";
    }
    else {
        content[0].style.display = "none";
    }
}

validate = () => {
    let firmNameInput = document.getElementById("firm_name_input");
    let firmNameError = document.getElementById("firm_name_error");
    
    let addressInput = document.getElementById("address_input");
    let addressError = document.getElementById("address_error"); 
    
    let phoneInput = document.getElementById("phone_input");
    let phoneError = document.getElementById("phone_error");
    
    if (firmNameInput.value == "") {
        firmNameError.style.display = "block";
    } 
    else {
        firmNameError.style.display = "none";
    }

    if (addressInput.value == "") {
        addressError.style.display = "block";
    } 
    else {
        addressError.style.display = "none";
    }

    if (phoneInput.value == "") {
        phoneError.style.display = "block";
    } 
    else {
        phoneError.style.display = "none";
    }
}

let checkboxElement = document.getElementsByClassName("checkbox");
checkboxElement[0].addEventListener("change", solve);

let submitButton = document.getElementById("submit");
submitButton.addEventListener("click", validate);
