

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

// const contentContainer = document.getElementById('content-container');

// document.getElementById('todo-link').addEventListener('click', function() {
//   console.log("Hello");
//   fetch('../ToDoTest/demo1.html')
//     .then(response => response.text())
//     .then(data => {
//       contentContainer.innerHTML = data;
//       return fetch('../ToDoTest/new.js'); 
//     })
//     .then(scriptResponse => scriptResponse.text())
//     .then(scriptData => {
//       const scriptElement = document.createElement('script');
//       scriptElement.innerHTML = scriptData;
//       document.body.appendChild(scriptElement);

//       // Call the displayTasks function here
//       displayTasks(); // Call the displayTasks function to populate tasks
//     })
//     .catch(error => console.error('Error loading to-do list:', error));
// });



// document.getElementById('todo-link').addEventListener('click', function() {

//   console.log('Hello');
// });

// document.getElementById('timer-link').addEventListener('click', function() {
//   console.log("Hello");
//   fetch('../selectbar_time/selectbar.html')
//     .then(response => response.text())
//     .then(data => {
//       contentContainer.innerHTML = data;
//       return fetch('../selectbar_time/selectbar.js'); 
//     })
//     .then(scriptResponse => scriptResponse.text())
//     .then(scriptData => {
//       const scriptElement = document.createElement('script');
//       scriptElement.innerHTML = scriptData;
//       document.body.appendChild(scriptElement);

//       // Call the displayTasks function here
//       startTimer(); // Call the displayTasks function to populate tasks
//     })
//     .catch(error => console.error('Error loading timer:', error));
// });


// document.getElementById('task-link').addEventListener('click', function () {
//   console.log("Hello");

//   // Remove the old script element if it exists
//   const oldScriptElement = document.querySelector('script[src="../GoalSync/main.js"]');
//   if (oldScriptElement) {
//     oldScriptElement.parentNode.removeChild(oldScriptElement);
//   }

//   fetch('../GoalSync/main.html')
//     .then(response => response.text())
//     .then(data => {
//       contentContainer.innerHTML = data;
//       return fetch('../GoalSync/main.js');
//     })
//     .then(scriptResponse => scriptResponse.text())
//     .then(scriptData => {
//       // Append the new script element
//       const scriptElement = document.createElement('script');
//       scriptElement.src = '../GoalSync/main.js';
//       document.body.appendChild(scriptElement);

//       scriptElement.onload = function () {
//         // Call the functions defined in the loaded script here
//         initialize();
//         console.log("called successfully");
//       };
//     })
//     .catch(error => console.error('Error loading to-do list:', error));
// });



// document.getElementById('task-link').addEventListener('click', function() {
//   console.log("Hello");
//   fetch('../GoalSync/main.html')
//     .then(response => response.text())
//     .then(data => {
//       contentContainer.innerHTML = data;
//       return fetch('../GoalSync/main.js'); 
//     })
//     .then(scriptResponse => scriptResponse.text())
//     .then(scriptData => {
//       const scriptElement = document.createElement('script');
//       scriptElement.innerHTML = scriptData;
//       document.body.appendChild(scriptElement);

//       // Call the displayTasks function here
//       fetchGoals();
//       console.log("called successfully"); // Call the displayTasks function to populate tasks
//     })
//     .catch(error => console.error('Error loading to-do list:', error));
// });






document.getElementById("log-out-2").addEventListener("click", function (event) {
  event.preventDefault(); // Prevent the link from immediately navigating to "logout.php"

  // Display a confirm dialog
  var confirmLogout = confirm("Are you sure you want to logout?");

  // If the user clicks OK, navigate to "logout.php"
  if (confirmLogout) {
    window.location.href = this.getAttribute("href");
  }
});

// /// Get all the <a> elements with the class 'nav-item'
// const navItems = document.querySelectorAll('.nav-item');

// // Add a click event listener to each <a> element
// navItems.forEach((navItem) => {
//   navItem.addEventListener('click', (event) => {
//     // Prevent the default link behavior (e.g., following the href)
//     event.preventDefault();

//     // Access the clicked <a> element
//     const clickedNavItem = event.currentTarget;

//     // Access the 'data-content' attribute of the clicked <a> element
//     const dataContent = clickedNavItem.getAttribute("data-content");

//     // Now you can work with the 'dataContent' as needed
//     console.log('Clicked element:', dataContent);
//   });
// });

// Get all the <a> elements with the class 'nav-item'
const navItems = document.querySelectorAll('.nav-item');
const dashDiv = document.getElementById("dashboard-container");
const timerDiv = document.getElementById("timer-container");
const dynaDiv = document.getElementById("dynamic-content-container");

const timerCss = document.createElement("link");
timerCss.rel = "stylesheet";
timerCss.href = "Timer/timer.css"
timerCss.id = "timerCss";

const dashboardCss = document.createElement("link");
dashboardCss.rel = "stylesheet";
dashboardCss.href = "Dashboard/DashStyle.css";
dashboardCss.id = "dashboardCss";


// const calendarJs = document.createElement("script");
// calendarJs.src = "Calendar/script.js";
// calendarJs.id = "calendarJs";

// const notesJs = document.createElement("script");
// notesJs.src = "Notes/ajaxscript.js";
// notesJs.id = "notesJs";

// const todoJs = document.createElement("script");
// todoJs.src = "TodoList/todolist.js";
// todoJs.id = "todoJs";
// document.body.appendChild(todoJs);

// const calendarCss = document.createElement("link");
// calendarCss.rel = "stylesheet";
// calendarCss.href = "Calendar/style.css";
// calendarCss.id = "calendarCss";

// Add a click event listener to each <a> element
navItems.forEach((navItem) => {
  navItem.addEventListener('click', (event) => {
    // Prevent the default link behavior (e.g., following the href)
    event.preventDefault();

    // Access the clicked <a> element
    const clickedNavItem = event.currentTarget;

    // Access the 'data-content' attribute of the clicked <a> element
    const dataContent = clickedNavItem.getAttribute("data-content");

    // Reset the style of all <a> elements
    navItems.forEach((item) => {
      item.style.backgroundColor = ''; // Reset background color
      item.querySelector('.nav_link').style.backgroundColor = '';
      item.querySelector('.navlink_icon').style.backgroundColor = '';
      item.querySelector('.navlink_icon').style.color = ''; // Reset icon background color
      item.querySelector('.navlink').style.color = ''; // Reset text color
    });

    // Set the style for the clicked <a> element
    clickedNavItem.style.backgroundColor = '#744caf';
    clickedNavItem.querySelector('.nav_link').style.backgroundColor = '#744caf';
    clickedNavItem.querySelector('.navlink_icon').style.backgroundColor = '#744caf';
    clickedNavItem.querySelector('.navlink_icon').style.color = 'white';
    clickedNavItem.querySelector('.navlink').style.color = 'white';

    // Now you can work with the 'dataContent' as needed
    console.log('Clicked element:', dataContent);
    showContent(dataContent);
  });
});

function showContent(dataContent) {
  const checkTimerCss = document.querySelector('link[id="timerCss"]');
  const checkDashboardCss = document.querySelector('link[id="dashboardCss"]');

  // const checkCalendarJs = document.querySelector('script[id="calendarJs"]');

  // const checkNotesJs = document.querySelector('script[id="notesJs"]');

  // const checkTodoJs = document.querySelector('script[id="todoJs"]');

  
  // if (checkTodoJs) {
  //   document.body.removeChild(checkTodoJs);
  //   console.log("Removed todo js file");
  // }
  // if (checkNotesJs) {
  //   document.body.removeChild(checkNotesJs);
  //   console.log("Removed Notes js file");
  // }
  // if (checkCalendarJs) {
  //   document.body.removeChild(checkCalendarJs);
  //   console.log("Removed Calendar js file");
  // }
  if (checkTimerCss) {
    document.head.removeChild(checkTimerCss);
    console.log("Removed timer css file");
  }
  if (checkDashboardCss) {
    document.head.removeChild(checkDashboardCss);
    console.log("Removed dashboard css file");
  }
  dashDiv.style.display = "none";
  dynaDiv.style.display = "none";
  dynaDiv.innerHTML = "";
  timerDiv.style.display = "none";



  if (dataContent == 'dashboard') {
    console.log("Showing Dashboard");
    document.head.appendChild(dashboardCss);


    setTimeout(() => {

      dashDiv.style.display = "block";
    }, 100);
  }
  if (dataContent == 'timer') {

    console.log("Showing Timer");
    document.head.appendChild(timerCss);
    setTimeout(() => {
      timerDiv.style.display = "block";
    }, 100);
  }

  if (dataContent == "todo") {
    dynaDiv.style.display = "block";
    fetch('TodoList/todolist.html')
      .then(response => response.text())
      .then(data => {
        dynaDiv.innerHTML = data;
        return fetch('TodoList/todolist.js');
      })
      .then(scriptResponse => scriptResponse.text())
      .then(scriptData => {
        // Append the new script element
        const scriptElement = document.createElement('script');
        scriptElement.src = 'TodoList/todolist.js';
        document.body.appendChild(scriptElement);

        scriptElement.onload = function () {
          // Call the functions defined in the loaded script here
          displayTasks();
          console.log("called successfully");
        };
      })
      .catch(error => console.error('Error loading to-do list:', error));
  }


  if (dataContent == "notes") {
    dynaDiv.style.display = "block";
    fetch('Notes/Notes.html')
      .then(response => response.text())
      .then(data => {
        dynaDiv.innerHTML = data;
        return fetch('Notes/ajaxscript.js');
      })
      .then(scriptResponse => scriptResponse.text())
      .then(scriptData => {
        // Append the new script element
        const scriptElement = document.createElement('script');
        scriptElement.src = 'Notes/ajaxscript.js';
        document.body.appendChild(scriptElement);

        scriptElement.onload = function () {
          // Call the functions defined in the loaded script here
          showNote();
          console.log("called successfully");
        };
      })
      .catch(error => console.error('Error loading to-do list:', error));
  }


  if (dataContent == "tasks") {
    dynaDiv.style.display = "block";
    fetch('GoalSync/main.html')
      .then(response => response.text())
      .then(data => {
        dynaDiv.innerHTML = data;
        return fetch('GoalSync/main.js');
      })
      .then(scriptResponse => scriptResponse.text())
      .then(scriptData => {
        // Append the new script element
        const scriptElement = document.createElement('script');
        scriptElement.src = 'GoalSync/main.js';
        document.body.appendChild(scriptElement);

        scriptElement.onload = function () {
          // Call the functions defined in the loaded script here
          initialize();
          console.log("called successfully");
        };
      })
      .catch(error => console.error('Error loading to-do list:', error));
  }
  if (dataContent == "calendar") {
    dynaDiv.style.display = "block";
    fetch('Calendar/CalendarIndex.html')
      .then(response => response.text())
      .then(data => {
        dynaDiv.innerHTML = data;
        return fetch('Calendar/calendar.js');
      })
      .then(scriptResponse => scriptResponse.text())
      .then(scriptData => {
        // Append the new script element
        const scriptElement = document.createElement('script');
        scriptElement.src = 'Calendar/calendar.js';
        document.body.appendChild(scriptElement);

        scriptElement.onload = function () {
          // Call the functions defined in the loaded script here
          startCalendar();
          console.log("called successfully");
        };
      })
      .catch(error => console.error('Error loading to-do list:', error));
  }

  if (dataContent == "blogs") {
    dynaDiv.style.display = "block";
    fetch('Blogs/home.html')
      .then(response => response.text())
      .then(data => {
        dynaDiv.innerHTML = data;
        return fetch('Blogs/blog.js');

      })
      .then(scriptResponse => scriptResponse.text())
      .then(scriptData => {
        const scriptElement = document.createElement('script');
        scriptElement.innerHTML = scriptData;
        document.body.appendChild(scriptElement);
      })

      .catch(error => console.error('Error loading to-do list:', error));
  }
}

function openTodo() {
  const todoItem = document.querySelector('[data-content="todo"]');
  if (todoItem) {
    todoItem.click();
    console.log("todo list opened ");
  }
}
// Your existing code to set up click event listeners on nav items
function requestNotificationPermission() {
  if (Notification.permission !== 'granted') {
    Notification.requestPermission().then((permission) => {
      if (permission === 'granted') {
        console.log('Notification permission granted.');
      } else {
        console.log('Notification permission denied.');
      }
    });
  }
}
// Programmatically trigger a click event on the "Dashboard" item
document.addEventListener('DOMContentLoaded', () => {
  const defaultNavItem = document.querySelector('[data-content="dashboard"]');
  if (defaultNavItem) {
    defaultNavItem.click();
  }

  requestNotificationPermission();

});

