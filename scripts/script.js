function submitForm(){
   return confirm('Do you really want to delete this record?')
}


let liveSearch = document.querySelector('#liveSearch')
if(liveSearch != null){
   liveSearch.addEventListener('keyup', ()=>{
      let val = liveSearch.value;
      if(val === "")
         location.reload()

      searchData(val.trim())
   })
}

function searchData(val){
   let xhr = new XMLHttpRequest()
   xhr.onreadystatechange = function(){
      if(this.readyState === 4 && this.status){
         let response = this.responseText
         console.log(response)
         let con = document.querySelector('.professors__Container')
         con.innerHTML = response
      }
   }
   xhr.open("GET", 'includes/ajax.inc.php?q='+val,true)
   xhr.send()
}

let empID = document.querySelector("#empID")
let userName = document.querySelector("#userName")

if(empID != null){
   empID.addEventListener("input", ()=>{
      userName.value = empID.value
   })
}


