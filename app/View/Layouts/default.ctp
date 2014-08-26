<?php
/**
 *
 * PHP 5
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

$cakeDescription = __d('cake_dev', "Alex's little management");
?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--         <meta name="viewport" content="width=device-width"> -->
        
        <title>
                <?php echo $cakeDescription ?>:
                <?php echo $title_for_layout."\n"; ?>
        </title>

<?php

//    <link rel="stylesheet" href="css/style.css"/>
//	<!-- <link rel="stylesheet" media="print" href="css/print.css"/> -->
    echo $this->Html->css('metro/metro-bootstrap', array('media' => 'screen'))."\n".
         $this->Html->css('metro/metro-bootstrap-responsive', array('media' => 'screen'))."\n".
         $this->Html->css('metro/iconFont', array('media' => 'screen'))."\n".
         $this->Html->css('metro/docs', array('media' => 'screen'))."\n".
         $this->Html->css('holder/holder', array('media' => 'screen'))."\n".          
         $this->Html->css('metro/metro-customized', array('media' => 'screen'))."\n".            
//         $this->Html->css('metro/metro-customized', array('media' => 'screen'))."\n".
         $this->Html->css('hagleitner', array('media' => 'screen'))."\n".
         $this->Html->css('D3Plotting')."\n".
         $this->Html->css('foundation-datepicker')."\n";
    
    echo $this->Html->css('sensor/style');
         
    echo $this->Html->css('metro/metro-print', array('media' => 'print'))."\n".
         $this->Html->css('hagleitner', array('media' => 'print'))."\n"; //.
// R        $this->Html->css('treetable/stylesheets/jquery.treetable').
// R        $this->Html->css('treetable/stylesheets/jquery.treetable.theme.default');
         
    echo $this->Html->script('jquery/jquery-1.10.2.js')."\n".
         $this->Html->script('jquery/jquery.widget.min.js')."\n".
         $this->Html->script('lodash.js')."\n".
         $this->Html->script('moment-with-langs.js').
         $this->Html->script('foundation/foundation-datetimepicker.js')."\n".
 
         $this->Html->script('bootstrap/bootstrap.min.js')."\n".
         $this->Html->script('metro/metro-loader.js')."\n".
         $this->Html->script('d3/d3.v3.min.js')."\n".
         $this->Html->script('jquery/spin.min.js').
// R       $this->Html->script('treetable/javascripts/src/jquery.treetable.js');
         $this->JsTree->includes();
?>

</head>

<body class="metro <?php echo $this->params['controller'] ?>">

   
    
  <noscript>
    <div id='flash-message' class='input-control text warning-state' data-role='input-control'>
        <?php  echo "<input value='".__('You have to activate javascript to use this application')."' type='text'>\n"; ?>
    </div>
  </noscript>
    
  <header class="bg-ak" data-load="" style="margin-top:-14px">
  <?php
     $user = $this->Session->read('Auth.User');
     echo $this->Nav->topBar($user);
  ?>     
  </header>

  
   
  <div class="container">

    <?php echo $this->Session->flash(); ?>
    <?php echo $this->fetch('breadCrumbs');?>  
      
    <!-- Obere Menüleiste -->
    <div class="grid">
      <?php
        $tmp = $this->fetch('topTiles');
        if (!empty($tmp)) {
           echo "<div class='row'>"
                        . $this->fetch('topTiles') .
                "</div>";
        }
      ?> 
    </div>   
        
    <!-- Content-Bereich -->
    <div><!--
        <div class="left">
            &nbsp;
        </div>-->
        <div id="contentWithTiles" class="row right" <?php if ($this->fetch('fullSize') == 'true') { echo " style='width:100%'"; } ?>> 
             <!--<div id="content" class="content">-->
                <div class='<?php echo $this->params['controller'] ?>' id='content-hgl' style='  
                    <?php echo ($this->fetch('frameRequest') == 'true') 
                       ? " padding:15px;"
                       : " padding:0px; border:0px;"?>'>
                    <?php echo $this->fetch('content'); ?>
                    <!--<div id='dynamic-content-hgl' style='overflow : auto;height:auto'>-->
                    </div>
                </div>
            <!--</div>-->
        </div>

        <?php echo $this->fetch('dynamicContent'); ?>
    </div>       
<!--
    <div class="result" style="position:relative; float:left; width:250px; margin-top: 10px; height:auto"></div> 
-->

  </div><!-- Ende Container -->
  
<!-- JavaScript -->
<!-- global -->
<?php  //echo $this->Html->script('hagleitner/custom-messages.js') . "\n"; ?>
<?php  //echo $this->JSResize->contentResizer($user, $this->request->params['controller']); ?>

<!-- local -->
<?php echo $this->fetch('pageScripts')."\n";?>
<!-- Ende JavaScript -->

</body>
</html>
