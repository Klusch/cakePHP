<?php
  // app/View/Users/view_filtered.ctp
$this->start('frameRequest');
   echo 'true';
$this->end();  

$this->start('topTiles');

   echo $this->Category->tile();
   echo $this->Operation->add(null, $group['Group']['id']);

$this->end();
?>

<?php 

  $row1 = array();
  $row2 = array();
  $row3 = array();

  $counter = 0;
  foreach ($users as $user):
         $help = $this->App->listViewElement($user['Group']['picture_url'],
                                          array('controller' => 'users', 'action' => 'edit', $user['User']['id']),
                                          $user['User']['username'],
                                          $user['User']['first_name'].' '.$user['User']['last_name'],
                                          $user['Company']['name']);

         switch ($counter % 3) {
         	case 0: $row1[] = $help;
         		    break;
         	case 1: $row2[] = $help;
         		    break;
         	case 2: $row3[] = $help;
         		    break;
         }                                          
                                          
         $counter++;                                          
      endforeach;

?>



<div class="span4">
    <div class="listview">

<?php
      foreach ($row1 as $row):
         echo $row;
      endforeach;
?>

	</div>
</div>
<div class="span4">	
	    <div class="listview">

<?php
      foreach ($row2 as $row):
         echo $row;
      endforeach;
?>

	</div>
</div>

<div class="span4">	
	    <div class="listview">


<?php
      foreach ($row3 as $row):
         echo $row;
      endforeach;
?>

	</div>
</div>
