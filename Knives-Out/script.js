let nav = document.querySelector('nav')
let burgerMenu = document.querySelector('.burger-menu')
let navMenu = document.querySelector('.nav-menu')
let mouseButton = document.querySelector('.mouse')
let header = document.getElementsByTagName('header')
let arrowLeft = document.querySelector('.arrow-left')


function handleScroll() {
    if (window.scrollY > 0) {
        nav.classList.add('sticky')
    } else {
        nav.classList.remove('sticky')
    }
}


window.addEventListener('scroll', handleScroll);


mouseButton.addEventListener('click', function () {
    window.scrollBy({
        top: window.innerHeight,
        behavior: 'smooth',
    })
})


burgerMenu.addEventListener('click', () => {
    burgerMenu.classList.toggle('active')
    navMenu.classList.toggle('active')


    if (!nav.classList.contains('sticky')) {
        nav.classList.add('sticky')
    }
})

