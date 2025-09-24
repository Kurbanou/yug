// nav
document.addEventListener("DOMContentLoaded", function () {
  const burger = document.querySelector(".burger");
  const nav = document.querySelector(".site-header");
  const body = document.body;
  const navLinks = document.querySelectorAll(".main-nav__link");
  const sections = document.querySelectorAll("section[id]");

  if (!burger || !nav) return;

  // Бургер-меню
  burger.addEventListener("click", function () {
    nav.classList.toggle("open");
    body.classList.toggle("no-scroll");
  });

  // Клик по ссылке
  navLinks.forEach((link) => {
    link.addEventListener("click", function () {
      nav.classList.remove("open");
      body.classList.remove("no-scroll");

      const target = this.dataset.target;
      const isAnchor = target && target.startsWith("#");
      const section = isAnchor ? document.querySelector(target) : null;

      if (!section) {
        // Внешняя ссылка — просто выделяем
        navLinks.forEach((l) => l.classList.remove("is-active"));
        this.classList.add("is-active");
      }
    });
  });

  // Скролл — активный якорь
  function activateMenuItem() {
    let scrollY = window.pageYOffset;

    sections.forEach((section) => {
      const sectionTop = section.offsetTop - 100;
      const sectionHeight = section.offsetHeight;
      const sectionId = section.getAttribute("id");

      if (scrollY >= sectionTop && scrollY < sectionTop + sectionHeight) {
        navLinks.forEach((link) => {
          link.classList.remove("is-active");
          if (link.dataset.target === `#${sectionId}`) {
            link.classList.add("is-active");
          }
        });
      }
    });
  }

  window.addEventListener("scroll", activateMenuItem);

  // Автоактивация по URL при загрузке
  const currentUrl = window.location.href.replace(/\/$/, "").split("#")[0];

  navLinks.forEach((link) => {
    const linkHref = link.href.replace(/\/$/, "").split("#")[0];

    if (currentUrl === linkHref) {
      link.classList.add("is-active");
    }
  });
});

// **************
// gallery
document.addEventListener("DOMContentLoaded", function () {
  const slider = document.querySelector(".gallery-sec__content");
  const rightBtn = document.querySelector(".right");
  const leftBtn = document.querySelector(".left");

  if (!slider || !rightBtn || !leftBtn) return;

  let currentOffset = 0;
  const step = window.innerWidth + 24;

  function getSliderWidth() {
    return slider.scrollWidth;
  }

  function updateTransform() {
    slider.style.transform = `translateX(-${currentOffset}px)`;
    slider.style.transition = "transform 0.3s ease";
  }

  rightBtn.addEventListener("click", () => {
    const maxOffset = getSliderWidth() - window.innerWidth;
    currentOffset += step;
    if (currentOffset > maxOffset) currentOffset = maxOffset;
    updateTransform();
  });

  leftBtn.addEventListener("click", () => {
    currentOffset -= step;
    if (currentOffset < 0) currentOffset = 0;
    updateTransform();
  });

  window.addEventListener("resize", () => {
    const maxOffset = getSliderWidth() - window.innerWidth;
    if (currentOffset > maxOffset) {
      currentOffset = maxOffset;
      updateTransform();
    }
  });
});

// map
async function initMap() {
  const maps = document.querySelectorAll(".map");
  if (!maps) return;

  const { Map, InfoWindow } = await google.maps.importLibrary("maps");
  const { LatLngBounds } = await google.maps.importLibrary("core");
  const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");

  // const maps = document.querySelectorAll(".map");

  maps.forEach((mapElement) => {
    const markerElements = mapElement.querySelectorAll(".marker");

    const map = new Map(mapElement, {
      zoom: 16,
      center: { lat: 0, lng: 0 },
      mapTypeId: "terrain",
      mapId: "8e0a97af9386fef", // ← обязательно для AdvancedMarkerElement
      scrollwheel: false,
      zoomControl: false,
      streetViewControl: false,
    });

    const bounds = new LatLngBounds();

    markerElements.forEach((el) => {
      const lat = parseFloat(el.dataset.lat);
      const lng = parseFloat(el.dataset.lng);
      const position = { lat, lng };

      const iconUrl = document.body.classList.contains("theme--green")
        ? "/wp-content/themes/potaga/dist/images/pin-green.png"
        : "/wp-content/themes/potaga/dist/images/pin.png";

      const img = document.createElement("img");
      img.src = iconUrl;
      img.style.width = "16vw";
      img.style.minWidth = "160px";

      const marker = new AdvancedMarkerElement({
        map,
        position,
        title: el.textContent.trim(),
        content: img,
      });

      bounds.extend(position);

      if (el.innerHTML.trim()) {
        const infoWindow = new InfoWindow({ content: el.innerHTML });
        marker.addListener("click", () => infoWindow.open(map, marker));
      }
    });

    if (markerElements.length === 1) {
      map.setCenter(bounds.getCenter());
      map.setZoom(16);
    } else {
      map.fitBounds(bounds);
    }
  });
}

initMap();

// аккардеон
document.addEventListener("DOMContentLoaded", function () {
  const accordions = document.querySelectorAll(".accordion");
  if (!accordions) return;

  accordions.forEach((accordion) => {
    accordion.addEventListener("click", function () {
      accordion.classList.toggle("open");
      accordions.forEach((other) => {
        if (other !== accordion) {
          other.removeAttribute("open");
          other.classList.remove("open");
        }
      });
    });
  });
});

// img lightbox
document.addEventListener("DOMContentLoaded", function () {
  const lightboxItems = document.querySelectorAll("[data-lightbox]");
  if (!lightboxItems.length) return; // Прерываем, если нет lightbox-элементов

  const body = document.body;
  const overlay = document.createElement("div");
  overlay.id = "lightbox-overlay";
  overlay.innerHTML = `
    <div class="lightbox-content">
      <img src="" alt="">
      <div class="caption"></div>
    </div>
  `;
  document.body.appendChild(overlay);

  lightboxItems.forEach((item) => {
    item.addEventListener("click", function (e) {
      e.preventDefault();
      const imgSrc = this.getAttribute("data-lightbox");
      const title = this.getAttribute("data-title");
      overlay.querySelector("img").src = imgSrc;
      overlay.querySelector(".caption").textContent = title;
      overlay.style.display = "flex";
      body.classList.toggle("no-scroll");
    });
  });

  overlay.addEventListener("click", function () {
    overlay.style.display = "none";
    overlay.querySelector("img").src = "";
    body.classList.remove("no-scroll");
  });
});

// slider projects

document.addEventListener("DOMContentLoaded", function () {
  if (window.innerWidth >= 1200) {
    const slider = document.querySelector(".proj__content");
    if (!slider) return;
    const container = document.querySelector(".slider-over");
    if (!container) return;
    const slides = slider.querySelectorAll(".project__image");
    const slidesPerPage = 5;
    const totalPages = Math.ceil(slides.length / slidesPerPage);
    if (!slider || !container) return;

    if (totalPages > 1) {
      const pagination = document.createElement("div");
      pagination.className = "pag-proj";
      container.insertAdjacentElement("afterend", pagination);

      for (let i = 1; i <= totalPages; i++) {
        const btn = document.createElement("span");
        pagination.appendChild(btn);
      }

      const paginations = pagination.querySelectorAll("span");
      paginations[0].classList.add("active");

      let screenWidth = window.innerWidth;
      const gap = 34;
      let currentIndex = 0;

      function updateOffset() {
        const offset = currentIndex * (screenWidth + gap);
        slider.style.transform = `translateX(-${offset}px)`;
      }

      paginations.forEach((element, index) => {
        element.addEventListener("click", () => {
          paginations.forEach((el) => el.classList.remove("active"));
          element.classList.add("active");

          currentIndex = index;
          screenWidth = window.innerWidth;
          updateOffset();
        });
      });

      window.addEventListener("resize", () => {
        screenWidth = window.innerWidth;
        updateOffset();
      });
    }
  }
});

document.addEventListener("DOMContentLoaded", () => {
  const section = document.querySelector(".svg-section");
  if (!section) return;

  const svgs = section.querySelectorAll("svg");
  let animated = false;
  const totalDuration = 4000; // общая длительность анимации для каждого SVG

  svgs.forEach((svg) => {
    const paths = svg.querySelectorAll("path");
    paths.forEach((path) => {
      const length = path.getTotalLength();
      path.style.strokeDasharray = length;
      path.style.strokeDashoffset = length;
    });
  });

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting && !animated) {
          svgs.forEach((svg) => {
            const paths = svg.querySelectorAll("path");
            const delayStep = totalDuration / paths.length;

            paths.forEach((path, index) => {
              setTimeout(() => {
                path.style.transition = `stroke-dashoffset ${delayStep}ms ease-out`;
                path.style.strokeDashoffset = "0";
              }, index * delayStep);
            });
          });
          animated = true;
        }
      });
    },
    { threshold: 0.3 }
  );

  observer.observe(section);
});

document.addEventListener("DOMContentLoaded", () => {
  let lastScrollTop = 0;
  const body = document.body;

  window.addEventListener("scroll", () => {
    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    if (scrollTop < lastScrollTop && scrollTop > 300) {
      body.classList.add("scroll-up");
    } else {
      body.classList.remove("scroll-up");
    }

    lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
  });
});
