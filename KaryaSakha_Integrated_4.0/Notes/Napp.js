


// notes page js 
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