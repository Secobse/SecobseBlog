$(document).ready(function(){
  // add introdution
  $(".addIntro").click(function(){
    $(".introDetaile").eq(0).addClass("introDetailHide");
    $(".introDetaile").eq(1).removeClass("introDetailHide");
    $(".cancelBtn").click(function(){
      $(".introDetaile").eq(0).removeClass("introDetailHide");
      $(".introDetaile").eq(1).addClass("introDetailHide");
    });
  });

// person information
  var getClickIndex=document.getElementsByClassName("addEdit");
  var count=0;
  var clickIndex=[];
  $(".addEdit").click(function(){
    count+=1;
    var getCurrentIndex=$(".addEdit").index(this);//get current click item index
    clickIndex[count]=getCurrentIndex;//record current click item index
      $(".addInfor").eq(clickIndex[count-1]).fadeOut("fast");
      $(".displayInfor").eq(clickIndex[count-1]).fadeIn("fast");
      //cancel Previous click style
      $(".displayInfor").eq(clickIndex[count]).fadeOut("fast");
      $(".addInfor").eq(clickIndex[count]).fadeIn("fast");
      //add style click item
  });
});
