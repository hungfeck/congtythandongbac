(function(window, $){
    
    // Responsive Support
    if(!$('#nav-toggle-button').is(':hidden')) {
        var body = $('body');
        body.addClass('reponsive-body');
    }
    $(document).on('change', '#nav-toggle-input', function(){
        var body = $('body');
        body.toggleClass('show-menu');
    })

})


function OnEnter(e) {
    if (!e) var e = window.event;

    if (e) {
        if (e.keyCode == 13) {
            e.cancelBubble = true;
            e.returnValue = false;
            e.cancel = true;
            onSearch();
            return false;
        }
    }
    return true;
}

function onSearch() {
    var strSearch = $('#txtSearch').val();
    strSearch = encodeURIComponent(strSearch);

    if (strSearch != '') {
        var url = "/tim-kiem.htm?q=" + strSearch;
        if (document.all) {
            window.location.href = url;
        }
        else {
            document.location.href = url;
        }
    } else {
        $('#txtSearch').focus();
    }
    return false;
}

function LoadImage(id, src) {
    id.src = src;
    id.onerror = null;
}