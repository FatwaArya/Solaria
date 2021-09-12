window.addEventListener("scroll", function(){
    let navbar = document.querySelector('.navbar');
    navbar.classList.toggle('sticky', window.scrollY >0);
})
// sticky tutorial https://www.youtube.com/watch?v=6HFpw5fcaD8