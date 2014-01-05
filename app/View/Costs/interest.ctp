<?php
$this->start('frameRequest');
   echo 'true';
$this->end(); 
?>

<?php
$this->start('topTiles');
    echo $this->Tile->getCategoryItem();  
    echo $this->Tile->emptyTilesBar(6);
$this->end();
?>

<?php
$this->start('sideTiles');
    $destination = array('action' => 'overall');
    echo $this->Tile->specialTile('icon-dollar-2', $destination, 'bg-grayLighter', null);
    $destination = array('action' => 'festivity');
    echo $this->Tile->specialTile('icon-dollar', $destination, 'bg-grayLighter', null);
    echo $this->Tile->specialTile('icon-chart-alt', null, 'bg-grayLighter', 'Catering-Details');    
    echo $this->Tile->emptyTilesBar(3);
$this->end(); 
?> 

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