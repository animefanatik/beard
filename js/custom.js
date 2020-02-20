/* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
function resNav() {
    var x = document.getElementById("mainNav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
} 



$(document).on('ready', function() {
	$(".carousel" ).slick({
        dots: true,
        accessibility: true,
        adaptiveHeight: true,        
        infinite: true,
        speed: 700,
        centerMode: true,
        centerPadding: '50px',
        variableWidth: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        draggable: true,
        initialSlide: 1,
        mobileFirst: false,
            responsive: [
        {
            breakpoint: 1105,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,
                dots: false
            }
        },			
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,
                dots: false
            }
        },
        {
            breakpoint: 690,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
    ]
  });
});
