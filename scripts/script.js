function submitForm(){
   return confirm('Do you really want to delete this record?')
}

let empID = document.querySelector("#empID")
let userName = document.querySelector("#userName")

empID.addEventListener("input", ()=>{
   userName.value = empID.value
})
