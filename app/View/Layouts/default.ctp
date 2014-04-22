<?php

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('metro-bootstrap')."\n";
                echo $this->Html->css('metro-bootstrap-responsive')."\n";
//                echo $this->Html->css('iconFont')."\n";
//                echo $this->Html->css('docs')."\n";
                
		echo $this->Html->script('jquery/jquery-2.1.0.min.js')."\n";
		echo $this->Html->script('jquery/jquery-ui-1.9.2.min.js')."\n";
		echo $this->Html->script('jquery/jquery.mousewheel.js')."\n";

//		echo $this->Html->script('load-metro.js')."\n";
                echo $this->Html->script('metro/metro-loader.js')."\n";
		echo $this->Html->script('docs.js')."\n";
                
		// http://www.rgraph.net/docs/starting-with-rgraph.html
		echo $this->Html->script('RGraph/RGraph.common.core.js')."\n";
		echo $this->Html->script('RGraph/RGraph.common.tooltips.js')."\n";
		echo $this->Html->script('RGraph/RGraph.common.dynamic.js')."\n";
		echo $this->Html->script('RGraph/RGraph.pie.js')."\n";
		
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body class="metro">
<noscript>
Sorry, but this site relays entirely on javascript. <br />
For your information, it doesn't include any tracker or any script linking to another domain.
</noscript>

   

<?php

   echo $this->Nav->fetch('header');

   $user = $this->Session->read('Auth.User');
   echo $this->Session->flash();
?>
	<div id="container">
	
	   <div class="grid" style="margin-bottom:0;">
	   
         <div class="row"> <!--  style="background:rgba(255, 0, 0, 0.52);">  -->
            <div id="toptiles" style="padding-left: 10px">
            <?php 
              echo $this->fetch('topTiles');
            ?> 
            </div>
         </div>
         
         <div style="padding-left: 7px">
           <?php echo $this->fetch('breadCrumbs'); ?> 
         </div>
         
         <div id="content-row" class="row" style="padding-left: 10px; padding-top: 10px;">

            <div id="content" class="content" style="margin:0px; background:rgba(220, 155, 83, 0.52);"> 
              <?php if ($this->fetch('frameRequest') == 'true') {  
                      echo "<div id='content-balloon-frame' class='balloon span12' style='padding:15px; width:0px'>";
                    } else {
                      echo "<div id='content-balloon-without-frame' class='balloon span12' style='padding:0px; border:0px;'>";	
                    }
                     
                    echo $this->fetch('content');
              ?></div>
           </div>         
        </div><!-- ENDE contentWithTiles -->

	</div><!-- ENDE grid -->
        
<?php  echo $this->Html->script('hagleitner/custom-messages.js'); ?>        
<?php  echo $this->JSResize->contentResizer($user, $this->request->params['controller']); ?>
        
</body>
</html>
