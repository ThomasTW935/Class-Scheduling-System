// Selecting Time of Container
let timeStarts = document.querySelectorAll('.start-time')
let ChangeFormatTime = (e) => {
  let target = e.target
  let id = target.id
  let timeStart = ''
  let timeEnd = ''
  if (id == 'timeStart') {
    timeStart = document.querySelector('#timeStart')
    timeEnd = document.querySelector('#timeEnd')
  } else {
    timeStart = document.querySelector('#timeFrom')
    timeEnd = document.querySelector('#timeTo')
  }

  let startDate = new Date('January 1 2000 ' + timeStart.value)
  let startDate_Hour = startDate.getHours()
  let startDate_Time = startDate.getTime()
  let endValue = timeEnd.value
  let endDate = new Date('January 1 2000 ' + endValue)
  let endDate_Time = endDate.getTime()

  for (let k = timeEnd.options.length - 1; k >= 0; k--) {
    timeEnd.remove(k)
  }
  for (let i = startDate_Hour + 1; i <= 22; i++) {
    let timeValue = i
    let timePeriod = 'AM'
    if (timeValue > 12) {
      timeValue = i - 12
      timePeriod = 'PM'
    }
    if (timeValue == 12) {
      timePeriod = 'PM'
    }
    if (id == 'timeStart') {
      let option = document.createElement('option')
      let m = ":00"
      option.value = i + m
      option.innerHTML = timeValue + m + ` ${timePeriod}`
      timeEnd.add(option)
    } else {
      let timeJump = document.querySelector('#timeJump')
      let jumpValue = Number(timeJump.value)
      for (let k = 0; k < 60; k += jumpValue) {
        if (i == 22 && k > 0) break;
        let timeDiff = new Date('January 1 2000')
        timeDiff.setHours(i)
        timeDiff.setMinutes(k)
        let diff = timeDiff - startDate_Time
        let hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60))
        let minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60))
        if (hours < 1 || hours == 1 && minutes == 0) {
          continue
        }
        let convertMinutes = (minutes / 60) * 100
        convertMinutes = (convertMinutes == 50) ? 5 : convertMinutes
        let formatMinutes = (minutes > 0) ? `.${convertMinutes}` : ''
        let diffResult = `(${hours}${formatMinutes} hour/s)`
        let m = (k == 0) ? ":00" : `:${k}`;
        let option = document.createElement('option')
        option.value = i + m
        option.innerHTML = timeValue + m + ` ${timePeriod}` + diffResult
        timeEnd.add(option)
      }
    }
  }


  if (startDate_Time >= endDate_Time) {
    timeEnd.value = timeEnd.options[0].value
  }
  else {
    timeEnd.value = endValue
    if (timeEnd.value == '') {
      timeEnd.value = timeEnd.options[0].value
    }
    console.log(endValue)
  }
}

if (timeStarts != null) {
  timeStarts.forEach(timeStart => {
    timeStart.addEventListener('change', ChangeFormatTime)
  })
}



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

      let newSize = 0.75 * .85
      slot.style.fontSize = newSize + "rem"
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







