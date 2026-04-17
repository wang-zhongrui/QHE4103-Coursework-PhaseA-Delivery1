const modalOverlay = document.getElementById('modalOverlay');
const closeModal = document.getElementById('closeModal');
const modalContent = document.getElementById('modalContent')

//display all cars when users get into the website
window.onload = async function() {
        displayCars(allcars);
};

//function to search cars from input information(model,year)
function searchCars(event) {
    if (event) event.preventDefault();

    //get element and turn them to lowercase and delete spaces
    const modelInput = document.getElementById('ml').value.trim().toLowerCase();
    const yearInput = document.getElementById('yr').value.trim();

    //filter cars
    const filtered = allcars.filter(car => {
        const carModel = car.model.toLowerCase();
        const carYear = car.year.toString();
                
        //model input is empty or a part of the real model
        const matchModel = modelInput === '' || carModel.includes(modelInput);
        //year input is empty or exactly equals the real year
        const matchYear = yearInput === '' || carYear === yearInput;
                
        return matchModel && matchYear;
    });

    //show the results
    displayCars(filtered);
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
            <img src="${car.image}" alt="${car.model}" onerror="this.src='car_image/default.jpg'">
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
            <img src="${car.image}" alt="${car.model}" onerror="this.src='car_image/default.jpg'">
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