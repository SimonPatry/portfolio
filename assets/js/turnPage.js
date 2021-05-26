let renderer;
let mousePressed = false;
let x = 0;
let y = 0;

function turnPage(event)
{
    if (mousePressed)
    {
        let start = document.querySelector('nav').clientWidth;
        let percent = (x - start) / this.clientWidth * 100;
        let value = 90 * percent / 100;
        value = 90 - value;
        this.style.transform = `rotateY(${value}deg)`;
    }
}

function down(){
    mousePressed = true;
}
function up(){
    mousePressed = false;
}

function mousePos(event){
    x = event.clientX;
    y = event.clientY;
    document.getElementById('pos').innerHTML = `${x} - ${y} - mouse: ${mousePressed}`;
}

document.addEventListener("DOMContentLoaded",function(){
    document.addEventListener('mousemove', mousePos);
    document.addEventListener('mousedown', down);
    document.addEventListener('mouseup', up);
    document.querySelectorAll('.page').forEach(page => {
        page.addEventListener('mousemove', turnPage)});
});