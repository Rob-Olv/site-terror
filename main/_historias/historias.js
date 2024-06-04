document.addEventListener("DOMContentLoaded", function() {
    const cardData = [
        { title: "Título da História 1", theme: "Aventura", author: "João Silva" },
        { title: "Título da História 2", theme: "Romance", author: "Maria Souza" },
        { title: "Título da História 3", theme: "Ficção Científica", author: "Pedro Oliveira" },
        { title: "Título da História 4", theme: "Mistério", author: "Ana Martins" },
        { title: "Título da História 5", theme: "Fantasia", author: "Lucas Pereira" },
        { title: "Título da História 6", theme: "Histórico", author: "Fernanda Costa" },
        // Adicione mais objetos de dados conforme necessário
    ];

    const itemsPerPage = 3;
    let currentPage = 1;
    const totalPages = Math.ceil(cardData.length / itemsPerPage);

    const tableContent = document.querySelector('.table-content');
    const prevButton = document.getElementById('prevButton');
    const nextButton = document.getElementById('nextButton');

    function renderCards() {
        tableContent.innerHTML = '';
        const startIndex = (currentPage - 1) * itemsPerPage;
        const endIndex = startIndex + itemsPerPage;
        const currentItems = cardData.slice(startIndex, endIndex);

        currentItems.forEach(data => {
            const card = document.createElement('div');
            card.className = 'card';

            const title = document.createElement('h3');
            title.textContent = data.title;
            card.appendChild(title);

            const theme = document.createElement('p');
            theme.innerHTML = `<strong>Tema:</strong> ${data.theme}`;
            card.appendChild(theme);

            const author = document.createElement('p');
            author.innerHTML = `<strong>Autor:</strong> ${data.author}`;
            card.appendChild(author);

            tableContent.appendChild(card);
        });

        prevButton.disabled = currentPage === 1;
        nextButton.disabled = currentPage === totalPages;
    }

    prevButton.addEventListener('click', () => {
        if (currentPage > 1) {
            currentPage--;
            renderCards();
        }
    });

    nextButton.addEventListener('click', () => {
        if (currentPage < totalPages) {
            currentPage++;
            renderCards();
        }
    });

    renderCards();
});