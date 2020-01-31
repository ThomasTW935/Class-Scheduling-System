let url = document.URL
let urlParams = url.split('?')[1]
let paramTitle = urlParams.split("=")[0]
let paramContent = urlParams.split("=")[1]

let error = document.querySelector('.form__Error')
if(paramTitle == "error" && paramContent == "username"){
   let errorMessage = "Sorry, we don't recognize this Username"
   error.innerHTML = errorMessage
   error.style.display = "block"
   
} else if(paramTitle == "error" && paramContent == "password"){
   let errorMessage = "Wrong Password"
   error.innerHTML = errorMessage
   error.style.display = "block"
}  


if(paramTitle == "username"){
   let formDisplay = document.querySelectorAll('.form__Signin--display')
   let formHide = document.querySelectorAll('.form__Signin--hide')
   formDisplay.forEach( (item,index) => {
         formDisplay[index].style.display = "block"
   })
   formHide.forEach( (item,index) => {
      formHide[index].style.display = "none"
   })
   let signinName = document.querySelector('.form__Message span')
   signinName.innerHTML = paramContent
}