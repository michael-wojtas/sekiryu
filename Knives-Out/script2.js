let burgerMenu = document.querySelector('.burger-menu')
let navMenu = document.querySelector('.nav-menu')


burgerMenu.addEventListener('click', () => {
    burgerMenu.classList.toggle('active')
    navMenu.classList.toggle('active')

})

