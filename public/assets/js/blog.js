document.querySelectorAll('.commenting').forEach(el => {
    el.addEventListener('click', () => {
        el.parentElement.nextElementSibling.style.display = 
            el.parentElement.nextElementSibling.style.display === 'block' ? 'none' : 'block';
            el.innerHTML = el.parentElement.nextElementSibling.style.display === 'block' ? 'Отменить' : 'Добавить комментарий';
    })
})

document.querySelectorAll('.send-comment').forEach(el => {
    el.addEventListener('click', () => {
        sendComment(el.parentElement);
        el.parentElement.previousElementSibling.lastElementChild.click();
    })
})

function sendComment(myform){
    iframe = document.createElement('iframe');
    iframe.name = myform.target = Date.parse(new Date);
    iframe.style.display = 'none';
    iframe.onload = iframe.onreadystatechange = function(){
        const note_id = myform['note_id'].value;
    }
}