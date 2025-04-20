$(document).ready(function(){
    //$(selector).action
    $("#klik").click(function(){
        alert("Tes");
    });

    $("#hide").click(function(){
        $("h1").hide();
    });
    $("#show").click(function(){
        $("h1").show();
    });
    $("#toggle").click(function(){
        $("h1").toggle();
    })

    $("#fadeIn").click(function(){
        $("#box1").fadeIn("slow");
    });
    $("#fadeOut").click(function(){
        $("#box1").fadeOut("slow");
    });
    $("#fadetoggle").click(function(){
        $("#box1").fadetoggle("slow");
    })

    $("#animasi").click(function(){
        $("#box2").animate({
            left: '250px',
            opacity: '0,5',
            height: '200px',
            width: '200px'
        });
    });
});