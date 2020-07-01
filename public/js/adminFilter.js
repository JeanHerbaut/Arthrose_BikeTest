const reset = document.getElementById("reset-filter")
const table = document.getElementById("list-user")
const searchBtn = document.getElementById("search-username")

const resetfilter = () => {
  document.getElementById('search').value = ""
  document.getElementById('person-select').value = ""
  document.getElementById('schedule-select').value = ""
  for (var i = 0, row; i<table.rows.length-1; i++) {
    let row = table.getElementsByClassName("filterable")[i]
    row.classList.remove("hide")
  }
}

//search username
const username = () => {
  let input = document.getElementById('search').value.toUpperCase()
  if (input.length > 0) {
    for (var i = 0, row; i<table.rows.length-1; i++) {
      let row = table.getElementsByClassName("filterable")[i]
      let user = row.getAttribute('data-username').toUpperCase();
      if (user != input) row.classList.add("hide")
      else row.classList.remove("hide")
    }
  }
}

//filter select role
const role = () => {
  let input = document.getElementById('person-select').value
  if (input.length > 0) {
    for (var i = 0, row; i<table.rows.length-1; i++) {
      let row = table.getElementsByClassName("filterable")[i]
      let role = row.getAttribute('data-role');
      if (role != input) { row.classList.toggle("hide") }
    }
  }
}

//filter schedule
const schedule = () => {
  let input = document.getElementById('search').value.toUpperCase()
  let schedule = document.getElementById('schedule-select').value
  if (input.length > 0 && schedule.length > 0) {
    for (var i = 0, row; i<table.rows.length-1; i++) {
      let row = table.getElementsByClassName("filterable")[i]
      let username = row.getAttribute('data-username').toUpperCase();
      let billet = row.getAttribute('data-schedule-id')
      if (username != input || billet != schedule) {
        row.classList.add("hide")
      }
    }
  } else if (input.length === 0 && schedule.length > 0) {
    for (var i = 0, row; i<table.rows.length-1; i++) {
      let row = table.getElementsByClassName("filterable")[i]
      let billet = row.getAttribute('data-schedule-id')
      if (billet != schedule) {
        row.classList.add("hide")
      }
    }
  }
}
//set filter
searchBtn.addEventListener("click", evt => {

  for (var i = 0, row; i<table.rows.length-1; i++) {
    let row = table.getElementsByClassName("filterable")[i] 
    row.classList.remove("hide");
  }
  username()
  role()
  schedule()
})

//reset filters
reset.addEventListener("click", evt => {
  resetfilter()
})