<?php

define('IND', (PHP_SAPI == 'cli') ? PHP_EOL : '                                          ');
define('IND2', (PHP_SAPI == 'cli') ? PHP_EOL : '                                    ');

// http://advitum.de/2013/05/cakephp-tutorial-views-layouts-und-helpers/
App::uses('AclComponent', 'Controller/Component');

class NavHelper extends AppHelper {

    public $name = 'Nav';

    public function main($group = null) {
        switch ($group) {
            // 1 = 'Hagleitner'  
            case 'Hagleitner' : return $this->hagleitnerMenu($this->getGroupUrl($group));
            // 2 = 'Administrator'   
            case 'Administrator' : return $this->adminMenu($this->getGroupUrl($group));
            // 3 = 'Supervisor'
            case 'Supervisor' : return $this->supervisorMenu($this->getGroupUrl($group));
            // 4 = 'Worker'
            case 'Worker' : return $this->workerMenu();
        }

        return $this->nouser();
    }

    // --------------- mobiles Navigationsmenu ---------------------
    // ----------------------------------------------------------------     

    public function hagleitnerMenu($groupUrl) {
        $tmp = "";
        $controlAction = array('controller' => 'pages', 'action' => 'display', 'home');
        $tmp = $tmp . $this->mainMenuPoint(__('Home'), $controlAction, 'icon-home');
        $controlAction = array('controller' => 'overviews', 'action' => 'index');
        $tmp = $tmp . $this->mainMenuPoint(__('Overview devices and rooms'), $controlAction, 'icon-clipboard-2');
        $controlAction = array('controller' => 'configurations', 'action' => $groupUrl);
        $tmp = $tmp . $this->mainMenuPoint(__('Configuration'), $controlAction, 'icon-cog');
        $tmp = $tmp . $this->iconKachel('icon-help-2', __('help'), 'help');
        return $tmp;
    }

    public function adminMenu($groupUrl) {
        $tmp = "";
        $controlAction = array('controller' => 'pages', 'action' => 'display', 'home');
        $tmp = $tmp . $this->mainMenuPoint(__('Home'), $controlAction, 'icon-home');
        $controlAction = array('controller' => 'overviews', 'action' => 'index');
        $tmp = $tmp . $this->mainMenuPoint(__('Overview devices and rooms'), $controlAction, 'icon-clipboard-2');
        $controlAction = array('controller' => 'configurations', 'action' => $groupUrl);
        $tmp = $tmp . $this->mainMenuPoint(__('Configuration'), $controlAction, 'icon-cog');
        return $tmp;
    }

    public function supervisorMenu($groupUrl) {
        $tmp = "";
        $controlAction = array('controller' => 'pages', 'action' => 'display', 'home');
        $tmp = $tmp . $this->mainMenuPoint(__('Home'), $controlAction, 'icon-home');
        $controlAction = array('controller' => 'overviews', 'action' => 'index');
        $tmp = $tmp . $this->mainMenuPoint(__('Overview devices and rooms'), $controlAction, 'icon-clipboard-2');
        $controlAction = array('controller' => 'configurations', 'action' => $groupUrl);
        $tmp = $tmp . $this->mainMenuPoint(__('Configuration'), $controlAction, 'icon-cog');
        return $tmp;
    }

    public function workerMenu() {
        $tmp = "";
        $controlAction = array('controller' => 'pages', 'action' => 'display', 'home');
        $tmp = $tmp . $this->mainMenuPoint(__('Home'), $controlAction, 'icon-home');
        $controlAction = array('controller' => 'OverviewWorkers', 'action' => 'index');
        $tmp = $tmp . $this->mainMenuPoint(__('Overview devices and rooms'), $controlAction, 'icon-clipboard-2');
        $controlAction = array('controller' => 'TourChecklists', 'action' => 'index');
        $tmp = $tmp . $this->mainMenuPoint(__('Tours'), $controlAction, 'icon-calendar');
        return $tmp;
    }

    public function nouser() {
        $tmp = "";
        $controlAction = array('controller' => 'pages', 'action' => 'display', 'home');
        $tmp = $tmp . $this->mainMenuPoint(__('Home'), $controlAction, 'icon-home');
        $controlAction = array('controller' => 'pages', 'action' => 'display', 'info');
        $tmp = $tmp . $this->mainMenuPoint(__('Info'), $controlAction, 'icon-info-2');
        return $tmp;
    }

    public function getGroupUrl($group = null) {
        switch ($group) {
            // 1 = 'Hagleitner'
            case 'Hagleitner' : return 'hlt';
            // 2 = 'Administrator'
            case 'Administrator' : return 'la';
            // 3 = 'Supervisor'
            case 'Supervisor' : return 'supervisor';
        }
        return 'info';
    }

    // ================================================================     

    private function iconKachel($icon, $title = '', $id = '') {
        $result = '';
        $result .= "   <div id='$id' class='tile-nav' title='$title'>\n";
        $result .= "      <div class='tile-content icon'>\n";
        $result .= "          <i class='$icon'></i>\n";
        $result .= "      </div>\n";
        $result .= "   </div>\n";
        return $result;
    }

    protected function mainMenuPoint($entry, $controlAction, $icon) {
        $result = $this->iconKachel($icon, $entry);
        $result = $this->Html->link($result, $controlAction, array('escape' => false));
        return $result;
    }

    // ================================================================      

    public function topBar($user = array()) { //navigation-bar-content container
        $result = "<nav class='horizontal-menu compact'>
                   <ul>";
        $result .= $this->getLogo();
        $result .= $this->getLanguages();
        $result .= $this->loginOrLogout($user);
        $result .= $this->showLoginName($user);
        $result .= "</ul>
                    </nav>";
        return $result;
    }

    private function getLogo() {
        return "<li>" .
//               $this->Html->image('hagleitner/Hagleitner_Logo_klein.png', array('id' => 'logo', 'width' => '100', 'alt' => 'Icon')) .
               "</li>";
    }
    
    private function showLoginName($user) {
        $name = __('No user') . " " . __('is logged in');
        
        if (!empty($user)) {
            $name = $user['first_name'] . " " . $user['last_name'];
            if ($name == ' ') {
                $name = $user['username'];
            }
        }
        
        $destination = array('controller' => 'Configurations', 'action' => 'index');
        
        return "<li id='login' class='place-right'>" . $this->Html->link($name, $destination) . "</li>";
    }

    private function startPoint($user) {
        $destination = array('controller' => 'pages', 'action' => 'display', 'home');

        if (!empty($user)) {
            $destination = array('controller' => 'Configurations', 'action' => 'index');
        }

        return "<li>" .
                $this->Html->link(__('Home'), $destination) .
                "</li>\n";
    }

    private function arrayToURLParameter($params) {
        $result = "/";
        foreach ($params as $param) {
            $result .= $param . "/";
        }
        return $result;
    }
    
    private function getLanguages() {
        $destination = array(
            'controller' => $this->request->controller,
            'action' => $this->request->action .  $this->arrayToURLParameter($this->request->pass),
            'language' => 'eng'
        );
        $destEng = $destination;
        
        $destination['language'] = 'deu';
        $destDeu = $destination;
        
        return "<li class='place-right'>
                <a class='dropdown-toggle' href='#'>".$this->request->language."</a>
                <ul class='dropdown-menu' data-role='dropdown'>
                    <li>" . $this->Html->link('eng', $destEng) . "</li>\n
                    <li style='margin-left:0px;'>" . $this->Html->link('deu', $destDeu) . "</li>\n
                </ul>
                </li>"; 
    }

    private function loginOrLogout($user) {
        $destination = array('controller' => 'Users', 'action' => 'login');
        $text = __('Sign in');
        
        if (!empty($user)) {
            $destination = array('controller' => 'Users', 'action' => 'logout');
            $text = __('Sign out');
        }
        
        $config = array('title' => $text);
        
        return "<li class='place-right'>" . $this->Html->link($text, $destination, $config) . "</li>";
    }

    // ================================================================
    // ======================= Hilfsfenster ===========================   

    private function helpIcon($icon, $color) {
        $result = "";
        $result .= "   <div class=\'tile-help $color\'>";
        $result .= "      <div class=\'tile-content icon\'>";
        $result .= "          <i class=\'$icon\'></i>";
        $result .= "      </div>";
        $result .= "   </div>";
        return $result;
    }

    public function help() {
        $result = "<div style=\'border : solid 0px #ff0000; background : #FFFFFF; color : #000000; padding : 0px; width : 275px; height : 240px; overflow : auto; \'>";
        $result .= "<table class=\'table\'>";
        $result .= "  <thead>";
        $result .= "     <tr>";
        $result .= "         <th class=\'text-left\'>" . __('Symbol') . "</th>";
        $result .= "         <th class=\'text-left\'>" . __('Description') . "</th>";
        $result .= "     </tr>";
        $result .= "  </thead>";
        $result .= "  <tbody>";

        $helps = $this->categorySet;
        foreach ($helps as $help) {
            $result .= "     <tr><td>" . $this->helpIcon($help['categoryIcon'], $help['categoryColor']) . "</td><td>" . $help['description'] . "</td></tr>";
        }


        $result .= "  </tbody>";
        $result .= "</table>";
        $result .= "</div>";
        return $result;
    }

}

?>