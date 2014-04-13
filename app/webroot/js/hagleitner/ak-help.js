 // ------------------------------------------------------------
  // -------------------- Helping Functions ---------------------

  
  // Simulation einer ganzahligen Division
  function fDiv(n1, n2) {
     if ( n1*n2 > 0 ) 
         return Math.floor( n1/n2 );
     else
    	 return Math.floor( n1/n2 );
         //return Math.ceil ( n1/n2 );
  }

  function computeIdealWidth(widthByMenu) {
	gap = 10;
	tile = 120;
	return widthByMenu + (2 * gap);
  }

  function computeIdealHeight() {
	gap = 10;
	var heightByMenu = $("#sidetiles").height() - gap;
	var heightByContent = $("div.balloon").height();
    if (heightByContent > heightByMenu) {

      var addTiles = fDiv((heightByContent - heightByMenu), 130);
      if ( (heightByMenu + (addTiles * 130)) <= heightByContent) {
         addTiles++;
      }
     
   	  for ( var i = 0; i < addTiles; i++ ) {
 	     $("#sidetiles").append("<div id='addedSideTiles' class='tile addedSideTiles'></div></div>"); //<div class='brand-hgl bg-dark'>
 	  } 

      return heightByMenu + (addTiles * 130);
      //return heightByContent;
    }
	return heightByMenu;
  }

  function getSpecialNavTile() {
     return $("#toptiles > div").first(); //.addClass('toptile');
  }
  
  function getBreadCrumbs(breadCrums) {	  
	  var hilf = "<li>" + getSpecialNavTile().html() + "</li>";  
      for (var i=breadCrums.length-1; i>=0; i--) {
         hilf = hilf + "<li><a href='#'>" + breadCrums[i] + "</i></a></li>";
      }
      return hilf;
  }

  function extractElementsOfDOM(domPart) {
	  var breadCrums = [];
	  domPart.children('.text').each(function(i) { 
 		 breadCrums.push($(this).text());
 		});

	  return breadCrums;
  }


  

  // ------------------------------------------------------------
  // -------------- Change Layout 4 small devices ---------------
  function checkMobileDevice() {
	  var windowWidth = $( window ).width();
	  
      if (windowWidth < 769) {
         removeHagleitnerlogo(); // den Rest erledigen die Mediaqueries

         if (windowWidth < 485) { // jetzt muss man eingreifen
             userMenu2WholePage(windowWidth);
        	 convertTilesToBreadcrums(); // Sidetiles
        	 makeContentSmaller(windowWidth); // Balloon
        	 makeTilesSmaller(); // Toptiles
           	 $("#toptiles div.triple").remove();
        	 $("#toptiles div.double").remove();
         } else {
             //makeContentSmaller(windowWidth - 140);
             resizeContent(windowWidth - 120, computeIdealHeight());
         }
 
         return true;
      }

      return false;
  }

  function removeHagleitnerlogo() {
	  $("#hagleitnerlogo").remove();
  }  

  function userMenu2WholePage(width) {
      $("nav span").remove();
      $("nav div.element").attr('style', function(i,s) { return s + '; width: '+width+'px !important;' });
  }

  function convertTilesToBreadcrums() {

	 // > means only first element
 	 var countedTiles = $("#sidetiles > div").size();
 	 var breadCrums = extractElementsOfDOM($('#sidetiles div'));
 	 $("#sidetiles").remove();
 	 $("#contentWithTiles").prepend("<nav class='breadcrumbs mini'>" +
 	                                   "<ul>" + getBreadCrumbs(breadCrums) +
                                        "</ul>" +
                                    "</nav>");
  } 

  function makeContentSmaller(width) {
      $("#wholeContent").attr('style', function(i,s) { return s + '; width: '+width+'px;' });
	  $("div.span10.content").removeClass("span10");
	  $("div.balloon").removeClass("span10").removeClass("balloon");
	  $("div.content").addClass("spanMobile");
	  $("div.content").attr('style', function(i,s) { return s + '; width: '+width+'px;' });
	  $(".example").css({"padding" : "0", "content" : '""'});
  }

  function makeTilesSmaller() {
	  $("#toptiles div.tile").each(function () {
	     $(this).addClass("half");
	     }
        );
	  $("nav .tile-nav").each(function () {
		     $(this).css({"width" : "55px", "height" : "55px", "margin-right" : "0"});
		     //$(this).removeClass('tile-nav').addClass('tile half');
		     }
	        )
  }
  // ------------ Change Layout for small devices ---------------
  // ------------------------------------------------------------

  // ------------------------------------------------------------
  // --------------- Layout for normal devices ------------------    
  function fillAdditionalTiles() {
    	 spaceBetweenTiles = 10;
    	 var maxTileBarSize = 1040;
    	 tileAndSpace = 140;

    	 var windowSize = $( window ).width();
    	 
         var addTiles = 0;
         var sumTileSpace = spaceBetweenTiles;
        
         $("#toptiles > div").each(
            function() {
            	sumTileSpace = sumTileSpace + $(this).width()+ spaceBetweenTiles;              	
            }
         );

         // den letzten Space will man nicht
         sumTileSpace = sumTileSpace - spaceBetweenTiles;
         	
         if (maxTileBarSize > windowSize) {
        	 maxTileBarSize = windowSize;
         }
        
         if (sumTileSpace < maxTileBarSize) {
            var spaceLeft = maxTileBarSize - sumTileSpace;           
            addTiles = fDiv(spaceLeft, tileAndSpace);
         }

    	 for ( var i = 0; i < addTiles; i++ ) {
    	    $("#toptiles").append("<div id='addedTopTiles' class='tile addedTopTiles'></div></div>"); //<div class='brand-hgl bg-dark'>
    	 }

    	 sumTileSpace = sumTileSpace + (addTiles * 140) - ((2 + addTiles) * spaceBetweenTiles);
    	 return sumTileSpace;
  }

  function resizeContent(width, height) {
	  $("div.content").attr('style', function(i,s) { return s + '; width: '+width+'px !important;' });
	  $("div.content").attr('style', function(i,s) { return s + '; height: '+height+'px !important' });
	  $("div.balloon").attr('style', function(i,s) { return s + '; width: '+(width-140)+'px !important' });
	  $("div.balloon").attr('style', function(i,s) { return s + '; height: '+height+'px !important' });
  }
  // --------------- Layout for normal devices ------------------  
  // ------------------------------------------------------------