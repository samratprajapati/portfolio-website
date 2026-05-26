// Mobile Navbar Toggle

const menuBtn = document.querySelector(".menu-btn");
const navbar = document.querySelector(".navbar");

menuBtn.onclick = () => {

    navbar.classList.toggle("active");

};


// Close Navbar When Click Link

document.querySelectorAll(".navbar a").forEach(link => {

    link.onclick = () => {

        navbar.classList.remove("active");

    };

});



// Sticky Navbar Shadow

window.addEventListener("scroll", () => {

    const header = document.querySelector(".header");

    if(window.scrollY > 50){

        header.style.boxShadow =
        "0 5px 20px rgba(0,0,0,0.3)";

    }
    else{

        header.style.boxShadow = "none";

    }

});



// Active Navbar Link On Scroll

const sections = document.querySelectorAll("section");
const navLinks = document.querySelectorAll(".navbar a");

window.onscroll = () => {

    let current = "";

    sections.forEach(section => {

        const sectionTop = section.offsetTop;

        const sectionHeight = section.clientHeight;

        if(pageYOffset >= sectionTop - 200){

            current = section.getAttribute("id");

        }

    });

    navLinks.forEach(link => {

        link.classList.remove("active");

        if(link.getAttribute("href").includes(current)){

            link.classList.add("active");

        }

    });

};




// Typing Animation

const typingText = [
    "Full Stack Developer",
    "PHP Developer",
    "Frontend Designer",
    "BTech Student"
];

let textIndex = 0;
let charIndex = 0;

const typingElement =
document.querySelector(".hero-content span");

function typeEffect(){

    if(charIndex < typingText[textIndex].length){

        typingElement.textContent +=
        typingText[textIndex].charAt(charIndex);

        charIndex++;

        setTimeout(typeEffect, 100);

    }
    else{

        setTimeout(eraseEffect, 1500);

    }

}

function eraseEffect(){

    if(charIndex > 0){

        typingElement.textContent =
        typingText[textIndex].substring(0, charIndex - 1);

        charIndex--;

        setTimeout(eraseEffect, 50);

    }
    else{

        textIndex++;

        if(textIndex >= typingText.length){

            textIndex = 0;

        }

        setTimeout(typeEffect, 300);

    }

}

document.addEventListener("DOMContentLoaded", () => {

    if(typingText.length){

        setTimeout(typeEffect, 1000);

    }

});




// Scroll Reveal Animation

const revealElements =
document.querySelectorAll(
".skill-card, .project-card, .study-card, .about-content"
);

window.addEventListener("scroll", revealOnScroll);

function revealOnScroll(){

    const windowHeight = window.innerHeight;

    revealElements.forEach(element => {

        const revealTop =
        element.getBoundingClientRect().top;

        if(revealTop < windowHeight - 100){

            element.classList.add("show");

        }

    });

}

revealOnScroll();




// Auto Hide Success Message


// Toast Auto Hide

const toast =
document.querySelector(".toast");

if(toast){

    setTimeout(() => {

        toast.classList.add("hide");

    }, 3000);

}








// Delete Confirmation

const deleteButtons =
document.querySelectorAll(".delete-btn");

deleteButtons.forEach(button => {

    button.addEventListener("click", function(e){

        const confirmDelete =
        confirm("Are you sure to delete?");

        if(!confirmDelete){

            e.preventDefault();

        }

    });

});




// Dashboard Card Hover Animation

const dashboardCards =
document.querySelectorAll(".skill-card");

dashboardCards.forEach(card => {

    card.addEventListener("mouseenter", () => {

        card.style.transform =
        "translateY(-10px) scale(1.03)";

    });

    card.addEventListener("mouseleave", () => {

        card.style.transform =
        "translateY(0) scale(1)";

    });

});




// Table Row Animation

const tableRows =
document.querySelectorAll("table tr");

tableRows.forEach((row,index) => {

    row.style.opacity = "0";

    row.style.transform = "translateY(20px)";

    setTimeout(() => {

        row.style.transition = "0.5s";

        row.style.opacity = "1";

        row.style.transform = "translateY(0)";

    }, index * 100);

});




// Auto Close Toast

const toastMessage =
document.querySelector(".toast");

if(toastMessage){

    setTimeout(() => {

        toastMessage.classList.add("hide");

    }, 3000);

}








// Theme Toggle

const themeToggle =
document.querySelector(".theme-toggle");

const body = document.body;

themeToggle.onclick = () => {

    body.classList.toggle("light-mode");

    if(body.classList.contains("light-mode")){

        localStorage.setItem(
            "theme",
            "light"
        );

        themeToggle.innerHTML =
        '<i class="fa-solid fa-sun"></i>';

    }
    else{

        localStorage.setItem(
            "theme",
            "dark"
        );

        themeToggle.innerHTML =
        '<i class="fa-solid fa-moon"></i>';

    }

};


// Load Saved Theme

if(localStorage.getItem("theme") === "light"){

    body.classList.add("light-mode");

    themeToggle.innerHTML =
    '<i class="fa-solid fa-sun"></i>';

}




// Project Modal

const projectCards =
document.querySelectorAll(".project-card");

const projectModal =
document.getElementById("projectModal");

const modalImage =
document.getElementById("modalImage");

const modalTitle =
document.getElementById("modalTitle");

const modalDescription =
document.getElementById("modalDescription");

const modalLive =
document.getElementById("modalLive");

const modalGithub =
document.getElementById("modalGithub");

const closeModal =
document.querySelector(".close-modal");


projectCards.forEach(card => {

    card.addEventListener("click", () => {

        projectModal.style.display = "flex";

        modalImage.src =
        card.dataset.image;

        modalTitle.innerText =
        card.dataset.title;

        modalDescription.innerText =
        card.dataset.description;

        modalLive.href =
        card.dataset.live;

        modalGithub.href =
        card.dataset.github;

    });

});


closeModal.onclick = () => {

    projectModal.style.display = "none";

};


window.onclick = (e) => {

    if(e.target == projectModal){

        projectModal.style.display = "none";

    }

};

// Loader Percentage

window.addEventListener("load", () => {

    const loader =
    document.querySelector(".loader");

    const progress =
    document.querySelector(".loader-progress");

    const percent =
    document.getElementById("loader-percent");

    let count = 0;

    const interval = setInterval(() => {

        count++;

        progress.style.width =
        count + "%";

        percent.innerHTML =
        count + "%";

        if(count >= 100){

            clearInterval(interval);

            setTimeout(() => {

                loader.classList.add("hide");

            }, 400);

        }

    }, 20);

});







// Show Password

const togglePassword =
document.getElementById("togglePassword");

const password =
document.getElementById("password");


if(togglePassword){

    togglePassword.onclick = () => {

        if(password.type === "password"){

            password.type = "text";

            togglePassword.classList.replace(
            "fa-eye",
            "fa-eye-slash"
            );

        }
        else{

            password.type = "password";

            togglePassword.classList.replace(
            "fa-eye-slash",
            "fa-eye"
            );

        }

    };

}

// Scroll Progress Bar

const scrollProgress =
document.getElementById(
"scrollProgress"
);


window.addEventListener(
"scroll",

() => {

    const totalHeight =

    document.body.scrollHeight
    -
    window.innerHeight;


    const progress =

    (window.pageYOffset /
    totalHeight) * 100;


    scrollProgress.style.width =
    progress + "%";

});





// =========================
// Notes Card Animation
// =========================

const notesCards =
document.querySelectorAll(
".notes-card"
);


window.addEventListener(
"scroll",

() => {

    notesCards.forEach((card) => {

        const cardTop =
        card.getBoundingClientRect().top;

        const windowHeight =
        window.innerHeight;

        if(cardTop < windowHeight - 100){

            card.style.opacity = "1";

            card.style.transform =
            "translateY(0)";

        }

    });

});


// Initial Style

notesCards.forEach((card) => {

    card.style.opacity = "0";

    card.style.transform =
    "translateY(40px)";

    card.style.transition =
    "0.6s ease";

});



// =========================
// NOTES + PYQ ANIMATION
// =========================

const cards = document.querySelectorAll(

".notes-card, .pyq-card"

);


// Scroll Animation

window.addEventListener(

"scroll",

() => {

    cards.forEach((card) => {

        const cardTop =

        card.getBoundingClientRect().top;


        const windowHeight =

        window.innerHeight;


        if(cardTop < windowHeight - 100){

            card.style.opacity = "1";

            card.style.transform =

            "translateY(0)";

        }

    });

});



// Initial Style

cards.forEach((card) => {

    card.style.opacity = "0";

    card.style.transform =

    "translateY(40px)";

    card.style.transition =

    "0.6s ease";

});



// =========================
// Search Form Animation
// =========================

const searchForm =

document.querySelector(
".search-form"
);


if(searchForm){

    searchForm.addEventListener(

    "mouseenter",

    () => {

        searchForm.style.transform =

        "scale(1.02)";

    });




    searchForm.addEventListener(

    "mouseleave",

    () => {

        searchForm.style.transform =

        "scale(1)";

    });

}



// =========================
// Button Hover Effect
// =========================

const buttons = document.querySelectorAll(

".btn, .download-btn, .view-btn"

);


buttons.forEach((btn) => {

    btn.addEventListener(

    "mouseenter",

    () => {

        btn.style.transform =

        "translateY(-3px)";

    });



    btn.addEventListener(

    "mouseleave",

    () => {

        btn.style.transform =

        "translateY(0)";

    });

});



// =========================
// Loading Animation
// =========================

window.addEventListener(

"load",

() => {

    document.body.style.opacity = "1";

});



// =========================
// Navbar Shadow Scroll
// =========================

const header = document.querySelector(
".header"
);


window.addEventListener(

"scroll",

() => {

    if(window.scrollY > 50){

        header.style.boxShadow =

        "0 5px 20px rgba(0,0,0,0.3)";

    }
    else{

        header.style.boxShadow =

        "none";

    }

});


