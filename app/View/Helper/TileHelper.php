<?php
/**
 * Application level View Helper
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
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
 * @package       app.View.Helper
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Helper', 'View');

/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
*/
class TileHelper extends AppHelper {

	public $helpers = array('Html', 'Form');
	public $timeout = 10000;

	private $width_double = '250px';

	// ================================================================
	// ============ Definition der Rubrik-Icons =======================

	public $categorySet = array (
			'costs' => array ('categoryIcon' => 'icon-heart-2', 'categoryColor' => 'bg-lightGreen',
					'categoryDestination' => array('controller' => 'costs', 'action' => 'index'),
	                'description' => 'Kosten der Hochzeit'
			),	
			'movies' => array ('categoryIcon' => 'icon-enter', 'categoryColor' => 'bg-lightBlue',
					'categoryDestination' => array('controller' => 'movies', 'action' => 'index'),
	                'description' => 'Filme'
			),
			'pages' => array ('categoryIcon' => 'icon-enter', 'categoryColor' => 'bg-lightBlue',
					'categoryDestination' => array('controller' => 'movies', 'action' => 'index'),
	                'description' => 'Filme'
			),			
			'users' => array ('categoryIcon' => 'icon-user', 'categoryColor' => 'bg-darkPink',
			        'categoryDestination' => array('controller' => 'users', 'action' => 'index'),
			        'description' => 'Benutzerverwaltung'
			),
	);

	public function getCategoryItem() {
		$hilf = strtolower($this->params['controller']);
		$mySet = $this->categorySet[$hilf];
		if (empty($mySet)) {
			return $this->emptyTile();
		}
			
		return $this->specialTile($mySet['categoryIcon'],
				$mySet['categoryDestination'],
				$mySet['categoryColor']
		);
	}

	// ================================================================
	// =========== Hilfsfunktionen ====================================

	public function mobileVersion() {
		return $this->request->is('mobile');
		//return true;
	}

	public function url($url = null, $full = false) {
		if(!isset($url['language']) && isset($this->params['language'])) {
			#$url['language'] = $this->params['language'];
		}
			
		return parent::url($url, $full);
	}

	public function emptyTilesBar($amount){
		$result = "";
		for ($i=0; $i<$amount; $i++) {
			$result = $result . $this->emptyTile('');
		}
		return $result;
	}	
	
	public function emptyTile($type = 'tile'){
		$space = "       ";
		$result = "";
		$result = $result.$space."<div class='tile ".$type."'>";
		$result = $result.$space."</div>";
		return $result;
	}

	// ================================================================
	// =========== Standard OP for Toptiles ===========================

	public function addTile($id = null, $context = null) {
		return $this->actionTile('icon-plus-2', 'add', __('Add'), $id, $context);
	}

	public function viewTile($id = null) {
		return $this->actionTile('icon-info-2', 'view', __('View'), $id);
	}

	public function editTile($id = null, $secondId = null) {
		return $this->actionTile('icon-pencil', 'edit', __('Edit'), $id, $secondId);
	}

	public function editDetailsTile($id = null){
		return $this->actionTile('icon-zoom-in', 'edit_details', __('Edit Details'), $id);
	}

	public function deleteTile($id = null, $destination = null) {	
		$color = 'bg-emerald';
		$icon = 'icon-minus-2';

		$space = "       ";
		$result = "";
		$overlayText = "";
		
		$action = 'delete/'.$id;
		if ($destination != null) {
			$action = $destination['action'].'/'.$id;
		}

		$result = $result.$space."<div class='tile ".$color."'>";
		
		$result = $result.$space.$this->Form->create(null, array('id' => 'post_52b2bc87e06bd718709271',
		                                                              'name' => 'post_52b2bc87e06bd718709271',
                                                                      'inputDefaults' => array('label' => false, 'div' => false),
		                                                              'type' => 'post',
		                                                              'action' => $action));

		$result = $result.$space.$this->Form->end();
        $result = $result.$space."<a href='#' onclick='if (confirm(&quot;M\u00f6chten Sie mit dem L\u00f6schen fortfahren?&quot;)) {document.post_52b2bc87e06bd718709271.submit();} event.returnValue = false; return false;'>";
		$result = $result.$space."  <div class='tile-content icon'>";
		$result = $result.$space."       <i class='".$icon."'></i>";
		$result = $result.$space."  </div>";
        $result = $result.$space."  </a>";		
		$result = $result.$space."</div>";

		return $result;
	}	

	// =================================================================

	public function assignTile($id = null) {
		return $this->actionTile('icon-pencil', 'edit', __('Assign'), $id);
	}

	public function actionTile($icon, $action, $label, $id = null, $secondId = null) {
		$destination = array('action' => $action.'/'.$id, $secondId);
		return $this->specialTile($icon, $destination, 'bg-emerald', $label);
	}

	public function overview($item, $locations = null) {
		if (isset($item)) {
			$target = '<div>';
			$target .= $this->keyValue($item['name'], null, 5, 5, 25);
			$target .= $this->keyValue($item['description'], null, 35, 5, 18);
			if (!empty($locations)) {
				$target .= $this->keyValue($this->getPathAsString($locations), null, 80, 5, 12);
			}
			$target .='</div>';

			return $this->targetTile($target, null,	'double', 'color:#fff; background-color:#666;');
		}
	}

	public function getPathAsString($locations, $separator = ' / ') {
		$path = '';
		$size = sizeof($locations);
		foreach ($locations as $i => $location) {
			$path .= $location['Location']['name'];
			if ($i < $size -1) {
				$path .= $separator;
			}
		}
		return $path;
	}

	public function keyValue($key, $value, $top, $left = 5, $font_size = 12) {
		$target = '<h7 class = "state"
				style = "font-weight: bold;
				font-size: '.$font_size.'px;
						position: absolute;
						top: '.$top.'px;
								left: '.$left.'px;
										white-space:nowrap;">';
		if (!empty($key)) {
			$target .= substr($key, 0, 50);
		}
		$target .= '</h7>';
		if ($value != null) {
			$target .= '&nbsp;';
			$target .= '<h7 class = "state" style = "font-size: '.$font_size.'px; position: absolute; top: '.$top.'px; left: 150px;">';
			$target .= $value;
			$target .= '</h7>';
		}
		return $target;
	}

	public function inputTile($model, $fields = array()) {
		$target = $this->Form->create($model);

		foreach ($fields as $field) {
			if ($field['id'] == 'id') {
				$target .= $this->Form->input($field['id']);
			} else {
				$options = array(
						'style' => 'vertical-align:middle; width:'.$this->width_double,
						'div' => NULL
				);
				if (isset($field['params'])) {
					$options = array_merge($field['params'],
							$options);
				}

				$input = $this->Form->input($field['id'],
						$options);

				$target .= '<div class="input-control text nbm" data-role="input-control">';
				$target .= $input;
				$target .= '<button class="btn-clear" tabindex="-1" type="button"></button>';
				$target .= '</div>';

				if (isset($field['br'])) {
					$target .= '<br><br>';
				}
			}
		}
		$target .= $this->Form->end(__('Submit'));

		return $this->targetTile($target, null,	'double triple-vertical', 'background-color:#fff;');
	}


	public function fillDefaults($options, $defaults){
		foreach(array_keys($defaults) as $key){
			if(!isset($options[$key])){
				$options[$key] = $defaults[$key];
			}
		}
		return $options;
	}

	// ================================================================
	// ============== Image-Tiles =====================================

	public function imageTileTriple($icon, $destination = array(), $text = '') {
		$image = $this->Html->image($icon, array('width' => '380', 'height' => '120', 'alt' => 'Icon'));
		$image .= $this->Html->div('', $this->tileTextOverlay($text));
		return $this->targetTile($image, $destination, 'tile triple');
	}

	public function imageTileDouble($icon, $destination = array(), $text = '') {
		$image = $this->Html->image($icon, array('width' => $this->width_double, 'height' => '120', 'alt' => 'Icon'));
		$image .= $this->Html->div('', $this->tileTextOverlay($text));
		return $this->targetTile($image, $destination, 'tile double');
	}

	public function imageTile($icon, $destination = array(), $text = '', $depth = 0) {
		$image = $this->Html->image($icon, array('width' => '120', 'height' => '120', 'alt' => 'Icon'));
		$image .= $this->Html->div('', $this->tileTextOverlay($text));
		if ($depth == 0) {
		  return $this->targetTile($image, $destination);
		} else {
            return $this->targetTile($image, $destination, '', '', 'image', '', $depth);
		}
	}

	// ================================================================

	public function targetTile($target, $destination = array(), $class = '', $style = '', $tileContent = 'image', $title = '', $hierarchydepth = 0) {
		$space = "       ";

		$link = '';
		if (!empty($destination)) {
			$link = $this->Html->link(
					$target,
					$destination,
					array('escape' => false, 'title' => str_replace('<br>', ' ', $title))
			);
		}
		return $this->targetLinkTile($target, $link, $class, $style, $tileContent, $hierarchydepth);
	}

	public function targetTileText($target, $destination = array(), $text = '', $class = '', $style = '', $tileContent = 'image', $hierarchydepth = 0){
		$target .= $this->Html->div('', $this->tileTextOverlay($text));
		return $this->targetTile($target, $destination, $class, $style, $tileContent, $text, $hierarchydepth);
	}

	public function targetLinkTile($target, $link = '', $class = '', $style = '', $tileContent = 'image', $hierarchydepth = 0) {
		$space = "       ";
		$result = "";
			
		$result .= $space."<div class='tile ".$class."'>\n";
		$result .= $space."   <div class='tile-content ".$tileContent."' style='".$style."'>\n";
			
		if (empty($link)) {
			$result .= $space.$target;
		} else {
			$result .= $space.$link;
		}
			
		$result .= $space."   </div>\n";
		if ($hierarchydepth > 0) {
		  $result .= $space."       <div class='stripe-hgl$hierarchydepth bg-dark'>\n";
		  $result .= $space."       </div>\n";
		}			
		$result .= $space."</div>\n";
			
		return $result;
	}

	// ================================================================
	// ============== Special-Tiles =====================================

	public function specialTextTile($icon, $destination = array(), $color = 'bg-darkPink', $text  = '', $tileOptions = array()) {
		$txtComponent = "";
		if (!empty($text)) {
			$txtComponent = $this->tileTextOverlay($text);
		}

		$result = $this->specialTile($icon, $destination, $color, $text, $tileOptions, $txtComponent);

		return $result;
	}

	public function specialTile($icon, $destination = array(), $color = 'bg-darkPink', $text= '', $tileOptions = array(), $txtComponent = '') {
		$class = "tile $color ";

		if(isset($tileOptions['class'])){
			$class .= " ".$tileOptions['class']." ";
		}
		if(isset($tileOptions['selected'])){
			if($tileOptions['selected']){
				$class .= " selected ";
			}
			unset($tileOptions['selected']);
		}

		$icon = $this->Html->div('tile-content icon', "<i class='$icon'></i>$txtComponent");
		if (!empty($destination)) {
			$icon = $this->Html->link($icon, $destination, array('escape' => false, 'title' => str_replace('<br>', ' ', $text)));
		}
		return $this->Html->div($class, $icon, $tileOptions);
	}

	public function tileTextOverlay($text){
		$tileElement = "";
		if (!empty($text)) {
			$tileElement .= "<div class='brand bg-grayLight opacity' style='z-index:1'>";
			$tileElement .= "<span class='text' style='word-wrap: break-word;'>";
			$tileElement .= $text;
			$tileElement .= "</span>";
			$tileElement .= "</div>";
		}
		return $tileElement;
	}

	// ===========================================================================

	public function listViewElement($image, $destination, $title, $subtitle, $remark) {
		$space = "       ";
		$result = "";

		$result .= $space."<div class='list-content'>\n";

		$result .= $space.$image = $this->Html->image($image, array('class' => 'icon'));
		$result .= $space."        <div class='data'>\n";
		$result .= $space."            <span class='list-title'>$title</span>\n";
		$result .= $space."            <span class='list-subtitle'>$subtitle</span>\n";
		$result .= $space."            <span class='list-remark'>$remark</span>\n";
		$result .= $space."        </div>\n";
		$result .= $space."</div>\n";

		$result = $this->Html->link(
				$result,
				$destination,
				array('class' => 'list', 'escape' => false)
		);

		return $result;
	}

	// ===========================================================================
	// ====================== ADD/EDIT Masken ====================================	
	
  public function typeField($ref, $label, $fieldtype, $selection = null, $emptySelectable = false) {
  	
  	$klasse = 'input-control text nbm';
  	
  	switch ($fieldtype) {
  		case 'text'      : break;
  		case 'password'  : $klasse = 'input-control password nbm';
  		                   break;
  		case 'selection' : $klasse = 'input-control select nbm';
  		                   break;
  	}
  	
  	$inp = array('selected' => $selection, 'label' => false, 'div' => array('class' => $klasse, 'data-role' => 'input-control'));
    if ($emptySelectable) {
  	  $inp = array('selected' => $selection, 'empty' => '', 'label' => false, 'div' => array('class' => $klasse, 'data-role' => 'input-control'));
    }
    
  	$result = "";
    $result .= "<tr>";
    $result .= "  <td class='text-left' style='vertical-align:middle'><strong>". __($label) . ":</strong></td>";
    $result .= "  <td>";
    $result .= $ref->Form->input($label, $inp);
    $result .= "  </td>";
    $result .= "</tr>";
    return $result;  	
  	
  } 	
  
  private function i18nLocations() {
  	__('Add');
  	__('Schedule');
  	__('Edit_details');
  	__('Tour_schedule');
  	
  	__('username');
  	__('password');
  	__('first_name');
  	__('last_name');
  	__('employee_number');
  	__('email');
  	__('phone');
  	__('cell');
  	__('fax');
  	__('group_id');
  	__('company_id');
  	__('hourly_rate');
  	
  	__('name');
  	__('address');
  	__('zip');
  	__('city');
  	__('country');
  	__('phone');
  	__('fax');
  	__('number_of_employees');
  	__('number_of_visitors');
  	__('number_of_bathrooms');
  	__('note');
  }
}
