$(document).ready(function() {
  $(".card").hover(
    function () {
      $(this).addClass("z-depth-4");
    },
    function () {
      $(this).removeClass("z-depth-4");
    }
  );

  $("body.canvasjs-chart-credit").hide();
});
