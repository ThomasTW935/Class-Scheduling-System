let listItem = document.querySelectorAll(".schedules__Timeslot")

let subjectItem = listItem[0];
let roomItem = listItem[listItem.length - 1];
let profItem = listItem[listItem.length / 2];

console.log('Value: ' + subjectItem.innerHTML)
console.log('Value: ' + profItem.innerHTML)
console.log('Value: ' + roomItem.innerHTML)
