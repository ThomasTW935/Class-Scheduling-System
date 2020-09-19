// Selecting Time of Container
let timeStart = document.querySelector('#timeFrom')
let timeEnd = document.querySelector('#timeTo')
let ChangeFormatTime = (e) => {
  const target = e.target.id
  let startDate = new Date('January 1 2000 ' + timeStart.value)
  let endDate = new Date('January 1 2000 ' + timeEnd.value)

  // Fetch Selected Subject Hours

  let subj = document.querySelector('#subjectsList')
  let selSubj = subj[subj.selectedIndex].getAttribute('data-hours')
  let subjTime = selSubj.split('.')
  let hours = Number(subjTime[0])
  let minutes = (subjTime[1] == '5') ? 30 : 0
  let outputTime = ''
  if (target == 'timeFrom') {
    outputTime = FormatTime(startDate, hours, minutes)
    SetTimeOptionsValues(outputTime, timeEnd.options[timeEnd.options.length - 1].value, timeEnd, minutes, false)
    timeEnd.value = outputTime
  } else {
    outputTime = FormatTime(endDate, hours, minutes, false)
    timeStart.value = outputTime
  }

  // Change Time base on subject hours

}

if (timeStart) {
  timeStart.addEventListener('change', ChangeFormatTime)
  timeEnd.addEventListener('change', ChangeFormatTime)
}



//Fixing Schedules Labels

const table = document.querySelector('.schedules__Table table');
let TableFixLabel = () => {
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
if (table) {
  TableFixLabel()
}

// Adding Schedules

let timeFrom = document.querySelector('#timeFrom')
let timeTo = document.querySelector('#timeTo')
let timeToInput = document.querySelector('#timeToInput')



// let FetchDataFromDataList = () => {
//   let searchInputs = document.querySelectorAll('.search__Input')
//   for (x of searchInputs) {
//     x.addEventListener('change', FetchDatalistValue)
//   }

//   function FetchDatalistValue(e) {
//     let input = e.target
//     let name = input.className.split(' ')[0]
//     let inputHidden = document.querySelector('.' + name + '--Hidden')
//     let inputList = document.querySelector('.' + name + '--List')
//     let options = inputList.options
//     for (let i = 0; i < options.length; i++) {
//       let option = options[i]
//       let inputValue = input.value
//       if (inputValue.trim() == '') {
//         input.value = ''
//         break
//       } else if (inputValue == option.value) {
//         inputHidden.value = option.dataset.value
//         console.log(name + ': ' + option.dataset.value)
//         break
//       }
//     }
//   }
// }

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

// Print Button 

let PrintContent = () => {
  window.print()
}

// Conditions

// let schedulesForm = document.querySelector('.module__Form')
// if (schedulesForm != null) {
//   FetchDataFromDataList()
// }

// SChedules Form On Subject Change 

let onSubjectChange = () => {
  let subj = document.querySelector('#subjectsList')

  // Change Time base on subject hours
  let timeFrom = document.querySelector('#timeFrom')
  let timeFromDate = new Date('January 1 2000 ' + timeFrom.value)
  let selSubj = subj[subj.selectedIndex].getAttribute('data-hours')
  let subjTime = selSubj.split('.')
  let hours = Number(subjTime[0])
  let minutes = (subjTime[1] == '5') ? 30 : 0
  let outputDate = new Date('January 1 2000 ')
  outputDate.setHours(timeFromDate.getHours() + hours)
  outputDate.setMinutes(timeFromDate.getMinutes() + minutes)
  let formatMinutes = (outputDate.getMinutes() == 0) ? '00' : outputDate.getMinutes()
  let outputTime = outputDate.getHours() + ":" + formatMinutes
  let timeTo = document.querySelector('#timeTo')
  timeTo.value = outputTime

  // Change Time From and To in schedules form when subjects is changed

  let timeStartLastOption = new Date('January 1 2000 ' + timeStart.options[timeStart.options.length - 1].value)
  let timeStartFirstOption = new Date('January 1 2000 ' + timeStart.options[0].value)
  let timeToLastOption = new Date('January 1 2000 ' + timeTo.options[timeTo.options.length - 1].value)
  let timeDiff = timeToLastOption.getTime() - timeStartLastOption.getTime()

  let timeDiffHours = Math.floor((timeDiff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60))
  let timeDiffMinutes = Math.floor((timeDiff % (1000 * 60 * 60)) / (1000 * 60))

  let formatDiffTime = timeDiffHours + ':' + timeDiffMinutes
  let formatTime = `${hours}:${minutes}`

  if (formatDiffTime != formatTime) {
    let fromOutputTime = FormatTime(timeToLastOption, hours, minutes, false)
    SetTimeOptionsValues(timeStart.options[0].value, fromOutputTime, timeFrom, minutes)
    let toOutputTime = FormatTime(timeStartFirstOption, hours, minutes)
    SetTimeOptionsValues(toOutputTime, timeTo.options[timeTo.options.length - 1].value, timeTo, minutes, false)
  }


  // Change Section Options on schedules form

  let con = document.querySelector('#sectionsList')
  if (con) {
    let optVal = {
      value: 'sect_id',
      text: ['sect_name']
    }
    SetOptionValues(con, optVal, subj)
  }

  // Change Professors Options

  con = document.querySelector('#professorsList')
  if (con) {
    let optVal = {
      value: 'id',
      text: ['dept_name', 'full_name']
    }
    SetOptionValues(con, optVal, subj)
  }

  // Change Rooms Options

  con = document.querySelector('#roomsList')
  if (con) {
    let optVal = {
      value: 'rm_id',
      text: ['rm_name', 'rm_desc', 'rm_capacity']
    }
    SetOptionValues(con, optVal, subj)
  }
}
function FormatTime(target, hours, minutes, isAdd = true) {
  let outputDate = new Date('January 1 2000 ')
  if (isAdd) {
    outputDate.setHours(target.getHours() + hours)
    outputDate.setMinutes(target.getMinutes() + minutes)
  } else {
    outputDate.setHours(target.getHours() - hours)
    outputDate.setMinutes(target.getMinutes() - minutes)
  }
  let formatMinutes = (outputDate.getMinutes() == 0) ? '00' : outputDate.getMinutes()
  let outputTime = outputDate.getHours() + ":" + formatMinutes
  return outputTime
}

function SetTimeOptionsValues(startTime, endTime, con, checkMinutes = 0, isStart = true) {
  RemoveOptions(con)

  let start = new Date('January 1 2000 ' + startTime)
  let end = new Date('January 1 2000 ' + endTime)
  let timeFromDate = new Date('January 1 2000 ' + timeStart.value)
  timeFromDate.setHours(timeFromDate.getHours() + 1)
  let jumpValue = 30
  for (let i = start.getHours(); i < end.getHours() + 1; i++) {
    let timeValue = i
    let timePeriod = 'AM'
    if (timeValue > 12) {
      timeValue = i - 12
      timePeriod = 'PM'
    }
    if (timeValue == 12) {
      timePeriod = 'PM'
    }
    for (let k = 0; k < 60; k += jumpValue) {
      if (i == timeFromDate.getHours() && k == timeFromDate.getMinutes() && !isStart) {
        console.log(timeFromDate)
        continue
      }
      if ((i == end.getHours() && k > 0)) {
        if (isStart && checkMinutes == 0) {
          break;
        } else if (!isStart) break
      }
      let timeDiff = new Date('January 1 2000')
      timeDiff.setHours(i)
      timeDiff.setMinutes(k)
      let diff = timeDiff - start.getTime()
      let minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60))
      let convertMinutes = (minutes / 60) * 100
      convertMinutes = (convertMinutes == 50) ? 5 : convertMinutes
      let m = (k == 0) ? ":00" : `:${k}`;
      let option = document.createElement('option')
      option.value = i + m
      option.innerHTML = timeValue + m + ` ${timePeriod}`
      con.add(option)
    }
  }
}

function SetOptionValues(con, optVal, subjCon) {
  let name = subjCon.name
  let value = subjCon.value
  let query = `${name}=${value}&${con.name}`
  RemoveOptions(con)
  FetchData(query, con, optVal)
}

function FetchData(query, con, optVal) {
  let xhr = new XMLHttpRequest()
  xhr.onreadystatechange = function () {
    if (this.readyState === 4 && this.status) {
      let datas = JSON.parse(this.responseText)
      datas.forEach(data => {
        let option = document.createElement('option')
        option.value = data[optVal.value]
        for (let i = 0; i < optVal.text.length; i++) {
          option.innerHTML += data[optVal.text[i]]
          if (i != optVal.text.length - 1) option.innerHTML += ' | '
        }
        con.appendChild(option)
      })
    }
  }
  xhr.open("GET", 'includes/ajax.inc.php?' + query, true)
  xhr.send()
}

// Schedules Form Draggable 

const scheduleForm = document.querySelector('#scheduleForm')
if (scheduleForm) {
  const formBg = document.querySelector('.module__formBackground')
  scheduleForm.addEventListener('dragstart', dragStart)
  scheduleForm.addEventListener('dragend', dragEnd)
  function dragStart() {
    this.classList.toggle('hold')
    setTimeout(() => this.classList.toggle('invisible'), 0)
    formBg.classList.toggle('invisible')
  }
  function dragEnd() {
    this.className = 'module__Form'
    formBg.classList.toggle('invisible')
  }
}


