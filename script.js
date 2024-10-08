function toggleMenu() {
  const nav = document.getElementById('nav');
  nav.classList.toggle('active');
}

let currentImageIndex = 0;
let galleryImages = [];

function openGallery(galleryId, element) {
  lastFocusedElement = element;
  document.getElementById(galleryId).style.display = 'flex';

  galleryImages = Array.from(document.querySelectorAll(`#${galleryId} .gallery-content img`));
}

function closeGallery(galleryId) {
  document.getElementById(galleryId).style.display = 'none';
  if (lastFocusedElement) {
    lastFocusedElement.scrollIntoView({ behavior: 'smooth' });
  }
}

function openImageFullScreen(imageIndex) {
  currentImageIndex = imageIndex;
  const fullScreenModal = document.getElementById("image-fullscreen-modal");
  const fullScreenImage = document.getElementById("fullscreen-image");
  fullScreenImage.src = galleryImages[currentImageIndex].src;
  fullScreenModal.style.display = 'flex';
}

function closeFullScreen() {
  document.getElementById("image-fullscreen-modal").style.display = 'none';
}

function nextImage() {
  currentImageIndex = (currentImageIndex + 1) % galleryImages.length;
  document.getElementById("fullscreen-image").src = galleryImages[currentImageIndex].src;
}

function prevImage() {
  currentImageIndex = (currentImageIndex - 1 + galleryImages.length) % galleryImages.length;
  document.getElementById("fullscreen-image").src = galleryImages[currentImageIndex].src;
}

  let currentVideoIndex = 0;
  let galleryVideos = [];

  function openGallery(galleryId, element) {
    lastFocusedElement = element;
    document.getElementById(galleryId).style.display = 'flex';

    galleryVideos = Array.from(document.querySelectorAll(`#${galleryId} .gallery-content video`));
  }

  function closeGallery(galleryId) {
    document.getElementById(galleryId).style.display = 'none';
    if (lastFocusedElement) {
      lastFocusedElement.scrollIntoView({ behavior: 'smooth' });
    }
  }

  function openVideoFullScreen(videoIndex) {
    currentVideoIndex = videoIndex;
    const fullScreenModal = document.getElementById("video-fullscreen-modal");
    const fullScreenVideo = document.getElementById("fullscreen-video");
    fullScreenVideo.src = galleryVideos[currentVideoIndex].src;
    fullScreenModal.style.display = 'flex';
    fullScreenVideo.play();
  }

  function closeFullScreen() {
    const fullScreenVideo = document.getElementById("fullscreen-video");
    fullScreenVideo.pause();
    fullScreenVideo.src = '';
    document.getElementById("video-fullscreen-modal").style.display = 'none';
  }

  function nextVideo() {
    currentVideoIndex = (currentVideoIndex + 1) % galleryVideos.length;
    const fullScreenVideo = document.getElementById("fullscreen-video");
    fullScreenVideo.src = galleryVideos[currentVideoIndex].src;
    fullScreenVideo.play();
  }

  function prevVideo() {
    currentVideoIndex = (currentVideoIndex - 1 + galleryVideos.length) % galleryVideos.length;
    const fullScreenVideo = document.getElementById("fullscreen-video");
    fullScreenVideo.src = galleryVideos[currentVideoIndex].src;
    fullScreenVideo.play();
  }
  
  document.getElementById('contact-form').addEventListener('submit', function(event) {
    event.preventDefault();
    emailjs.sendForm('service_aynu99s', 'template_y0s6upe', this)
        .then(function() {
            alert('Message sent successfully!');
        }, function(error) {
            alert('Failed to send message: ' + error.text);
        });
});