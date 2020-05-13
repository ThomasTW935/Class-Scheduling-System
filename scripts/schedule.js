// Selecting Time of Container

let timeStart = document.querySelector('#startTime')
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
    if (timeValue >= 12) {
      timeValue = i - 12
      timePeriod = 'PM'
    }
    optionValue = timeValue + ':00 ' + timePeriod
    option.innerHTML = optionValue
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

//Printing Time Table 

// timeEnd.addEventListener('change', () => {
//   console.log(timeStart.value)
//   console.log(timeEnd.value)
//   console.log(timeJump.value)
//   let endDate = new Date('January 1 2000 ' + timeEnd.value)
//   endDate_Minutes = endDate.getMinutes() + 120
//   endDate.setMinutes(endDate_Minutes)
//   console.log(endDate_Minutes)
//   console.log(endDate)
// })

// Adding Schedules

let timeFrom = document.querySelector('#timeFrom')
let timeTo = document.querySelector('#timeTo')
let timeToInput = document.querySelector('#timeToInput')

let inputs = ['Prof', 'Subj', 'Room', 'Sect']
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




