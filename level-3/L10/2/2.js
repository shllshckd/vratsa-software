solve = () => {
    let input = document.getElementsByClassName('button');

    let isLike = input[0].value === "Like";
    if  (isLike){
        input[0].setAttribute("class", "button yellow");
        input[0].value = "UnLike";
    }
    else {
        input[0].setAttribute("class", "button blue");
        input[0].value = "Like";
    }
}

let submitButton = document.getElementsByClassName("button");
submitButton[0].addEventListener("click", solve);
