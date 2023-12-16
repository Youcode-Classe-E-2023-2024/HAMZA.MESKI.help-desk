const profileButton = document.getElementById('profileButton');
const home_father = document.getElementById('home_father'); 
const home_child1 = document.getElementById('home_child1'); 
const home_child2 = document.getElementById('home_child2'); 

profileButton.addEventListener('click', function() {
    home_child1.classList.toggle('HIDDEN'); 
    home_child2.classList.toggle('HIDDEN'); 
})

console.log(home_father);

// ---------------------------left & right icon logic in the home.php page---------------------------------- //
const open_icon = document.getElementById('open_icon'); 
const close_icon = document.getElementById('close_icon'); 
const open_section = document.getElementById('open_section'); 
const close_section = document.getElementById('close_section');
const home_child1_son = document.getElementById('home_child1_son');

open_icon.addEventListener('click', function() {
    open_section.classList.toggle('HIDDEN');
    close_section.classList.toggle('HIDDEN');
    home_child1_son.classList.toggle('BLOCK');
});
close_icon.addEventListener('click', function() {
    open_section.classList.toggle('HIDDEN');
    close_section.classList.toggle('HIDDEN');
    home_child1_son.classList.toggle('BLOCK');
});