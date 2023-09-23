// created By Omm
// last-update: 21-09-23



const body = document.querySelector("body");
const darkLight = document.querySelector("#darkLight");
const sidebar = document.querySelector(".sidebar");
const submenuItems = document.querySelectorAll(".submenu_item");
const sidebarOpen = document.querySelector("#sidebarOpen");
const sidebarClose = document.querySelector(".collapse_sidebar");
const sidebarExpand = document.querySelector(".expand_sidebar");
sidebarOpen.addEventListener("click", () => sidebar.classList.toggle("close"));

sidebarClose.addEventListener("click", () => {
  sidebar.classList.add("close", "hoverable");
});
sidebarExpand.addEventListener("click", () => {
  sidebar.classList.remove("close", "hoverable");
});

sidebar.addEventListener("mouseenter", () => {
  if (sidebar.classList.contains("hoverable")) {
    sidebar.classList.remove("close");
  }
});
sidebar.addEventListener("mouseleave", () => {
  if (sidebar.classList.contains("hoverable")) {
    sidebar.classList.add("close");
  }
});

darkLight.addEventListener("click", () => {
  body.classList.toggle("dark");
  if (body.classList.contains("dark")) {
    document.setI
    darkLight.classList.replace("bx-sun", "bx-moon");
  } else {
    darkLight.classList.replace("bx-moon", "bx-sun");
  }
});

submenuItems.forEach((item, index) => {
  item.addEventListener("click", () => {
    item.classList.toggle("show_submenu");
    submenuItems.forEach((item2, index2) => {
      if (index !== index2) {
        item2.classList.remove("show_submenu");
      }
    });
  });
});




function closeSidebar() {
  sidebar.classList.add("close");
}


function expandSidebar() {
  sidebar.classList.remove("close");
}


 function checkSidebarState() {
    if (window.innerWidth <= 360) {
      closeSidebar();
    } else {
      expandSidebar();
    }
  }

 
checkSidebarState();


window.addEventListener("resize", checkSidebarState);

let activeInterval;
let isPomodoro = false; 
let pomodoroCount = 0;

function showNotification(message) {
    const notification = document.getElementById('notification');
    notification.textContent = message;
    notification.style.display = 'block';

    setTimeout(() => {
        notification.style.display = 'none';
    }, 2000);
}


startLiveClock();

function startPomodoro() {
  
  clearInterval(activeInterval);
  isPomodoro = true;
  const pomodoroTime = 25 * 60; 
  let timer = pomodoroTime;
  updateTimerDisplay(timer);
  
  showNotification("Pomodoro started!");

  activeInterval = setInterval(() => {
    timer--;
    updateTimerDisplay(timer);
    if (timer <= 0) {
      clearInterval(activeInterval);
      isPomodoro = false;
      pomodoroCount++;

     
      if (pomodoroCount % 4 === 0) {
        startBreak(15 * 60);
        
        showNotification("Take a longer break (15 minutes)!");
      } else {
        startBreak(5 * 60);
        
        
        showNotification("Take a short break (5 minutes)!");
      }
    }
  }, 1000);
}

function startBreak(breakTime) {
 
  clearInterval(activeInterval);
  isPomodoro = false;
  let timer = breakTime;
  updateTimerDisplay(timer);
  

  showNotification("Break started!");

  activeInterval = setInterval(() => {
    timer--;
    updateTimerDisplay(timer);
    if (timer <= 0) {
      clearInterval(activeInterval);
      pomodoroCount++;
      startPomodoro(); 
    }
  }, 1000);
}

function startLiveClock() {
  // Clear any existing interval
  clearInterval(activeInterval);
  isPomodoro = false;
  updateClock();

  activeInterval = setInterval(updateClock, 1000);
}

function updateTimerDisplay(seconds) {
  const hours = Math.floor(seconds / 3600);
  const minutes = Math.floor((seconds % 3600) / 60);
  const remainingSeconds = seconds % 60;
  const displayTime = `${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(remainingSeconds).padStart(2, '0')}`;
  document.getElementById("currentTime").textContent = displayTime;
}

function updateClock() {
  const date = new Date();
  const hours = String(date.getHours()).padStart(2, '0');
  const minutes = String(date.getMinutes()).padStart(2, '0');
  const seconds = String(date.getSeconds()).padStart(2, '0');
  const displayTime = `${hours}:${minutes}:${seconds}`;
  document.getElementById("currentTime").textContent = displayTime;
}


// Custom notification function
function showNotification(message) {
    const notification = document.getElementById('notification');
    notification.textContent = message;
    notification.style.display = 'block';

    setTimeout(() => {
        notification.style.display = 'none';
    }, 3000);
}

const API_KEY = "a635965690cf24d2acfa1fa722525eb1";
let cardCount = 0;

function createBookmarkCard(data) {
    if (cardCount < 4) {
        const bookmarkCard = document.createElement('div');
        bookmarkCard.classList.add('linkcard');

        bookmarkCard.innerHTML = `
            <span class="material-symbols-outlined remove">
                close
            </span>
            <div class="cover-card">
                <div class='img-div'>
                    <img src="${data.image}" alt="Link Preview" />
                </div>
                <div class="content">
                    <a href="${data.url}"><h3>${data.title}</h3></a>
                    <p>${data.description}</p>
                </div>
            </div>
        `;

        const bookmarkContainer = document.querySelector('.bookmark-card');
        bookmarkContainer.appendChild(bookmarkCard);

        const removeButton = bookmarkCard.querySelector('.remove');
        removeButton.addEventListener('click', () => {
            removeBookmark(bookmarkCard);
        });

        cardCount++;
    } else {
        showNotification("You can't create more than 4 cards.");
    }
}

function removeBookmark(bookmarkCard) {
    if (bookmarkCard) {
        bookmarkCard.remove();
        cardCount--;
    }
}

async function fetchLink() {
    const linkValue = document.getElementById('link').value;

    if (linkValue) {
        try {
            const response = await fetch(`https://api.linkpreview.net/?key=${API_KEY}&q=${encodeURIComponent(linkValue)}`);
            const data = await response.json();

            createBookmarkCard(data);
        } catch (error) {
            console.error("Error fetching link:", error);
        }

        document.getElementById('link').value = "";
    }
}





// Weather API Call

const apiKey = 'aec20d86a3b33beef725fa9cb7562901';
const city = 'Pune';

fetch(`https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apiKey}&units=metric`)
    .then(response => response.json())
    .then(data => {
        const temperature = data.main.temp;
        const isDay = (new Date().getHours() >= 6 && new Date().getHours() < 18);

        let weatherIconKey;
        if (data.weather && data.weather.length > 0) {
            const weatherCondition = data.weather[0].main.toLowerCase();
            if (weatherCondition.includes('clear') || weatherCondition.includes('sun')) {
                weatherIconKey = 'sunny';
            } else if (weatherCondition.includes('rain')) {
                weatherIconKey = 'rainy';
            } else if (weatherCondition.includes('cloud')) {
                weatherIconKey = 'cloudy';
            } else {
                weatherIconKey = 'unknown';
            }
        } else {
            weatherIconKey = 'unknown';
        }

        let weatherIconClass = `${weatherIconKey}-${isDay ? 'day' : 'night'}`;
        document.getElementById('weather-icon').className = `weather-icon ${weatherIconClass}`;
        document.getElementById('temperature').textContent = `${temperature}°C`;
        document.getElementById('location').textContent = city;
    })
    .catch(error => {
        console.error('Error fetching weather data:', error);
    });

   
            document.addEventListener("DOMContentLoaded", function () {
       
              const welcomeH4 = document.querySelector(".welcome h4");
              welcomeH4.classList.add("animate-once");
            
            
              setTimeout(() => {
                welcomeH4.classList.remove("animate-once");
              }, 3000);
            });


        