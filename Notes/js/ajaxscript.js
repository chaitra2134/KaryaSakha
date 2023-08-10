// Retrieving all notes from database
let content = document.getElementById("content");
function showNote() {
    content.innerHTML = "";
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "showNote.php", true);
    xhr.responseType = "json";
    xhr.onload = () => {
        if (xhr.status === 200) {
            // console.log(xhr.response);
            if (xhr.response)
                x = xhr.response;
            else
                x = "";

            for (i = 0; i < x.length; i++) {
                content.innerHTML +=
                    "<div class='card-body'> <h5 class='card-title'>" + x[i].title +
                    "</h5> <h6 class='card-subtitle mb-2 text-body-secondary'>" + x[i].dateCreated +
                    "</h6> <p class='card-text'>" + x[i].content +
                    "</p> <button class='btn btn-primary btn-sm btn-edit' data-id=" + x[i].noteId +
                    "> Edit </button> <button class='btn btn-danger btn-sm btn-del' data-id=" + x[i].noteId + 
                    "> Delete </button> <button style='font-size:24px; color:grey'><i class='fa fa-heart' data-id=" + x[i].noteId + 
                    "></i></button> <button style='font-size:24px; color:grey'><i class='fa fa-lock' data-id=" + x[i].noteId + 
                    "></i></button></div>";
            }

        }
        else
            console.log("Error Loading Notes!");

        deleteNote();
        favNote();
        hideNote();
        showFavNote();
    };
    xhr.send();
}
showNote();

// Retrieving favorite notes from database
let favourites = document.getElementById("favourites");
function showFavNote() {
    favourites.innerHTML = "";
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "showNote.php", true);
    xhr.responseType = "json";
    xhr.onload = () => {
        if (xhr.status === 200) {
            // console.log(xhr.response);
            if (xhr.response)
                x = xhr.response;
            else
                x = "";

            for (i = 0; i < x.length; i++) {
                favourites.innerHTML +=
                    "<div class='card-body'> <h5 class='card-title'>" + x[i].title +
                    "</h5> <h6 class='card-subtitle mb-2 text-body-secondary'>" + x[i].dateCreated +
                    "</h6> <p class='card-text'>" + x[i].content +
                    "</p> <button class='btn btn-primary btn-sm btn-edit' data-id=" + x[i].noteId +
                    "> Edit </button> <button class='btn btn-danger btn-sm btn-del' data-id=" + x[i].noteId + 
                    "> Delete </button> <button style='font-size:24px; color:grey'><i class='fa fa-heart' data-id=" + x[i].noteId + 
                    "></i></button> <button style='font-size:24px; color:grey'><i class='fa fa-lock' data-id=" + x[i].noteId + 
                    "></i></button></div>";
            }

        }
        else
            console.log("Error Loading Notes!");

        deleteNote();
        favNote();
        hideNote();

    };
    xhr.send();
}
showFavNote();

// Inserting note into database

document.getElementById("addNote").addEventListener("click", addNote);
function addNote(e) {
    e.preventDefault();
    console.log("AddNote Button Clicked");
    let title = document.getElementById("title").value;
    let description = document.getElementById("description").value;
    console.log(title);
    console.log(description);

    //Creating XHR object
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "addNote.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");

    xhr.onload = () => {
        if (xhr.status === 200) {
            document.getElementById("alertBox").innerHTML = "<div class='alert alert-dark mt-3' role='alert'>" + xhr.responseText + "</div>";
            document.getElementById("addForm").reset();
            showNote();
            //console.log(xhr.responseText);
        }
        else
            console.log("Error Adding Note!");

    };

    const data = { title: title, description: description };
    console.log(data);

    const jdata = JSON.stringify(data);
    console.log(jdata);

    xhr.send(jdata);
}

// Deleting a note
function deleteNote() {
    var x = document.getElementsByClassName("btn-del");
    // console.log(x);
    // console.log(x.length);

    for (let i = 0; i < x.length; i++) 
    {
        console.log(x[i].getAttribute("data-id"));
        x[i].addEventListener("click", function () 
        {
            id = x[i].getAttribute("data-id");
            console.log("Delete Button Clicked", id);
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "deleteNote.php", true);
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
        });
    }
}

// Favorite Note

function favNote() {
    var x = document.getElementsByClassName("fa-heart");
    // console.log(x);
    // console.log(x.length);

    for (let i = 0; i < x.length; i++) 
    {
        console.log(x[i].getAttribute("data-id"));
        x[i].addEventListener("click", function () 
        {
            id = x[i].getAttribute("data-id");
            console.log("Favorite Button Clicked", id);
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "favNote.php", true);
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