function initialize(){
        // script.js
        const goalContainer = document.getElementById("goalContainer");
        const addGoalButton = document.getElementById("addGoalButton");

        addGoalButton.addEventListener("click", createGoalCard);

        // Define taskContainer at a higher scope so that it's accessible to both functions
        const taskContainer = document.createElement("div");
        taskContainer.classList.add("task-container");

        document.addEventListener("keydown", function (event) {
            if (event.shiftKey && event.key.toLowerCase() === "n") {
                event.preventDefault();

                if (addGoalButton) {
                    addGoalButton.click();
                }

            }
        });

        fetchGoals();

        function createGoalCard() {

            let selectedGoalCard = null;
            const goalCard = document.createElement("div");
            goalCard.classList.add("goal-card");
            
            const progressBar = document.createElement("div");
            progressBar.className = "progress-bar";

            const progress = document.createElement("div");
            progress.className = "progress";

            progressBar.appendChild(progress);
            goalCard.appendChild(progressBar);

            const dropdownContainer = document.createElement("div");
            dropdownContainer.className = "dropdown-container";

            const dropdownButton = document.createElement("button");
            dropdownButton.classList.add("dropdown-button");
            dropdownButton.textContent = "View Tasks"; // You can use a suitable dropdown icon here
            dropdownButton.style.display = "none";
            dropdownButton.addEventListener("click", toggleTaskList);

            const goalbuttonContainer = document.createElement("div");
            goalbuttonContainer.className = "goal-button-container";
            goalbuttonContainer.style.display = "none";

            const editcardbutton = document.createElement("button");
            editcardbutton.innerHTML = '<i class="fas fa-edit"></i>';
            editcardbutton.className = "edit-card-button";
            editcardbutton.addEventListener("click", editCard);


            const deletecardbutton = document.createElement("button");
            deletecardbutton.className = "delete-card-button";
            deletecardbutton.innerHTML = '<i class="fas fa-trash-alt"></i>';
            deletecardbutton.addEventListener("click", deleteCard);

            goalbuttonContainer.appendChild(editcardbutton);
            goalbuttonContainer.appendChild(deletecardbutton);


            const plusButton = document.createElement("button");
            plusButton.classList.add("plus-button");
            plusButton.textContent = "Add Tasks";
            //plusButton.style.display = "block"; // Initially hide the plus button
            plusButton.addEventListener("click", showTaskInput);

            const titleContainer = document.createElement("div");
            titleContainer.classList.add("title-container");

            const titleInput = document.createElement("input");
            titleInput.className = "title-input"
            titleInput.type = "text";
            titleInput.placeholder = "Enter goal title";
            titleInput.addEventListener("keydown", handleInput);



            titleContainer.appendChild(titleInput);
            goalCard.appendChild(titleContainer);

            const descriptionTextarea = document.createElement("textarea");
            descriptionTextarea.className = "description-text";
            descriptionTextarea.placeholder = "Enter goal description";
            descriptionTextarea.addEventListener("keydown", handleInput);

            const taskplus = document.createElement("div");
            taskplus.classList.add("taskplus");
            taskplus.style.display = "none";

            goalCard.appendChild(descriptionTextarea);
            goalCard.appendChild(goalbuttonContainer);

            const taskContainer = document.createElement("div");
            taskContainer.classList.add("task-container");
            dropdownContainer.appendChild(dropdownButton);
            goalCard.appendChild(dropdownContainer);
            taskplus.appendChild(plusButton);
            taskplus.appendChild(taskContainer);
            //goalCard.appendChild(taskContainer);

            // goalCard.appendChild(plusButton);
            goalCard.appendChild(taskplus);

            goalContainer.appendChild(goalCard);


            // let plusButtonVisible = false; 
            // let taskContainerVisible = false;
            let taskplusVisible = false;
            titleInput.focus();



            function selectGoalCard(goalCard) {

                if (selectedGoalCard) {
                    selectedGoalCard.classList.remove("selected");
                    selectedGoalCard.style.border = "3px solid #929292";
                    selectedGoalCard.boxSizing = "border-box";
                    selectedGoalCard.style.boxShadow = "0 0 5px rgb(114, 114, 114)";
                }

                // Select the new card
                goalCard.classList.add("selected");
                selectedGoalCard = goalCard;
                selectedGoalCard.style.border = "3px solid #744caf";
                selectedGoalCard.boxSizing = "border-box";
                selectedGoalCard.style.boxShadow = "0 0 10px rgb(114, 114, 114)";
            }

            document.addEventListener("click", function (event) {
                const goalCard = event.target.closest(".goal-card");
                if (goalCard) {
                    selectGoalCard(goalCard);
                    console.log("Selected a card");
                } else {
                    // Clicked outside of a goal card, so deselect the currently selected card
                    if (selectedGoalCard) {
                        selectedGoalCard.classList.remove("selected");
                        selectedGoalCard.style.border = "3px solid #929292";
                        selectedGoalCard.boxSizing = "border-box";
                        selectedGoalCard.style.boxShadow = "0 0 5px rgb(114, 114, 114)";
                        selectedGoalCard = null;
                        console.log("Deselected a card");
                    }
                }

            });

            document.addEventListener("keydown", function (event) {

                if (event.shiftKey && event.key.toLowerCase() === "e" && selectedGoalCard) {
                    event.preventDefault();
                    const editButton = selectedGoalCard.querySelector(".edit-card-button");
                    if (editButton) {
                        editButton.click();
                    }
            }
            });

            titleInput.addEventListener("keydown", function (event) {

                if (event.key === "ArrowDown") {
                    descriptionTextarea.focus();
                }
            });

            descriptionTextarea.addEventListener("keydown", function (event) {

                if (event.key === "ArrowUp") {
                    titleInput.focus();
                }
            });

            function handleInput(event) {
                if (event.key === "Enter" && !event.shiftKey) {
                    event.preventDefault();
                    saveCard();
                }
            }
            function updateProgressBar(percentage) {
                const progress = goalCard.querySelector(".progress");
                progress.style.width = `${percentage}%`;
                const progressBar = goalCard.querySelector(".progress-bar");
                progressBar.classList.add('glow-animation');


                setTimeout(() => {
                    progressBar.classList.remove('glow-animation');
                }, 1500);
            }
            function saveCard() {

                const title = titleInput.value.trim();
                const description = descriptionTextarea.value.trim();
                const editFlag = goalCard.getAttribute("edit-flag");

                if (title !== "" && editFlag === null) {
                    const formData = new FormData();
                    formData.append('goalTitle', title);
                    formData.append('goalDescription', description);


                    fetch('GoalSync/InsertGoal.php', {
                        method: 'POST',
                        body: formData
                    })
                        .then(response => response.text())
                        .then(data => {
                            console.log(data);
                            const newId = parseInt(data);

                            // Set the ID attribute of the goalcard HTML element
                            goalCard.setAttribute('id', newId);
                            goalCard.setAttribute('title', title);
                            goalCard.setAttribute('description', description);
                            goalCard.setAttribute('edit-flag', 'true');
                            goalCard.setAttribute('num-tasks', 0);
                            goalCard.setAttribute('com-tasks', 0);
                            goalCard.setAttribute('progress', 0);

                        })

                        .catch(error => console.error('Error:', error));
                    titleInput.disabled = true;
                    descriptionTextarea.disabled = true;
                    dropdownButton.style.display = "block";
                    goalbuttonContainer.style.display = "block";
                    taskplus.style.display = "none";
                    selectGoalCard(goalCard);
                }
                else if (title !== "" && editFlag == 'true') {
                    let cardId = goalCard.getAttribute('id');
                    const newTitle = title;
                    const newDescription = description;
                    goalCard.setAttribute('title', newTitle);
                    goalCard.setAttribute('description', newDescription);
                    titleInput.disabled = true;
                    descriptionTextarea.disabled = true;
                    const formData = new FormData();
                    formData.append("newTitle", newTitle);
                    formData.append("newDescription", newDescription);
                    formData.append("cardId", cardId);

                    fetch('GoalSync/EditGoal.php', {
                        method: 'POST',
                        body: formData,
                    })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.text();
                        })
                        .then(data => {
                            console.log(data); // Handle the response data here
                        })
                        .catch(error => {
                            console.error('Error:', error); // Handle errors here
                        });
                }

                else {
                    alert("Title cannot be empty");
                }

                if (description.trim() == "") {
                    descriptionTextarea.placeholder = "Enter goal description";
                }
                console.log(description);


            }

            function toggleTaskList() {


                if (taskplusVisible) {
                    taskplus.style.display = "none";
                    taskplusVisible = false;
                    dropdownButton.textContent = "View tasks";

                } else {
                    taskplus.style.display = "block";
                    taskplusVisible = true;

                    dropdownButton.textContent = "Hide tasks";
                }

            }

            function editCard() {

                titleInput.disabled = false;
                descriptionTextarea.disabled = false;
                titleInput.addEventListener("keydown", handleInput);
                descriptionTextarea.addEventListener("keydown", handleInput);

                if (descriptionTextarea.value.trim() == "") {
                    descriptionTextarea.placeholder = "Enter goal description";
                }


                titleInput.focus();
            }

            function deleteCard() {

                let userConfirmed = confirm("Are you sure you want to delete this card ?");

                if (userConfirmed) {
                    let cardId = goalCard.getAttribute('id');
                    goalContainer.removeChild(goalCard);


                    const formData = new FormData();
                    formData.append("cardId", cardId);
                    fetch('GoalSync/DeleteGoal.php', {
                        method: 'POST',
                        body: formData
                    })
                        .then(response => response.text())
                        .then(data => console.log(data))
                        .catch(error => console.error('Error:', error));
                }
            }

            function showTaskInput() {
                // Create and display the input for adding tasks
                const inputContainer = document.createElement("div");
                inputContainer.classList.add("task-input-container");

                const input = document.createElement("input");
                input.className = "task-input";
                input.type = "text";
                input.placeholder = "Enter a task";

                input.addEventListener("keydown", function (event) {
                    if (event.key === "Enter") {
                        addTask(input.value);
                        goalCard.removeChild(inputContainer);
                        taskContainer.style.display = "block";
                    }
                });


                inputContainer.appendChild(input);
                goalCard.appendChild(inputContainer);
                input.focus();


            }

            function addTask(taskText) {
                let taskNum = parseInt(goalCard.getAttribute("num-tasks"), 10);
                let taskCom = parseInt(goalCard.getAttribute("com-tasks"), 10);
                let cardId = parseInt(goalCard.getAttribute("id"));
                if (taskText.trim() !== "") {
                    const taskListItem = document.createElement("li");
                    taskListItem.className = "taskListItem";

                    const checkbox = document.createElement("input");
                    checkbox.type = "checkbox";
                    checkbox.className = "checkbox";
                    checkbox.onchange = function () {
                        let taskCom = parseInt(goalCard.getAttribute("com-tasks"), 10);
                        let taskNum = parseInt(goalCard.getAttribute("num-tasks"), 10);
                        let cardId = parseInt(goalCard.getAttribute("id"), 10);
                        if (checkbox.checked) {

                            taskCom = taskCom + 1;

                            let percentage = Math.round((taskCom / taskNum) * 100);
                            goalCard.setAttribute("com-tasks", taskCom);
                            goalCard.setAttribute("progress", percentage);
                            console.log(taskCom + " " + percentage + "% completed");
                            updateProgressBar(percentage);
                            taskListItem.style.textDecoration = "line-through";
                            taskListItem.style.color = "grey";

                        }
                        else {
                            taskCom = taskCom - 1;
                            let percentage = Math.round((taskCom / taskNum) * 100);
                            goalCard.setAttribute("com-tasks", taskCom);
                            goalCard.setAttribute("progress", percentage);
                            console.log(taskCom + " " + percentage + "% completed");
                            updateProgressBar(percentage);
                            taskListItem.style.textDecoration = "none";
                            taskListItem.style.color = "black";
                        }
                        const formData = new FormData();
                        formData.append("cardId", cardId);
                        formData.append("taskNum", taskNum);
                        formData.append("taskCom", taskCom);
                        formData.append("progress", parseInt(goalCard.getAttribute("progress"), 10));
                        fetch('GoalSync/UpdateTaskDetails.php', {
                            method: 'POST',
                            body: formData
                        })
                            .then(response => response.text())
                            .then(data => console.log(data))
                            .catch(error => console.error('Error:', error));

                        const formData2 = new FormData();
                        formData2.append('taskId', parseInt(taskListItem.getAttribute('id'), 10));
                        formData2.append('isCompleted', checkbox.checked ? 'true' : 'false');
                        fetch('GoalSync/UpdateCompleteStatus.php', {
                            method: 'POST',
                            body: formData2
                        })
                            .then(response => response.text())
                            .then(data => {
                                console.log(data);

                            })

                            .catch(error => console.error('Error:', error));
                    };

                    const taskSpan = document.createElement("span");
                    taskSpan.className = "task-text";
                    taskSpan.textContent = taskText;


                    const actionsContainer = document.createElement("div");
                    actionsContainer.className = "actions";

                    const deleteBtn = document.createElement("button");
                    deleteBtn.innerHTML = '<i class="fas fa-trash-alt"></i>';
                    deleteBtn.className = "delete-btn";
                    deleteBtn.onclick = function () {
                        let taskNum = parseInt(goalCard.getAttribute("num-tasks"), 10);
                        let taskCom = parseInt(goalCard.getAttribute("com-tasks"), 10);
                        let cardId = parseInt(goalCard.getAttribute("id"), 10);
                        if (checkbox.checked) {
                            taskNum = taskNum - 1;
                            taskCom = taskCom - 1;
                            let percentage = Math.round((taskCom / taskNum) * 100);
                            goalCard.setAttribute("num-tasks", taskNum);
                            goalCard.setAttribute("com-tasks", taskCom);
                            goalCard.setAttribute("progress", percentage);
                            console.log(taskNum + " " + taskCom + " " + percentage + " % completed");
                            updateProgressBar(percentage);

                        }
                        else {
                            taskNum = taskNum - 1;
                            let percentage = Math.round((taskCom / taskNum) * 100);
                            goalCard.setAttribute("num-tasks", taskNum);
                            goalCard.setAttribute("progress", percentage);
                            console.log(taskNum + " " + taskCom + " " + percentage + " % completed");
                            updateProgressBar(percentage);
                        }
                        taskList.removeChild(taskListItem);
                        const formData = new FormData();
                        formData.append("cardId", cardId);
                        formData.append("taskNum", taskNum);
                        formData.append("taskCom", taskCom);
                        formData.append("progress", parseInt(goalCard.getAttribute("progress"), 10));
                        fetch('GoalSync/UpdateTaskDetails.php', {
                            method: 'POST',
                            body: formData
                        })
                            .then(response => response.text())
                            .then(data => console.log(data))
                            .catch(error => console.error('Error:', error));

                        const formData2 = new FormData();
                        formData2.append('taskId', parseInt(taskListItem.getAttribute('id'), 10));

                        fetch('GoalSync/DeleteTask.php', {
                            method: 'POST',
                            body: formData2
                        })
                            .then(response => response.text())
                            .then(data => {
                                console.log(data);

                            })

                            .catch(error => console.error('Error:', error));



                    };



                    const taskDescriptionBtn = document.createElement("button");
                    taskDescriptionBtn.innerHTML = '<i class="fas fa-caret-down"></i>';
                    taskDescriptionBtn.className = "task-description-btn";
                    taskDescriptionBtn.addEventListener("click", function () {
                        if (event.ctrlKey) {
                            taskDescription.disabled = false;
                            taskDescription.focus();
                        }
                        else {
                            if (taskDescriptionDiv.style.display === "none") {

                                taskDescriptionDiv.style.display = "block";

                            } else {
                                taskDescriptionDiv.style.display = "none";

                            }
                        }
                    });

                    actionsContainer.appendChild(taskDescriptionBtn);
                    actionsContainer.appendChild(deleteBtn);

                    const taskDescriptionDiv = document.createElement("div");
                    taskDescriptionDiv.className = "task-description-div";
                    taskDescriptionDiv.style.display = "block";

                    const taskDescription = document.createElement("textarea");
                    taskDescription.className = "task-description";
                    taskDescription.placeholder = "Enter task description";
                    let isDisabled = false;
                    taskDescription.disabled = isDisabled;

                    taskDescription.addEventListener("keydown", function (event) {
                        if (event.key === "Enter" && !event.shiftKey) {
                            event.preventDefault();
                            isDisabled = true;
                            taskDescription.disabled = isDisabled;
                            const formData2 = new FormData();
                            formData2.append('taskId', parseInt(taskListItem.getAttribute('id'), 10));
                            formData2.append('taskDescription', taskDescription.value);




                            fetch('GoalSync/UpdateDescription.php', {
                                method: 'POST',
                                body: formData2
                            })
                                .then(response => response.text())
                                .then(data => {
                                    console.log(data);

                                })

                                .catch(error => console.error('Error:', error));
                        }
                    });

                    const taskListItemDiv = document.createElement("div");
                    taskListItemDiv.className = "task-list-item-div";
                    taskDescriptionDiv.appendChild(taskDescription);
                    taskListItemDiv.appendChild(checkbox);
                    taskListItemDiv.appendChild(taskSpan);
                    taskListItemDiv.appendChild(actionsContainer);
                    taskListItem.appendChild(taskListItemDiv);
                    taskListItem.appendChild(taskDescriptionDiv);

                    // Append the task list item to the task list container
                    //const taskList = taskContainer.querySelector("ul"); // Select the task list within the taskContainer
                    const taskList = document.createElement("ul");
                    taskList.className = "taskList"; // Create a <ul> element

                    taskList.appendChild(taskListItem);
                    taskContainer.appendChild(taskList);

                    taskNum = taskNum + 1;
                    let percentage = Math.round((taskCom / taskNum) * 100);
                    goalCard.setAttribute("num-tasks", taskNum);
                    goalCard.setAttribute("progress", percentage);

                    console.log(taskNum + " " + percentage + " % completed");
                    updateProgressBar(percentage);

                    const formData = new FormData();
                    formData.append("cardId", cardId);
                    formData.append("taskNum", taskNum);
                    formData.append("taskCom", taskCom);
                    formData.append("progress", percentage);
                    fetch('GoalSync/UpdateTaskDetails.php', {
                        method: 'POST',
                        body: formData
                    })
                        .then(response => response.text())
                        .then(data => console.log(data))
                        .catch(error => console.error('Error:', error));



                    const formData2 = new FormData();
                    formData2.append('cardId', cardId);
                    formData2.append('taskName', taskText);
                    formData2.append('taskDescription', taskDescription.value);
                    formData2.append('isCompleted', checkbox.checked ? 'true' : 'false')
                    fetch('GoalSync/InsertTasks.php', {
                        method: 'POST',
                        body: formData2
                    })
                        .then(response => response.text())
                        .then(data => {
                            console.log(data);
                            const newId = parseInt(data);

                            // Set the ID attribute of the goalcard HTML element
                            taskListItem.setAttribute('id', newId);

                        })

                        .catch(error => console.error('Error:', error));
                }
            }

        }

        function displayGoalCards(goalId, goalTitle, goalDescription,
            numberOfTasks, completedTasks, progressBarPercentage) {
            selectedGoalCard = null;
            const goalCard = document.createElement("div");
            goalCard.classList.add("goal-card");


            const progressBar = document.createElement("div");
            progressBar.className = "progress-bar";

            const progress = document.createElement("div");
            progress.className = "progress";

            progressBar.appendChild(progress);
            goalCard.appendChild(progressBar);

            const dropdownContainer = document.createElement("div");
            dropdownContainer.className = "dropdown-container";

            const dropdownButton = document.createElement("button");
            dropdownButton.classList.add("dropdown-button");
            dropdownButton.textContent = "View Tasks"; // You can use a suitable dropdown icon here
            dropdownButton.style.display = "none";
            dropdownButton.addEventListener("click", toggleTaskList);

            const goalbuttonContainer = document.createElement("div");
            goalbuttonContainer.className = "goal-button-container";
            goalbuttonContainer.style.display = "none";

            const editcardbutton = document.createElement("button");
            editcardbutton.innerHTML = '<i class="fas fa-edit"></i>';
            editcardbutton.className = "edit-card-button";
            editcardbutton.addEventListener("click", editCard);


            const deletecardbutton = document.createElement("button");
            deletecardbutton.className = "delete-card-button";
            deletecardbutton.innerHTML = '<i class="fas fa-trash-alt"></i>';
            deletecardbutton.addEventListener("click", deleteCard);

            goalbuttonContainer.appendChild(editcardbutton);
            goalbuttonContainer.appendChild(deletecardbutton);


            const plusButton = document.createElement("button");
            plusButton.classList.add("plus-button");
            plusButton.textContent = "Add Tasks";
            //plusButton.style.display = "block"; // Initially hide the plus button
            plusButton.addEventListener("click", showTaskInput);

            const titleContainer = document.createElement("div");
            titleContainer.classList.add("title-container");

            const titleInput = document.createElement("input");
            titleInput.className = "title-input"
            titleInput.type = "text";
            titleInput.placeholder = "Enter goal title";
            titleInput.value = goalTitle;
            titleInput.addEventListener("keydown", handleInput);


            titleContainer.appendChild(titleInput);
            goalCard.appendChild(titleContainer);

            const descriptionTextarea = document.createElement("textarea");
            descriptionTextarea.className = "description-text";
            descriptionTextarea.placeholder = "Enter goal description";
            descriptionTextarea.value = goalDescription;
            descriptionTextarea.addEventListener("keydown", handleInput);

            const taskplus = document.createElement("div");
            taskplus.classList.add("taskplus");
            taskplus.style.display = "none";

            goalCard.appendChild(descriptionTextarea);
            goalCard.appendChild(goalbuttonContainer);

            const taskContainer = document.createElement("div");
            taskContainer.classList.add("task-container");
            dropdownContainer.appendChild(dropdownButton);
            goalCard.appendChild(dropdownContainer);
            taskplus.appendChild(plusButton);
            taskplus.appendChild(taskContainer);
            //goalCard.appendChild(taskContainer);

            // goalCard.appendChild(plusButton);
            goalCard.appendChild(taskplus);

            goalContainer.appendChild(goalCard);
            goalCard.setAttribute('id', goalId);
            goalCard.setAttribute('edit-flag', true);
            goalCard.setAttribute('num-tasks', numberOfTasks);
            goalCard.setAttribute('com-tasks', completedTasks);
            goalCard.setAttribute('progress', progressBarPercentage);


            // let plusButtonVisible = false; // Flag to track if plus button is visible
            // let taskContainerVisible = false;
            let taskplusVisible = false;

            titleInput.disabled = true;
            descriptionTextarea.disabled = true;
            dropdownButton.style.display = "block";
            goalbuttonContainer.style.display = "block";
            taskplus.style.display = "none";
            taskContainer.style.display = "block";
            updateProgressBar(parseInt(goalCard.getAttribute('progress')));
            fetchTasks();



            function selectGoalCard(goalCard) {

                if (selectedGoalCard) {
                    selectedGoalCard.classList.remove("selected");
                    selectedGoalCard.boxSizing = "border-box";
                    selectedGoalCard.style.boxShadow = "0 0 5px rgb(114, 114, 114)";
                    selectedGoalCard.style.border = "3px solid #929292";
                }

                // Select the new card
                goalCard.classList.add("selected");
                selectedGoalCard = goalCard;
                selectedGoalCard.boxSizing = "border-box";
                selectedGoalCard.style.boxShadow = "0 0 10px rgb(114, 114, 114)";
                selectedGoalCard.style.border = "3px solid #744caf";
            }

            document.addEventListener("click", function (event) {
                const goalCard = event.target.closest(".goal-card");
                if (goalCard) {
                    selectGoalCard(goalCard);
                    console.log("Selected a card");
                    event.stopPropagation();
                } else {
                    // Clicked outside of a goal card, so deselect the currently selected card
                    if (selectedGoalCard) {
                        selectedGoalCard.classList.remove("selected");
                        selectedGoalCard.boxSizing = "border-box";
                        selectedGoalCard.style.boxShadow = "0 0 5px rgb(114, 114, 114)";
                        selectedGoalCard.style.border = "3px solid #929292";
                        selectedGoalCard = null;
                        console.log("Deselected a card");
                    }
                }

            });

            document.addEventListener("keydown", function (event) {

                if (event.shiftKey && event.key.toLowerCase() === "e" && selectedGoalCard) {
                    event.preventDefault();
                    const editButton = selectedGoalCard.querySelector(".edit-card-button");
                    if (editButton) {
                        console.log("hello" + selectedGoalCard.getAttribute("class"));
                        editButton.click();
                    }

                }
            });

            titleInput.addEventListener("keydown", function (event) {

                if (event.key === "ArrowDown") {
                    descriptionTextarea.focus();
                }
            });

            descriptionTextarea.addEventListener("keydown", function (event) {

                if (event.key === "ArrowUp") {
                    titleInput.focus();
                }
            });

            function handleInput(event) {
                if (event.key === "Enter" && !event.shiftKey) {
                    event.preventDefault();
                    saveCard();
                }
            }
            function updateProgressBar(percentage) {
                const progress = goalCard.querySelector(".progress");
                progress.style.width = `${percentage}%`;
                const progressBar = goalCard.querySelector(".progress-bar");
                progressBar.classList.add('glow-animation');


                setTimeout(() => {
                    progressBar.classList.remove('glow-animation');
                }, 1500);
            }

            function toggleTaskList() {


                if (taskplusVisible) {
                    taskplus.style.display = "none";
                    taskplusVisible = false;
                    dropdownButton.textContent = "View tasks";

                } else {
                    taskplus.style.display = "block";
                    taskplusVisible = true;

                    dropdownButton.textContent = "Hide tasks";
                }

            }
            function saveCard() {
                const title = titleInput.value.trim();
                const description = descriptionTextarea.value.trim();
                const editFlag = goalCard.getAttribute("edit-flag");
                if (title !== "" && editFlag == 'true') {
                    let cardId = goalCard.getAttribute('id');
                    const newTitle = title;
                    const newDescription = description;
                    goalCard.setAttribute('title', newTitle);
                    goalCard.setAttribute('description', newDescription);
                    titleInput.disabled = true;
                    descriptionTextarea.disabled = true;
                    const formData = new FormData();
                    formData.append("newTitle", newTitle);
                    formData.append("newDescription", newDescription);
                    formData.append("cardId", cardId);

                    fetch('GoalSync/EditGoal.php', {
                        method: 'POST',
                        body: formData,
                    })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.text();
                        })
                        .then(data => {
                            console.log(data); // Handle the response data here
                        })
                        .catch(error => {
                            console.error('Error:', error); // Handle errors here
                        });
                }

                else {
                    alert("Title cannot be empty");
                }

                if (descriptionTextarea.value.trim() == "") {
                    descriptionTextarea.placeholder = "Enter goal description";
                }
            }

            function deleteCard() {
                let userConfirmed = confirm("Are you sure you want to delete this card ?");
                if (userConfirmed) {
                    let cardId = goalCard.getAttribute('id');
                    goalContainer.removeChild(goalCard);


                    const formData = new FormData();
                    formData.append("cardId", cardId);
                    fetch('GoalSync/DeleteGoal.php', {
                        method: 'POST',
                        body: formData
                    })
                        .then(response => response.text())
                        .then(data => console.log(data))
                        .catch(error => console.error('Error:', error));



                }
            }


            function editCard() {

                titleInput.disabled = false;
                descriptionTextarea.disabled = false;
                titleInput.addEventListener("keydown", handleInput);
                descriptionTextarea.addEventListener("keydown", handleInput);

                if (descriptionTextarea.value.trim() == "") {
                    descriptionTextarea.placeholder = "Enter goal description";
                }


                titleInput.focus();
            }

            function fetchTasks() {
                const formData = new FormData();
                formData.append("cardId", goalId)
                fetch('GoalSync/FetchTasks.php', {
                    method: 'POST',
                    body: formData

                })
                    .then(response => response.json())
                    .then(tasks => {
                        tasks.forEach(task => {
                            displayTasks(
                                task.taskId,
                                task.parentGoalId,
                                task.taskName,
                                task.taskDescription,
                                task.isCompleted
                            );

                        });
                    })
                    .catch(error => console.error('Error fetching tasks:', error));
            }

            function displayTasks(taskId, parentGoalId, taskName, taskDescription_arg, isCompleted) {
                const taskListItem = document.createElement("li");
                taskListItem.className = "taskListItem";
                taskListItem.setAttribute('id', taskId);

                const checkbox = document.createElement("input");
                checkbox.type = "checkbox";
                checkbox.className = "checkbox";
                if (isCompleted == 'true') {
                    checkbox.checked = true;
                    taskListItem.style.textDecoration = "line-through";
                    taskListItem.style.color = "grey";
                }
                else {
                    checkbox.checked = false;
                    taskListItem.style.textDecoration = "none";
                    taskListItem.style.color = "black";
                }
                checkbox.onchange = function () {
                    let taskCom = parseInt(goalCard.getAttribute("com-tasks"), 10);
                    let taskNum = parseInt(goalCard.getAttribute("num-tasks"), 10);
                    let cardId = parseInt(goalCard.getAttribute("id"), 10);
                    if (checkbox.checked) {

                        taskCom = taskCom + 1;

                        let percentage = Math.round((taskCom / taskNum) * 100);
                        goalCard.setAttribute("com-tasks", taskCom);
                        goalCard.setAttribute("progress", percentage);
                        console.log(taskCom + " " + percentage + "% completed");
                        updateProgressBar(percentage);
                        taskListItem.style.textDecoration = "line-through";
                        taskListItem.style.color = "grey";

                    }
                    else {
                        taskCom = taskCom - 1;
                        let percentage = Math.round((taskCom / taskNum) * 100);
                        goalCard.setAttribute("com-tasks", taskCom);
                        goalCard.setAttribute("progress", percentage);
                        console.log(taskCom + " " + percentage + "% completed");
                        updateProgressBar(percentage);
                        taskListItem.style.textDecoration = "none";
                        taskListItem.style.color = "black";
                    }
                    const formData = new FormData();
                    formData.append("cardId", cardId);
                    formData.append("taskNum", taskNum);
                    formData.append("taskCom", taskCom);
                    formData.append("progress", parseInt(goalCard.getAttribute("progress"), 10));
                    fetch('GoalSync/UpdateTaskDetails.php', {
                        method: 'POST',
                        body: formData
                    })
                        .then(response => response.text())
                        .then(data => console.log(data))
                        .catch(error => console.error('Error:', error));

                    const formData2 = new FormData();
                    formData2.append('taskId', parseInt(taskListItem.getAttribute('id'), 10));
                    formData2.append('isCompleted', checkbox.checked ? 'true' : 'false');
                    fetch('GoalSync/UpdateCompleteStatus.php', {
                        method: 'POST',
                        body: formData2
                    })
                        .then(response => response.text())
                        .then(data => {
                            console.log(data);

                        })

                        .catch(error => console.error('Error:', error));
                };

                const taskSpan = document.createElement("div");
                taskSpan.className = "task-text";
                taskSpan.textContent = taskName;


                const actionsContainer = document.createElement("div");
                actionsContainer.className = "actions";

                const deleteBtn = document.createElement("button");
                deleteBtn.innerHTML = '<i class="fas fa-trash-alt"></i>';
                deleteBtn.className = "delete-btn";
                deleteBtn.onclick = function () {
                    let taskNum = parseInt(goalCard.getAttribute("num-tasks"), 10);
                    let taskCom = parseInt(goalCard.getAttribute("com-tasks"), 10);
                    let cardId = parseInt(goalCard.getAttribute("id"), 10);
                    if (checkbox.checked) {
                        taskNum = taskNum - 1;
                        taskCom = taskCom - 1;
                        let percentage = Math.round((taskCom / taskNum) * 100);
                        goalCard.setAttribute("num-tasks", taskNum);
                        goalCard.setAttribute("com-tasks", taskCom);
                        goalCard.setAttribute("progress", percentage);
                        console.log(taskNum + " " + taskCom + " " + percentage + " % completed");
                        updateProgressBar(percentage);

                    }
                    else {
                        taskNum = taskNum - 1;
                        let percentage = Math.round((taskCom / taskNum) * 100);
                        goalCard.setAttribute("num-tasks", taskNum);
                        goalCard.setAttribute("progress", percentage);
                        console.log(taskNum + " " + taskCom + " " + percentage + " % completed");
                        updateProgressBar(percentage);
                    }
                    taskList.removeChild(taskListItem);
                    const formData = new FormData();
                    formData.append("cardId", cardId);
                    formData.append("taskNum", taskNum);
                    formData.append("taskCom", taskCom);
                    formData.append("progress", parseInt(goalCard.getAttribute("progress"), 10));
                    fetch('GoalSync/UpdateTaskDetails.php', {
                        method: 'POST',
                        body: formData
                    })
                        .then(response => response.text())
                        .then(data => console.log(data))
                        .catch(error => console.error('Error:', error));

                    const formData2 = new FormData();
                    formData2.append('taskId', parseInt(taskListItem.getAttribute('id'), 10));

                    fetch('GoalSync/DeleteTask.php', {
                        method: 'POST',
                        body: formData2
                    })
                        .then(response => response.text())
                        .then(data => {
                            console.log(data);

                        })

                        .catch(error => console.error('Error:', error));



                };

                const taskDescriptionBtn = document.createElement("button");
                taskDescriptionBtn.innerHTML = '<i class="fas fa-caret-down"></i>';
                taskDescriptionBtn.className = "task-description-btn";
                taskDescriptionBtn.addEventListener("click", function () {
                    if (event.ctrlKey) {
                        taskDescription.disabled = false;
                        taskDescription.focus();
                    }
                    else {
                        if (taskDescriptionDiv.style.display === "none") {

                            taskDescriptionDiv.style.display = "block";

                        } else {
                            taskDescriptionDiv.style.display = "none";

                        }
                    }
                });



                actionsContainer.appendChild(taskDescriptionBtn);
                actionsContainer.appendChild(deleteBtn);

                const taskDescriptionDiv = document.createElement("div");
                taskDescriptionDiv.className = "task-description-div";
                taskDescriptionDiv.style.display = "none";

                const taskDescription = document.createElement("textarea");
                taskDescription.className = "task-description";
                taskDescription.value = taskDescription_arg;
                taskDescription.disabled = true;

                taskDescription.addEventListener("keydown", function (event) {
                    if (event.key === "Enter" && !event.shiftKey) {
                        event.preventDefault();
                        isDisabled = true;
                        taskDescription.disabled = isDisabled;
                        const formData2 = new FormData();
                        formData2.append('taskId', parseInt(taskListItem.getAttribute('id'), 10));
                        formData2.append('taskDescription', taskDescription.value);




                        fetch('GoalSync/UpdateDescription.php', {
                            method: 'POST',
                            body: formData2
                        })
                            .then(response => response.text())
                            .then(data => {
                                console.log(data);

                            })

                            .catch(error => console.error('Error:', error));
                    }
                });


                const taskListItemDiv = document.createElement("div");
                taskListItemDiv.className = "task-list-item-div";
                taskDescriptionDiv.appendChild(taskDescription);
                taskListItemDiv.appendChild(checkbox);
                taskListItemDiv.appendChild(taskSpan);
                taskListItemDiv.appendChild(actionsContainer);
                taskListItem.appendChild(taskListItemDiv);
                taskListItem.appendChild(taskDescriptionDiv);

                // Append the task list item to the task list container
                //const taskList = taskContainer.querySelector("ul"); // Select the task list within the taskContainer
                const taskList = document.createElement("ul");
                taskList.className = "taskList"; // Create a <ul> element

                taskList.appendChild(taskListItem);
                taskContainer.appendChild(taskList);
                console.log("task added successfully " + taskId);
            }

            function showTaskInput() {
                // Create and display the input for adding tasks
                const inputContainer = document.createElement("div");
                inputContainer.classList.add("task-input-container");

                const input = document.createElement("input");
                input.className = "task-input";
                input.type = "text";
                input.placeholder = "Enter a task";

                input.addEventListener("keydown", function (event) {
                    if (event.key === "Enter") {
                        addTask(input.value);
                        goalCard.removeChild(inputContainer);
                        taskContainer.style.display = "block";
                    }
                });


                inputContainer.appendChild(input);
                goalCard.appendChild(inputContainer);
                input.focus();


            }

            function addTask(taskText) {
                let taskNum = parseInt(goalCard.getAttribute("num-tasks"), 10);
                let taskCom = parseInt(goalCard.getAttribute("com-tasks"), 10);
                let cardId = parseInt(goalCard.getAttribute("id"));
                if (taskText.trim() !== "") {
                    const taskListItem = document.createElement("li");
                    taskListItem.className = "taskListItem";

                    const checkbox = document.createElement("input");
                    checkbox.type = "checkbox";
                    checkbox.className = "checkbox";
                    checkbox.onchange = function () {
                        let taskCom = parseInt(goalCard.getAttribute("com-tasks"), 10);
                        let taskNum = parseInt(goalCard.getAttribute("num-tasks"), 10);
                        let cardId = parseInt(goalCard.getAttribute("id"), 10);
                        if (checkbox.checked) {

                            taskCom = taskCom + 1;

                            let percentage = Math.round((taskCom / taskNum) * 100);
                            goalCard.setAttribute("com-tasks", taskCom);
                            goalCard.setAttribute("progress", percentage);
                            console.log(taskCom + " " + percentage + "% completed");
                            updateProgressBar(percentage);
                            taskListItem.style.textDecoration = "line-through";
                            taskListItem.style.color = "grey";

                        }
                        else {
                            taskCom = taskCom - 1;
                            let percentage = Math.round((taskCom / taskNum) * 100);
                            goalCard.setAttribute("com-tasks", taskCom);
                            goalCard.setAttribute("progress", percentage);
                            console.log(taskCom + " " + percentage + "% completed");
                            updateProgressBar(percentage);
                            taskListItem.style.textDecoration = "none";
                            taskListItem.style.color = "black";
                        }
                        const formData = new FormData();
                        formData.append("cardId", cardId);
                        formData.append("taskNum", taskNum);
                        formData.append("taskCom", taskCom);
                        formData.append("progress", parseInt(goalCard.getAttribute("progress"), 10));
                        fetch('GoalSync/UpdateTaskDetails.php', {
                            method: 'POST',
                            body: formData
                        })
                            .then(response => response.text())
                            .then(data => console.log(data))
                            .catch(error => console.error('Error:', error));

                        const formData2 = new FormData();
                        formData2.append('taskId', parseInt(taskListItem.getAttribute('id'), 10));
                        formData2.append('isCompleted', checkbox.checked ? 'true' : 'false');
                        fetch('GoalSync/UpdateCompleteStatus.php', {
                            method: 'POST',
                            body: formData2
                        })
                            .then(response => response.text())
                            .then(data => {
                                console.log(data);

                            })

                            .catch(error => console.error('Error:', error));
                    };

                    const taskSpan = document.createElement("span");
                    taskSpan.className = "task-text";
                    taskSpan.textContent = taskText;


                    const actionsContainer = document.createElement("div");
                    actionsContainer.className = "actions";

                    const deleteBtn = document.createElement("button");
                    deleteBtn.innerHTML = '<i class="fas fa-trash-alt"></i>';
                    deleteBtn.className = "delete-btn";
                    deleteBtn.onclick = function () {
                        let taskNum = parseInt(goalCard.getAttribute("num-tasks"), 10);
                        let taskCom = parseInt(goalCard.getAttribute("com-tasks"), 10);
                        let cardId = parseInt(goalCard.getAttribute("id"), 10);
                        if (checkbox.checked) {
                            taskNum = taskNum - 1;
                            taskCom = taskCom - 1;
                            let percentage = Math.round((taskCom / taskNum) * 100);
                            goalCard.setAttribute("num-tasks", taskNum);
                            goalCard.setAttribute("com-tasks", taskCom);
                            goalCard.setAttribute("progress", percentage);
                            console.log(taskNum + " " + taskCom + " " + percentage + " % completed");
                            updateProgressBar(percentage);

                        }
                        else {
                            taskNum = taskNum - 1;
                            let percentage = Math.round((taskCom / taskNum) * 100);
                            goalCard.setAttribute("num-tasks", taskNum);
                            goalCard.setAttribute("progress", percentage);
                            console.log(taskNum + " " + taskCom + " " + percentage + " % completed");
                            updateProgressBar(percentage);
                        }
                        taskList.removeChild(taskListItem);
                        const formData = new FormData();
                        formData.append("cardId", cardId);
                        formData.append("taskNum", taskNum);
                        formData.append("taskCom", taskCom);
                        formData.append("progress", parseInt(goalCard.getAttribute("progress"), 10));
                        fetch('GoalSync/UpdateTaskDetails.php', {
                            method: 'POST',
                            body: formData
                        })
                            .then(response => response.text())
                            .then(data => console.log(data))
                            .catch(error => console.error('Error:', error));

                        const formData2 = new FormData();
                        formData2.append('taskId', parseInt(taskListItem.getAttribute('id'), 10));

                        fetch('GoalSync/DeleteTask.php', {
                            method: 'POST',
                            body: formData2
                        })
                            .then(response => response.text())
                            .then(data => {
                                console.log(data);

                            })

                            .catch(error => console.error('Error:', error));



                    };



                    const taskDescriptionBtn = document.createElement("button");
                    taskDescriptionBtn.innerHTML = '<i class="fas fa-caret-down"></i>';
                    taskDescriptionBtn.className = "task-description-btn";
                    taskDescriptionBtn.addEventListener("click", function () {
                        if (event.ctrlKey) {
                            taskDescription.disabled = false;
                            taskDescription.focus();
                        }
                        else {
                            if (taskDescriptionDiv.style.display === "none") {

                                taskDescriptionDiv.style.display = "block";

                            } else {
                                taskDescriptionDiv.style.display = "none";

                            }
                        }
                    });

                    actionsContainer.appendChild(taskDescriptionBtn);
                    actionsContainer.appendChild(deleteBtn);

                    const taskDescriptionDiv = document.createElement("div");
                    taskDescriptionDiv.className = "task-description-div";
                    taskDescriptionDiv.style.display = "block";

                    const taskDescription = document.createElement("textarea");
                    taskDescription.className = "task-description";
                    taskDescription.placeholder = "Enter task description";
                    let isDisabled = false;
                    taskDescription.disabled = isDisabled;

                    taskDescription.addEventListener("keydown", function (event) {
                        if (event.key === "Enter" && !event.shiftKey) {
                            event.preventDefault();
                            isDisabled = true;
                            taskDescription.disabled = isDisabled;
                            const formData2 = new FormData();
                            formData2.append('taskId', parseInt(taskListItem.getAttribute('id'), 10));
                            formData2.append('taskDescription', taskDescription.value);




                            fetch('GoalSync/UpdateDescription.php', {
                                method: 'POST',
                                body: formData2
                            })
                                .then(response => response.text())
                                .then(data => {
                                    console.log(data);

                                })

                                .catch(error => console.error('Error:', error));
                        }
                    });

                    const taskListItemDiv = document.createElement("div");
                    taskListItemDiv.className = "task-list-item-div";
                    taskDescriptionDiv.appendChild(taskDescription);
                    taskListItemDiv.appendChild(checkbox);
                    taskListItemDiv.appendChild(taskSpan);
                    taskListItemDiv.appendChild(actionsContainer);
                    taskListItem.appendChild(taskListItemDiv);
                    taskListItem.appendChild(taskDescriptionDiv);

                    // Append the task list item to the task list container
                    //const taskList = taskContainer.querySelector("ul"); // Select the task list within the taskContainer
                    const taskList = document.createElement("ul");
                    taskList.className = "taskList"; // Create a <ul> element

                    taskList.appendChild(taskListItem);
                    taskContainer.appendChild(taskList);


                    taskNum = taskNum + 1;
                    let percentage = Math.round((taskCom / taskNum) * 100);
                    goalCard.setAttribute("num-tasks", taskNum);
                    goalCard.setAttribute("progress", percentage);

                    console.log(taskNum + " " + percentage + " % completed");
                    updateProgressBar(percentage);

                    const formData = new FormData();
                    formData.append("cardId", cardId);
                    formData.append("taskNum", taskNum);
                    formData.append("taskCom", taskCom);
                    formData.append("progress", percentage);
                    fetch('GoalSync/UpdateTaskDetails.php', {
                        method: 'POST',
                        body: formData
                    })
                        .then(response => response.text())
                        .then(data => console.log(data))
                        .catch(error => console.error('Error:', error));



                    const formData2 = new FormData();
                    formData2.append('cardId', cardId);
                    formData2.append('taskName', taskText);
                    formData2.append('taskDescription', taskDescription.value);
                    formData2.append('isCompleted', checkbox.checked ? 'true' : 'false')
                    fetch('GoalSync/InsertTasks.php', {
                        method: 'POST',
                        body: formData2
                    })
                        .then(response => response.text())
                        .then(data => {
                            console.log(data);
                            const newId = parseInt(data);

                            // Set the ID attribute of the goalcard HTML element
                            taskListItem.setAttribute('id', newId);

                        })

                        .catch(error => console.error('Error:', error));



                }
            }
        }


        function fetchGoals() {
            fetch('GoalSync/FetchGoals.php')
                .then(response => response.json())
                .then(goals => {
                    goals.forEach(goal => {
                        displayGoalCards(
                            goal.goalId,
                            goal.goalTitle,
                            goal.goalDescription,
                            goal.numberOfTasks,
                            goal.completedTasks,
                            goal.progressBarPercentage
                        );

                    });
                })
                .catch(error => console.error('Error fetching goals:', error));

        }


        

        window.addEventListener('mousedown', function (event) {
            const inputContainers = document.querySelectorAll('.task-input');
            inputContainers.forEach(function (container) {
                if (!container.contains(event.target)) {
                    container.remove();
                }
            });

        });
    }
    window.addEventListener('load', initialize);