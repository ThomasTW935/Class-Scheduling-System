// Selecting Time of Container
let timeStart = document.querySelector('#startTime')
let ChangeFormatTime = () => {
  let timeEnd = document.querySelector('#endTime')
  let timeJump = document.querySelector('#jumpTime')

  timeStart.addEventListener('change', () => {
    let startDate = new Date('January 1 2000 ' + timeStart.value)
    let startDate_Hour = startDate.getHours()
    let endValue = timeEnd.value
    for (let k = timeEnd.options.length - 1; k >= 0; k--) {
      timeEnd.remove(k)
    }

    for (let i = startDate_Hour + 1; i <= 22; i++) {
      let option = document.createElement('option')
      let timeValue = i
      let timePeriod = 'AM'
      if (timeValue > 12) {
        timeValue = i - 12
        timePeriod = 'PM'
      }
      if (timeValue == 12) {
        timePeriod = 'PM'
      }
      let m = ":00 "
      option.value = i + m
      option.innerHTML = timeValue + m + timePeriod
      timeEnd.add(option)
    }

    let endDate = new Date('January 1 2000 ' + endValue)
    let endDate_Hour = endDate.getHours()
    if (startDate_Hour >= endDate_Hour) {
      timeEnd.value = timeEnd.options[0].value
    } else {
      timeEnd.value = endValue
    }
  })
}

if (timeStart != null) {
  ChangeFormatTime()
}

// Open/Close Modal

// let toggles = document.querySelectorAll(".form__Toggle")
// let form = document.querySelector(".module__Form")
// let formBg = document.querySelector(".module__formBackground")
// let arrForm = [form, formBg]

// arrForm.forEach(x => {
//   x.style.display = 'none'
// })
// toggles.forEach(toggle => {
//   toggle.addEventListener('click', FormToggle)
// })
// function FormToggle() {
//   arrForm.forEach(x => {
//     x.style.display = (x.style.display == 'none') ? 'flex' : 'none'
//   })
// }

//Fixing Schedules Labels

let TableFixLabel = () => {

  const table = document.querySelector('.schedules__Table table');
  let rows = table.rows
  let colLength = rows[0].cells.length
  for (let colIndex = 1; colIndex < colLength; colIndex++) {
    let mergeNum = 1
    for (let rowIndex = 1; rowIndex < rows.length; rowIndex++) {
      if (mergeNum <= 1) {
        var rowCurrent = rows[rowIndex]
        var cellCurrent = rowCurrent.cells[colIndex]
        var cellTextCurrent = cellCurrent.innerText
      }
      if (rows[rowIndex + 1]) {
        var rowNext = rows[rowIndex + 1]
        var cellNext = rowNext.cells[colIndex]
        var cellTextNext = cellNext.innerText
      }
      // if (rowIndex == 6 && colIndex == 1) {
      //   console.log(cellTextNext == cellTextCurrent)
      //   console.log(rowCurrent)
      //   console.log(rowNext)
      // }
      if (cellTextNext == cellTextCurrent) {
        mergeNum++
        cellNext.style.display = 'none'
        cellCurrent.rowSpan = mergeNum
      } else {
        mergeNum = 1
      }
    }
  }
  const slots = document.querySelectorAll('.slot');

  for (let slot of slots) {
    if (slot.rowSpan == 2) {
      console.log(slot.rowSpan)
      console.log(slot)
      let newSize = 0.75 * .9
      slot.style.fontSize = newSize + "rem"
      console.log(slot.style.fontSize)
    }
  }
}

// Adding Schedules

let timeFrom = document.querySelector('#timeFrom')
let timeTo = document.querySelector('#timeTo')
let timeToInput = document.querySelector('#timeToInput')



let FetchDataFromDataList = () => {
  let searchInputs = document.querySelectorAll('.search__Input')
  for (x of searchInputs) {
    x.addEventListener('change', FetchDatalistValue)
  }

  function FetchDatalistValue(e) {
    let input = e.target
    let name = input.className.split(' ')[0]
    let inputHidden = document.querySelector('.' + name + '--Hidden')
    let inputList = document.querySelector('.' + name + '--List')
    let options = inputList.options
    for (let i = 0; i < options.length; i++) {
      let option = options[i]
      let inputValue = input.value
      if (inputValue.trim() == '') {
        input.value = ''
        break
      } else if (inputValue == option.value) {
        inputHidden.value = option.dataset.value
        console.log(name + ': ' + option.dataset.value)
        break
      }
    }
  }
}

// Confirm that CheckBox have a value

let validateForm = () => {
  let searchInputs = document.querySelectorAll('.search__Input')
  let checkBoxCon = document.querySelectorAll('.form__DayContainer input')

  let errors = [
    days = {
      'msg': '*Choose a day',
      'con': document.querySelector('#errorDay'),
      'isError': false,
      'count': checkBoxCon.length
    },
    inputs = {
      'msg': '*Select at least 1',
      'con': document.querySelector('#errorInput'),
      'isError': false,
      'count': searchInputs.length
    }
  ]


  checkBoxCon.forEach(checkBox => {
    if (!checkBox.checked) {
      console.log(errors[0].count)
      errors[0].count -= 1
    }
  })

  // searchInputs.forEach(input => {
  //   value = input.value.trim()
  //   if (value == '' || value == null) {
  //     nullValues++
  //   }
  // })

  // if (nullValues > 0) {
  //   errors[1].isError = true
  // }

  let submitForm = true

  errors.forEach(error => {
    if (error.count <= 0) {
      error.isError = true
    }
    if (error.isError) {
      error.con.innerText = error.msg
      submitForm = false
    }
  })

  if (!submitForm) {
    console.log("Sumit Form:" + submitForm)
    return false
  }

}

//Toggle Information and Settings




let ToggleSchedNav = () => {
  let radioButtons = document.querySelectorAll(".schedules__Nav input")
  radioButtons.forEach(radio => {
    con = document.querySelector("#" + radio.id + "-con")
    if (radio.checked) {
      con.style.display = 'flex'
    } else {
      con.style.display = 'none'
    }
  })
}

// Print Button 

let PrintContent = () => {
  window.print()
}

// Conditions

let schedulesForm = document.querySelector('.module__Form')
if (schedulesForm != null) {
  FetchDataFromDataList()
}

// Actions 
TableFixLabel()







