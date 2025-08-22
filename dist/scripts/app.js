document.addEventListener("DOMContentLoaded", function () {
  const burger = document.querySelector(".burger");
  const nav = document.querySelector(".site-header");
  const body = document.body;

  if (!burger || !nav) return;

  const navLinks = nav.querySelectorAll("a");

  burger.addEventListener("click", function () {
    nav.classList.toggle("open");
    body.classList.toggle("no-scroll");
  });

  navLinks.forEach(function (link) {
    link.addEventListener("click", function () {
      nav.classList.remove("open");
      body.classList.remove("no-scroll");
    });
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const pagination = document.querySelector(".pag-proj");
  const slider = document.querySelector(".proj__content");
  if (!pagination || !slider) return;

  const paginations = pagination.querySelectorAll("span");
  const cardWidth = 357;
  const gap = 34;
  const cardsPerPage = 4;
  const offsetPerPage = cardsPerPage * cardWidth + (cardsPerPage - 1) * gap;

  paginations.forEach((element, index) => {
    element.addEventListener("click", () => {
      paginations.forEach((el) => el.classList.remove("active"));
      element.classList.add("active");

      slider.style.transform = `translateX(-${index * offsetPerPage}px)`;
    });
  });
});
