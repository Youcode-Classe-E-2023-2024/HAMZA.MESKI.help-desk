/* home page handling: */
const profileButton = document.querySelector('.profileButton');
const home_father = document.getElementById('home_father'); 
const home_child1 = document.getElementById('home_child1'); 
const home_child2 = document.getElementById('home_child2'); 

if (home_father) {
    profileButton.addEventListener('click', function() {
        home_child1.classList.toggle('HIDDEN'); 
        home_child2.classList.toggle('HIDDEN');  
    });
    
    // ---------------------------left & right icon logic in the home.php page---------------------------------- //
    const open_icon = document.getElementById('open_icon'); 
    const close_icon = document.getElementById('close_icon'); 
    const open_section = document.getElementById('open_section'); 
    const close_section = document.getElementById('close_section');
    const home_child1_son = document.getElementById('home_child1_son');
    
    const tickets_container = document.getElementById('tickets_container'); 
    
    function toggleElements() {
        open_section.classList.toggle('HIDDEN');
        close_section.classList.toggle('HIDDEN');
        home_child1_son.classList.toggle('BLOCK');
        tickets_container.classList.toggle('GRID4');
    }
    
    open_icon.addEventListener('click', toggleElements);
    close_icon.addEventListener('click', toggleElements);
}

/* ticketSection handling :) */
// const profileButton2 = document.getElementById('profileButton2');
const home_father2 = document.getElementById('home_father2');
const ticketSection_child1 = document.getElementById('ticketSection_child1');
const ticketSection_child2 = document.getElementById('ticketSection_child2');
if(home_father2) {
    profileButton.addEventListener('click', function() {
        ticketSection_child1.classList.toggle('HIDDEN'); 
        ticketSection_child2.classList.toggle('HIDDEN');  
    });
}