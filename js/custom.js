$(document).ready(function(){

  function fetchData(){
              var fetch_data = '';
              var element = $(this);
              var id = element.attr("id");
              $.ajax({
                   url:"db/getinfo.php",
                   method:"POST",
                   async:false,
                   data:{id:id},
                   success:function(data){
                        fetch_data = data;
                   }
              });
              return fetch_data;
         }

  // Enables popover
   $(".my-popover").popover({
       html : true,
       trigger: "manual",
       animation: false,
       content: fetchData
   })
   .on("mouseenter", function () {
        var _this = this;
        //$(this).popover("show");
        setTimeout(function () {
               $(_this).popover("show");
       }, 1);
        $(".popover").on("mouseleave", function () {
            $(_this).popover('hide');
        });
    }).on("mouseleave", function () {
        var _this = this;
        setTimeout(function () {
            if (!$(".popover:hover").length) {
                $(_this).popover("hide");
            }
        }, 1);
});
});
