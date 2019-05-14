function validTests() {
    var valid = true;
    if (document.test_form.fio.value == ""){
        valid = false;
        document.test_form.fio.focus();
        window.alert("Введите ФИО !");
    }
    else {
        var name = document.test_form.fio.value;
        var p = 0;
        for (var i=1; i<name.length; i++)
            if (name[i] == " " && name[i-1] != " ")
                p++;
        if (p == 2 && name[name.length - 1] != " ")
            p++;
        if (p != 3){
            window.alert('ФИО введено неверно !');
            valid = false;
        }
    };
    
    var cnt = 0;
    if (document.test_form.v1.checked == true)
        cnt++;
    if (document.test_form.v2.checked == true)
        cnt++;
    if (document.test_form.v3.checked == true)
        cnt++;
    if (cnt > 2) {
        valid = false;
        window.alert("Выберите не более двух вариантов (Вопрос №2)");
    }
    
    if (document.test_form.answ[0].checked == false && document.test_form.answ[1].checked == false && document.test_form.answ[2].checked == false && document.test_form.answ[3].checked == false){
        valid = false;
        window.alert("Выберите вариант ответа (Вопрос №3) !");
    }
    
    if (valid) document.call.submit();
}