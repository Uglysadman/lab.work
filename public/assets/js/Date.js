var p = document.createElement('p');
function currentDate(el, parent) {
    const months = [
        'Январь',
        'Февраль',
        'Март',
        'Апрель',
        'Май',
        'Июнь',
        'Июль',
        'Август',
        'Сентябрь',
        'Октябрь',
        'Ноябрь',
        'Декабрь',
    ];
    const days = [
        'Воскресенье',
        'Понедельник',
        'Вторник',
        'Среда',
        'Четверг',
        'Пятница',
        'Суббота',
    ]
    var myDate = new Date();
    
    var dayNum = myDate.getDate();
    var month = myDate.getMonth();
    var year = myDate.getFullYear();
    var dayWeek = myDate.getDay();

    el.innerText =`${dayNum}, ${months[month]}, ${year.toString()}, День недели: ${days[dayWeek]}`;
    el.style.color = 'white';
    el.style.height = '10px';
    parent.insertBefore(el, parent.firstElementChild);
}

currentDate(p, document.getElementById('date'));

setInterval("currentDate(p, document.getElementById('date'))", 1000);