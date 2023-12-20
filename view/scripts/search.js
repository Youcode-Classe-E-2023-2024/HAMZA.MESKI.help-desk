const searchUsers = document.getElementById('searchUsers'); 
const searchDepartments = document.getElementById('searchDepartments'); 

searchUsers.addEventListener('input', function() {
    const searchQuery = this.value.trim().toLowerCase();
    const userDivs = document.querySelectorAll('#userList label');

    userDivs.forEach(function(div) {
        const userName = div.textContent.trim().toLowerCase();
        const isMatch = userName.includes(searchQuery);
        div.style.display = isMatch ? 'block' : 'none';
    });
});

searchDepartments.addEventListener('input', function() {
    const searchQuery = this.value.trim().toLowerCase();
    const departmentDivs = document.querySelectorAll('#departmentList label');

    departmentDivs.forEach(function(div) {
        const userName = div.textContent.trim().toLowerCase();
        const isMatch = userName.includes(searchQuery);
        div.style.display = isMatch ? 'block' : 'none';
    });
});