const addCarForm = document.getElementById("addCarForm");
const message = document.getElementById("message");

addCarForm.addEventListener("submit", function (event) {
  event.preventDefault();

  const colour = document.getElementById("colour").value.trim();
  const model = document.getElementById("model").value.trim();
  const year = document.getElementById("year").value.trim();
  const location = document.getElementById("location").value.trim();
  const price = document.getElementById("price").value.trim();

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

  message.textContent = "Form submitted successfully.";
  message.style.color = "#d7b37c";
});