let i = 0;

function changeHeroText()
{
    list = ['a Developper','a Gamer','Inevitable..'];
    document.querySelector(".parent").innerHTML = list[i];
    i++;
    if(i == 3)
        i = 0;
}

document.addEventListener("DOMContentLoaded",function(){
    changeHeroText();
    setInterval(changeHeroText, 3000);
});
