document.getElementById("reservationForm").addEventListener("submit", function(event) {
  event.preventDefault();
  
  const name = document.getElementById("name").value;
  const email = document.getElementById("email").value;
  const date = document.getElementById("date").value;
  const time = document.getElementById("time").value;
  const comments = document.getElementById("comments").value;
  
  const reservationStatus = document.getElementById("reservationStatus");
  reservationStatus.textContent = `Thank you, ${name}! Your reservation for ${date} at ${time} has been confirmed. We will contact you at ${email}.`;
  document.getElementById("reservationForm").reset();
});