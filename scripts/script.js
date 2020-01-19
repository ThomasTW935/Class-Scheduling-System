navItems = document.querySelectorAll(".navScheduling__List--Item");

for(let navItem of navItems){
   let navName = navItem.id;
   navItem.addEventListener('click', ()=>{
      let divs = document.querySelectorAll(".mainScheduling > div");
      for(let div of divs){
         div.style.display = "none";
         if(div.className == navName){
            div.style.display = "grid";
         }
      }
   });
}

let navIcon = document.querySelector(".navScheduling__Icon");
navIcon.addEventListener('click', ()=>{
   let navList = document.querySelector(".navScheduling__List");
   let navList_Items = document.querySelectorAll(".navScheduling__List--Item");
   navList.classList.toggle('open');
   let delay = 0.05;
   for(let i = 0; i<navList_Items.length; i++){
      navList_Items[i].style.transitionDelay = delay+"s";
      navList_Items[i].classList.toggle('textTransition');
      delay += 0.1;
   }
});