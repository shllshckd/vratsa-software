document.window
document.body
document.forms
document.links
document.links[0].href = "yahoo.com";
document.write("This is some <b>bold text</b>");

window.location
window.links
window.name
window.history

let element = document.getElementById('idName');
let element = document.getElementById('wrapper'); // explorerAddfav

let element = document.querySelector('#idName');
let element = document.querySelector('#infoHolder'); // #z1

let element = document.querySelector('#idName tagName');
let element = document.querySelector('#footerInner li'); // --get the li in footerInner

let element = document.querySelectorAll('#footerInner li'); // --get all the multiple li in footerInner

let element = document.querySelector('tagName');
let element = document.querySelector('span'); // div

let elements = document.getElementsByName('q'); // -- get all with name="q"
let elements = document.getElementsByTagName('div'); // --select all div tags
let elements = document.getElementsByClassName('clear'); // --select all with class "clear"

let elements = document.querySelectorAll('p,li,div,span,a,ul,form,input');

let selectedEl = document.getElementById('first-div');
selectedEl.addEventListener('mouseover', function () { console.log(); });

let selectedEl = document.getElementById('first-div');
selectedEl.addEventListener('mouseover', function() {
    document.querySelector('img').setAttribute('src', 'imgs/hi.jpg');
    let pEl = document.querySelector('p');
    pEl.innerText = 'asd';
})		

let selectedEl = document.getElementById('first-div');
selectedEl.onmouseover = function divIsHovered() {
    document.querySelector('img').setAttribute('src', 'imgs/hi.jpg');
    let pEl = document.querySelector('p');
    pEl.innerText = 'asd';
}

outer.addEventListener('click', onceHandler, once);
function onceHandler(event) {
    alert('outer, once');
}

window.onload = (e) => { console.log('dsa'); }

// returning a single element
// ---------------------------
getElementById()
querySelector('selector')

// returning a collection of elements
// ----------------------------------
getElementsByTagName('tag name')
getElementsByName('name')
getElementsByClassName('className')
querySelectorAll('selector')
