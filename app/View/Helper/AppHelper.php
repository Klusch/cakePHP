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
 * For full copyright and license ination, please see the LICENSE.txt
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
class AppHelper extends Helper {

    public $helpers = array('Html', 'Form', 'Text');
    public $timeout = 10000;
    public $validationDomain = 'validation';
    public $accordionFrameSize = 'accordion-frame-size';
    
    public $dateFormat = 'yyyy-mm-dd';
    public static $navTileColor = 'bg-hglBlue1';
    public static $disabledTileColor = 'bg-lightGray';
    public static $additionalTileColor = 'bg-orange';
    public static $accordionColor = '#e3e3e3';

    public function definitionList($definitions){
        return "
            <dl>
            ".call_user_func(function ($d) {
                $s = "";
                array_walk($d, function ($k, $v) use (&$s){
                    $s .= "
                        <dt>
                           $v
                        </dt>
                        <dd>
                           $k
                        </dd>
                    ";
                });
                return $s;
            },
            $definitions)."
            </dl>
            ";
    }

    // ================================================================
    // =========== Javascript code generation =========================

    public function jsMaybe2($x, $a1, $a2, $nothing=""){
        if(!isset($x[$a1])){
            return $nothing;
        }
        if(!isset($x[$a1][$a2])){
            return $nothing;
        }
        return $x[$a1][$a2];
    }

    public function jsEntityAssignmentJSON($entityDefinition){
        return call_user_func(function($d) {
            $attr = array();
            array_walk($d, function ($value, $key) use (&$attr) {
                array_push($attr, "'$key' : $value");
            });
            return "{\n".implode($attr, ",\n")."\n}";
        },
        $entityDefinition);
    }

    public function jsString($s) {
        return "\"" . trim(preg_replace('/\s\s+/', ' ', $s)) . "\"";
    }

    public function jsStringConc($s) {
        return implode(" + ", $s);
    }

    public function jsSelect($contentClass, $entities, $id, $attribute) {
        return $this->jsStringConc(array($this->jsString("
            <select name=data[$contentClass][$id]>"), "
                (function ($entities) {
                    var options = \"\";
                    $($entities).each(function (i, v){
                        options += " . $this->jsStringConc(array($this->jsString("
                        <option value=possibility.id>"), "
                            v.$attribute", $this->jsString("
                        </option>"))) . "
                    });
                    return options;
                })(this.$contentClass.$entities)", $this->jsString("
            </select>")));
    }

    // ================================================================
    // =========== Hilfsfunktionen ====================================

    public function mobileVersion() {
        return $this->request->is('mobile');
        //return true;
    }

    // ================================================================
    // =========== Breadcrumbs & Accordion ============================

    public function breadcrumbs($crumbs) {
        $result = "";
        $home = array('controller' => 'configurations', 'action' => 'index');
        $target = "<i class='icon-home'></i>";

        $result .= "<nav class='breadcrumbs'>
                      <ul>";
        $result .= "     <li>" . $this->Html->link($target, $home, array('escape' => false, 'title' => 'Home')) . "</li>";
        $size = count($crumbs);
        foreach ($crumbs as $i => $crumb) {
            if ($i == $size - 1) {
                $result .= " <li class='active'>";
            } else {
                $result .= " <li>";
            }
            
            $text = $this->truncate($crumb['text']);
            if (isset($crumb['link'])) {
                $result .= $this->Html->link($text, $crumb['link'], array('escape' => false, 'title' => $crumb['text'])) . "</li>";
            } else {
                $result .= $text . "</li>";
            }
        }

        $result .= "  </ul>
                    </nav>";
        return $result;
    }
    
    public function truncate($text, $limit = 50) {
    	$trimmedText = $text;
    	if (strlen($text) > $limit) {
	    	$trimmedText = $this->Text->truncate(
	    			$text,
	    			$limit,
	    			array(
	    					'ellipsis' => '...',
	    					'exact' => true,
	    					'html' => true
	    			)
	    	);
    	}
    	return $trimmedText;
    }
    
    /**
     * // DIE richtige Implementierung des Accordions
     * 
     * @param type $frames
     * @param type $activatedId
     * @param type $colorClass
     * @return type
     */
    public function accordion($frames, $activatedId = 0) {
        return "
             <div id='parent-accordion' class='accordion with-marker' data-role='accordion'>" .
                call_user_func(function () use (&$frames, $activatedId) {
                    array_walk($frames, function(&$frame, $i) use ($activatedId) {
                        $id = '';
                        if (isset($frame['id'])) {
                            $id = $frame['id'];
                        }

                        $accordionColor = AppHelper::$accordionColor;
                        if (isset($frame['accordionColor'])) {
                            $accordionColor = $frame['accordionColor'];
                        }
                        
                        $frame = $this->accordionFrame(
                                $frame['size']
                                , $frame['head']
                                , "<div class='grid' style='margin-top:-20px; margin-bottom:-10px'><div class='row'>" . $frame['content'] . "</div></div>"
                                , $i == $activatedId
                                , $id
                                , $accordionColor                                
                                );
                    });
                    return implode($frames);
                }) . "
            </div>
            ";
    }

    private function accordionFrame($size, $head, $content, $activated, $id, $colorClass) {
        $headColor = $colorClass;
        $bodyColor = $colorClass;
        return "
            <div class='accordion-frame'>
                <a href='#' class='". $headColor . ($activated ? " active " : "") . " heading' id='accordion-frame" . $id . "'>
                    <div>
                        <div style='width:30px;float:right;margin-top:-2px'>
                            <button class='button small' id='" . $this->accordionFrameSize . $id . "'> $size </button>
                        </div>
                        <div id='accordion-heading'> $head </div>   
                    </div>
                </a>
                <div class='content ".$bodyColor."' style='margin:0px;'>$content</div>
            </div>
            ";
    }

    // =================================================================

    public function fillDefaults($options, $defaults) {
        foreach (array_keys($defaults) as $key) {
            if (!isset($options[$key])) {
                $options[$key] = $defaults[$key];
            }
        }
        return $options;
    }



    // ===========================================================================

    /*
     * This function builds an element for lists
     * Normally elemnts are surounded by:
     *     <div class="listview-outlook" data-role="listview"> ... </div>
     */
    public function listViewElement($image, $destination, $title, $subtitle, $remark) {
        $space = "       ";
        $result = "";

        $result .= $space . "<div class='list-content'>\n";

        $result .= $space . $image = $this->Html->image($image, array('class' => 'icon', 'title' => $title));
        $result .= $space . "        <div class='data'>\n";
        $result .= $space . "            <span class='list-title'>$title</span>\n";
        $result .= $space . "            <span class='list-subtitle'>$subtitle</span>\n";
        $result .= $space . "            <span class='list-remark'>$remark</span>\n";
        $result .= $space . "        </div>\n";
        $result .= $space . "</div>\n";

        $result = $this->Html->link(
                $result, $destination, array('class' => 'list', 'escape' => false)
        );

        return $result;
    }
    
    /**
     * Creates buttons for login form
     * 
     * @return The buttons
     */
    function getSaveAndDeleteButtons($delete = true) {
        $buttons = array();
        if ($delete) {
            $buttons[] = array('type' => 'delete', 'buttonText' => __('Delete'));
        }
        $buttons[] = array('type' => 'save', 'buttonText' => __('Save'));
        return $buttons;
    }
    
    /**
     * Creates buttons for add forms
     * 
     * @return The buttons
     */
    function getSaveAndResetButtons($selectAll = false) {
        $buttons = array();
        if ($selectAll) {
            $buttons[] = array('type' => 'selectAll', 'buttonText' => __('Select all'));
        }
        $buttons[] = array('type' => 'reset', 'buttonText' => __('Reset'));
        $buttons[] = array('type' => 'save', 'buttonText' => __('Save'));
        return $buttons;
    }  
    
    /**
     * @Deprecated
     * 
     * @param type $selectAll
     * @return type
     */
    function getSaveAndResetButtonsJScript($selectAll = false) {
        $buttons = array();
        if ($selectAll) {
            $buttons[] = array('type' => 'selectAll', 'buttonText' => __('Select all'));
        }
        $buttons[] = array('type' => 'reset', 'buttonText' => __('Reset'));
        $buttons[] = array('type' => 'saveByJScript', 'buttonText' => __('Save'), 'jsFunction' => 'sendResponse()');
        return $buttons;
    }  
    
}
