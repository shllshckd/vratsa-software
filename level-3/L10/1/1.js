https://stackoverflow.com/a/46181/13146140
validateEmail = (email) => {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

solve = () => {
    let input = document.getElementsByClassName('input');
    let div = document.getElementsByTagName('div');
    div[0].innerHTML = input[0].value;

    if (validateEmail(input[0].value)) {
        div[0].setAttribute("class", "green");
    }
    else {
        div[0].setAttribute("class", "red");
    }
}

let submitButton = document.getElementsByClassName("submit");
submitButton[0].addEventListener("click", solve);
