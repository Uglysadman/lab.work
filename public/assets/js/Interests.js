function createList(hrefs, listObject, arrayImg)
{
    var n = 0;
    document.write('<ul>');
    for (var i=0; i<listObject.length; i++){
        document.write('<li><div class="favourite">'+
            '<a name=\"'+hrefs[i]+'\">'+listObject[i]+'</a><br>');
        for (var j=0; j<listObject.length; j++){
            document.write("<img src=\"" + arrayImg[n] + "\">");
            n++;
        }
        document.write('</div>');
    }
    document.write('</ul>');
}

var arrayImg = new Array(9);
for (var i=1; i<arrayImg.length+1; i++){
    arrayImg[i-1] = "../../public/assets/img/"+i+".jpg";
}

var hrefs = new Array('films', 'books', 'music');
var listObject = new Array('Мои любимые фильмы','Мои любимые книги','Моя любимая музыка');

createList(hrefs, listObject, arrayImg);
