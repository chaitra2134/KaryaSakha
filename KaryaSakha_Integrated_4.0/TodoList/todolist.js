function showInput(sectionId, taskQuadrant, isCompleted, isStarred) {
  const section = document.getElementById(sectionId);

  const inputContainer = document.createElement("li");
  inputContainer.className = "input-container";

  const input = document.createElement("input");
  input.type = "text";
  input.placeholder = "Enter a task";
  input.addEventListener("keydown", function (event) {
      if (event.key === "Enter") {
          addTask(sectionId, input.value, taskQuadrant, isCompleted, isStarred);
          section.removeChild(inputContainer);
        //   list.style.display = "block";
      }
  });

//   const checkbox = document.createElement("input");
//   checkbox.type = "checkbox";
//   checkbox.style.visibility = "hidden";

//   inputContainer.appendChild(checkbox);
  inputContainer.appendChild(input);
  section.appendChild(inputContainer);
  input.focus();
//   list.style.display = "none";
}

function addTask(sectionId, taskText, taskQuadrant, isCompleted, isStarred) {
  const section = document.getElementById(sectionId);

  if (taskText) {
      const li = document.createElement("li");
      const checkbox = document.createElement("input");
      checkbox.type = "checkbox";
      checkbox.className = "checkbox";
      checkbox.onchange = function () {
          const newIsCompleted = checkbox.checked;

          if (newIsCompleted) {
              li.style.textDecoration = "line-through";
              li.style.color = "grey";
          } else {
              li.style.textDecoration = "none";
              li.style.color = "black";
          }

          const formData = new FormData();
          formData.append('taskText', taskText);
          formData.append('taskQuadrant', taskQuadrant);
          formData.append('isCompleted', newIsCompleted);

          fetch('../ToDoTest/update_task_status.php', {
              method: 'POST',
              body: formData
          })
          .then(response => response.text())
          .then(data => {
              console.log(data);
          })
          .catch(error => console.error('Error:', error));
      };

      checkbox.checked = isCompleted ==='true';
      if (isCompleted==='true') {
          li.style.textDecoration = "line-through";
          li.style.color = "grey";
      }

      const formData = new FormData();
      formData.append('taskText', taskText);
      formData.append('taskQuadrant', taskQuadrant);
      formData.append('isCompleted', isCompleted);

      fetch('../ToDoTest/insert_task.php', {
          method: 'POST',
          body: formData
      })
      .then(response => response.text())
      .then(data => console.log(data))
      .catch(error => console.error('Error:', error));

      const actionsContainer = document.createElement("div");
      actionsContainer.className = "actions";

      const deleteBtn = document.createElement("button");
      deleteBtn.innerHTML = '<i class="fas fa-trash-alt"></i>';
      deleteBtn.className = "delete-btn";
      deleteBtn.onclick = function () {
          const taskText = li.getAttribute('data-task-text');
          const taskQuadrant = li.getAttribute('data-task-quadrant');

          section.removeChild(li);

          const formData = new FormData();
          formData.append('taskText', taskText);
          formData.append('taskQuadrant', taskQuadrant);

          fetch('../ToDoTest/delete_task.php', {
              method: 'POST',
              body: formData
          })
          .then(response => response.text())
          .then(data => {
              console.log(data);
          })
          .catch(error => console.error('Error:', error));
      };

      li.setAttribute('data-task-text', taskText);
      li.setAttribute('data-task-quadrant', taskQuadrant);

      const starBtn = document.createElement("button");
      starBtn.innerHTML = '<i class="fas fa-star"></i>';
      starBtn.className = "star-btn";
      starBtn.onclick = function () {
          const taskText = li.getAttribute('data-task-text');
          const taskQuadrant = li.getAttribute('data-task-quadrant');
          let isStarred = li.getAttribute('data-is-starred') === 'true';

          if (isStarred) {
              starBtn.style.color = "";
              isStarred = false;
          } else {
              starBtn.style.color = "#f1c40f";
              isStarred = true;
          }
          li.setAttribute('data-is-starred', isStarred ? 'true' : 'false');
          section.removeChild(li);
          section.prepend(li);
          const formData = new FormData();
          formData.append('taskText', taskText);
          formData.append('taskQuadrant', taskQuadrant);
          formData.append('isStarred', isStarred ? 'true' : 'false');

          fetch('../ToDoTest/update_star_status.php', {
              method: 'POST',
              body: formData
          })
          .then(response => response.text())
          .then(data => {
              console.log(data);
          })
          .catch(error => console.error('Error:', error));
      };

      actionsContainer.appendChild(deleteBtn);
      actionsContainer.appendChild(starBtn);

      li.appendChild(checkbox);
      li.appendChild(document.createTextNode(` ${taskText}`));
      li.appendChild(actionsContainer);
      li.setAttribute('data-is-starred', isStarred ? 'true' : 'false');
      section.appendChild(li);
  }
}

// function addTask(sectionId, taskText, taskQuadrant, isCompleted, isStarred) {
//     // ... (previous code)
//     const section = document.getElementById(sectionId);

//   if (taskText) {
//       const li = document.createElement("li");
//       const checkbox = document.createElement("input");
//       checkbox.type = "checkbox";
//       checkbox.className = "checkbox";
//       checkbox.onchange = function () {
//           const newIsCompleted = checkbox.checked;

//           if (newIsCompleted) {
//               li.style.textDecoration = "line-through";
//               li.style.color = "grey";
//           } else {
//               li.style.textDecoration = "none";
//               li.style.color = "black";
//           }

//           const formData = new FormData();
//           formData.append('taskText', taskText);
//           formData.append('taskQuadrant', taskQuadrant);
//           formData.append('isCompleted', newIsCompleted);

//           fetch('../ToDoTest/update_task_status.php', {
//               method: 'POST',
//               body: formData
//           })
//           .then(response => response.text())
//           .then(data => {
//               console.log(data);
//           })
//           .catch(error => console.error('Error:', error));
//       };

//       checkbox.checked = isCompleted ==='true';
//       if (isCompleted==='true') {
//           li.style.textDecoration = "line-through";
//           li.style.color = "grey";
//       }

//     const descriptionContainer = document.createElement("div");
//     descriptionContainer.className = "description-container";

//     const descriptionInput = document.createElement("input");
//     descriptionInput.type = "text";
//     descriptionInput.placeholder = "Enter description";
//     descriptionInput.className = "description-input";
//     descriptionInput.style.display = "none"; // Initially hide the description input
//     descriptionInput.addEventListener("keydown", function(event) {
//         if (event.key === "Enter") {
//             const description = descriptionInput.value;
//             // Save the description to the backend here
//             descriptionInput.style.display = "none"; // Hide the input after saving
//             descriptionText.style.display = "block"; // Show the saved description text
//             descriptionText.textContent = description;
//         }
//     });

//     const dropdownButton = document.createElement("button");
//     dropdownButton.className = "task-dropdown-button";
//     dropdownButton.innerHTML = "▼";
//     dropdownButton.addEventListener("click", function() {
//         descriptionInput.style.display = "block"; // Show the description input on dropdown click
//         descriptionText.style.display = "none"; // Hide the description text
//         descriptionInput.focus();
//     });

//     const descriptionText = document.createElement("div");
//     descriptionText.className = "description-text";

//     descriptionContainer.appendChild(descriptionInput);
//     descriptionContainer.appendChild(descriptionText);

//     li.appendChild(checkbox);
//     li.appendChild(document.createTextNode(` ${taskText}`));
//     li.appendChild(actionsContainer);
//     li.appendChild(dropdownButton); // Add the dropdown button to reveal the description input
//     li.appendChild(descriptionContainer); // Add the description container
//     // ... (rest of the code)
// }
// }

function addTask1(sectionId, taskText, taskQuadrant, isCompleted, isStarred) {
  const section = document.getElementById(sectionId);

  if (taskText) {
      const li = document.createElement("li");
      const checkbox = document.createElement("input");
      checkbox.type = "checkbox";
      checkbox.className = "checkbox";
      checkbox.onchange = function () {
          const newIsCompleted = checkbox.checked;

          if (newIsCompleted) {
              li.style.textDecoration = "line-through";
              li.style.color = "grey";
          } else {
              li.style.textDecoration = "none";
              li.style.color = "black";
          }

          const formData = new FormData();
          formData.append('taskText', taskText);
          formData.append('taskQuadrant', taskQuadrant);
          formData.append('isCompleted', newIsCompleted);

          fetch('../ToDoTest/update_task_status.php', {
              method: 'POST',
              body: formData
          })
          .then(response => response.text())
          .then(data => {
              console.log(data);
          })
          .catch(error => console.error('Error:', error));
      };

      checkbox.checked = isCompleted ==='true';
      if (isCompleted==='true') {
          li.style.textDecoration = "line-through";
          li.style.color = "grey";
      }

      const actionsContainer = document.createElement("div");
      actionsContainer.className = "actions";

      const deleteBtn = document.createElement("button");
      deleteBtn.innerHTML = '<i class="fas fa-trash-alt"></i>';
      deleteBtn.className = "delete-btn";
      deleteBtn.onclick = function () {
          const taskText = li.getAttribute('data-task-text');
          const taskQuadrant = li.getAttribute('data-task-quadrant');

          section.removeChild(li);

          const formData = new FormData();
          formData.append('taskText', taskText);
          formData.append('taskQuadrant', taskQuadrant);

          fetch('../ToDoTest/delete_task.php', {
              method: 'POST',
              body: formData
          })
          .then(response => response.text())
          .then(data => {
              console.log(data);
          })
          .catch(error => console.error('Error:', error));
      };

      li.setAttribute('data-task-text', taskText);
      li.setAttribute('data-task-quadrant', taskQuadrant);

      const starBtn = document.createElement("button");
      starBtn.innerHTML = '<i class="fas fa-star"></i>';
      starBtn.className = "star-btn";
      if(isStarred==='true')
      {
          starBtn.style.color = "#f1c40f";
      }
      starBtn.onclick = function () {
          const taskText = li.getAttribute('data-task-text');
          const taskQuadrant = li.getAttribute('data-task-quadrant');
          let isStarred = li.getAttribute('data-is-starred') === 'true';

          if (isStarred) {
              starBtn.style.color = "";
              isStarred = false;
          } else {
              starBtn.style.color = "#f1c40f";
              isStarred = true;
          }
          li.setAttribute('data-is-starred', isStarred ? 'true' : 'false');
          section.removeChild(li);
          section.prepend(li);
          const formData = new FormData();
          formData.append('taskText', taskText);
          formData.append('taskQuadrant', taskQuadrant);
          formData.append('isStarred', isStarred ? 'true' : 'false');

          fetch('../ToDoTest/update_star_status.php', {
              method: 'POST',
              body: formData
          })
          .then(response => response.text())
          .then(data => {
              console.log(data);
          })
          .catch(error => console.error('Error:', error));
      };

      actionsContainer.appendChild(deleteBtn);
      actionsContainer.appendChild(starBtn);

      li.appendChild(checkbox);
      li.appendChild(document.createTextNode(` ${taskText}`));
      li.appendChild(actionsContainer);
      li.setAttribute('data-is-starred', isStarred ? 'true' : 'false');
      section.appendChild(li);
  }
}

function displayTasks() {
  const sections = {
      1: document.getElementById('section1'),
      2: document.getElementById('section2'),
      3: document.getElementById('section3'),
      4: document.getElementById('section4')
  };

  // Clear existing tasks from all sections
  Object.values(sections).forEach(section => {
      section.innerHTML = ''; // Remove all child elements
  });

  // Fetch and add tasks to sections
  fetch('TodoList/fetch_tasks1.php')
      .then(response => response.json())
      .then(tasks => {
          tasks.forEach(task => {
              const sectionId = `section${task.taskQuadrant}`;
              const section = sections[task.taskQuadrant];

              if (section) {
                  addTask1(
                      sectionId,
                      task.taskContent,
                      task.taskQuadrant,
                      task.isCompleted,
                      task.isStarred
                  );
              }
          });
      })
      .catch(error => console.error('Error fetching tasks:', error));
}




window.addEventListener('load', displayTasks);

window.addEventListener('mousedown', function (event) {
  const inputContainers = document.querySelectorAll('.input-container');
  inputContainers.forEach(function (container) {
      if (!container.contains(event.target)) {
          container.remove();
      }
  });
});