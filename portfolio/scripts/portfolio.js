document.addEventListener("DOMContentLoaded", function () {
  const gallery = document.querySelector(".gallery");
  const images = gallery.querySelectorAll("img");
  const leftArrow = document.querySelector(".arrow.left");
  const rightArrow = document.querySelector(".arrow.right");
  let currentIndex = 0;

  function updateGallery() {
    images.forEach((img, index) => {
      img.classList.toggle("active", index === currentIndex);
    });
  }

  leftArrow.addEventListener("click", function () {
    currentIndex = currentIndex === 0 ? images.length - 1 : currentIndex - 1;
    updateGallery();
  });

  rightArrow.addEventListener("click", function () {
    currentIndex = currentIndex === images.length - 1 ? 0 : currentIndex + 1;
    updateGallery();
  });

  // Zoom in functionality
  images.forEach((img) => {
    img.addEventListener("click", function () {
      const modal = document.getElementById("image-modal");
      const modalImage = document.getElementById("modal-image");
      modalImage.src = img.src;
      modal.classList.add("show");
    });
  });

  // Close modal on click
  const modal = document.getElementById("image-modal");
  modal.addEventListener("click", function () {
    modal.classList.remove("show");
  });
});
