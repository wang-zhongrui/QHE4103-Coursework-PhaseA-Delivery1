function checkAddCarForm() {
    var colour = document.getElementById("colour").value.trim();
    var model = document.getElementById("model").value.trim();
    var year = document.getElementById("year").value.trim();
    var location = document.getElementById("location").value.trim();
    var price = document.getElementById("price").value.trim();

    var yearPattern = /^(19|20)\d{2}$/;
    var pricePattern = /^\d+$/;

    if (colour === "") {
        alert("Colour cannot be empty.");
        return false;
    }

    if (model === "") {
        alert("Model cannot be empty.");
        return false;
    }

    if (year === "") {
        alert("Year cannot be empty.");
        return false;
    }

    if (!yearPattern.test(year)) {
        alert("Please enter a valid year.");
        return false;
    }

    if (location === "") {
        alert("Location cannot be empty.");
        return false;
    }

    if (price === "") {
        alert("Price cannot be empty.");
        return false;
    }

    if (!pricePattern.test(price)) {
        alert("Please enter a valid price.");
        return false;
    }

    return true;
}