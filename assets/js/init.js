        var mchatTimerId = -1;
        var mmchat_list_limit = 10;
        var mchat_more_count = 5;
        var mchat_list = new Array();

        var mcheckDuplicate = function(chat_one) {

            for(var i=(mchat_list.length-1);i>=0;i--) {

                if(mchat_list[i][3] == chat_one[3]) {

                    return true;
                }
            }

            return false;

        }

        var maddChats = function(arrayOfData) {

            var child = '';
            for(var i=0;i<arrayOfData.length;i++) {

                var chat_one = arrayOfData[arrayOfData.length-i-1];

                
                
                //if(!mcheckDuplicate(chat_one)) {

                    mchat_list.push(chat_one);
                    
                    child += '<li style="height:55px;background:white;width:100%;border-top:1px solid #fff;">';
                    var chat5 = chat_one[5] + "";
                    if ( chat5.length > 2 ) child += '<a href="'+chat_one[5]+'">';
                    child += '    <span class="rounded-image topbar-profile-image" style="width:44px;margin:5px 5px;background:white;border:1px solid #bbb;float:left;">';
                    child += '        <img src="' + chat_one[4] + '">';
                    child += '    </span>';
                    child += '    <span style="color:#5b5b5b;width:230px;float:right;margin-top:7px;margin-right:10px;">'; 
                    child += '        <span style="float:left;"><b>'+chat_one[3]+'</b></span>';
                    child += '        <span style="float:right;">'+chat_one[2]+'</span>';
                    child += '        <span style="width:240px;float:left;">'+chat_one[1]+'</span>';
                    child += '    </span>';
                    if ( chat5.length > 2 ) child += '</a>';
                    child += '</li>';

                    time = chat_one[3];
                //}
            }
            
            if (arrayOfData.length > 0) {
                $("#unread").html(child);
                $("#unreadBadge").addClass("red");
                $("#unreadBadge").text(arrayOfData.length+"");    
            }
        }

        var mgetNewChats = function () {

            var time = "";
            if(mchat_list.length > 0) {
                time = mchat_list[mchat_list.length-1][3];
            }

            var get_url = "/chat/getUnread";

            console.log("ping");
            
            $.getJSON(get_url, function (data){
                 console.log(data.length+":size");
                if(mchatTimerId != -1) {

                    maddChats(data);

                }
            });
        }

        var mstartTimer = function() {

            if(mchatTimerId == -1) {

                mchatTimerId = setInterval(function () {
                    mgetNewChats(0);
                }, 5000);
            }
        }

        var mstopTimer = function() {

            if(mchatTimerId != -1) {

                clearInterval(mchatTimerId);
                mchatTimerId = -1;
            }
        }

        
        $(document).ready(function() {

            mstartTimer();

        });






var w;
var h;
var dw;
var dh;

function executeFunctionByName(functionName, context /*, args */) {
  var args = [].slice.call(arguments).splice(2);
  var namespaces = functionName.split(".");
  var func = namespaces.pop();
  for(var i = 0; i < namespaces.length; i++) {
    context = context[namespaces[i]];
  }
  return context[func].apply(this, args);
}

var changeptype = function(){
    w = $(window).width();
    h = $(window).height();
    dw = $(document).width();
    dh = $(document).height();

    if(jQuery.browser.mobile === true){
          $("body").addClass("mobile").removeClass("fixed-left");
    }

    if(!$("#wrapper").hasClass("forced")){
        if(w > 990){
            $("body").removeClass("smallscreen").addClass("widescreen");
          $("#wrapper").removeClass("enlarged");
        }else{
            $("body").removeClass("widescreen").addClass("smallscreen");
            $("#wrapper").addClass("enlarged");
        }
    }
    toggle_slimscroll(".slimscrollleft");
}

$(document).ready(function(){
    FastClick.attach(document.body);
    resizefunc.push("initscrolls");
    resizefunc.push("changeptype");
    $('.sparkline').sparkline('html', { enableTagOptions: true });

    $('.animate-number').each(function(){
        $(this).animateNumbers($(this).attr("data-value"), true, parseInt($(this).attr("data-duration"))); 
    })

//TOOLTIP
$('body').tooltip({
  selector: "[data-toggle=tooltip]",
  container: "body"
});

//RESPONSIVE SIDEBAR


$(".open-right").click(function(e){
  $("#wrapper").toggleClass("open-right-sidebar");
  e.stopPropagation();
  $("body").trigger("resize");
});


$(".open-left").click(function(e){
    e.stopPropagation();
    $("#wrapper").toggleClass("enlarged");
    $("#wrapper").addClass("forced");
    $(".left ul").removeAttr("style");
    toggle_slimscroll(".slimscrollleft");
    $("body").trigger("resize");
});

// LEFT SIDE MAIN NAVIGATION
$("#sidebar-menu a").on('click',function(e){
  if(!$("#wrapper").hasClass("enlarged")){

    if($(this).parent().hasClass("has_sub")) {
      e.preventDefault();
    }   

    if(!$(this).hasClass("subdrop")) {
      // hide any open menus and remove all other classes
      $("ul",$(this).parents("ul:first")).slideUp(350);
      $("a",$(this).parents("ul:first")).removeClass("subdrop");
      $("#sidebar-menu .pull-right i").removeClass("fa-angle-up").addClass("fa-angle-down");
      
      // open our new menu and add the open class
      $(this).next("ul").slideDown(350);
      $(this).addClass("subdrop");
      $(".pull-right i",$(this).parents(".has_sub:last")).removeClass("fa-angle-down").addClass("fa-angle-up");
      $(".pull-right i",$(this).siblings("ul")).removeClass("fa-angle-up").addClass("fa-angle-down");
    }else if($(this).hasClass("subdrop")) {
      $(this).removeClass("subdrop");
      $(this).next("ul").slideUp(350);
      $(".pull-right i",$(this).parent()).removeClass("fa-angle-up").addClass("fa-angle-down");
      //$(".pull-right i",$(this).parents("ul:eq(1)")).removeClass("fa-chevron-down").addClass("fa-chevron-left");
    }
  } 
});

// NAVIGATION HIGHLIGHT & OPEN PARENT
$("#sidebar-menu ul a.active").parents("li:last").children("a:first").addClass("active").trigger("click");

//WIDGET ACTIONS
$(".widget-header .widget-close").on("click",function(){
  $item = $(this).parents(".widget:first");
  bootbox.confirm("Are you sure to remove this widget?", function(result) {
    if(result === true){
      $item.addClass("animated bounceOutUp");
        window.setTimeout(function () {
           $item.remove();
        }, 300);
    }
  }); 
});

$(document).on("click", ".widget-header .widget-toggle", function(event){
  event.preventDefault();
  $(this).toggleClass("closed").parents(".widget:first").find(".widget-content").slideToggle();
});

$(document).on("click", ".widget-header .widget-popout", function(event){
  event.preventDefault();
  var widget = $(this).parents(".widget:first");
  if(widget.hasClass("modal-widget")){
    $("i",this).removeClass("icon-window").addClass("icon-publish");
    widget.removeAttr("style").removeClass("modal-widget");
    widget.find(".widget-maximize,.widget-toggle").removeClass("nevershow");
    widget.draggable("destroy").resizable("destroy");
  }else{
    widget.removeClass("maximized");
    widget.find(".widget-maximize,.widget-toggle").addClass("nevershow");
    $("i",this).removeClass("icon-publish").addClass("icon-window");
    var w = widget.width();
    var h = widget.height();
    widget.addClass("modal-widget").removeAttr("style").width(w).height(h);
    $(widget).draggable({ handle: ".widget-header",containment: ".content-page" }).css({"left":widget.position().left-2,"top":widget.position().top-2}).resizable({minHeight: 150,minWidth: 200});
  }
  $("body").trigger("resize");
});

$(document).on("click", ".widget", function(){
    if($(this).hasClass("modal-widget")){
      $(".modal-widget").css("z-index",5);
      $(this).css("z-index",6);
    }
});

$(document).on("click", '.widget .reload', function (event) { 
  event.preventDefault();
  var el = $(this).parents(".widget:first");
  blockUI(el);
    window.setTimeout(function () {
       unblockUI(el);
    }, 1000);
});

$(document).on("click", ".widget-header .widget-maximize", function(event){
    event.preventDefault();
    $(this).parents(".widget:first").removeAttr("style").toggleClass("maximized");
    $("i",this).toggleClass("icon-resize-full-1").toggleClass("icon-resize-small-1");
    $(this).parents(".widget:first").find(".widget-toggle").toggleClass("nevershow");
    $("body").trigger("resize");
    return false;
});

$( ".portlets" ).sortable({
    connectWith: ".portlets",
    handle: ".widget-header",
    cancel: ".modal-widget",
    opacity: 0.5,
    dropOnEmpty: true,
    forcePlaceholderSize: true,
    receive: function(event, ui) {$("body").trigger("resize")}
});

// Init Code Highlighter
prettyPrint();

//RUN RESIZE ITEMS
$(window).resize(debounce(resizeitems,100));
$("body").trigger("resize");

//SELECT
$('.selectpicker').selectpicker();


//FILE INPUT
$('input[type=file]').bootstrapFileInput();


//DATE PICKER
$('.datepicker-input').datepicker();


//ICHECK
$('input:not(.ios-switch)').iCheck({
  checkboxClass: 'icheckbox_square-aero',
  radioClass: 'iradio_square-aero',
  increaseArea: '20%' // optional
});

// IOS7 SWITCH
$(".ios-switch").each(function(){
    mySwitch = new Switch(this);
});

//GALLERY
$('.gallery-wrap').each(function() { // the containers for all your galleries
    $(this).magnificPopup({
        delegate: 'a.zooming', // the selector for gallery item
        type: 'image',
            removalDelay: 300,
            mainClass: 'mfp-fade',
        gallery: {
          enabled:true
        }
    });
}); 



});

var debounce = function(func, wait, immediate) {
  var timeout, result;
  return function() {
    var context = this, args = arguments;
    var later = function() {
      timeout = null;
      if (!immediate) result = func.apply(context, args);
    };
    var callNow = immediate && !timeout;
    clearTimeout(timeout);
    timeout = setTimeout(later, wait);
    if (callNow) result = func.apply(context, args);
    return result;
  };
}

function resizeitems(){
  if($.isArray(resizefunc)){  
    for (i = 0; i < resizefunc.length; i++) {
        window[resizefunc[i]]();
    }
  }
}

function initscrolls(){
    if(jQuery.browser.mobile !== true){
        //SLIM SCROLL
        $('.slimscroller').slimscroll({
          height: 'auto',
          size: "5px"
        });

        $('.slimscrollleft').slimScroll({
            height: 'auto',
            position: 'left',
            size: "5px",
            color: '#7A868F'
        });
    }
}
function toggle_slimscroll(item){
    if($("#wrapper").hasClass("enlarged")){
      $(item).css("overflow","inherit").parent().css("overflow","inherit");
      $(item). siblings(".slimScrollBar").css("visibility","hidden");
    }else{
      $(item).css("overflow","hidden").parent().css("overflow","hidden");
      $(item). siblings(".slimScrollBar").css("visibility","visible");
    }
}

function nifty_modal_alert(effect,header,text){
    
    var randLetter = String.fromCharCode(65 + Math.floor(Math.random() * 26));
    var uniqid = randLetter + Date.now();

    $modal =  '<div class="md-modal md-effect-'+effect+'" id="'+uniqid+'">';
    $modal +=    '<div class="md-content">';
    $modal +=      '<h3>'+header+'</h3>';
    $modal +=      '<div class="md-modal-body">'+text;
    $modal +=      '</div>';
    $modal +=    '</div>';
    $modal +=  '</div>';

    $("body").prepend($modal);

    window.setTimeout(function () {
        $("#"+uniqid).addClass("md-show");
        $(".md-overlay,.md-close").click(function(){
          $("#"+uniqid).removeClass("md-show");
          window.setTimeout(function () {$("#"+uniqid).remove();},500);
        });
    },100);

    return false;
}

function blockUI(item) {    
    $(item).block({
      message: '<div class="loading"></div>',
      css: {
          border: 'none',
          width: '14px',
          backgroundColor: 'none'
      },
      overlayCSS: {
          backgroundColor: '#fff',
          opacity: 0.4,
          cursor: 'wait'
      }
    });
}

function unblockUI(item) {
    $(item).unblock();
}

function toggle_fullscreen(){
    var fullscreenEnabled = document.fullscreenEnabled || document.mozFullScreenEnabled || document.webkitFullscreenEnabled;
    if(fullscreenEnabled){
      if(!document.fullscreenElement && !document.mozFullScreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement) {
          launchIntoFullscreen(document.documentElement);
      }else{
          exitFullscreen();
      }
    }
}


// Thanks to http://davidwalsh.name/fullscreen

function launchIntoFullscreen(element) {
  if(element.requestFullscreen) {
    element.requestFullscreen();
  } else if(element.mozRequestFullScreen) {
    element.mozRequestFullScreen();
  } else if(element.webkitRequestFullscreen) {
    element.webkitRequestFullscreen();
  } else if(element.msRequestFullscreen) {
    element.msRequestFullscreen();
  }
}

function exitFullscreen() {
  if(document.exitFullscreen) {
    document.exitFullscreen();
  } else if(document.mozCancelFullScreen) {
    document.mozCancelFullScreen();
  } else if(document.webkitExitFullscreen) {
    document.webkitExitFullscreen();
  }
}


        