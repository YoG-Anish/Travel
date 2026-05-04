document.addEventListener("DOMContentLoaded", function () {
  const hamburger = document.getElementById("hamburger");
  const sideMenu = document.getElementById("sideMenu");
  const overlay = document.getElementById("overlay");
  const closeMenu = document.getElementById("closeMenu");

  // ===== NAV TOGGLE =====
  if (hamburger && sideMenu && overlay) {
    hamburger.addEventListener("click", () => {
      sideMenu.classList.add("active");
      overlay.classList.add("active");
    });
  }

  function closeNav() {
    if (sideMenu) sideMenu.classList.remove("active");
    if (overlay) overlay.classList.remove("active");
  }

  if (overlay) overlay.addEventListener("click", closeNav);
  if (closeMenu) closeMenu.addEventListener("click", closeNav);

  // ===== STICKY NAV =====
  const navbar = document.querySelector(".main-navigation");
  const hero = document.querySelector(".hero-section");

  if (navbar) {
    const navHeight = navbar.offsetHeight; // Get height of nav

    window.addEventListener("scroll", () => {
      let isSticky = false;

      if (hero) {
        const heroBottom = hero.getBoundingClientRect().bottom;
        isSticky = heroBottom <= 0;
      } else {
        isSticky = window.scrollY > 0;
      }

      navbar.classList.toggle("sticky", isSticky);

      // Apply padding to body to prevent the "jump"
      if (isSticky) {
        document.body.style.paddingTop = `${navHeight}px`;
      } else {
        document.body.style.paddingTop = `0px`;
      }
    });
  }

  const searchIcon = document.querySelector(".search-icon");
  const searchModal = document.getElementById("searchModal");
  const closeSearch = document.getElementById("closeSearch");

  searchIcon.addEventListener("click", (e) => {
    e.preventDefault();
    searchModal.classList.add("active");
  });

  closeSearch.addEventListener("click", () => {
    searchModal.classList.remove("active");
  });

  // close when clicking outside box
  searchModal.addEventListener("click", (e) => {
    if (e.target === searchModal) {
      searchModal.classList.remove("active");
    }
  });

  new Splide("#explore-splide", {
    type: "loop",
    autoplay: true,
    interval: 5000,
    pauseOnHover: true,
    perPage: 1,
    arrows: true,
    pagination: true,
    cover: true,
  }).mount();

  // STYLE CARD SLIDER
  new Splide(".style-slider", {
    perPage: 3,
    gap: "2rem",
    arrows: true,
    pagination: false,

    breakpoints: {
      1200: { perPage: 2 },
      768: { perPage: 1 },
    },
  }).mount();

  new Splide("#testimonialsSplide", {
    type: "loop",
    perPage: 2,
    gap: "3rem",
    autoplay: true,
    pauseOnHover: true,
    breakpoints: {
      1200: { perPage: 2 },
      768: { perPage: 1 },
      480: { perPage: 1 },
    },
  }).mount();
});
