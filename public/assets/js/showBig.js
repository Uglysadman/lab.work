const photos = $('figure img'); 
let current = 1; 

$('<div id="galery"></div>') 
    .insertBefore($('#table')) 
    .append(`<img src="/public/assets/img/photo1.jpg" style="width:100%;height:100%" alt="photo1" class="photo">`); 

$(`<div class="gallery-buttons"> 
<div class="gallery-button button gallery-button-prev"><</div> 
<p class="about">фото ${current} из ${photos.length}</p> 
<div class="gallery-button button gallery-button-next">></div> 
</div>`).insertBefore($('#table')).css('width', '500px'); 

$('#galery') 
    .css('width', '550px') 
    .css('height','400px') 
    .css('margin','0 auto') 
    .css('margin-top','30px'); 

$('.gallery-button-next').click(function () { 
    if (current < photos.length) current++; 
    changeImgOn(current); 
}); 

$('.gallery-button-prev').click(function () { 
    if (current>1) current--; 
    changeImgOn(current); 
}); 

$('img').click(function(){ 
    current = $(this).attr('alt').slice(5); 
    changeImgOn(current); 
}); 

function changeImgOn(currentId) { 
    $('#galery > img ').fadeOut('fast',function () { 
        this.remove() 
    $('.about').text(`фото ${currentId} из ${photos.length}`); 
    $(`[alt='photo${currentId}']`) 
        .clone()
        .css('width', '100%') 
        .css('height', '100%') 
        .prependTo('#galery'); 
    }); 
}
