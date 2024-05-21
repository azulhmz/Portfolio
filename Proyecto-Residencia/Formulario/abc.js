window.onload=function(){
    var selItem = sessionStorage.getItem("SelItem");
    $('#data-item').val(selItem);
}

    $('$data-item').change(function(){
       var selVal=$(this).val();
       sessionStorage.selItem("SelItem", selVal);
    });