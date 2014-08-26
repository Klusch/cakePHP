<?php

class UserHelper extends AppHelper {

    public $helpers = array('Tile', 'Html', 'Form', 'JSResize', 'Input', 'Operation');

    public function companyTileBadge($destination, $title) {
        $parameters = array('tile-size' => null,
            'color-bigarea' => 'bg-orange',
            'image-bigarea' => $this->Html->image('configuration/firma.png'),
            'destination-smallarea' => array('controller' => $destination['controller'], 'action' => 'add'),
            'text-overlay-color' => 'fg-white',
            'badge-color' => AppHelper::$navTileColor,
            'badge-pictureUrl' => $this->Html->image('small/' . $this->Operation->newPictureUrl),
            'badge-icon' => 'icon-plus-2',
            'destination-bigarea' => $destination,
            'title-bigarea' => $title,
            'title-smallarea' => __('Add companies')
        );

        return $this->Tile->badge($parameters);
    }

    public function userAsContent($group, $users) {
        $result = "<div id='" . $this->JSResize->accordionList . "'>";
        foreach ($users['users'] as $i => $user) {
            $result .= $this->usersTiles($users['users'][$i]);
        }
        
        $result .= $this->Operation->add('', null, $group);
        
        $result .= "</div>";
        return $result;
    }

    /**
     * @Deprecated  This function has to be redisigned, especially the tile
     * 
     * @param type $user
     * @param type $destination
     * @param type $contentClass
     * @param type $onclickHandler
     * @param type $selected
     * @param type $id
     * @return type
     */
    public function usersTiles(
    $user, $destination = null, $contentClass = "", $onclickHandler = array(), $selected = false, $id = null
    ) {
        if ($destination === null) {
            $destination = array(
                'controller' => 'Users',
                'action' => 'edit', $user['User']['id']
            );
        }

        $parameters = array(
            'title' => $user['User']['username'],
            'tile-size' => 'double',
            'destination' => $destination,
            'color' => 'bg-grayLighter',
            'image' => $this->Html->image($user['Group']['picture_url'], array('alt' => $user['User']['username'], 'height' => '120')),
            'row1' => '<b>' . $user['User']['username'] . '</b>',
            'row2' => $user['User']['first_name'] . ' ' . $user['User']['last_name'],
            'row3' => $user['User']['phone'],
            'row4' => '<i>' . $user['Company']['name'] . '</i>',
            'row5' => $user['Company']['country'] . ', ' . $user['Company']['zip'] . ' ' . $user['Company']['city'] . '</i>'
        );

//        return $this->Tile->fiveRowDoubleTileWithImage(
//                        $parameters, $contentClass, $onclickHandler, $selected, $id, 24);
        
        $text = $parameters['row1'] . "<br>" . $parameters['row2'] . "<br>" . $parameters['row3'] .
                "<br>" . $parameters['row4'] . "<br>" . $parameters['row5'];
        return $this->Tile->userTile($text, $destination, $parameters['image']);
    }

    /**
     * @Deprecated
     * 
     * I don't remember for what this function is used
     * 
     * @param type $elements
     * @return type
     */
    function listElements($elements) {
        throw new MethodNotAllowedException('UserHelper->listElements: This methode should be deprecated');
        $col = "";
        foreach ($elements as $element) {
            $col .= $this->entry($element['User']['username'], $element['User']['first_name'] . ' ' . $element['User']['last_name'], $element['Company']['name'], array('controller' => 'users', 'action' => 'edit', $element['User']['id']));
        }
        return $col;
    }

    /**
     * @Deprecated
     * @See listElements()
     * 
     * @param type $title
     * @param type $subtitle
     * @param type $remark
     * @param type $reference
     * @return type
     */
    private function entry($title, $subtitle, $remark, $reference = array()) {
        $remember = "";

        //$remember .= "<a class='list' href='#'>\n";     // class='list marked'

        $remember .= "   <div class='list-content'>\n";
        $remember .= "      <span class='list-title'>\n";
        if (false) {
            $remember .= "          <span class='place-right icon-flag-2 fg-red smaller'></span>\n";
        }
        $remember .= "          $title</span>\n";
        $remember .= "      <span class='list-subtitle'>$subtitle</span>\n";
        $remember .= "      <span class='list-remark'>$remark</span>\n";
        $remember .= "   </div>\n";

        //$remember .= "</a>\n";

        $remember = $this->Html->link($remember, $reference, array('class' => 'list', 'escape' => false));

        return $remember;
    }

    /**
     * Creates fields for user add/edit
     * 
     * @param $modelRef
     * @param $selection
     * @param $hidePasswordField
     * @return array    All input fields as array
     */
    function createInputFields($modelRef, $selection = null, $hidePasswordField = false) {
        $fields = array();
        $username = $this->Input->createTextInputField('username', __('Username'));
        if (isset($modelRef->params['data']['User']) &&
                $modelRef->Session->read('Auth.User.username') == $modelRef->params['data']['User']['username']) {
            $username['disabled'] = true;
        }
        $fields[] = $username;
        if ($hidePasswordField == false) {
            $fields['pass'] = $this->Input->createInputField('password', __('Password'), 'password');
        }
        $fields[] = $this->Input->createTextInputField('first_name', __('First name'));
        $fields[] = $this->Input->createTextInputField('last_name', __('Last name'));
        $fields[] = $this->Input->createTextInputField('employee_number', __('Employee number'));
        $fields[] = $this->Input->createTextInputField('email', __('Email'));
        $fields[] = $this->Input->createTextInputField('phone', __('Phone'));
        $fields[] = $this->Input->createTextInputField('cell', __('Cell'));
        $fields[] = $this->Input->createTextInputField('fax', __('Fax'));
        $fields[] = $this->Input->createInputField('group_id', __('Groups'), 'selection', false, $selection, false);
        $fields[] = $this->Input->createInputField('company_id', __('Companies'), 'selection', false, null, true);
        $fields[] = $this->Input->createTextInputField('hourly_rate', __('Hourly rate'));
        $fields[] = $this->Input->createInputField('language_id', __('Language'), 'selection');
        //DateTimeZone::listIdentifiers();
        //$fields[] = $this->Input->createInputField('time_zone_id', __('Timezone'), 'selection', false, null, true);
        return $fields;
    }

    /**
     * Creates input fields for login screen
     * 
     * @return The fields for login screen
     */
    function createLoginFields() {
        $fields = array();
        $fields['username'] = $this->Input->createTextInputField('username', __('Username'), null, __('Username'));
        $fields['pass'] = $this->Input->createInputField('password', __('Password'), 'password', __('Password'));
        return $fields;
    }

    /**
     * Creates buttons for login form
     * 
     * @return The buttons
     */
    function getLoginButtons($resetLink = true) {
        $buttons = array();
        if ($resetLink) {
            $buttons[] = array('type' => 'link',
                               'destination' => array('controller' => 'OneTimeLogin',
                               'action' => 'index',
                               'title' => __('Lost password'))
                              );
        }
        $buttons[] = array('type' => 'ok', 'buttonText' => __('Login'));
        return $buttons;
    }

}

?>
