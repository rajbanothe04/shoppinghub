HTML

<!-- <div id='DivIdToPrint'>
    <p>This is a sample text for printing purpose.</p>
</div>
<p>Do not print.</p>
<input type='button' id='btn' value='Print' onclick='printDiv();'>

JavaScript

function printDiv()
{

var divToPrint=document.getElementById('DivIdToPrint');

var newWin=window.open('','Print-Window');

newWin.document.open();

newWin.document.write('<html>

<body onload="window.print()">'+divToPrint.innerHTML+'</body>

</html>');

newWin.document.close();

setTimeout(function(){newWin.close();},10);

}



$("#btn").click(function () {
//Hide all other elements other than printarea.
$("#printarea").show();
window.print();
});


<?php

function printData()
{
var divToPrint=document.getElementById("printTable");
newWin= window.open("");
newWin.document.write(divToPrint.outerHTML);
newWin.print();
newWin.close();
}

$('button').on('click',function(){
printData();
})

?> -->