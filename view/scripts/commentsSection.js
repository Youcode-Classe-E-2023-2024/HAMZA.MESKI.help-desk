const commentInput = document.getElementById('commentInput');
if(commentInput) {
    function emptyComment() {
        commentInput.value = '';
    }
    emptyComment();
}

const comments_parent = document.getElementById('comments_parent'); 
const commentForm = document.getElementById('commentForm'); 
const child1 = document.getElementById('child1'); 
const child2 = document.getElementById('child2');

console.log(comments_parent);
console.log(commentForm);

// Function to update comments and add event listeners
function updateComments() {
    const formData = new FormData(); 
    fetch('../controller/commentsController/DisplayComments.php', {
        method: 'POST', 
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);
        comments_parent.innerHTML = data;
        const comment_setting = document.querySelectorAll('.comment_setting'); 
        for (const el of comment_setting) {
            el.addEventListener('click', function() {
                // insert the comment id in local storage
                let commentId = el.getAttribute('key');
                localStorage.setItem('commentId', commentId);
    
                child1.classList.toggle('HIDDEN');
                child2.classList.toggle('HIDDEN');
            })
        }
    })
}
updateComments();

commentForm.addEventListener('submit', function(event) {
    event.preventDefault(); 
    const formData = new FormData(commentForm); 
    fetch('../controller/commentsController/DisplayComments.php', {
        method: 'POST', 
        body: formData
    })
    .then(response => response.text())
    .then(() => {
        updateComments(); // Call the common function
        if(emptyComment) emptyComment();
    });
});

const close_comment_section = document.getElementById('close_comment_section');
close_comment_section.addEventListener('click', function() {
    child1.classList.toggle('HIDDEN');
    child2.classList.toggle('HIDDEN');
})

// delete comment logic:
const delete_comment_form = document.getElementById('delete_comment_form');
delete_comment_form.addEventListener('submit', function(event) {
    event.preventDefault();
    console.log('Delete');
    const formData = new FormData();
    formData.append('commentId', Number(localStorage.getItem('commentId')));
    fetch('../controller/commentsController/DeleteComments.php', {
        method: 'POST', 
        body: formData
    })
    .then(response => response.text())
    .then(() => {
        updateComments(); // Call the common function
        child1.classList.toggle('HIDDEN');
        child2.classList.toggle('HIDDEN');
    });

});

// update comment logic:
const update_comment_form = document.getElementById('update_comment_form');
update_comment_form.addEventListener('submit', function(event) {
    event.preventDefault();
    console.log('update comment');
    const formData = new FormData(this);
    formData.append('commentId', Number(localStorage.getItem('commentId')));
    fetch('../controller/commentsController/UpdateComments.php', {
        method: 'POST', 
        body: formData
    })
    .then(response => response.text())
    .then(() => {
        updateComments(); // Call the common function
        child1.classList.toggle('HIDDEN');
        child2.classList.toggle('HIDDEN');
    });
});