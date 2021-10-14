window.addEventListener("scroll", function(){
    let navbar = document.querySelector('.navbar');
    navbar.classList.toggle('sticky', window.scrollY >800);
})
// sticky tutorialhttps://www.youtube.com/watch?v=6HFpw5fcaD8


//Get the button:
let mybutton = document.getElementById("top");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 400) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

//bottom to top https://www.w3schools.com/howto/howto_js_scroll_to_top.asp

