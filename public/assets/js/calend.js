/*
* Добавляет элемент выбора месяца
* */
function appendMonth(parentElem) {
    const months = [
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
        'July',
        'August',
        'September',
        'October',
        'November',
        'December'
    ];
    const month = document.createElement('select');
    for (let i=0; i<12; i++) {
        const o = document.createElement('option');
        o.innerHTML = `${months[i]}`;
        month.appendChild(o);
    }
    month.id = 'months';
    parentElem.appendChild(month);
}

/*
* Добавляет элемент выбора года
* */
function appendYears(parentElem) {
    const year = document.createElement('select');
    const y = new Date().getFullYear();
    for (let i=1951; i<(+y)+1; i++) {
        const o = document.createElement('option');
        o.innerHTML = `${i}`;
        year.appendChild(o);
    }
    year.id = 'years';
    parentElem.appendChild(year);
}

/*
* Добавляет календарь в дочерний элемент parentElem
* */
function appendCalendar(parentElem) {
    const table = document.createElement('table');
    const days = ['пн','вт','ср','чт','пт','сб','вс'];
    let tr = document.createElement('tr');

    for (let j=0; j<7; j++) {
        let td = document.createElement('td');
        td.innerText = days[j];
        td.classList = ['cell'];
        tr.appendChild(td);
    }

    table.appendChild(tr);
    for (let i=0; i<6; i++){
        let tr = document.createElement('tr');
        for (let j=0; j<7; j++) {
            let td = document.createElement('td');
            td.classList = ['day cell'];
            td.style.padding = '5px';
            tr.appendChild(td);
        }
        table.appendChild(tr);

    }

    table.id = 'calendar';
    parentElem.appendChild(table);
}

/*
* меняет содержание
* календаря в соответствии с датой
* */
function changeCalendarData(m,y) {
    const date = new Date(`${m} ${y}`);
    const days_in_month = 32 - new Date(date.getFullYear(), date.getMonth(), 32).getDate();
    const startDay = date.getDay()-1;
    const days = document.querySelectorAll('.day');
    let n = 1;

    for (let i=0; i<days.length; i++) {
        days[i].innerHTML = '';
    }
    for (let i=startDay; i<(startDay+days_in_month); i++) {
        days[i].innerHTML = n;
        n++;
    }
}

/*
* получает и передает данные, для изменения календаря
* */
function changeCalendar(){
    const m = document.querySelector('#months').value;
    const y = document.querySelector('#years').value;
    changeCalendarData(m,y);
}

/*
* Вставляет выбранную дату в поле даты рождения*/
function chooseDate() {
    if (this.innerHTML) {
        birth.value = `${document.querySelector('#months').value} ${this.innerHTML} ${document.querySelector('#years').value}`;
    }
}
        
const div = document.createElement('div');
div.style = 'width: 225px;margin: 0 auto;';
div.style.display = 'none';

appendMonth(div);
appendYears(div);
appendCalendar(div);

const birth = document.querySelector('#birth');

birth.parentNode.insertBefore(div, birth.nextSibling);

changeCalendarData('January', 1951);
document.querySelector('#years').addEventListener('change', changeCalendar);
document.querySelector('#months').addEventListener('change', changeCalendar);

const days = document.querySelectorAll('.day');
days.forEach((el) => {
    el.addEventListener('mouseover', () => {
        if (el.innerHTML){
            el.style.backgroundColor = 'rgba(127, 255, 212, 0.6)';
            el.style.cursor = 'pointer';
        }
    });

    el.addEventListener('mouseout', () => {
        el.style.backgroundColor = 'initial';
    });

    el.addEventListener('click', chooseDate);
});

birth.onfocus = (e) => {
    e.target.blur();
    if (div.style.display == 'block'){
        div.style.display = 'none';
    } else {
        div.style.display = 'block';
    }
};