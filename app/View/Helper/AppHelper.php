<?php

/**
 * Application level View Helper
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
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
class AppHelper extends Helper {

    public $helpers = array('Html', 'Form', 'Session');

    // ================================================================
    // =========== Breadcrumbs & Accordion ============================

    public function breadcrumbs($crumbs) {
        $result = "";
        $home = array('controller' => 'pages', 'action' => 'display', 'home');
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
            if (isset($crumb['link'])) {
                $result .= $this->Html->link($crumb['text'], $crumb['link'], array('escape' => false, 'title' => $crumb['text'])) . "</li>";
            } else {
                $result .= $crumb['text'] . "</li>";
            }
        }

        $result .= "  </ul>
                    </nav>";
        return $result;
    }

    public function accordion($frames, $activatedId = 0) {
        $result = "";
        foreach ($frames as $i => $frame) {
            $result .= $this->accordionFrame(
                    $frame['size']
                    , $frame['head']
                    , $frame['content']
                    , $i == $activatedId);
        }

        return "<div class='accordion with-marker' data-role='accordion'>
                    $result
                </div>";
    }

    private function accordionFrame($size, $head, $content, $activated = false) {
        return "<div class='accordion-frame'>
                <a href='#' class='" . ($activated ? "active " : "") . " heading'>
                    <div>
                        <div style='width:30px;float:right;margin-top:-2px'>
                            <button class='button small'> $size </button>
                        </div>
                        <div> $head </div>   
                    </div>
                </a>
                <div class='content'>$content</div>
              </div>";
    }

}
