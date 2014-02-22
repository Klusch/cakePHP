<?php
// View/Costs/overall.ctp
// ------------------------------------
$this->start('frameRequest');
   echo 'true';
$this->end();
// ------------------------------------
?>

<?php
// ------------------------------------
$this->start('breadCrumbs');
   $crumbs = array();
   $crumb = array(
       'text' => __('Kosten der Hochzeit'),
       'link' => array('controller' => 'costs', 'action' => 'index')            
       );
   $crumbs[] = $crumb;
   echo $this->App->breadcrumbs($crumbs);
$this->end();
// ------------------------------------
?>

<?php
// ------------------------------------
$this->start('topTiles');
    echo $this->Tile->getCategoryItem('costs');
    
    $parameters = array(
        'tileSize' => null,
        'color' => 'bg-red',
        'icon' => 'icon-dollar',
        'image' => null,
        'destination' => array('action' => 'festivity'),
        'title' => __('Kosten der Feier'),
        'text' => __('Feier'),
        'id' => null
    );    
    echo $this->Tile->iconTile($parameters);    
    
     $parameters = array(
        'tileSize' => null,
        'color' => 'bg-yellow',
        'icon' => 'icon-dollar',
        'image' => null,
        'destination' => array('action' => 'journey'),
        'title' => __('Kosten der Reise'),
        'text' => __('Reise'),
        'id' => null
    );    
    echo $this->Tile->iconTile($parameters);
    
    echo $this->Tile->emptyTilesBar(4);
$this->end();
// ------------------------------------
?>

<h2>Gesamtkosten der Hochzeit</h2>

<canvas id="cvs" width="600" height="250">[No canvas support]</canvas>

<script>


window.onload = function ()
{
    var data = <?php echo $values; ?>;

    var pie = new RGraph.Pie('cvs', data)
        .Set('labels', <?php echo $labels; ?>)
        .Set('tooltips', <?php echo $labels; ?>)
        .Set('tooltips.event', 'onmousemove')
        .Set('colors', ['#EC0033','#A0D300','#FFCD00','#00B869','#999999','#FF7300','#004CB0'])
        .Set('strokestyle', 'white')
        .Set('linewidth', 3)
        .Set('shadow', true)
        .Set('shadow.offsetx', 2)
        .Set('shadow.offsety', 2)
        .Set('shadow.blur', 3)
        .Set('exploded', 7)
    
    for (var i=0; i<data.length; ++i) {
        pie.Get('labels')[i] = pie.Get('labels')[i] + ', ' + data[i] + ' Euro';
    }
    
    pie.Draw();
}
</script>