let navBurger = document.querySelector(".nav__Burger");
navBurger.addEventListener("click", () => {
   let navList = document.querySelector(".nav__List");
   navList.classList.toggle("open")
})