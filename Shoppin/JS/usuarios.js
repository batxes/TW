$(document).ready( function() {
      $("table.zebra").find("tr:nth-child(even)").each(
        function(i) {
          if( 0 == $(this).find("th").length ) {
            $(this).addClass("even");
          }
        }
      );
    } );