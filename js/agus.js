$('.nav-item').on('click', function (e) {

    //ambil isi link dengan class scr 
    var alamat = $(this).attr('href');

    //mencari target yang dituju
    var tujuan = $(alamat);

    //memindahkan ke elemen tujuan
    $('html, body').animate({
        scrollTop: tujuan.offset().top - 100
    }, 1000, 'swing');

    //mematikan fungsi href
    e.preventDefault();
});

// 
$(window).scroll(function () {
    var wScroll = $(this).scrollTop();
    $('.pic-agus1').css({
        'transform': 'translate(0px, ' + wScroll / 10 + '%'
    });

    if (wScroll > $('#portfolio').offset().top - 250) {
        $('.portfolio').each(function (i) {
            setTimeout(function () {
                $('.portfolio').eq(i).addClass('muncul');
            }, 300 * (i + 1));
        });
    }

    if ($(this).scrollTop() > 50) {
        $('#munggah').fadeIn();
    } else {
        $('#munggah').fadeOut();
    }
    if ($(this).scrollTop() > 400) {
        $('#navbar').removeClass("position-relative");
        $('#navbar').addClass("sticky-top");
    } else {
        $('#navbar').removeClass("sticky-top");
        $('#navbar').addClass("position-relative");
    }
});

$('#munggah').on('click', function () {
    $('#munggah').tooltip('hide');
    $('body,html').animate({
        scrollTop: 0
    }, 800);
    return false;
});

$('#munggah').tooltip('hide');