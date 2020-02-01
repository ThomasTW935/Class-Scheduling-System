let url = document.URL
let urlParams = url.split('?')[1]
let getParams = urlParams.split("&")
let params = {}
getParams.forEach( (item,index) => {
   let paramSplit = getParams[index].split('=')
   params[paramSplit[0]] = paramSplit[1]
})
let error = document.querySelector('.form__Error')
if(params.error == "username"){
   let errorMessage = "Sorry, we don't recognize this Username"
   error.innerHTML = errorMessage
   error.style.display = "block"
} 
if(params.error == "password"){
   let errorMessage = "Wrong Password"
   error.innerHTML = errorMessage
   error.style.display = "block"
   PasswordForm()
}    
if(params.error == undefined && params.username != undefined){
   PasswordForm()
}

function PasswordForm(){
   let formDisplay = document.querySelectorAll('.form__Signin--display')
   let formHide = document.querySelectorAll('.form__Signin--hide')
   formDisplay.forEach( (item,index) => {
         formDisplay[index].style.display = "block"
   })
   formHide.forEach( (item,index) => {
      formHide[index].style.display = "none"
   })
   let signinName = document.querySelector('.form__Message span')
   signinName.innerHTML = params.username
}
