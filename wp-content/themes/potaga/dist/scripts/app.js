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

document.addEventListener("DOMContentLoaded", function () {
  const slider = document.querySelector(".gallery-sec__content");
  const leftBtn = document.querySelector(".left");
  const rightBtn = document.querySelector(".right");

  if (!slider || !leftBtn || !rightBtn) return;

  const cardWidth = 547;
  const gap = 24;
  const step = cardWidth + gap;
  const cards = slider.querySelectorAll(".gallery-sec__content_item");
  const totalCards = cards.length;
  const maxOffset = -(step * totalCards - gap);

  let currentOffset = 0;
  let interval = null;

  slider.style.transform = `translateX(${currentOffset}px)`;
  slider.style.transition = "transform 0.2s ease";

  function updateTransform() {
    slider.style.transform = `translateX(${currentOffset}px)`;
    updateButtons();
  }

  function updateButtons() {
    if (currentOffset >= 0) {
      leftBtn.classList.add("inactive");
    } else {
      leftBtn.classList.remove("inactive");
    }

    if (currentOffset <= maxOffset) {
      rightBtn.classList.add("inactive");
    } else {
      rightBtn.classList.remove("inactive");
    }
  }

  function startScroll(direction) {
    if (interval) return;
    interval = setInterval(() => {
      if (direction === "left" && currentOffset < 0) {
        currentOffset += step;
        if (currentOffset > 0) currentOffset = 0;
        updateTransform();
      }
      if (direction === "right" && currentOffset > maxOffset) {
        currentOffset -= step;
        if (currentOffset < maxOffset) currentOffset = maxOffset;
        updateTransform();
      }
    }, 100);
  }

  function stopScroll() {
    clearInterval(interval);
    interval = null;
  }

  leftBtn.addEventListener("mousedown", () => startScroll("left"));
  rightBtn.addEventListener("mousedown", () => startScroll("right"));

  document.addEventListener("mouseup", stopScroll);
  leftBtn.addEventListener("mouseleave", stopScroll);
  rightBtn.addEventListener("mouseleave", stopScroll);

  leftBtn.addEventListener("click", () => {
    if (interval) return; // если уже удерживается — игнорируем
    if (currentOffset < 0) {
      currentOffset += step;
      if (currentOffset > 0) currentOffset = 0;
      updateTransform();
    }
  });

  rightBtn.addEventListener("click", () => {
    if (interval) return;
    if (currentOffset > maxOffset) {
      currentOffset -= step;
      if (currentOffset < maxOffset) currentOffset = maxOffset;
      updateTransform();
    }
  });

  updateButtons(); // ← вызов при инициализации
});

// карта

async function initMap() {
  const { Map, InfoWindow } = await google.maps.importLibrary("maps");
  const { LatLngBounds } = await google.maps.importLibrary("core");
  const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");

  const maps = document.querySelectorAll(".map");

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
  const accordions = document.querySelectorAll("details.accordion");

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

  document.querySelectorAll("[data-lightbox]").forEach((item) => {
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
