$(function(){
    $("#alldo").click(function(){
        $.ajax({
            type:"post",
            url:"../bss/mainRecord_all.php",
            success:function(){
                history.go(0);
            }
        });
    });
    $("#done").click(function(){
        var arr = document.getElementsByClassName("cbox");
        var array = [];
        var x=0;
        for(var i=0;i<arr.length;i++){
            if($(".cbox:eq("+i+")").prop("checked")){
                array[x] = $(".id:eq("+i+")").text();
                x++;
            }
        };
        $.ajax({
            type:"post",
            url:"../bss/mainRecord_done.php",
            data:{arr:array},
            success:function(){
                history.go(0);
            }
        });
    });
    $("#dont").click(function(){
        var arr = document.getElementsByClassName("cbox");
        var array = [];
        var x=0;
        for(var i=0;i<arr.length;i++){
            if($(".cbox:eq("+i+")").prop("checked")){
                array[x] = $(".id:eq("+i+")").text();
                x++;
            }
        };
        $.ajax({
            type:"post",
            url:"../bss/mainRecord_dont.php",
            data:{arr:array},
            success:function(){
                history.go(0);
            }
        });
    });
});