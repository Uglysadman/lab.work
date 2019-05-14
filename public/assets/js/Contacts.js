function validate_form() {
    var valid = true;
    if (validate_fio('hintName') == false)
        valid = false;
    if (validate_email('hintMail') == false)
        valid = false;
    if (validate_phone('hintPhone') == false)
        valid = false;
    if (validate_birth('hintBirth') == false)
        valid = false;
    if (validate_gender('hintGender') == false)
        valid = false;
    if (validate_mes('hintMes') == false)
        valid == false;
    if (valid == false) {
        window.alert("Поля не заполнены или заполнены неверно. Незаполненные отмечены красным.")
    }
    return valid;
}

function hideHints(){
    for (var i = 0; i < hideHints.arguments.length; i++) {
        document.getElementById(hideHints.arguments[i]).innerHTML = "";
    }
}

var hids = ['hintName', 'hintPhone', 'hintMail', 'hintGender', 'hintBirth', 'hintMes'];
var hints = ['Например, Кашкин Максим Иванович', 'Например, 79787907215', 'Например, name@domen.com', 'Выберите пол', 'Выберите дату рождения', 'Введите текст сообщения'];

function validate_fio(hint){
    var regExp = /^[а-яА-ЯёЁa-zA-Z]+\s[а-яА-ЯёЁa-zA-Z]+\s[а-яА-ЯёЁa-zA-Z]+$/;
    if (!(regExp.test(document.contact_form.fio.value))) {
        document.contact_form.fio.style.backgroundColor = "#FF6347";
        document.getElementById(hint).innerHTML = hints[hids.indexOf(hint)];
        return false;
    } else {
        document.contact_form.fio.style.backgroundColor = "#F0FFF0";
        document.getElementById(hint).innerHTML = "";
        return true;
    }
}

function validate_phone(hint){
    var regExp = /^[73]\d{8,10}$/;
    if (!(regExp.test(document.contact_form.phone.value))) {
        document.contact_form.phone.style.backgroundColor = "#FF6347";
        document.getElementById(hint).innerHTML = hints[hids.indexOf(hint)];
        return false;
    } else {
        document.contact_form.phone.style.backgroundColor = "#F0FFF0";
        document.getElementById(hint).innerHTML = "";
        return true;
    }
}

function validate_birth(hint) {
    if (document.contact_form.birth.value == ""){
        document.contact_form.birth.style.backgroundColor = "#FF6347";
        document.getElementById(hint).innerHTML = hints[hids.indexOf(hint)];
        return false;
    }
    else {
        document.contact_form.birth.style.backgroundColor = "#F0FFF0";
        document.getElementById(hint).innerHTML = "";
        return true;
    }
}

function validate_gender(hint){
    if (document.contact_form.gender[0].checked == false && document.contact_form.gender[1].checked == false){
        document.getElementById(hint).innerHTML = hints[hids.indexOf(hint)];
        return false;
    }
    else {
        document.getElementById(hint).innerHTML = "";
        return true;
    }
}

function validate_mes(hint){
    if (document.contact_form.message.value == "") {
        document.contact_form.message.style.backgroundColor = "#FF6347";
        document.getElementById(hint).innerHTML = hints[hids.indexOf(hint)];
        return false;
    } else {
        document.contact_form.message.style.backgroundColor = "#F0FFF0";
        document.getElementById(hint).innerHTML = "";
        return true;
    }
}

function validate_email(hint){
    var regExp = /^[-\w.]+@([A-z0-9][-A-z0-9]+\.)+[A-z]{2,4}$/;
    if (!regExp.test(document.contact_form.email.value)) {
        document.contact_form.email.style.backgroundColor = "#FF6347";
        document.getElementById(hint).innerHTML = hints[hids.indexOf(hint)];
        return false;
    } else {
        document.contact_form.email.style.backgroundColor = "#F0FFF0";
        document.getElementById(hint).innerHTML = "";
        return true;
    }
}