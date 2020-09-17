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
if (liveSearch) {
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
   searchData(query, 'search')
}
let SectionsDepartmentChange = () => {
   let selectTag = document.querySelector('#sectionsDepartment')
   let name = selectTag.name
   let value = selectTag.value
   let query = `${name}=${value}`
   searchData(query, 'department')
   console.log(selectTag)
}
let SectionsChecklistChange = () => {
   let selectTag = document.querySelector('#sectionsChecklist')
   let name = selectTag.name
   let value = selectTag.value
   let query = `${name}=${value}`
   searchData(query, 'checklist')
}
let RemoveOptions = (sel) => {
   let len = sel.options.length
   for (let i = len - 1; i >= 0; i--) {
      sel.removeChild(sel.options[i])
   }
}
let SchoolYearOnChange = () => {
   let schoolTag = document.querySelector('#schoolYearSelect')
   let name = schoolTag.name
   let value = schoolTag.value
   let query = `${name}=${value}`
   searchData(query, 'schoolYear')
}

function searchData(query, target) {
   let xhr = new XMLHttpRequest()
   xhr.onreadystatechange = function () {
      if (this.readyState === 4 && this.status) {
         let response = this.responseText
         console.log(this.responseURL)
         console.log(this.response)
         if (target == 'search') {
            let con = document.querySelector('.module__Content')
            con.innerHTML = response
         } else if (target == 'department') {
            let con = document.querySelector('#sectionsChecklist')
            RemoveOptions(con)
            let datas = JSON.parse(this.responseText)
            datas.forEach(data => {
               let option = document.createElement('option')
               option.value = data['id']
               option.innerHTML = data['name']
               con.appendChild(option)
            })
            SectionsChecklistChange()
         } else if (target == 'checklist') {
            let con = document.querySelector('#sectionsLevel')
            RemoveOptions(con)
            let datas = JSON.parse(this.responseText)
            datas.forEach(data => {
               let option = document.createElement('option')
               option.value = data['level_id']
               option.innerHTML = data['description']
               con.appendChild(option)
            })
         }
      }
   }
   xhr.open("GET", 'includes/ajax.inc.php?' + query, true)
   xhr.send()
}

let newPass = document.querySelector('#new');
let ConfirmPassword = () => {
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
if (newPass) {
   ConfirmPassword()
}


// Rooms Form Hide Description base on checked radio button

const roomRadioButtons = document.querySelectorAll('#roomType-Con input')
if (roomRadioButtons) {
   const roomDesc = document.querySelector('#roomDesc-Con')
   const roomInput = document.querySelector('#roomDesc-Input')
   // Change Listener
   roomRadioButtons.forEach(radio => {
      radio.addEventListener('change', typeChange)
   })

   function typeChange() {
      if (this.id == 'Lecture') {
         roomInput.value = this.id + ' Room'
      } else {
         roomInput.value = ' '
      }
      roomDesc.classList.toggle('invisible')
   }

}