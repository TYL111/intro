window.addEventListener('scroll' , navbar);
function navbar (){
    const navbar = document.querySelector('.navbar')
    const buy = document.querySelector('.buy')
    const top = window.innerWidth*0.03
    const main = window.innerHeight - top *2
    const intro = main + 2000

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