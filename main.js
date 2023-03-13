let menubar = document.querySelector('#menu-btn');
let navbar = document.querySelector('.navbar');

menubar.onclick = () =>{
    menubar.classList.toggle('fa-times');
    navbar.classList.toggle('active');
}

let homePage = document.querySelector('#homePage');
document.querySelector('#homePage').onclick = () =>{
    menubar.classList.toggle('fa-times');
    homePage.classList.toggle('active')
    navbar.classList.toggle('active');
}

let featuresPage = document.querySelector('#featuresPage');
document.querySelector('#featuresPage').onclick = () =>{
    menubar.classList.toggle('fa-times');
    featuresPage.classList.toggle('active')
    navbar.classList.toggle('active');
}

let servicesPage = document.querySelector('#servicesPage');
document.querySelector('#servicesPage').onclick = () =>{
    menubar.classList.toggle('fa-times');
    servicesPage.classList.toggle('active')
    navbar.classList.toggle('active');
}

let aboutPage = document.querySelector('#aboutPage');
document.querySelector('#aboutPage').onclick = () =>{
    menubar.classList.toggle('fa-times');
    aboutPage.classList.toggle('active')
    navbar.classList.toggle('active');
}

let loginPage = document.querySelector('#loginPage');
document.querySelector('#loginPage').onclick = () =>{
    menubar.classList.toggle('fa-times');
    loginPage.classList.toggle('active')
    navbar.classList.toggle('active');
}

let registrationPage = document.querySelector('#registrationPage');
document.querySelector('#registrationPage').onclick = () =>{
    menubar.classList.toggle('fa-times');
    registrationPage.classList.toggle('active')
    navbar.classList.toggle('active');
}








// Get the button
let ToTopButton = document.getElementById("back-to-top-button");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        ToTopButton.style.display = "block";
    } else {
        ToTopButton.style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}