window.addEventListener('scroll' , navbar);
function navbar (){
    const navbar = document.querySelector('.navbar')
    const buy = document.querySelector('.buy')
    const top = 10
    const main = window.innerHeight - top*2
    const intro = main + window.innerHeight - top*2

    if (scrollY <= main){
        navbar.style.backgroundColor = "#f1fa8e"
        buy.style.backgroundColor = "#f1fa8e"
    }
    if (scrollY >= main && intro >= scrollY){
        navbar.style.backgroundColor = "#FEF0D3"
        buy.style.backgroundColor = "#FEF0D3"
    }
    if (scrollY >= intro){
        navbar.style.backgroundColor = "#FFEFB0"
        buy.style.backgroundColor = "#FFEFB0"
    }
    
}