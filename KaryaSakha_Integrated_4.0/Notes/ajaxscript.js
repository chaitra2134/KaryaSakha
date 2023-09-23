const modal = document.getElementById('myModal');
    const openModalBtn = document.getElementById('openModalBtn');
    const closeBtn = modal.querySelector('.close');
    const notesContainer = document.getElementById('notesContainer');

    openModalBtn.addEventListener('click', () => {
      console.log("Open modal button clicked!");
      modal.style.display = 'block';
    });

    closeBtn.addEventListener('click', () => {
      modal.style.display = 'none';
    });
    
    window.addEventListener('click', (event) => {
      if (event.target === modal) {
        modal.style.display = 'none';
      }
    });

    modal.style.display = 'none';
      
//     const starBtn = notesContainer.querySelector('.star-btn');
//     starBtn.addEventListener('click', function() {
//       starBtn.classList.toggle('bx-star');
//   starBtn.classList.toggle('bxs-star');
//     });

// Retrieving all notes from database
window.addEventListener('DOMContentLoaded', showNote);


function showNote() {
    let content = document.getElementById("notesContainer");
    content.innerHTML = "";

    const xhr = new XMLHttpRequest();
    xhr.open("GET", "Notes/showNote.php", true);
    xhr.responseType = "json";
    xhr.onload = () => {
        if (xhr.status === 200) {
            // console.log(xhr.response);
            if (xhr.response)
                x = xhr.response;
            else
                x = "";
                console.log("window event loaded");
            for (i = 0; i < x.length; i++) {
                //console.log("window event loaded");
                content.innerHTML +=
                "<div class='note-card'><h3>" + x[i].title + "</h3><p class='note-date'>" + x[i].dateCreated +  console.log(x[i].title) +
                "</p><p>" + x[i].content + "</p><i class='bx bx-star star-btn' data-id=" + x[i].noteId + 
                "></i><i class='bx bx-edit edit-btn' data-id=" + x[i].noteId + 
                "></i><i class='bx bxs-x-square delete-btn' data-id=" + x[i].noteId + "></i></div>"
            }

        }
        else
            console.log("Error Loading Notes!");

        deleteNote();
        favNote();
        editNote();
        //hideNote();
    };
    xhr.send();
};

// Inserting note into database

document.getElementById("displaybtn").addEventListener("click", addNote);
function addNote(e) {
    e.preventDefault();
    
    console.log("AddNote Button Clicked");
    let title = document.getElementById("title").value;
    let content = document.getElementById("content").value;
    console.log(title);
    console.log(content);

    if(title.value == "" || content.value == "")
        alert("Please fill the required fields");
    else
    {
        
        //Creating XHR object
            const xhr = new XMLHttpRequest();
            xhr.open("POST","Notes/addNote.php", true);
            xhr.setRequestHeader("Content-Type", "application/json");

            xhr.onload = () => {
                if (xhr.status === 200) {
                    showNote();
                    document.getElementById("alertBox").innerHTML = "<div class='alert alert-dark mt-3' role='alert'>" + xhr.responseText + "</div>";
                    clearForm();
                    //modal.style.display = 'none';

                    clearModal();
                }
                else
                    console.log("Error Adding Note!");

            };

        // function to clear fields
        function clearForm()
        {
            const myForm = document.getElementById("myForm");
            myForm.reset();
            console.log("Form Cleared");
        }

        function clearModal()
        {
            const modal = document.getElementById("myModal");
            const myForm = modal.querySelector("#myForm");

            myForm.reset();
            modal.style.display = "none";
            console.log("Modal cleared");
        }

        const data = { title: title, content: content };
        console.log(data);

        const jdata = JSON.stringify(data);
        console.log(jdata);

        xhr.send(jdata);
    }
    
}


// Deleting a note
function deleteNote() {
    var x = document.getElementsByClassName("delete-btn");
    // console.log(x);
    // console.log(x.length);

    for (let i = 0; i < x.length; i++) 
    {
        console.log(x[i].getAttribute("data-id"));
        x[i].addEventListener("click", function () 
        {
            if(confirm("Do you really want to delete this note?"))
            {
                id = x[i].getAttribute("data-id");
                console.log("Delete Button Clicked", id);
                const xhr = new XMLHttpRequest();
                xhr.open("POST", "Notes/deleteNote.php", true);
                xhr.setRequestHeader("Content-Type", "application/json");
                xhr.onload = () =>
                {
                    if(xhr.status === 200)
                    {
                        document.getElementById("alertBox").innerHTML = "<div class='alert alert-dark mt-3' role='alert'>" + xhr.responseText + "</div>";
                        showNote();           
                    }
                    else
                        console.log("Error Deleting Note!");
                }
    
                const data = { noteId : id };
                // console.log(data);
    
                const jdata = JSON.stringify(data);
                // console.log(jdata);
    
                xhr.send(jdata);
            }
           
        });
    }
}

// Favorite Note
function favNote() {
    var x = document.getElementsByClassName("star-btn");
    for (let i = 0; i < x.length; i++) 
    {
        console.log(x[i].getAttribute("data-id"));
        x[i].addEventListener("click", function () 
        {
            if(confirm("Add Note To Favorites?"))
            {
                id = x[i].getAttribute("data-id");
            console.log("Favorite Button Clicked", id);
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "Notes/favNote.php", true);
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.onload = () =>
            {
                if(xhr.status === 200)
                {
                    //console.log("hello");
                    document.getElementById("alertBox").innerHTML = "<div class='alert alert-dark mt-3' role='alert'>" + xhr.responseText + "</div>";
                    showNote();           
                }
                else
                    console.log("Error Adding Note To Favorites!");
            }

            const data = { noteId : id };
            // console.log(data);

            const jdata = JSON.stringify(data);
            // console.log(jdata);

            xhr.send(jdata);

            }
            
        });
    }
}

// Hiding Note
function hideNote() {
    var x = document.getElementsByClassName("fa-lock");
    // console.log(x);
    // console.log(x.length);

    for (let i = 0; i < x.length; i++) 
    {
        console.log(x[i].getAttribute("data-id"));
        x[i].addEventListener("click", function () 
        {
            id = x[i].getAttribute("data-id");
            console.log("Lock Button Clicked", id);
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "hideNote.php", true);
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.onload = () =>
            {
                if(xhr.status === 200)
                {
                    //console.log("hello");
                    document.getElementById("alertBox").innerHTML = "<div class='alert alert-dark mt-3' role='alert'>" + xhr.responseText + "</div>";
                    showNote();           
                }
                else
                    console.log("Error Hiding Note!");
            }

            const data = { noteId : id };
            // console.log(data);

            const jdata = JSON.stringify(data);
            // console.log(jdata);

            xhr.send(jdata);
        });
    }
}




// Editing a note
function editNote() {
    var x = document.getElementsByClassName("edit-btn");
    // console.log(x);
    console.log(x.length);
    const modal = document.getElementById('myModal');
    const closeBtn = modal.querySelector('.close');
    for (let i = 0; i < x.length; i++) 
    {
        console.log(x[i].getAttribute("data-id"));
        x[i].addEventListener("click", function () 
        {
            id = x[i].getAttribute("data-id");
            console.log("Edit Button Clicked", id);

            modal.style.display = 'block';

            const xhr = new XMLHttpRequest();
            xhr.open("POST", "Notes/editNote.php", true);
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.onload = () =>
            {
                if(xhr.status === 200)
                {
                    if (xhr.response)
                        x = JSON.parse(xhr.responseText);
                    else
                        x = "";
                       
                    let title = x[0].title;
                    let content = x[0].content;
                    document.querySelector('#title').value = title;
                    document.querySelector('#content').value = content;
                    document.getElementById("alertBox").innerHTML = "<div class='alert alert-dark mt-3' role='alert'>" + xhr.responseText + "</div>";
                    console.log(title);
                    console.log(content);
                    showNote();
                }
                else
                    console.log("Error Editing Note!"); 
            }

            const data = { noteId : id };
            // console.log(data);

            const jdata = JSON.stringify(data);
            // console.log(jdata);

            xhr.send(jdata);

            closeBtn.addEventListener('click', () => {
                modal.style.display = 'none';
            });
              
            window.addEventListener('click', (event) => {
                if (event.target === modal) {
                  modal.style.display = 'none';
                }
            });

        });
    };
};