
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











