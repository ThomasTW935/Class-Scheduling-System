

// let MergeCells = (cellIndex) => {
//   const table = document.querySelector('.schedules__Table');
//   let headerCell = null;
//   for (let row of table.rows) {
//     // for (let index = 1; index < row.cells.length; index++) {
//     //   console.log(table.rows[index].innerText)
//     // }

//     let firstCell = row.cells[cellIndex]
//     if (headerCell === null || firstCell.innerText !== headerCell.innerText) {
//       headerCell = firstCell;
//     } else {
//       headerCell.rowSpan++
//       firstCell.remove()
//     }
//     console.log(firstCell)
//   }
// }

const table = document.querySelector('.schedules__Table');
let rows = table.rows
let colLength = rows[0].cells.length
let headerCell = null

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
    if (rowIndex == 6 && colIndex == 1) {
      console.log(cellTextNext == cellTextCurrent)
      console.log(rowCurrent)
      console.log(rowNext)
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