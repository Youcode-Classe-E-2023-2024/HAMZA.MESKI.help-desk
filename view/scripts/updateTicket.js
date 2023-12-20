const updateForm = document.getElementById('updateForm');

assignForm.addEventListener('submit', function(event) {
    event.preventDefault();
    const formData = new FormData(this); 
    
    fetch('../controller/PersonalTicketsController/UpdateTicket.php', {
        method: 'POST', 
        body: formData
    })
    .then(response=>response.text())
    .then(data => console.log(data))
    .then(()=>alert('Ticket has been Updated Successfully!'));
})