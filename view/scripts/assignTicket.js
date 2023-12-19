

fetch('../controller/assignTicketController/test.php')
.then(response=>response.text())
.then(data=>console.log(data));