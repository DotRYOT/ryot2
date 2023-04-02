const menuButton = document.getElementById("menuToggle");
const sideNav = document.querySelector(".side_nav");

menuButton.addEventListener("click", () => {
  sideNav.classList.toggle("open");
});
