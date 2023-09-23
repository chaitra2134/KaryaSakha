<?php
session_start();
if (!isset($_SESSION['un'])) {
  header("Location: Login/Frontend/LogIn.html");
  exit();
}
?>

<!DOCTYPE html>
<!-- Coding by CodingNepal || www.codingnepalweb.com -->
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- Boxicons CSS -->
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Work+Sans" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto+Mono:wght@700&display=swap" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto+Mono:wght@500&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <title>Side Navigation Bar in HTML CSS JavaScript</title>
  <link rel="stylesheet" href="NavStyle.css" />
  <!-- <link id="timerCss" rel="stylesheet" href="Timer/timer.css" />
  <link id="dashboardCss" rel="stylesheet" href="Dashboard/DashStyle.css">  -->
  <script>
 
  </script>
</head>
  <body>
  <!-- navbar -->
  <nav class="navbar">
    <div class="logo_item">
      <i class="bx bx-menu" id="sidebarOpen"></i>
      <!-- <img src="Assets/logo-karyasakha.png" alt=""></i>KaryaSakha -->
    </div>

    <div class="search_bar">
      <input type="text" placeholder="Search" />
    </div>

    <div class="navbar_content">
      <i class="bi bi-grid"></i>
      <i class='bx bx-sun' id="darkLight"></i>
      <!-- <img src="Assets/x_pic_black self.jpeg" alt="" class="profile" /> -->
    </div>
  </nav>

  <!-- sidebar -->
  <nav class="sidebar">
    <div class="menu_content">
      <ul class="menu_items">

        <li class="item">
          <a href="#" data-content="dashboard" class="nav-item" style="text-decoration: none;">
            <div class="nav_link submenu_item">
              <span class="navlink_icon">
                <i class="bx bx-home-alt"></i>
              </span>
              <span class="navlink">DashBoard</span>

            </div>
          </a>


        </li>
        <!-- end -->

        <li class="item">
          <a href="#" id="timer-link" data-content="timer" class="nav-item" style="text-decoration: none;">
            <div class="nav_link submenu_item">
              <span class="navlink_icon">
                <i class="bx bx-checkbox-checked"></i>
              </span>
              <span id="navlink" class="navlink">Timer</span>

            </div>
          </a>
        </li>


        <li class="item">
          <a href="#" data-content="todo" class="nav-item" style="text-decoration: none;">

            <div class="nav_link submenu_item">
              <span class="navlink_icon">
                <i class="bx bx-checkbox-checked"></i>
              </span>
              <span class="navlink">To-Do</span>

            </div>

          </a>


        </li>



        <li class="item">
          <a href="#" data-content="notes" class="nav-item" style="text-decoration: none;">
            <div class="nav_link submenu_item">
              <span class="navlink_icon">
                <i class="bx bx-file"></i>
              </span>
              <span class="navlink">Notes</span>

            </div>
          </a>
        </li>




        <li class="item">
          <a href="#" data-content="calendar" class="nav-item" style="text-decoration: none;">
            <div class="nav_link submenu_item">
              <span class="navlink_icon">
                <i class="bx bx-calendar"></i>
              </span>
              <span class="navlink">Calendar</span>

            </div>
          </a>
        </li>

        <!-- start -->
        <li class="item">
          <a href="#" data-content="tasks" class="nav-item" style="text-decoration: none;">
            <div class="nav_link submenu_item">
              <span class="navlink_icon">
                <i class="bx bx-task"></i>
              </span>
              <span class="navlink">Tasks</span>

            </div>
          </a>
        </li>



        <li class="item">
          <a href="#" data-content="blogs" class="nav-item" style="text-decoration: none;">
            <div class="nav_link submenu_item">
              <span class="navlink_icon">
                <i class="bx bx-calendar"></i>
              </span>
              <span class="navlink">Blogs</span>

            </div>
          </a>


        </li>
        <!-- end -->
      </ul>


      <!-- Sidebar Open / Close -->
      <div class="bottom_content">
        <div class="bottom expand_sidebar">
          <span> Expand</span>
          <i class='bx bx-log-in'></i>
        </div>
        <div class="bottom collapse_sidebar">
          <a id="log-out-2" href="Logout/LogOut.php">
            <span class="navlink">Logout</span>
          </a>
          <i class='bx bx-log-out'></i>
        </div>
      </div>
    </div>
  </nav>


  <div class="dashboard-container" id="dashboard-container">
    <div class="Dash-wrap">
      <div class="right">
        <div class="right-top">
          <div class="welcome">
            
            <h4>Good Morning <?php echo $_SESSION['un'];?>, Welcome to KaryaSakha</h4>
            
          </div>
          <div class="toggle">
            <div class="toggle-title">20-20</div>
            <div class="toggle-cont">
              <label class="switch">
                <input type="checkbox" id="toggleButton">
                <span class="slider round"></span>
              </label>
            </div>
          </div>
        </div>
        <div class="right-bottom">
          <div class="weather">
            <div class="calen">
              <p id="greet">Morning</p>
              <p id="date"> wed ,15 June</p>
            </div>
            <div class="weather-detail">
              <div class="wleft">
                <div id="weather-icon" class="weather-icon"></div>
              </div>
              <div class="wright">
                <p id="temperature"></p>
                <p id="location"></p>
              </div>
            </div>

          </div>
          <div class="promodoro">
            <div class="livetimer">
              <p id="currentTime">00:00:00</p>
            </div>
            <div class="promo-btn">
              <button id="pomodoro" onclick="startPomodoro()">Pomodoro</button>
              <button id="liveClock" onclick="startLiveClock()">Live Clock</button>
            </div>
          </div>

          <div class="to-do" id="to-do-section">
            <h5>Urgent and Important</h5>
            <ul class="tasks" id="dashboard-todo-section"></ul>
            <div class="todo-btn-container">
              <button class="todo-button" onclick="openTodo();">See more</button>
            </div>

          </div>
          <div class="Music">
            <div class="wrapper">
              <div class="top-bar">
                <i class="material-icons">expand_more</i>
                <span>Now Playing</span>
                <i class="material-icons">more_horiz</i>
              </div>
              <div class="img-area">
                <img src="" alt="">
              </div>

              <div class="song-details">

                <p class="name"></p>
                <p class="artist"></p>
              </div>
              <div class="progress-area">
                <div class="progress-bar">
                  <audio id="main-audio" src=""></audio>
                </div>
                <div class="song-timer">
                  <span class="current-time">0:00</span>
                  <span class="max-duration">0:00</span>
                </div>
              </div>
              <div class="controls">
                <i id="repeat-plist" class="material-icons" title="Playlist looped">repeat</i>
                <i id="prev" class="material-icons">skip_previous</i>
                <div class="play-pause">
                  <i class="material-icons play">play_arrow</i>
                </div>
                <i id="next" class="material-icons">skip_next</i>
                <i id="more-music" class="material-icons">queue_music</i>
              </div>
              <div class="music-list">
                <div class="header">
                  <div class="row">
                    <i class="list material-icons">queue_music</i>
                    <span>Music list</span>
                  </div>
                  <i id="close" class="material-icons">close</i>
                </div>
                <ul>
                  <!--  li list from js -->
                </ul>
              </div>

            </div>
          </div>
        </div>
      </div>

      <div class="notification" id="notification"></div>
      <div class="left">
        <div class="bookmark">
          <div class="listinputbox">
            <input type="text" id="link" placeholder="Link" autocomplete="off">
          </div>
          <div class="book-btn">
            <button id="addlink" onclick="fetchLink()">Create Bookmark</button>
          </div>
        </div>
        <div class="bookmark-card"></div>
      </div>

    </div>
  </div>
  <div class="dynamic-content-container" id="dynamic-content-container">

  </div>
  <div class="tcontainer" id="timer-container">
    <div class="main-div">
      <nav class="feature-nav">
        <div class="feature-link active" id="pomodoro">Pomodoro</div>
        <div class="feature-link" id="alarm">Alarm</div>
        <div class="feature-link" id="stopwatch">Stopwatch</div>
      </nav>
      <div class="feature-container" id="feature-pomodoro">
        <div class="container">

          <div class="toggle-button-container" id="sessionlength-container">
            <header>Session Length</header>
            <time id="session-length"></time>
            <div class="toggle-button-container__sub-container"></div>
            <button class="toggle-timer" type="button" id="decrease-session">
              -
              <button class="toggle-timer" type="button" id="increase-session">
                +
              </button>
            </button>
          </div>
          <div class="toggle-button-container" id="breaklength-container">
            <header>Break Length</header>
            <time id="break-length"></time>
            <div class="toggle-button-container__sub-container">
              <button class="toggle-timer" type="button" id="decrease-break">
                -
              </button>
              <button class="toggle-timer" type="button" id="increase-break">
                +
              </button>
            </div>
          </div>
          <div id="countdown-container">
            <header id="type">work session</header>
            <time id="countdown"></time>
          </div>
          <div id="button-container">
            <button type="button" id="start-session">Start</button>
            <button type="button" id="stop-session">Stop</button>
            <button type="button" id="reset-session">Reset</button>
          </div>

        </div>
        <!-- partial -->
        <script>
          var pomodoro = {
            init: function() {
              this.domVariables();
              this.timerVariables();
              this.bindEvents();
              this.updateAllDisplays();
              this.requestNotification();
            },
            // Define notifications to be used by Pomodoro
            breakNotification: undefined,
            workNotification: undefined,
            domVariables: function() {
              // Toggle timer buttons
              this.toggleTimerBtns =
                document.getElementsByClassName("toggle-timer");
              this.increaseSession = document.getElementById("increase-session");
              this.decreaseSession = document.getElementById("decrease-session");
              this.increaseBreak = document.getElementById("increase-break");
              this.decreaseBreak = document.getElementById("decrease-break");

              // Timer display
              this.sessionLengthDisplay =
                document.getElementById("session-length");
              this.breakLengthDisplay = document.getElementById("break-length");

              // Countdown
              this.countdownDisplay = document.getElementById("countdown");
              this.typeDisplay = document.getElementById("type");
              this.resetCountdownBtn = document.getElementById("reset-session");
              this.stopCountdownBtn = document.getElementById("stop-session");
              this.startCountdownBtn = document.getElementById("start-session");
              this.countdownContainer = document.getElementById(
                "countdown-container"
              );
            },
            timerVariables: function() {
              // Initial Length values
              this.sessionLength = 20;
              this.breakLength = 5;

              // Define the variable that includes the setinterval method
              // If the clock is counting down, the value will be true, and
              // the counter will be stopped on click.
              this.timeinterval = false;
              this.workSession = true;
              this.pausedTime = 0;
              this.timePaused = false;
              this.timeStopped = false;
              // Request permission
            },
            bindEvents: function() {
              // Bind increase/ decrease session length to buttons
              this.increaseSession.onclick = pomodoro.incrSession;
              this.decreaseSession.onclick = pomodoro.decrSession;
              this.increaseBreak.onclick = pomodoro.incrBreak;
              this.decreaseBreak.onclick = pomodoro.decrBreak;

              // Bind start date to #countdown and countdown buttons
              this.countdownDisplay.onclick = pomodoro.startCountdown;
              this.resetCountdownBtn.onclick = pomodoro.resetCountdown;
              this.stopCountdownBtn.onclick = pomodoro.stopCountdown;
              this.startCountdownBtn.onclick = pomodoro.startCountdown;
            },
            updateAllDisplays: function() {
              // Change HTML of displays to reflect current values
              pomodoro.sessionLengthDisplay.innerHTML = this.sessionLength;
              pomodoro.breakLengthDisplay.innerHTML = this.breakLength;
              pomodoro.countdownDisplay.innerHTML = this.sessionLength + ":00";

              pomodoro.resetVariables();
            },
            requestNotification: function() {
              if (!("Notification" in window)) {
                return console.log(
                  "This browser does not support desktop notification"
                );
              }
            },
            incrSession: function() {
              if (pomodoro.sessionLength < 59) {
                pomodoro.sessionLength += 1;
                pomodoro.updateAllDisplays();
              }
            },
            decrSession: function() {
              if (pomodoro.sessionLength > 1) {
                pomodoro.sessionLength -= 1;
                pomodoro.updateAllDisplays();
              }
            },
            incrBreak: function() {
              if (pomodoro.breakLength < 30) {
                pomodoro.breakLength += 1;
                pomodoro.updateAllDisplays();
              }
            },
            decrBreak: function() {
              if (pomodoro.breakLength > 1) {
                pomodoro.breakLength -= 1;
                pomodoro.updateAllDisplays();
              }
            },
            // Reset variables to initial values
            resetVariables: function() {
              pomodoro.timeinterval = false;
              pomodoro.workSession = true;
              pomodoro.pausedTime = 0;
              pomodoro.timeStopped = false;
              pomodoro.timePaused = false;
            },
            startCountdown: function() {
              pomodoro.disableButtons();
              // Toggle typeDisplay and background color between work and break
              pomodoro.displayType();

              // Pause pomodoro if countdown is currently running, otherwise start
              // countdown
              if (pomodoro.timeinterval !== false) {
                pomodoro.pauseCountdown();
              } else {
                // Set start and end time with system time and convert to
                // miliseconds to correctly meassure time ellapsed
                pomodoro.startTime = new Date().getTime();

                // Check if pomodoro has just been unpaused
                if (pomodoro.timePaused === false) {
                  pomodoro.unPauseCountdown();
                } else {
                  pomodoro.endTime = pomodoro.startTime + pomodoro.pausedTime;
                  pomodoro.timePaused = false;
                }

                // Run updateCountdown every 990ms to avoid lag with 1000ms,
                // Update countdown checks time against system time and updates
                // #countdown display
                pomodoro.timeinterval = setInterval(
                  pomodoro.updateCountdown,
                  990
                );
              }
            },
            updateCountdown: function() {
              // Get differnce between the current time and the
              // end time in miliseconds. difference = remaining time
              var currTime = new Date().getTime();
              var difference = pomodoro.endTime - currTime;

              // Convert remaining milliseconds into minutes and seconds
              var seconds = Math.floor((difference / 1000) % 60);
              var minutes = Math.floor((difference / 1000 / 60) % 60);

              // Add 0 to seconds if less than ten
              if (seconds < 10) {
                seconds = "0" + seconds;
              }

              // Display remaining minutes and seconds, unless there is less than 1 second
              // left on timer. Then change to next session.
              if (difference > 1000) {
                pomodoro.countdownDisplay.innerHTML = minutes + ":" + seconds;
              } else {
                pomodoro.changeSessions();
              }
            },
            changeSessions: function() {
              // Stop countdown
              clearInterval(pomodoro.timeinterval);

              pomodoro.playSound();

              // Toggle between workSession being active or not
              // This determines if break session or work session is displayed
              if (pomodoro.workSession === true) {
                pomodoro.workSession = false;
              } else {
                pomodoro.workSession = true;
              }

              // Stop countdown
              pomodoro.timeinterval = false;
              // Restart, with workSession changed
              pomodoro.startCountdown();
            },
            pauseCountdown: function() {
              // Save paused time to restart clock at correct time
              var currTime = new Date().getTime();
              pomodoro.pausedTime = pomodoro.endTime - currTime;
              pomodoro.timePaused = true;

              // Stop the countdown on second click
              clearInterval(pomodoro.timeinterval);

              // Reset variable so that counter will start again on click
              pomodoro.timeinterval = false;
            },
            unPauseCountdown: function() {
              if (pomodoro.workSession === true) {
                pomodoro.endTime =
                  pomodoro.startTime + pomodoro.sessionLength * 60000;
              } else {
                pomodoro.endTime =
                  pomodoro.startTime + pomodoro.breakLength * 60000;
              }
            },
            resetCountdown: function() {
              // Stop clock and reset variables
              clearInterval(pomodoro.timeinterval);
              pomodoro.resetVariables();

              // Restart variables
              pomodoro.startCountdown();
            },
            stopCountdown: function() {
              // Stop timer
              clearInterval(pomodoro.timeinterval);

              // Change HTML
              pomodoro.updateAllDisplays();

              // Reset Variables
              pomodoro.resetVariables();

              pomodoro.unDisableButtons();
            },
            displayType: function() {
              // Check what session is running and change appearance and text above
              // countdown depending on session (break or work)
              if (pomodoro.workSession === true) {
                pomodoro.typeDisplay.innerHTML = "work session";
                pomodoro.countdownContainer.className =
                  pomodoro.countdownContainer.className.replace("break", "");
              } else {
                pomodoro.typeDisplay.innerHTML = "Break";
                if (pomodoro.countdownContainer.className !== "break") {
                  pomodoro.countdownContainer.className += "break";
                }
              }
            },
            playSound: function() {
              var mp3 = "Timer/alarm.mp3";
              var audio = new Audio(mp3);
              audio.play();
            },
            disableButtons: function() {
              for (var i = 0; i < pomodoro.toggleTimerBtns.length; i++) {
                pomodoro.toggleTimerBtns[i].setAttribute("disabled", "disabled");
                pomodoro.toggleTimerBtns[i].setAttribute(
                  "title",
                  "Stop the countdown to change timer length"
                );
              }
            },
            unDisableButtons: function() {
              for (var i = 0; i < pomodoro.toggleTimerBtns.length; i++) {
                pomodoro.toggleTimerBtns[i].removeAttribute("disabled");
                pomodoro.toggleTimerBtns[i].removeAttribute("title");
              }
            },
          };

        // Initialise on page load
         pomodoro.init();
        </script>
      </div>
      <div class="container-alarm">
        <div class="feature-container" id="feature-alarm">
          <div class="wrapper">
            <div class="timer-display">00:00:00</div>
            <div class="container">
              <div class="inputs">
                <input type="number" id="hourInput" placeholder="00" min="0" max="23" />
                <input type="number" id="minuteInput" placeholder="00" min="0" max="59" />
              </div>
              <button id="set-alarm">Add alarm</button>
              <div class="activeAlarms"></div>
            </div>
          </div>
        </div>
      </div>
      <script>
        
//Initial References
let timerRef = document.querySelector(".timer-display");
const hourInput = document.getElementById("hourInput");
const minuteInput = document.getElementById("minuteInput");
const activeAlarms = document.querySelector(".activeAlarms");
const setAlarm = document.getElementById("set-alarm");
let alarmsArray = [];
let alarmSound = new Audio("Timer/alarm.mp3");

let initialHour = 0,
  initialMinute = 0,
  alarmIndex = 0;

//Append zeroes for single digit
const appendZero = (value) => (value < 10 ? "0" + value : value);

//Search for value in object
const searchObject = (parameter, value) => {
  let alarmObject,
    objIndex,
    exists = false;
  alarmsArray.forEach((alarm, index) => {
    if (alarm[parameter] == value) {
      exists = true;
      alarmObject = alarm;
      objIndex = index;
      return false;
    }
  });
  return [exists, alarmObject, objIndex];
};

//Display Time
function displayTimer() {
  let date = new Date();
  let [hours, minutes, seconds] = [
    appendZero(date.getHours()),
    appendZero(date.getMinutes()),
    appendZero(date.getSeconds()),
  ];

  //Display time
  timerRef.innerHTML = `${hours}:${minutes}:${seconds}`;

  //Alarm
  alarmsArray.forEach((alarm, index) => {
    if (alarm.isActive) {
      if (`${alarm.alarmHour}:${alarm.alarmMinute}` === `${hours}:${minutes}`) {
        alarmSound.play();
        alarmSound.loop = true;
      }
    }
  });
}

const inputCheck = (inputValue) => {
  inputValue = parseInt(inputValue);
  if (inputValue < 10) {
    inputValue = appendZero(inputValue);
  }
  return inputValue;
};

hourInput.addEventListener("input", () => {
  hourInput.value = inputCheck(hourInput.value);
});

minuteInput.addEventListener("input", () => {
  minuteInput.value = inputCheck(minuteInput.value);
});

//Create alarm div

const createAlarm = (alarmObj, isActive) => {
  console.log("Create alarm started");
  //Keys from object
  const { id, alarmHour, alarmMinute } = alarmObj;
  //Alarm div
  let alarmDiv = document.createElement("div");
  alarmDiv.classList.add("alarm");
  alarmDiv.setAttribute("data-id", id);
  alarmDiv.innerHTML = `<span>${alarmHour}: ${alarmMinute}</span>`;

  //checkbox
  console.log("Check box started");
  let checkbox = document.createElement("input");
  checkbox.setAttribute("type", "checkbox");
  if(isActive == 'true')
  {
  checkbox.checked = true; 
  }
  else
  {
    checkbox.checked = false;
  }
    // Set the initial checkbox state based on isActive
  checkbox.addEventListener("click", (e) => {
  
    if (e.target.checked) {
      isActive = 'true';
      startAlarm(e);
    } else {
      isActive = 'false';
      stopAlarm(e);
    }
    
    const formData = new FormData();
    formData.append('alarmHour', alarmObj.alarmHour);
    formData.append('alarmMinute', alarmObj.alarmMinute);
    formData.append('isActive', isActive);
    // alert(alarmObj.alarmHour + alarmObj.alarmMinute);
    
    

    fetch('Timer/changeactivestatus.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => console.log(data))
    .catch(error => console.error('Error:', error));
  
      
   
});
alarmDiv.appendChild(checkbox);

console.log("Delete started");
  
  //Delete button
  let deleteButton = document.createElement("button");
  deleteButton.innerHTML = `<i class="fa-solid fa-trash-can"></i>`;
  deleteButton.classList.add("deleteButton");
  deleteButton.addEventListener("click", (e) => 
  {

    deleteAlarm(e);
   
    const formData = new FormData();
    formData.append('alarmHour', alarmObj.alarmHour);
    formData.append('alarmMinute', alarmObj.alarmMinute);
    // alert(alarmObj.alarmHour + alarmObj.alarmMinute);
    
    

    fetch('Timer/deletealarm.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => console.log(data))
    .catch(error => console.error('Error:', error));
  });
  alarmDiv.appendChild(deleteButton);
  activeAlarms.appendChild(alarmDiv);
 

};

//Set Alarm
setAlarm.addEventListener("click", () => {
  alarmIndex += 1;

  //alarmObject
  let alarmObj = {};
  alarmObj.id = `${alarmIndex}_${hourInput.value}_${minuteInput.value}`;
  alarmObj.alarmHour = hourInput.value;
  alarmObj.alarmMinute = minuteInput.value;
  alarmObj.isActive = true;
  var isActive = alarmObj.isActive ? 'true': 'false';
  console.log(alarmObj);
  alarmsArray.push(alarmObj);
  createAlarm(alarmObj, isActive);
  hourInput.value = appendZero(initialHour);
      minuteInput.value = appendZero(initialMinute);
  
  
  const formData = new FormData();
      formData.append('alarmHour', alarmObj.alarmHour);
      formData.append('alarmMinute', alarmObj.alarmMinute);
      formData.append('isActive', isActive);

      fetch('Timer/store_alarms.php', {
          method: 'POST',
          body: formData
      })
      .then(response => response.text())
      .then(data => console.log(data))
      .catch(error => console.error('Error:', error));
  
  
});


//Start Alarm
const startAlarm = (e) => {
  let searchId = e.target.parentElement.getAttribute("data-id");
  let [exists, obj, index] = searchObject("id", searchId);
  if (exists) {
    alarmsArray[index].isActive = true;
   
  }
};

//Stop alarm
const stopAlarm = (e) => {
  let searchId = e.target.parentElement.getAttribute("data-id");
  let [exists, obj, index] = searchObject("id", searchId);
  if (exists) {
    alarmsArray[index].isActive = false;
    alarmSound.pause();
  }
};

//delete alarm
const deleteAlarm = (e) => {
  let searchId = e.target.parentElement.parentElement.getAttribute("data-id");
  let [exists, obj, index] = searchObject("id", searchId);
  if (exists) {
    e.target.parentElement.parentElement.remove();
    alarmsArray.splice(index, 1);
  }
};

//Function to create alarm elements
const createAlarmsFromData = (alarmData) => {
  alarmData.forEach((alarm) => {
    createAlarm({
      id: `${alarm.alarmHour}_${alarm.alarmMinute}`,
      alarmHour: alarm.alarmHour,
      alarmMinute: alarm.alarmMinute,
      isActive: alarm.isActive,
    }, alarm.isActive);
  });
};

//Load alarms when the page loads
window.onload = () => {
  setInterval(displayTimer);
  initialHour = 0;
  initialMinute = 0;
  alarmIndex = 0;
  alarmsArray = [];
  hourInput.value = appendZero(initialHour);
  minuteInput.value = appendZero(initialMinute);

  // Fetch alarms from the server
  fetch('Timer/getalarms.php', {
    method: 'GET',
    credentials: 'include', // Include session cookies
  })
    .then(response => {
      if (response.ok) {
        return response.json();
      } else {
        // Handle errors or unauthorized access here
        console.error('Error fetching alarms:', response.statusText);
        return [];
      }
    })
    .then(data => {
      // Create alarm elements from the fetched data
      createAlarmsFromData(data);
    })
    .catch(error => console.error('Error:', error));
};
       </script>

     <div class="feature-container" id="feature-stopwatch">
        <div class="container1">
         <div class="timer-display-stopwatch">00:00:00</div>
         <div class="buttons-stopwatch">
            <button id="pause-timer-stopwatch">Pause</button>
            <button id="start-timer-stopwatch">Start</button>
           <button id="reset-timer-stopwatch">Reset</button>
         </div>
       </div>
     </div>

       <script>
        let [seconds, minutes, hours] = [0, 0, 0];
        let timerRef1 = document.querySelector(".timer-display-stopwatch");
        let int1 = null;

        function updateTimer() {
          // Update stopwatch timer
          seconds = (seconds + 1) % 60;
          minutes = seconds === 0 ? (minutes + 1) % 60 : minutes;
          hours = minutes === 0 && seconds === 0 ? hours + 1 : hours;

          let h = String(hours).padStart(2, "0");
          let m = String(minutes).padStart(2, "0");
          let s = String(seconds).padStart(2, "0");

          timerRef1.innerHTML = `${h}:${m}:${s}`;
        }

        document
          .getElementById("start-timer-stopwatch")
          .addEventListener("click", () => {
            if (int1 !== null) {
              clearInterval(int1);
            }
            int1 = setInterval(updateTimer, 1000);
          });

        document
          .getElementById("pause-timer-stopwatch")
          .addEventListener("click", () => {
            clearInterval(int1);
          });

        document
          .getElementById("reset-timer-stopwatch")
          .addEventListener("click", () => {
            clearInterval(int1);
            [seconds, minutes, hours] = [0, 0, 0];
            timerRef1.innerHTML = "00:00:00";
          });
      </script>

      <script>
        const featureLinks = document.querySelectorAll(".feature-link");
        const featureContainers = document.querySelectorAll(".feature-container");

        featureLinks.forEach((link) => {
          link.addEventListener("click", () => {
            const selectedFeature = link.id.replace("feature-", "");
            featureContainers.forEach((container) => {
              if (container.id === `feature-${selectedFeature}`) {
                container.style.display = "block";
              } else {
                container.style.display = "none";
              }
            });
            featureLinks.forEach((featureLink) => {
              if (featureLink.id === selectedFeature) {
                featureLink.classList.add("active");
              } else {
                featureLink.classList.remove("active");
              }
            });
          });
        });
      </script>
      <!-- <script src="selectbar.js"></script> -->
    </div>
  </div>
  <script src="Dashboard/MusicList.js"></script>
  <script src="Dashboard/MusicScript.js"></script>
  <script src="Dashboard/Dashboard.js"></script>
  <script src="NavBarMain.js"></script>

  </body>
  <!-- JavaScript -->


</html>