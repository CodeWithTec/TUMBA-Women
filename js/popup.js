

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
