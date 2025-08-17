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
