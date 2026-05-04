function fixFooterSeparators() {
  const items = document.querySelectorAll(".footer-nav li");

  items.forEach((el) => el.classList.remove("no-sep"));

  let rowTop = items[0]?.getBoundingClientRect().top;
  let lastInRow = items[0];

  items.forEach((el, index) => {
    const top = el.getBoundingClientRect().top;

    if (Math.abs(top - rowTop) > 2) {
      lastInRow.classList.add("no-sep");
      rowTop = top;
    }

    lastInRow = el;

    if (index === items.length - 1) {
      el.classList.add("no-sep");
    }
  });
}

window.addEventListener("load", fixFooterSeparators);
window.addEventListener("resize", fixFooterSeparators);
