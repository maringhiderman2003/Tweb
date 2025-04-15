// =========================
// Căutare în categorii
// =========================
document.querySelector('.search-box button')?.addEventListener('click', function () {
    const input = document.querySelector('.search-box input').value.toLowerCase();
    const categories = document.querySelectorAll('.category');

    categories.forEach(cat => {
        const text = cat.textContent.toLowerCase();
        if (text.includes(input)) {
            cat.style.display = "block";
        } else {
            cat.style.display = "none";
        }
    });
});

// =========================
// Scroll to top button
// =========================
const scrollButton = document.createElement('button');
scrollButton.textContent = '↑';
scrollButton.style.position = 'fixed';
scrollButton.style.bottom = '20px';
scrollButton.style.right = '20px';
scrollButton.style.padding = '10px';
scrollButton.style.border = 'none';
scrollButton.style.borderRadius = '50%';
scrollButton.style.backgroundColor = '#FFD700';
scrollButton.style.color = 'black';
scrollButton.style.cursor = 'pointer';
scrollButton.style.display = 'none';

document.body.appendChild(scrollButton);

window.addEventListener('scroll', function () {
    if (window.scrollY > 300) {
        scrollButton.style.display = 'block';
    } else {
        scrollButton.style.display = 'none';
    }
});

scrollButton.addEventListener('click', function () {
    window.scrollTo({ top: 0, behavior: 'smooth' });
});

// =========================
// Carusel de carduri
// =========================
const cardsContainer = document.querySelector('.cards-container');
const prevButton = document.querySelector('.prev-button');
const nextButton = document.querySelector('.next-button');

if (cardsContainer && prevButton && nextButton) {
    prevButton.addEventListener('click', () => {
        cardsContainer.scrollBy({ left: -300, behavior: 'smooth' });
    });

    nextButton.addEventListener('click', () => {
        cardsContainer.scrollBy({ left: 300, behavior: 'smooth' });
    });
}

// =========================
// Efect de fade-in pentru știri la scroll
// =========================
const newsItems = document.querySelectorAll('.news-item');

if (newsItems.length > 0) {
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target); // O singură dată
            }
        });
    }, {
        threshold: 0.1
    });

    newsItems.forEach(item => {
        observer.observe(item);
    });
}
