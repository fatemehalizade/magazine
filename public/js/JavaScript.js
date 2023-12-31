let num=0;
$(function(){

    $(".commentSec").on("click",".answerBTN",function(){
        showAnswerForm()
    })
    $(".commentModalContainer").on("click",".icon-cancel",function(){
        hideAnswerForm()
    })
    
    $(".icon-search").click(function(){
        if(num==0){
            showSearch();
            num=1;
        }else if(num==1){
            hideSearch();
            num=0;
        }

    })

    $(".MenuBTN").click(function(){
        showMenuModal()
    })

    $(".login").click(function(){
        showLoginModal()
    })

    $(".icon-cancel").click(function(){
        closeModals()
    })

    $(".GoRegister").click(function(){
        moveRegisterBox()
    })
    $(".GoLogin").click(function(){
        moveLoginBox()
    })
})

function showMenuModal(){
    $(".MenuModal").css({
        "z-index":"1",
        "opacity":"1",
        "transition":"0.3s"
    })
    setTimeout(function(){
        $(".MenuSec").css({
            "opacity":"1",
            "z-index":"2",
            "top":"2%",
            "transition":"0.4s"
        })
    },200)
}
function showLoginModal(){
    $(".MenuModal").css({
        "z-index":"1",
        "opacity":"1",
        "transition":"0.3s"
    })
    setTimeout(function(){
        $(".LoginSec,.RegisterSec").css({
            "z-index":"1",
            "opacity":"1",
            "top":"2%",
            "transition":"0.3s"
        })
    },200)
    $(".loginContainer input, .RegisterContainer input").css({
        "cursor": "text"
    })
}
function closeModals(){
    $(".MenuSec,.LoginSec,.RegisterSec").css({
        "z-index":"-1",
        "opacity":"0",
        "top":"0",
        "transition":"0.3s"
    })
    setTimeout(function(){
        $(".MenuModal").css({
            "z-index":"-1",
            "opacity":"0",
            "transition":"0.4s"
        })
    },200)
    $(".loginContainer input, .RegisterContainer input").css({
        "cursor": "default"
    })
}
function moveRegisterBox(){
    $(".RegisterSec").css({
        "left":"12%",
        "transition":"0.5s"
    })
    $(".LoginSec").css({
        "right":"-130%",
        "transition":"0.5s"
    })
}
function moveLoginBox(){
    $(".RegisterSec").css({
        "left":"-130%",
        "transition":"0.5s"
    })
    $(".LoginSec").css({
        "right":"12%",
        "transition":"0.5s"
    })
}
function hideSearch(){
    setTimeout(function(){
        $(".search").css({
            "width":"28px",
            "transition": "0.4s"
        })
    },300)
    $(".search input").css({
        "opacity": "0",
        "transition": "0.4s"
    })
    setTimeout(function(){
        $(".search input").css({
            "display": "none"
        })
    },200)
}
function showSearch(){
    $(".search").css({
        "width":"18vw",
        "transition": "0.4s"
    })
    $(".search input").css({
        "display": "block"
        
    })
    setTimeout(function(){
        $(".search input").css({
            "opacity": "1",
            "transition": "0.4s"
        })
    },200)
}
function MessageBox(){
    $(".MSGBox").css({
        "left":"42%",
        "transition":"0.5s"
    })

    setTimeout(function(){
        $(".MSGBox").css({
            "left":"-30%",
            "transition":"0.5s"
        })
    },2000)
}
function showAnswerForm(){
    $(".commentModalContainer").css({
        "z-index":"1"
    })
    setTimeout(function(){
        $(".commentModalContainer").css({
            "opacity":"1",
            "transition":"0.4s"
        })
        $(".commentModal").css({
            "transform": "translateY(0px)",
            "transition":"0.4s"
        })
    },200)
}
function hideAnswerForm(){
    $(".commentModalContainer").css({
        "opacity":"0",
        "transition":"0.4s"
    })
    $(".commentModal").css({
        "transform": "translateY(70px)",
        "transition":"0.4s"
    })
    setTimeout(function(){
        $(".commentModalContainer").css({
            "z-index":"-3"
        })
    },200)
}