<?php
$this->start('frameRequest');
   echo 'true';
$this->end(); 
?>

<?php
$this->start('topTiles');
    echo $this->Tile->getCategoryItem();
    $destination = array('action' => 'clothes');
    echo $this->Tile->specialTile('icon-coins', $destination, 'bg-gray', 'Kleidung-Details');
    $destination = array('action' => 'catering');
    echo $this->Tile->specialTile('icon-coins', $destination, 'bg-yellow', 'Catering-Details');
    $destination = array('action' => 'interest');
    echo $this->Tile->specialTile('icon-chart-alt', $destination, 'bg-blue', 'Most-Details');    
    echo $this->Tile->emptyTilesBar(3);
$this->end();
?>

<?php
$this->start('sideTiles');
    $destination = array('action' => 'overall');
    echo $this->Tile->specialTile('icon-dollar-2', $destination, 'bg-grayLighter', null);
    echo $this->Tile->specialTile('icon-dollar', null, 'bg-grayLighter', null);
    echo $this->Tile->emptyTilesBar(4);
$this->end(); 
?> 

<?php 
//$values = "[4,8,6,3,5,2]";
//$labels = "['Henning','Louis','John','Pete','Lucy','Fred']";
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