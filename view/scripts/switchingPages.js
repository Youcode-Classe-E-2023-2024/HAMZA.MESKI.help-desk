const profileButton = document.getElementById('profileButton');
const home_father = document.getElementById('home_father'); 
const home_child1 = document.getElementById('home_child1'); 
const home_child2 = document.getElementById('home_child2'); 

profileButton.addEventListener('click', function() {
    home_child1.classList.toggle('HIDDEN'); 
    home_child2.classList.toggle('HIDDEN'); 
})