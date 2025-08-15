// header

document.addEventListener("DOMContentLoaded", function () {
  const burger = document.querySelector(".burger");
  const nav = document.querySelector(".main-nav");

  burger.addEventListener("click", function () {
    nav.classList.toggle("active");
  });
});
