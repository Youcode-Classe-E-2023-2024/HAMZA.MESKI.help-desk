const myTasks = document.getElementById('myTasks'); 
const iCreaetd = document.getElementById('iCreated'); 
const all = document.getElementById('all'); 
const priority = document.getElementById('priority'); 
const elementsArray = document.querySelectorAll('.TICKET');

// console.log(TICKET[2].textContent.split('Assigned to: ')[1].trim());// this code detect the priority it could be: very-important important low

const container = document.getElementById('tickets_container');
priority.addEventListener('click', function() {
    console.log('hello');
    const elements = container.children;

    // Convert HTMLCollection to array
    const elementsArray = Array.from(elements);

    // Define custom order based on extracted priority
    const order = { 'very-important': 1, 'important': 2, 'low': 3 };

    // Sort elements based on extracted priority
    elementsArray.sort((a, b) => {
      const priorityA = extractPriority(a.textContent);
      const priorityB = extractPriority(b.textContent);

      return order[priorityA] - order[priorityB];
    });

    // Clear the container
    container.innerHTML = '';

    // Append sorted elements back to the container
    elementsArray.forEach(element => {
      container.appendChild(element);
    });
});

  // Function to extract priority from messy text content
function extractPriority(text) {
    const priorityMatches = text.match(/priority:\s*([a-z-]+)/i);
    return priorityMatches ? priorityMatches[1].toLowerCase() : '';
}

/* I created Filter */
const currentLogger = document.getElementById('USERID').getAttribute('value');
console.log(currentLogger);
console.log(elementsArray);

iCreaetd.addEventListener('click', function() {
    for (const ele of elementsArray) {
        if (ele.getAttribute('createdbyid') !== currentLogger) {
            ele.classList.toggle('HIDDEN');
        }
    }
})

all.addEventListener('click', function() {
    for (const ele of elementsArray) {
        if (ele.classList.contains('HIDDEN')) {
            ele.classList.remove('HIDDEN');
        }
    }
})