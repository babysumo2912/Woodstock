// $(window).bind("load", function() {
//     // IMAGE RESIZE
//     $('.img-product').each(function() {
//         // var maxWidth = 50;
//         var maxHeight = 50;
//         var ratio = 0;
//         var width = $(this).width();
//         var height = $(this).height();
     
//         // if(width > maxWidth){
//         //     ratio = maxWidth / width;
//         //     $(this).css("width", maxWidth);
//         //     $(this).css("height", height * ratio);
//         //     height = height * ratio;
//         // }
//         var width = $(this).width();
//         var height = $(this).height();
//         if(height > maxHeight){
//             ratio = maxHeight / height;
//             $(this).css("height", maxHeight);
//             $(this).css("width", width * ratio);
//             width = width * ratio;
//         }
//         if(height < maxHeight){
//             ratio = height / maxHeight;
//             $(this).css("height", maxHeight);
//             $(this).css("width", width * ratio);
//             width = width * ratio;
//         }
//     });
// });
$(document).ready(function(){
    // back to top
    if($(".btn-top").length > 0){
        $(".btn-top").hide();
        $(window).scroll(function(){
            var e = $(window).scrollTop();
            if(e > 150){
                $(".btn-top").show();
            }else{
                $(".btn-top").hide();
            }
        });
        $(".btn-top").click(function(){
            $('body','html').animate({
                scrollTop: 0
            })
        })
    };
    //end_tao nut back to top
    //tao menu
    if($(".fixNav").length > 0){
        $(".fixNav").hide();
        $(window).scroll(function(){
            var e = $(window).scrollTop();
            if(e > 96){
                $(".header").hide();
                $(".fixNav").show();
            }else{
                $(".fixNav").hide();
                $(".header").show();
            }
        })
    };
    // end
})