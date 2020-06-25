const reset = document.getElementById("reset-filter")
const table = document.getElementById("list-user")
const searchBtn = document.getElementById("search-username")

const resetfilter = () => {
  for (var i = 0, row; row = table.rows[i]; i++) {
    let row = table.getElementsByTagName("tr")[i]
    row.classList.remove("toggle")
  }
}

const setBlankClass = () => {
  for (var i = 0, row; row = table.rows[i]; i++) {
    let row = table.getElementsByTagName("tr")[i]
    row.classList.toggle("row")
  }
}
//search username
const username = () => {
  let input = document.getElementById('search').value.toUpperCase()
  if (input.length > 0) {
    for (var i = 0, row; row = table.rows[i]; i++) {
      let row = table.getElementsByTagName("tr")[i]
      let user = row.getAttribute('data-username').toUpperCase();
      if (user != input) { row.classList.toggle("toggle") }
    }
  }
}

//filter select role
const role = () => {
  let input = document.getElementById('person-select').value
  if (input.length > 0) {
    for (var i = 0, row; row = table.rows[i]; i++) {
      let row = table.getElementsByTagName("tr")[i]
      let role = row.getAttribute('data-role');
      if (role != input) { row.classList.toggle("toggle") }
    }
  }
}

//filter schedule
const schedule = () => {
  let input = document.getElementById('search').value.toUpperCase()
  let schedule = document.getElementById('schedule-select').value
  if (input.length > 0 && schedule.length > 0) {
    for (var i = 0, row; row = table.rows[i]; i++) {
      let row = table.getElementsByTagName("tr")[i]
      let username = row.getAttribute('data-username').toUpperCase();
      let billet = row.getAttribute('data-schedule-id')
      if (username != input || billet != schedule) {
        row.classList.add("toggle")
      }
    }
  } else if (input.length === 0 && schedule.length > 0) {
        for (var i = 0, row; row = table.rows[i]; i++) {
          let row = table.getElementsByTagName("tr")[i]
          let billet = row.getAttribute('data-schedule-id')
          if (billet != schedule) {
            row.classList.add("toggle")
          }
        }
  }
}
  //set filter
  searchBtn.addEventListener("click", evt => {
    username()
    role()
    schedule()
  })

  //reset filters
  reset.addEventListener("click", evt => {
    resetfilter()
  })