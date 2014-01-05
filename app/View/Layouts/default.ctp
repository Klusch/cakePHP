<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('metro-bootstrap')."\n";
        
		echo $this->Html->script('jquery/jquery.min.js')."\n";
		echo $this->Html->script('jquery/jquery.widget.min.js')."\n";
		echo $this->Html->script('metro/metro-loader.js')."\n";
		echo $this->Html->script('min/metro.min.js')."\n";
		
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
<?php echo $this->Session->flash(); ?>
	<div id="container">
	
	   <div class="grid" style="margin-bottom:0;">
         <div class="row"> <!--  style="background:rgba(255, 0, 0, 0.52);">  -->
            <div id="toptiles" style="padding-left: 10px">
            <?php 
              echo $this->fetch('topTiles');
            ?> 
            </div>
         </div>
         
         <div id="contentWithTiles" class="row"> <!-- style="background:rgba(193, 0, 123, 0.52);"> --> 
            <div id="sidetiles" class="span2" style="padding-left: 10px;"> <!-- background:rgba(193, 55, 123, 0.52); -->
              <?php echo $this->fetch('sideTiles'); ?> 
            </div>
            <div id="content" class="content" style="margin:0px; background:rgba(220, 155, 83, 0.52);"> 
              <?php if ($this->fetch('frameRequest') == 'true') {  
                      echo "<div class='balloon span10' style='padding:15px'>";
                    } else {
                      echo "<div class='balloon span10' style='padding:0px; border:0px;'>";	
                    }
                     
                    echo $this->fetch('content');
              ?></div>
           </div>         
        </div><!-- ENDE contentWithTiles -->

	</div><!-- ENDE grid -->
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
