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
let searchPage = document.querySelector('#liveSearch--Page')
console.log(liveSearch)
if (liveSearch != null) {
   if (liveSearch.value != '') SearchQuery(searchPage.value)
   liveSearch.addEventListener('keyup', () => {
      SearchQuery(1)
   })
}

function SearchQuery(pageNum) {
   let val = liveSearch.value.trim()
   let name = liveSearch.name
   let state = searchStatus.value
   let page = pageNum
   let query = name + '=' + val + '&state=' + state + `&page=${page}`
   searchData(query)
}
function searchData(query) {
   let xhr = new XMLHttpRequest()
   xhr.onreadystatechange = function () {
      if (this.readyState === 4 && this.status) {
         let response = this.responseText
         console.log(response)
         let con = document.querySelector('.module__Content')
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

let ConfirmPassword = () => {
   let newPass = document.querySelector('#new');
   let confirm = document.querySelector('#confirm');
   let errorConfirm = document.querySelector('#errorConfirm');

   confirm.addEventListener('keyup', () => {
      let value = newPass.value
      let confirmValue = confirm.value
      let errorMessage = 'Incorrect'
      if (value != confirmValue) {
         errorConfirm.innerHTML = errorMessage
      } else {
         errorConfirm.innerHTML = ''
      }
      console.log(`Value: ${value}`)
      console.log(`Confirm: ${confirmValue}`)
   })
}

ConfirmPassword()


