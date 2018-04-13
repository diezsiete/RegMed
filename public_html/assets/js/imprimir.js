function PrintElem(elem)
{
    Popup($(elem).html());
}
function Popup(data)
{
    var title = $('h1:first').text().trim();
    var mywindow = window.open('', 'new div', 'height=400,width=600');
    mywindow.document.write('<html><head><title>'+title+'</title>');
    /*optional stylesheet*/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
    mywindow.document.write('</head><body >');
    mywindow.document.write(data);
    mywindow.document.write('</body></html>');

    mywindow.print();
    mywindow.close();
}

$(function(){
    $('.imprimir').click(function(){
        PrintElem(document.getElementById('info'));
    })
});