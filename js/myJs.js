var products = document.getElementsByClassName("item");
var searchInput = document.getElementById("searchInput");
var selectCategory = document.querySelectorAll("#selectCategory li");

searchInput.addEventListener("keyup", function(){
        for(var i = 0; i<products.length; i++)
        {
            var name = new RegExp(this.value, "i");
            if(products[i].firstElementChild.firstElementChild.textContent.search(name) == -1 ) 
            {
                products[i].style.display = "none";
            }
            else
            {
                products[i].style.display = "";
            }
        }   
});


function showElements()
{
    
    for(var i = 0; i<selectCategory.length; i++)
    {
        selectCategory[i].classList.remove("active");
    }  
    this.classList.add("active");
    
    for(var i = 0; i<products.length; i++)
    {
        if(products[i].querySelector("h2").classList.contains(this.id))
        {
            products[i].style.display = "";
        }
        else
            products[i].style.display = "none";
    }
}

for(var i = 0; i<selectCategory.length; i++)
{
    selectCategory[i].addEventListener("click", showElements);
}


console.log();

