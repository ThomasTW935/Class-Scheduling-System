function submitForm(e) {
   let value = document.querySelector('#state').value;
   let message;
   if (value == 0) {
      message = "Restore"
   } else {
      message = "Delete"
   }
   return confirm(message + ' this record?')
}


let liveSearch = document.querySelector('#liveSearch')
let searchStatus = document.querySelector('#liveSearch--Status')
console.log(searchStatus)
if (liveSearch != null) {
   liveSearch.addEventListener('keyup', () => {
      let val = liveSearch.value.trim()
      let name = liveSearch.name
      let state = searchStatus.value
      let query = name + '=' + val + '&state=' + state
      searchData(query)
   })
}

function searchData(query) {
   let xhr = new XMLHttpRequest()
   xhr.onreadystatechange = function () {
      if (this.readyState === 4 && this.status) {
         let response = this.responseText
         console.log(response)
         let con = document.querySelector('.module__Container')
         con.innerHTML = response
      }
   }
   xhr.open("GET", 'includes/ajax.inc.php?' + query, true)
   xhr.send()
}

let empID = document.querySelector("#empID")
let userName = document.querySelector("#userName")

if (empID != null) {
   empID.addEventListener("input", () => {
      userName.value = empID.value
   })
}


