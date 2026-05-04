const itemsPerPage = 12;

const items = document.querySelectorAll(".places-grid .place-card");
const pagination = document.getElementById("pagination-trips");

let currentPage = 1;
const totalPages = Math.ceil(items.length / itemsPerPage);

function showPage(page) {
  currentPage = page;

  const start = (page - 1) * itemsPerPage;
  const end = start + itemsPerPage;

  items.forEach((item, index) => {
    item.style.display = index >= start && index < end ? "" : "none";
  });

  updatePagination();
}

function updatePagination() {
  pagination.innerHTML = "";

  // Prev button
  const prev = document.createElement("button");
  prev.innerHTML =
    '<img src="./images/Arrow.png" class="pagination-arrow pagination-prev-arrow">';
  prev.disabled = currentPage === 1;
  prev.onclick = () => showPage(currentPage - 1);
  pagination.appendChild(prev);

  // Page numbers
  for (let i = 1; i <= totalPages; i++) {
    const btn = document.createElement("button");
    btn.innerText = i;

    if (i === currentPage) {
      btn.classList.add("active");
    }

    btn.onclick = () => showPage(i);
    pagination.appendChild(btn);
  }

  // Next button
  const next = document.createElement("button");
  next.innerHTML =
    '<img src="./images/Arrow.png" class="pagination-arrow pagination-next-arrow">';
  next.disabled = currentPage === totalPages;
  next.onclick = () => showPage(currentPage + 1);
  pagination.appendChild(next);
}

// init
showPage(1);
