const categories = document.querySelectorAll('.cat-card');
  const cardContainer = document.getElementById('card-container');
  let blogData = []; 

  
  fetch('Blogs/blog-data.json')
    .then((response) => response.json())
    .then((data) => {
      blogData = [...data];
    })
    .catch((error) => {
      console.error('Error loading blog data:', error);
    });

  categories.forEach((category) => {
    category.addEventListener('click', () => {
      const categoryName = category.getAttribute('data-category');
      displayBlogCards(categoryName);
    });
  });

  function displayBlogCards(categoryName) {
    
    const categoryCards = blogData
      .filter((blog) => blog.category === categoryName)
      .map((blog) => createBlogCard(blog));

    
    cardContainer.innerHTML = '';

    
    categoryCards.forEach((card, index) => {
      setTimeout(() => {
        card.classList.add('card-show');
      }, index * 200);
      cardContainer.appendChild(card);
    });
    cardContainer.scrollIntoView({ behavior: 'smooth' });
  }

  function createBlogCard(blog) {
    const card = document.createElement('div');
    card.className = 'card';
    card.innerHTML = `
      <a href="${blog.url}" target="_blank">
        <img src="${blog.img}" alt="${blog.title}">
        <h2>${blog.title}</h2>
      </a>
    `;

    return card;
  }