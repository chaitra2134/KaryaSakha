/*
    Author: Chinmayee
    Date: 21/09/23
*/

// Retrieving all bookmarks from database
window.addEventListener('DOMContentLoaded', showBookmarks);


function showBookmarks() {
    const bookmarkContainer = document.querySelector('.bookmark-card');
    //let bookmarkCard = document.getElementById("bookmark-card");
    bookmarkContainer.innerHTML = "";

    const xhr = new XMLHttpRequest();
    xhr.open("GET", "showBookmarks.php", true);
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
                bookmarkContainer.innerHTML +=
                "<div class='linkcard' id='bookmarkCard'><span class='material-symbols-outlined remove' data-id= " + x[i].bookmarkId + 
                " >close</span><div class='cover-card'><div class='content'><a href=" + x[i].link + 
                "><h3> " + x[i].title + 
                " </h3></a><p> " + x[i].content + 
                " </p><a href= " + x[i].link + 
                "></a></div></div></div>"

            }
        }
        else
            console.log("Error Loading Bookmarks!");

        deleteBookmark();
    };
    xhr.send();
};



// Inserting bookmark into database
document.getElementById("addlink").addEventListener("click", addBookmark);
async function addBookmark(e) {
    e.preventDefault();
    
    console.log("AddBookmark Button Clicked");
    let link = document.getElementById("link").value;
    console.log(link);

    if(link.value == "")
        alert("Please add a link before submitting!");
    else
    {
        //Creating XHR object
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "addBookmark.php", true);
            xhr.setRequestHeader("Content-Type", "application/json");

            xhr.onload = () => {
                if (xhr.status === 200) {
                    showBookmarks();
                    document.getElementById("alertBox").innerHTML = "<div class='alert alert-dark mt-3' role='alert'>" + xhr.responseText + "</div>";
                }
                else
                    console.log("Error Adding Bookmark!");

            };

        try
        {
            const url = await fetch(`https://api.linkpreview.net/?key=${API_KEY}&q=${encodeURIComponent(link)}`);
            console.log(url);
            let data = await url.json();
            //let data = url;
            console.log(data);

            data =
            {
                title : data.title,
                content : data.description,
                //image : data.image,
                link : data.url
            };
            console.log(data);
            const jdata = JSON.stringify(data);
            console.log(jdata);

            xhr.send(jdata);
        }    
        catch (error) {
            console.error("Error fetching link:", error);
        }
    }
    
}


// Deleting a bookmark
function deleteBookmark() {
    var x = document.getElementsByClassName("remove");
    // console.log(x);
    // console.log(x.length);

    for (let i = 0; i < x.length; i++) 
    {
        console.log(x[i].getAttribute("data-id"));
        x[i].addEventListener("click", function () 
        {
            if(confirm("Do you really want to delete this Bookmark?"))
            {
                id = x[i].getAttribute("data-id");
                console.log("Delete Button Clicked", id);
                const xhr = new XMLHttpRequest();
                xhr.open("POST", "deleteBookmark.php", true);
                xhr.setRequestHeader("Content-Type", "application/json");
                xhr.onload = () =>
                {
                    if(xhr.status === 200)
                    {
                        document.getElementById("alertBox").innerHTML = "<div class='alert alert-dark mt-3' role='alert'>" + xhr.responseText + "</div>";
                        showBookmarks();           
                    }
                    else
                        console.log("Error Deleting Bookmark!");
                }
    
                const data = { bookmarkId : id };
                // console.log(data);
    
                const jdata = JSON.stringify(data);
                // console.log(jdata);
    
                xhr.send(jdata);
            }
           
        });
    }
}
