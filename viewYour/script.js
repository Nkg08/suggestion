const menuIcon = document.getElementById("menu-icon");
const navLinks = document.getElementById("nav-links");
const sidebar = document.querySelector(".sidebar");

menuIcon.addEventListener("click", () => {
    navLinks.classList.toggle("show");
    sidebar.classList.toggle("active");
});
function toggleMenu() {
    const links = document.querySelector('.links');
    links.classList.toggle('show');
  }
  
  document.getElementById("suggestion-form").addEventListener("submit", function (event) {
    event.preventDefault();

    // You can implement the form submission logic here, such as sending the data to a server.
    // For this example, we'll just log the form data to the console.
    const formData = new FormData(event.target);
    for (let pair of formData.entries()) {
        console.log(pair[0] + ": " + pair[1]);
    }

    // Clear the form fields after submission
    event.target.reset();
});
