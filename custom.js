$(document).ready(function(){
  // Enables popover
   $("#example-popover").popover({
       html : true,
       trigger: "manual",
       animation: false,
       content: function() {
         return $("#example-popover-content").html();
       },
       title: function() {
         return $("#example-popover-title").html();
       }
   })
   .on("mouseenter", function () {
        var _this = this;
        //$(this).popover("show");
        setTimeout(function () {
               $(_this).popover("show");
       }, 600);
        $(".popover").on("mouseleave", function () {
            $(_this).popover('hide');
        });
    }).on("mouseleave", function () {
        var _this = this;
        setTimeout(function () {
            if (!$(".popover:hover").length) {
                $(_this).popover("hide");
            }
        }, 200);
});
});
