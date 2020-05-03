let timeStart = document.querySelector('#startTime')

console.log(timeStart)

timeStart.addEventListener('change', () => {
  console.log('changed')
})



// Adding Schedules

let timeFrom = document.querySelector('#timeFrom')
let timeTo = document.querySelector('#timeTo')
let timeToInput = document.querySelector('#timeToInput')

let inputs = ['Prof', 'Subj', 'Room', 'Sect']
console.log(inputs)
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
      console.log('Input is empty')
      input.value = ''
      break
    } else if (inputValue == option.value) {
      inputHidden.value = option.dataset.value
      console.log(name + ': ' + option.dataset.value)
      break
    }
  }
}




