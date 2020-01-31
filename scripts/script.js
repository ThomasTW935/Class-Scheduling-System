let navBurger = document.querySelector(".nav__Burger")
navBurger.addEventListener("click", () => {
   let navList = document.querySelector(".nav__List")
   let navBurger_Line = document.querySelector(".nav__Burger--Line")
   navList.classList.toggle("open")
   navBurgetr_Line.classList.toggle("lineColor")
})

