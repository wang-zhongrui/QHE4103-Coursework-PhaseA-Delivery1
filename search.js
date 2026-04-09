let allcars = [];

//load cars data from json
window.onload = async function() {
    try {
        const response = await fetch('cars.json');
        allcars = await response.json();
        //display all cars when users get into the website
        displayCars(allcars);
    } catch (error) {
        console.error('Failed to load data from json:', error);
    }
};

//function to search cars from input information(model,year)
function searchCars() {
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
        card.className = 'car-card';
        card.innerHTML = `
            <img src="${car.image}" alt="${car.model}" onerror="this.src='car_images/default.jpg'">
            <div class="car-info">
                <div class="car-model">Colour: ${car.colour}</div>
                <div class="car-model">Model: ${car.model}</div>
                <div class="car-year">Year: ${car.year}</div>
                <div class="car-year">Location: ${car.location}</div>
                <div class="car-year">Price: ${car.price}</div>
            </div>
        `;
        resultContainer.appendChild(card);
    });
}