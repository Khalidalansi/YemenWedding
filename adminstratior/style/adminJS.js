$(document).ready(function(){
    var number=2;
var url;
    //-----------------------------------------
    $('.enable_hall').click(function(){
        var f= confirm("هل انت متاكد من هذه العملية"); 
        if(f){
        var th=$(this);
        var p=th.parent();
        var hall_id=p.find('#hall_id').val();
        var hall_staute=p.find('#hall_staute').val();
//       alert(hall_id);
//       alert(hall_staute);
    var sendData="hid="+hall_id+"&stuate="+hall_staute;	
        $.post('mothed/enbaldhall.php',sendData,function(data){ 
           alert(data);
         window.url='?tab=halls'
           gotourl();
        });
    }
    });
    //------------------------------------------------
     //-----------------------------------------
    $('.enable_clinet').click(function(){
        var f= confirm("هل انت متاكد من هذه العملية"); 
        if(f){
        var th=$(this);
        var p=th.parent();
        var hall_id=p.find('#clinet_id').val();
        var hall_staute=p.find('#clinet_staute').val();
//       alert(hall_id);s
//       alert(hall_staute);
    var sendData="cid="+hall_id+"&stuate="+hall_staute;	
        $.post('mothed/EnbaldAccount.php',sendData,function(data){ 
           alert(data);
         window.url='?tab=account'
           gotourl();
        });
    }
    });
    //------------------------------------------------
    function gotourl()
{         
//   alert(window.url);
     setTimeout(gotourl,1000);
     
     number--;
     if(number<0)
     {
         window.location=window.url;
         number=0;
      }
 }
});
