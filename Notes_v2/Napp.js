// const sidebar = document.querySelector(".sidebar");
// const sidebarOpen = document.querySelector("#sidebarOpen");
// const sidebarClose = document.querySelector(".collapse_sidebar");
// const sidebarExpand = document.querySelector(".expand_sidebar");

// Function to close the sidebar
// function closeSidebar() {
//   sidebar.classList.add("close");
// }

// // Function to expand the sidebar
// function expandSidebar() {
//   sidebar.classList.remove("close");
// }

// sidebarOpen.addEventListener("click", () => sidebar.classList.toggle("close"));
// sidebarClose.addEventListener("click", closeSidebar);
// sidebarExpand.addEventListener("click", expandSidebar);

// // Function to check and update sidebar state based on window width
// function checkSidebarState() {
//   if (window.innerWidth <= 360) {
//     closeSidebar();
//   } else {
//     expandSidebar();
//   }
// }

// // Initial check based on window width
// checkSidebarState();

// // Handle window resize to adjust sidebar state
// window.addEventListener("resize", checkSidebarState);


// sidebar.addEventListener("mouseenter", () => {
//     if (sidebar.classList.contains("hoverable")) {
//       expandSidebar();
//     }
//   });
  
//   sidebar.addEventListener("mouseleave", () => {
//     if (sidebar.classList.contains("hoverable")) {
//       closeSidebar();
//     }
//   });
  
//   darkLight.addEventListener("click", () => {
//     body.classList.toggle("dark");
//     if (body.classList.contains("dark")) {
//       // Assuming you have the required code to replace the icon classes
//       darkLight.classList.replace("bx-sun", "bx-moon");
//     } else {
//       darkLight.classList.replace("bx-moon", "bx-sun");
//     }
//   });
  
//   submenuItems.forEach((item, index) => {
//     item.addEventListener("click", () => {
//       item.classList.toggle("show_submenu");
//       submenuItems.forEach((item2, index2) => {
//         if (index !== index2) {
//           item2.classList.remove("show_submenu");
//         }
//       });
//     });
//   });

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

// notes page js 
const modal = document.getElementById('myModal');
    const openModalBtn = document.getElementById('openModalBtn');
    const closeBtn = modal.querySelector('.close');
    const notesContainer = document.getElementById('notesContainer');

    openModalBtn.addEventListener('click', () => {
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

    /*
    const displaybtn = document.getElementById('displaybtn');
    const titleInput = document.getElementById('title');
    const contentInput = document.getElementById('content');

    displaybtn.addEventListener('click', (event) => {
      event.preventDefault(); 
      const titleValue = titleInput.value;
      const contentValue = contentInput.value;

      if (titleValue && contentValue) { 
        const noteCard = document.createElement('div');
        noteCard.classList.add('note-card');

        const currentDate = new Date();
        const day = currentDate.getDate();
        const month = currentDate.getMonth() + 1;
        const year = currentDate.getFullYear();
   
        const formattedDate = `${day < 10 ? '0' : ''}${day}-${month < 10 ? '0' : ''}${month}-${year}`;
       
        noteCard.innerHTML = `
        <h3>${titleValue}</h3>
        <p class="note-date">${formattedDate}</p>
          <p>${contentValue}</p>
          <i class="bx bx-star star-btn"></i>
          <i class="bx bxs-x-square delete-btn"></i>
     
          
        `;

        notesContainer.appendChild(noteCard);

        */
        //titleInput.value = '';
        //contentInput.value = '';
        modal.style.display = 'none';
      
        const starBtn = notesContainer.querySelector('.star-btn');
        starBtn.addEventListener('click', function() {
          starBtn.classList.toggle('bx-star');
      starBtn.classList.toggle('bxs-star');
        });
      //}
  

//});
   

  /*
    notesContainer.addEventListener('click', (event) => {
      const target = event.target;
      if (target.classList.contains('star-btn')) {
       
      } else if (target.classList.contains('delete-btn')) {
        
        target.closest('.note-card').remove();
      }
    }); */