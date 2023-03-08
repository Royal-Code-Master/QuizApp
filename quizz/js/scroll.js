/* js for scrolling effect*/
const sr = ScrollReveal({
    origin: 'top',
    distance: '80px',
    duratation: 2000,
    reset: true
})

//hero section
sr.reveal('.intro', { delay: 500 });

//services
sr.reveal('.nameing', { delay: 1200 })


//function for get starting.
function get_started() {
    location.href = "login.php";
}
