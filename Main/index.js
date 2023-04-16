const menuButton = document.getElementById("menuToggle");
const sideNav = document.querySelector(".side_nav");

menuButton.addEventListener("click", () => {
  sideNav.classList.toggle("open");
});

var button = document.getElementById("classyCatLodgeButton");

button.addEventListener("click", function () {
  window.open(
    "https://vrchat.com/home/world/wrld_8183b4f4-55d5-4572-bb8c-45fd93b32c07",
    "_blank"
  );
});
