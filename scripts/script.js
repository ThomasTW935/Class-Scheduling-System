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


// let radioCon = document.querySelectorAll('.form__Radio')
// if (radioCon != null) {
//    for (let i = 0; i < radioCon.length; i++) {
//       radioCon[i].addEventListener('change', () => {
//          let val = radioCon[i].value
//          console.log(val)
//          let query = name + '=' + val
//          displayDepartments(query)
//       })
//    }
// }

// function displayDepartments(query) {
//    let xhr = new XMLHttpRequest()
//    xhr.onreadystatechange = function () {
//       if (this.readyState === 4 && this.status) {
//          let response = this.responseText
//          let con = document.querySelector('.module__Form')
//          con.innerHTML = response
//       }
//    }
//    xhr.open("GET", 'includes/ajax.inc.php?' + query, true)
//    xhr.send()
// }

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


