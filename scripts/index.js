

// Select Changed Value

let selects = document.querySelectorAll('.liveSelect')

let selectChangeValue = (e) => {


  let target = e.target
  let name = target.name

  if (name == 'selectLevel') {
    ChangeSelectDept()
  } else if (name == 'selectDept') {
    ChangeSelectSection()
  } else {
    ChangeDisplayedSchedule()
  }
}

function ChangeSelectDept() {
  target = document.querySelector('#selectLevel')
  name = target.name
  value = target.value
  con = document.querySelector('#selectDept')
  optVal = {
    value: 'dept_id',
    inner: 'dept_desc'
  }
  query = `${name}=${value}`
  console.log(query)

  RemoveOptions(con)

  searchData(query, con, optVal)
}

function ChangeSelectSection(id) {
  target = document.querySelector('#selectDept')
  name = target.name
  value = target.value ?? id
  con = document.querySelector('#selectSection')
  query = `${name}=${value}`
  console.log("Dept Query: " + query)
  optVal = {
    value: 'sect_id',
    inner: 'sect_name'
  }

  RemoveOptions(con)

  searchData(query, con, optVal)
}

function ChangeDisplayedSchedule(id) {
  target = document.querySelector('#selectSection')
  name = target.name
  value = target.value ?? id
  con = document.querySelector('.module__Content')
  query = `${name}=${value}`
  console.log(query)
  searchData(query, con)
}

function searchData(query, con, optVal = '') {
  let xhr = new XMLHttpRequest()
  xhr.onreadystatechange = function () {
    if (this.readyState === 4 && this.status) {
      if (optVal) {
        //console.log(this)
        let datas = JSON.parse(this.responseText)
        datas.forEach(data => {
          let option = document.createElement('option')
          option.value = data[optVal.value]
          option.innerHTML = data[optVal.inner]
          con.appendChild(option)
        })
        if (optVal.value == 'dept_id') {
          ChangeSelectSection(datas[0]['dept_id'])
        }
        if (optVal.value == 'sect_id') {
          ChangeDisplayedSchedule(datas[0]['sect_id'])
        }

      } else {
        con.innerHTML = this.responseText
        TableFixLabel()
      }
    }
  }
  xhr.open("GET", 'includes/ajax.inc.php?' + query, true)
  xhr.send()
}

let RemoveOptions = (sel) => {
  let len = sel.options.length
  for (let i = len - 1; i >= 0; i--) {
    sel.removeChild(sel.options[i])
  }
}


selects.forEach(select => {
  select.addEventListener('change', selectChangeValue)
})


// Toggle Modal Form

function ToggleModalForm() {
  let form = document.querySelector('.module__Form')
  let formBg = document.querySelector('.form__Background')

  let display = form.style.display
  let displayBg = formBg.style.display

  if (form.style.display == 'none') {
    form.style.display = 'flex'
    formBg.style.display = 'block'
  } else {
    form.style.display = 'none'
    formBg.style.display = 'none'
  }

}

let TableFixLabel = () => {
  console.log("Triggered")
  const table = document.querySelector('.module__Content table');
  let rows = table.rows
  console.log(rows)
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
}

ChangeDisplayedSchedule()
