
// Navigation Toggler Script
 
    const toggler = document.getElementById('navbar-toggler');
    const navbarCollapse = document.getElementById('navbarNav');

    toggler.addEventListener('click', () => {
      toggler.classList.toggle('active');
    });

    // Optional: Remove active class when menu is closed by clicking outside or resizing
    navbarCollapse.addEventListener('hidden.bs.collapse', () => {
      toggler.classList.remove('active');
    });


    // add an active class to the current page link
    document.querySelectorAll('.nav-link').forEach(link => {
      if (link.href === window.location.href) {
        link.classList.add('active');
      }
    });
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const targetId = this.getAttribute('href').substring(1);
        const targetElement = document.getElementById(targetId);
        if (targetElement) {
          targetElement.scrollIntoView({
            behavior: 'smooth'
          });
        }
      });
    }   );


    // hero section for image slider
const slides = document.getElementById('slides');
  const images = slides.querySelectorAll('img');
  const totalImages = images.length;
  let index = 0;

  const prevBtn = document.getElementById('prevBtn');
  const nextBtn = document.getElementById('nextBtn');

  function showSlide(i) {
    if (i < 0) index = totalImages - 1;
    else if (i >= totalImages) index = 0;
    else index = i;

    const slideWidth = slides.clientWidth / totalImages; // width of 1 image container
    // But we want full width of carousel per image (since flex shrink 0)
    // So better get the carousel width:
    const carousel = slides.parentElement;
    const carouselWidth = carousel.clientWidth;

    slides.style.transform = `translateX(${-index * carouselWidth}px)`;
  }

  prevBtn.addEventListener('click', () => {
    showSlide(index - 1);
    resetAutoSlide();
  });

  nextBtn.addEventListener('click', () => {
    showSlide(index + 1);
    resetAutoSlide();
  });

  // Auto slide every 3 seconds
  let autoSlide = setInterval(() => {
    showSlide(index + 1);
  }, 3000);

  function resetAutoSlide() {
    clearInterval(autoSlide);
    autoSlide = setInterval(() => {
      showSlide(index + 1);
    }, 3000);
  }

  // Initialize
  showSlide(index);

  // Optional: handle window resize to adjust slide position correctly
  window.addEventListener('resize', () => {
    showSlide(index);
  });













// pop up for all the pages 

//  pop-up
const popup = document.getElementById("popup");
const readMoreBtn = document.getElementById("readMoreBtn");
const closeBtn = document.querySelector(".close");

readMoreBtn.addEventListener("click", () => {
    popup.style.display = "block";
});

closeBtn.addEventListener("click", () => {
    popup.style.display = "none";
});

window.addEventListener("click", (event) => {
    if (event.target === popup) {
        popup.style.display = "none";
    }
});


// first pop-up
const popup1 = document.getElementById("popup1");
const readMoreBtn1 = document.getElementById("readMoreBtn1");
const closeBtn1 = document.getElementById("closeBtn1");

readMoreBtn1.addEventListener("click", () => {
    popup1.style.display = "block";
});

closeBtn1.addEventListener("click", () => {
    popup1.style.display = "none";
});

window.addEventListener("click", (event) => {
    if (event.target === popup1) {
        popup1.style.display = "none";
    }
});



// second pop-up
const popup2 = document.getElementById("popup2");
const readMoreBtn2 = document.getElementById("readMoreBtn2");
const closeBtn2 = document.getElementById("closeBtn2");

readMoreBtn2.addEventListener("click", () => {
    popup2.style.display = "block";
});

closeBtn2.addEventListener("click", () => {
    popup2.style.display = "none";
});

window.addEventListener("click", (event) => {
    if (event.target === popup) {
        popup2.style.display = "none";
    }
});
