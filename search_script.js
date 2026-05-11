const modalOverlay = document.getElementById('modalOverlay');
const closeModal = document.getElementById('closeModal');
const modalContent = document.getElementById('modalContent')

//display all cars when users get into the website
window.onload = async function() {
    try {
        const response = await fetch('search_results.php');
        if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);
        const cars = await response.json();
        displayCars(cars);
    } catch (error) {
        console.error('Initial load error:', error);
        document.getElementById('results').innerHTML = '<div class="no-data">Failed to load cars.</div>';
    }
};

function searchCars(event) {
    if (event) event.preventDefault();

    const modelInput = document.getElementById('ml').value.trim();
    const yearInput = document.getElementById('yr').value.trim();

    const params = new URLSearchParams();
    if (modelInput) params.append('model', modelInput);
    if (yearInput) params.append('year', yearInput);

    fetch(`search_results.php?${params.toString()}`)
        .then(response => response.json())
        .then(cars => {
            displayCars(cars);
        })
        .catch(error => {
            console.error('Error fetching cars:', error);
        });
}

//display the cars
function displayCars(cars) {
    const resultContainer = document.getElementById('results');
    resultContainer.innerHTML = ''; //clean the window

    if (cars.length === 0) {
        resultContainer.innerHTML = '<div class="no-data">No matching car was found.</div>';
        return;
    }

    //create cards for cars
    cars.forEach(car => {
        const card = document.createElement('div');
        card.className = 'page-link-card';
        card.innerHTML = `
            <img src="${car.image}" alt="${car.model}" onerror="this.src='homepage_image/logo.png'">
            <div>
                <div class="car-model">${car.model}</div>
                <div class="car-year">Colour: ${car.colour}</div>
                <div class="car-year">Year: ${car.year}</div>
                <div class="car-year">Location: ${car.location}</div>
                <div class="car-year">Price: ${car.price} CNY</div>
            </div>
        `;
        card.addEventListener('click', () => {
            showCarDetails(car);
        });
        resultContainer.appendChild(card);
    });
}

function closeModalFunc() {
    modalOverlay.style.display = 'none';
}

closeModal.addEventListener('click', closeModalFunc);
modalOverlay.addEventListener('click', (e) => {
    if (e.target === modalOverlay) {
        closeModalFunc();
    }
});

function showCarDetails(car) {
    modalContent.innerHTML = `
        <div class="modal-image">
            <img src="${car.image}" alt="${car.model}" onerror="this.src='homepage_image/logo.png'">
        </div>
        <div class="modal-info">
            <h3>${car.model}</h3>
            <p>Colour: <span>${car.colour}</span></p>
            <p>Year: <span>${car.year}</span></p>
            <p>Location: <span>${car.location}</span></p>
            <p>Price: <span>${car.price} CNY</span></p>
        </div>
    `;
    
    modalOverlay.style.display = 'flex';
}