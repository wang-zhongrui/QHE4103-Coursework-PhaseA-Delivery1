const addCarForm = document.getElementById("addCarForm");
const message = document.getElementById("message");

addCarForm.addEventListener("submit", function (event) {
  event.preventDefault();

  const colour = document.getElementById("colour").value.trim();
  const model = document.getElementById("model").value.trim();
  const year = document.getElementById("year").value.trim();
  const location = document.getElementById("location").value.trim();
  const price = document.getElementById("price").value.trim();

  const yearPattern = /^(19|20)\d{2}$/;
  const pricePattern = /^\d+$/;

  if (
    colour === "" ||
    model === "" ||
    year === "" ||
    location === "" ||
    price === ""
  ) {
    message.textContent = "Please fill in all fields.";
    message.style.color = "red";
    return;
  }

  if (!yearPattern.test(year)) {
    message.textContent = "Please enter a valid year.";
    message.style.color = "red";
    return;
  }

  if (!pricePattern.test(price)) {
    message.textContent = "Please enter a valid price.";
    message.style.color = "red";
    return;
  }

  message.textContent = "Car information submitted successfully.";
  message.style.color = "#d7b37c";
});