//ブラウザの判定

var wWidth = 0;
var wHeight = 0;
var headHeight = 0;
var headHeightSp = 0;
var headHeightPc = 0;
var bPoint = 900;

/* getWidth */
function getWidth() {
  wWidth = window.innerWidth;
  return wWidth;
}

/* getHeight */
function getHeight() {
  wHeight = window.innerHeight;
  return wHeight;
}

/* ReLayout */
function ReLayout() {

  wWidth = getWidth();
  wHeight = getHeight();

  // body padding top
  if(wWidth <= bPoint) {
    headHeight = headHeightSp;
  } else {
    headHeight = headHeightPc;
  }

  // topLesson
  if($('#pageHome #lesson .guitar')[0]) {
    topLesson();
  }


}
//ReLayout();


$(function () {

  getWidth();
  getHeight();

  /* for IE */
  var agent = navigator.userAgent;
  var userAgent = window.navigator.userAgent.toLowerCase();
  if (userAgent.match(/(msie|MSIE)/) || userAgent.match(/(T|t)rident/)) {
    var isIE = true;
    $("html").addClass('ie');
    var ieVersion = userAgent.match(/((msie|MSIE)\s|rv:)([\d\.]+)/)[3];
    ieVersion = parseInt(ieVersion);
  } else {
    var isIE = false;
    $("html").removeClass('ie');
  }

  /* IEでの fixed カクつき防止 */
  if(navigator.userAgent.match(/MSIE 10/i) || navigator.userAgent.match(/Trident\/7\./) || navigator.userAgent.match(/Edge\/12\./)) {
    $('body').on("mousewheel", function () {
      event.preventDefault();
      var wd = event.wheelDelta;
      var csp = window.pageYOffset;
      window.scrollTo(0, csp - wd);
    });
  }


  var timer = false;
  $(window).resize(function () {
    if (timer !== false) {
      clearTimeout(timer);
    }
    timer = setTimeout(function () {
      var ww = $(window).width();
      if (wWidth != ww) {
        ReLayout();
        changeImage();
      }
    }, 200);
  });
});



//ブラウザの判定
$(function() {
　　 /* ユーザーエージェントの文字列を取得 */
      var useragent = window.navigator.userAgent.toLowerCase();

    /* ブラウザごとの条件分岐 */
    if (useragent.indexOf('msie') != -1 ||
          useragent.indexOf('trident') != -1) {
          //Internet Explorerに適応させたい内容
      } else if(useragent.indexOf('edge') != -1) {
          //Edgeに適応させたい内容
  } else if (useragent.indexOf('chrome') != -1) {
          //Chromeに適応させたい内容
  } else if (useragent.indexOf('safari') != -1) {
          //Safariに適応させたい内容
  } else if (useragent.indexOf('firefox') != -1) {
          //FireFoxに適応させたい内容
  } else if (useragent.indexOf('opera') != -1) {
          //Operaに適応させたい内容
  } else {
          //上記以外のブラウザに適応させたい内容
  };
});


// ブラウザバック
window.onpageshow = function(){
  setTimeout(function () {
    ReLayout();
  }, 200);
}


// loaded
$.event.add(window, 'load', function () {
  setTimeout(function () {
    ReLayout();
    changeImage();
  }, 200);
});


// changeImage
function changeImage() {
  if (wWidth <= bPoint) {
    if($('.change')[0]){
      $('.change').each(function(){
        $(this).attr("src",$(this).attr("src").replace('_pc', '_sp'));
      });
    }
  } else {
    if($('.change')[0]){
      $('.change').each(function(){
        $(this).attr("src",$(this).attr("src").replace('_sp', '_pc'));
      });
    }
  }
}



/****************************************
　loading
****************************************/
$(function () {
  var h = $(window).height();
  $('#loaderBg').height(h).css('display','block');
  $('#loader').delay(500).queue(function(){
  	$('#loader').addClass('view');
  });

  //10秒たったら強制的にロード画面を非表示
  setTimeout(function () {
    stopload();
  }, 10000);
});
$.event.add(window, 'load', function () {
  $('#pageWrapper').addClass('view');
  $('#loaderBg').delay(200).fadeOut(300);
  $('#loader').delay(100).fadeOut(300);
});
function stopload(){
  $('#pageWrapper').addClass('view');
  $('#loaderBg').delay(900).fadeOut(800);
  $('#loader').delay(600).fadeOut(300);
}

/****************************************
menu open
****************************************/
$(function () {
  $('#siteHead .menu').on('click',function(){
    $(this).toggleClass('open');
    if($(this).hasClass('open')){
      $('#gNav').addClass('open');
    } else {
      $('#gNav').removeClass('open');
    }
  });
  $('#gNav li a').on('click',function(){
    $('#siteHead .menu').removeClass('open');
    $('#gNav').removeClass('open');
  });
});


/****************************************
navPC activate
****************************************/
$(function () {
  if($('#gNav .navi')[0]){
    if($('#pageLifeinfo')[0]){$('#gNav .navi li.lifeinfo a').addClass('current');}
    if($('#pageCommunity')[0]){$('#gNav .navi li.community a').addClass('current');}
    if($('#pageProcedure')[0]){$('#gNav .navi li.procedure a').addClass('current');}
    if($('#pageTerms')[0]){$('#gNav .navi li.terms a').addClass('current');}
    if($('#pageDefense')[0]){$('#gNav .navi li.defense a').addClass('current');}
    if($('#pageMap')[0]){$('#gNav .navi li.map a').addClass('current');}
  }
});




/****************************************
navSP ハンバーガーの制御
****************************************/

$('.burger_btn').on('click',function(){
  $('.burger_btn').toggleClass('close');
  $('.nav_sp').fadeToggle(500);
  $('body').toggleClass('noscroll');
});




/****************************************
// スクロールしたらクラス追加して、トップへ戻るボタンを下から出す。
****************************************/

$(function(){
  var wWidth = $(window).width();
  $(window).scroll(function() {
    var scrollTop = $(this).scrollTop();
    var scrollHeight = 900;
    if (scrollTop > scrollHeight) {
      $('#toPageTop').addClass('scrollfixed');
      } else {
      $('#toPageTop').removeClass('scrollfixed');
    }
  });
});

/****************************************
pageTopLink view
****************************************/
var pageTopLink = function () {
  var i = $(window).scrollTop();
  if (i >= 400) {
    $('#toPageTop').addClass('view');
  } else {
    $('#toPageTop').removeClass('view');
  }

  //プリロード
  function mypreload() {
    for (var i = 0; i < arguments.length; i++) {
      $("<img>").attr("src", arguments[i]);
    }
  }
  if ($('body').attr('id') == 'pageHome') {
    mypreload(templatePath + '/assets/images/pagetop.png');
  }
}
$(function () {
  $(window).bind('resize scroll load', function () {
    pageTopLink();
  });
});



/****************************************
move
****************************************/
$(window).scroll(function(){
  $('.move').each(function(){
    var top = $(this).offset().top; // ターゲットの位置取得
    var position = top - $(window).height() / 1.4;  // ターゲットが上からスクロールしたときに見える位置
    var position_bottom = top + $(this).height() / 1.6;  // ターゲットが下からスクロールしたときに見える位置
    if($(window).scrollTop() > position && $(window).scrollTop() < position_bottom){
      $(this).addClass('go');
    }
  });
});


$(function() {
  var getWindowMovieHeight = function() {
    // ここでブラウザの縦横のサイズを取得します。
    var windowSizeHeight = $(window).outerHeight();
    var windowSizeWidth = $(window).outerWidth();

    // メディアの縦横比に合わせて数値は変更して下さい。(メディアのサイズが width < heightの場合で書いています。逆の場合は演算子を逆にしてください。)
    var windowMovieSizeWidth = windowSizeHeight * 1.76388889;
    var windowMovieSizeHeight = windowSizeWidth / 1.76388889;
    var windowMovieSizeWidthLeftMargin = (windowMovieSizeWidth - windowSizeWidth) / 2;

    if (windowMovieSizeHeight < windowSizeHeight) {
      // 横幅のほうが大きくなってしまう場合にだけ反応するようにしています。
      $("video").css({left: -windowMovieSizeWidthLeftMargin});
    }
  };

  // 以下画面の可変にも対応できるように。
  $(window).on('load', function(){
    getWindowMovieHeight();
  });

  $(window).on('resize', function(){
    getWindowMovieHeight();
  });
});








$(function () {
  if($('.company_carousel').length) {
    $('.company_carousel').slick({
      autoplay: true,
      autoplaySpeed: 0,
      cssEase: 'linear',
      speed: 10000,
      dots:false,
      arrows:false,
      variableWidth: true,
      slidesToShow: 1,
      responsive: [{
        breakpoint: 750,
        settings: {
          speed: 5000,
        }
      }]
    });
  }
});


$(document).on('click', 'ul.show li a', function(){
  replaceWidth = 751;
  var windowWidth = parseInt($(window).width());
  if (windowWidth < replaceWidth) {
    $('.header_nav ul, #nav_open').removeClass('show');
  }
});


// SERVICEナビホバー時に背景に background: rgba(0, 0, 0, 0.5);

$(function() {
  $('.accordion').mouseover(function(e) {
	$('.accordion_black').addClass("onmouse");
    })
  $('.accordion').mouseout(function(e) {
	$('.accordion_black').removeClass("onmouse");
    })
});

// SERVICEナビホバースマホ版;

$(function(){
	$('.toggle_title').click(function(){
		$(this).toggleClass('selected');
		$(this).next().slideToggle();
	});
});




// mv
$(window).on('load', function() {
  if($('.home').length) {
    setTimeout(function(){
      $('body').addClass('animation_ignite');
    }, 500);
    setTimeout(function(){
      $('.loading_animation_bg').fadeOut();
    }, 1000);
    setTimeout(function(){
      $('.swiper-container1').addClass('scaleback');
    }, 1400);
    setTimeout(function(){
      $('.mv__txt').addClass('active');
    }, 2000);
    setTimeout(function(){
      $('.header_nav').addClass('active');
    }, 2300);
  }
});

