let wrapper = document.getElementById('wrapper');
let divsCount = 50;

for (let i = 0; i < divsCount; i++) {
    let div = document.createElement('div');
    let heading = document.createElement('h1');

    let random = Math.random();
    let randomNumber = random.toString().split('.')[1];

    heading.innerText = randomNumber;
    heading.setAttribute('id', randomNumber);

    div.appendChild(heading);

    let p = document.createElement('p');
    let img = document.createElement('img');

    img.setAttribute('src', `img/${randomNumber}.png`);
    img.setAttribute('alt', `${randomNumber}`);

    p.innerText = 'paragraph text // ';
    p.appendChild(img);
    div.appendChild(p);
    wrapper.appendChild(div);
}