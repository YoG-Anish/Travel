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
