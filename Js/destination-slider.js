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
