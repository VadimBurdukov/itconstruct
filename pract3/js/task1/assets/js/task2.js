var i=0;

var ulEl = document.querySelectorAll("div.car__photo > ul")[0].children;

for (i = 0; i < ulEl.length; i++)
{ 
   
    if (!ulEl[i].children[0].dataset.href) 
    {
        console.log(ulEl[i].children[0])
        ulEl[i].children[0].style.opacity = 0.3;
        
    }
}  
console.log(ulEl)
