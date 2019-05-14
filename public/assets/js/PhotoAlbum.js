var arrayImg = new Array(15);
for (var i=1; i<16; i++)
    arrayImg[i-1] = "/public/assets/img/photo" + i + ".jpg";

var tittles = new Array(15);
for (i=1; i<16; i++)
    tittles[i-1] = "Фото " + i;

var n = 0;

document.write('<p>Фотоальбом</p>');
document.write('<table id="table">');
for (i=0; i<5; i++){
    document.write('<tr>');
    for (var j=0; j<3; j++){
        document.write('<th>'+ 
            '<figure class="sign">'+
                '<div class="photo_h" data-title=\"'+tittles[n]+'\">'+
                    '<img src=\"'+arrayImg[n]+'\" alt=\"photo'+(n+1)+'\" >'+
                    '<figcaption>'+tittles[n]+'<figcaption>'+
                '</div></figure></th>');
        n++;
    }
    document.write('</tr>');
}
document.write('</table>')

for (let i=1; i<16; i++){
    const div = document.createElement('div');
    div.setAttribute("id",`photos${i}`);
    div.style=`display: none; z-index: 2;position:fixed;top:20%;right:40%; background: url('img/photos/photo${i}.jpg') no-repeat; background-size: cover; width:400px;height:400px;`
    document.documentElement.insertBefore(div,document.documentElement.firstChild);
}

