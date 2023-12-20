const handleForm = document.getElementById('handleForm'); 

handleForm.addEventListener('submit', function(event) {
    event.preventDefault();
    const formData = new FormData(this); 
    
    fetch('../controller/handle.php', {
        method: 'POST', 
        body: formData
    })
    .then(response=>response.text())
    .then(()=> {
        alert('Status has been updated successfully');
    })
})

console.log('handling ......');