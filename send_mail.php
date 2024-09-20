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
}function toggleMenu() {
  const nav = document.getElementById('nav');
  nav.classList.toggle('active');
}

let currentImageIndex = 0;
let galleryImages = [];

function openOrCloseGallery(galleryId, element, action) {
  if (action === 'open') {
    lastFocusedElement = element;
    document.getElementById(galleryId).style.display = 'flex';
    if (galleryId === 'jira-gallery') {
      galleryImages = Array.from(document.querySelectorAll(`#${galleryId} .gallery-content img`));
    } else if (galleryId === 'docker-gallery') {
      galleryVideos = Array.from(document.querySelectorAll(`#${galleryId} .gallery-content video`));
    }
  } else if (action === 'close') {
    document.getElementById(galleryId).style.display = 'none';
    if (lastFocusedElement) {
      lastFocusedElement.scrollIntoView({ behavior: 'smooth' });
    }
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
}// Toggle the mobile navigation menu
function toggleMenu() {
  const nav = document.getElementById('nav');
  nav.classList.toggle('active');
}

// Function to open or close a gallery
function openOrCloseGallery(galleryId, action) {
  const gallery = document.getElementById(galleryId);
  if (action === 'open') {
    gallery.style.display = 'flex';
  } else if (action === 'close') {
    gallery.style.display = 'none';
  }
}

// Function to handle fullscreen media (images or videos)
function openFullScreen(media, mediaType) {
  const fullScreenModal = document.getElementById(mediaType === 'image' ? "image-fullscreen-modal" : "video-fullscreen-modal");
  const fullScreenElement = document.getElementById(mediaType === 'image' ? "fullscreen-image" : "fullscreen-video");
  fullScreenElement.src = media.src;
  fullScreenModal.style.display = 'flex';
  if (mediaType === 'video') {
    fullScreenElement.play();
  }
}

// Function to close the fullscreen modal
function closeFullScreen() {
  const fullScreenModal = document.getElementById("image-fullscreen-modal") || document.getElementById("video-fullscreen-modal");
  const fullScreenElement = document.getElementById("fullscreen-image") || document.getElementById("fullscreen-video");
  if (fullScreenElement) {
    fullScreenElement.pause(); 
    fullScreenElement.src = ''; 
  }
  fullScreenModal.style.display = 'none';
}

// Function to navigate to the next fullscreen media item
function nextMedia(currentMediaIndex, mediaArray) {
  currentMediaIndex = (currentMediaIndex + 1) % mediaArray.length;
  openFullScreen(mediaArray[currentMediaIndex], mediaArray[0].tagName.toLowerCase());
}

// Function to navigate to the previous fullscreen media item
function prevMedia(currentMediaIndex, mediaArray) {
  currentMediaIndex = (currentMediaIndex - 1 + mediaArray.length) % mediaArray.length;
  openFullScreen(mediaArray[currentMediaIndex], mediaArray[0].tagName.toLowerCase());
}

// Event listeners for gallery interactions
document.querySelectorAll('.gallery-content img, .gallery-content video').forEach(media => {
  if (media.tagName === 'IMG') {
    media.addEventListener('click', () => {
      openFullScreen(media, 'image');
    });
  } else if (media.tagName === 'VIDEO') {
    media.addEventListener('click', () => {
      openFullScreen(media, 'video');
    });
  }
});

document.querySelectorAll('.project-card:not([onclick])').forEach(card => {
  card.addEventListener('click', () => {
    openOrCloseGallery(card.id, 'open');
  });
});

document.querySelectorAll('.close-btn').forEach(closeBtn => {
  closeBtn.addEventListener('click', () => {
    openOrCloseGallery(closeBtn.parentElement.id, 'close');
  });
});

document.getElementById("image-fullscreen-modal").querySelector(".next").addEventListener('click', () => {
  nextMedia(currentImageIndex, galleryImages);
});

document.getElementById("image-fullscreen-modal").querySelector(".prev").addEventListener('click', () => {
  prevMedia(currentImageIndex, galleryImages);
});

document.getElementById("video-fullscreen-modal").querySelector(".next").addEventListener('click', () => {
  nextMedia(currentVideoIndex, galleryVideos);
});

document.getElementById("video-fullscreen-modal").querySelector(".prev").addEventListener('click', () => {
  prevMedia(currentVideoIndex, galleryVideos);
});<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);

    $to = "yitziw123@gmail.com";
    $subject = "New Contact Form Submission";

    $body = "Name: $name\n";
    $body .= "Phone: $phone\n";
    $body .= "Message: $message\n";

    $headers = "From: webmaster@example.com\r\n";
    $headers .= "Reply-To: $name <$phone>\r\n";

    if (mail($to, $subject, $body, $headers)) {
        echo "The email has been sent successfully!";
    } else {
        echo "Failed to send the email.";
    }

    if (mail($to, $subject, $body, $headers)) {
       echo "<p>Thank you for contacting us! We'll get back to you soon.</p>";
    } else {
        echo "<p>Oops! Something went wrong, please try again.</p>";
    }
  }
?>