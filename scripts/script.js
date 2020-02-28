function submitForm(){
   return confirm('Do you really want to delete this record?')
}


let liveSearch = document.querySelector('#liveSearch')
if(liveSearch != null){
   liveSearch.addEventListener('keyup', ()=>{
      let val = liveSearch.value;
      if(val !== ""){
         searchData(val)
      }
   })
}

function searchData(val){
   let xhr = new XMLHttpRequest()
   xhr.onreadystatechange = function(){
      if(this.readyState === 4 && this.status === 200){
         console.log(this.responseText)
         let con = document.querySelector('.professors__Container')
         con.innerHTML = this.reponseText
      }
   }
   xhr.open("GET", '../includes/professors.inc.php?q='+val,true)
   xhr.send()
}

let empID = document.querySelector("#empID")
let userName = document.querySelector("#userName")

if(empID != null){
   empID.addEventListener("input", ()=>{
      userName.value = empID.value
   })
}


