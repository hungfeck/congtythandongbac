


/***********************************************
* Cool DHTML tooltip script- © Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

var offsetxpoint = 10;
var offsetypoint = 20;

var ie = document.all;
var ns6 = document.getElementById && !document.all;
var enabletip = false;
var tipobj;
if (ie || ns6)
    tipobj = document.all ? document.all["tvk_tooltip"] : document.getElementById ? document.getElementById("tvk_tooltip") : "";

function ietruebody() {
    return (document.compatMode && document.compatMode != "BackCompat") ? document.documentElement : document.body;
}

function ddrivetip(title, sapo) {
    if (ns6 || ie) {

        //if (typeof thewidth != "undefined") tipobj.style.width = thewidth + "px";
        tipobj.style.width = "300px";
        tipobj.innerHTML = '<h3>' + title + '</h3><p>' + sapo + '</p>';
        enabletip = true;
        return false;
    }
}

function positiontip(e) {
    if (enabletip) {
        var curX = (ns6) ? e.pageX : event.clientX + ietruebody().scrollLeft;
        var curY = (ns6) ? e.pageY : event.clientY + ietruebody().scrollTop;
        //Find out how close the mouse is to the corner of the window
        var rightedge = ie && !window.opera ? ietruebody().clientWidth - event.clientX - offsetxpoint : window.innerWidth - e.clientX - offsetxpoint - 20;
        var bottomedge = ie && !window.opera ? ietruebody().clientHeight - event.clientY - offsetypoint : window.innerHeight - e.clientY - offsetypoint - 20;

        var leftedge = (offsetxpoint < 0) ? offsetxpoint * (-1) : -1000;

        //if the horizontal distance isn't enough to accomodate the width of the context menu
        if (rightedge < tipobj.offsetWidth)
            //move the horizontal position of the menu to the left by it's width
            tipobj.style.left = ie ? ietruebody().scrollLeft + event.clientX - tipobj.offsetWidth + "px" : window.pageXOffset + e.clientX - tipobj.offsetWidth + "px";
        else if (curX < leftedge)
            tipobj.style.left = "5px";
        else
            //position the horizontal position of the menu where the mouse is positioned
            tipobj.style.left = curX + offsetxpoint + "px";

        //same concept with the vertical position
        if (bottomedge < tipobj.offsetHeight)
            tipobj.style.top = ie ? ietruebody().scrollTop + event.clientY - tipobj.offsetHeight - offsetypoint + "px" : window.pageYOffset + e.clientY - tipobj.offsetHeight - offsetypoint + "px";
        else
            tipobj.style.top = curY + offsetypoint + "px";
        tipobj.style.visibility = "visible";
    }
}

function hideddrivetip() {
    if (ns6 || ie) {
        enabletip = false;
        tipobj.style.visibility = "hidden";
        tipobj.style.left = "-1000px";
        tipobj.style.backgroundColor = '';
        tipobj.style.width = '';
    }
}

document.onmousemove = positiontip;


//function sticky_relocate() { var t = "advFix", o = "advFload", s = $(window).scrollTop(), c = $("#" + t).offset().top; s > c ? $("#" + o).addClass("stick") : $("#" + o).removeClass("stick") } $(window).scroll(sticky_relocate), sticky_relocate();