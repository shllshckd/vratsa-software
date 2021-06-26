function solve() {
    let divs = document.getElementsByTagName('div');
    let ul = document.getElementById('result');

    for(div of divs) {
        let li = document.createElement('li');
        li.innerHTML = div.innerHTML;
        ul.appendChild(li);
        
        div.innerHTML = '';
    }
}

solve();
