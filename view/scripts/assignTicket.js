const assignForm = document.getElementById('assignForm');

assignForm.addEventListener('submit', function(event) {
    event.preventDefault();
    const formData = new FormData(this); 
    
    fetch('../controller/assignTicketController/assignTicket.php', {
        method: 'POST', 
        body: formData
    })
    .then(response=>response.text())
    .then(()=>alert('Assigned Successfully!'));
})