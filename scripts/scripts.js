let currentSection = 0;
const sections = document.querySelectorAll(".section");
const navItems = document.querySelectorAll(".navitem");
const profilePicture = document.getElementById("profile-picture");
const navPicture = document.getElementById("logo");

let isExpanded = false;

function scrollToSection(index) {
  if (index >= 0 && index < sections.length) {
    sections[index].scrollIntoView({ behavior: "smooth" });
    currentSection = index;
    updateActiveNavItem();
  }
}

function updateActiveNavItem() {
  navItems.forEach((item, index) => {
    item.classList.toggle("active", index === currentSection);
  });
}

let isScrolling = false;

function scrollEvent(event) {
  event.preventDefault();

  if (isExpanded || isScrolling) return;
  isScrolling = true;

  if (event.deltaY > 0) {
    scrollToSection(currentSection + 1);
  } else {
    scrollToSection(currentSection - 1);
  }

  setTimeout(() => {
    isScrolling = false;
  }, 500);
}

document.addEventListener("wheel", scrollEvent, { passive: false });

document.addEventListener("keydown", (event) => {
  if (isExpanded) return;
  if (event.key === "ArrowDown") {
    event.preventDefault();
    scrollToSection(currentSection + 1);
  } else if (event.key === "ArrowUp") {
    event.preventDefault();
    scrollToSection(currentSection - 1);
  }
});

navItems.forEach((item, index) => {
  item.addEventListener("click", (event) => {
    event.preventDefault();
    scrollToSection(index);
  });
});

updateActiveNavItem();

profilePicture.setAttribute("draggable", false);
profilePicture.addEventListener("click", () => {
  alert("You are being redirected to my Instagram profile.");
  window.location.href = "https://www.instagram.com/s3m_d";
});

navPicture.setAttribute("draggable", false);
navPicture.addEventListener("click", () => {
  window.location.href = "https://semdyk.xyz/";
});

function sendToPortfolio(name) {
  window.location.href = "portfolio/" + name;
}
