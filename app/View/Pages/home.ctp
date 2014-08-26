<?php
// ------------------------------------
$this->start('leftTiles');
    echo "<div class='tile double'>
            <div class='tile-content image'>
                <img src='img/Banken/Comerzbank.jpg'>
            </div>
          </div>";
$this->end();
// ------------------------------------

// ------------------------------------
$this->start('rightTiles');
    echo $this->Tile->getCategoryItem();
    echo $this->Tile->getCategoryItem('userlogin');   
$this->end();
// ------------------------------------

echo $this->Tile->getCategoryItem('costs');
echo $this->Tile->getCategoryItem('movies');
echo $this->Tile->getCategoryItem('joomlas');
echo $this->Tile->getCategoryItem('banks');
echo $this->Tile->getCategoryItem('powers');
echo $this->Tile->getCategoryItem('projects');
echo $this->Tile->getCategoryItem('colors');
echo $this->Tile->getCategoryItem('elektronicparts');
?>
