<?php

class UserHelper extends AppHelper {

    public $helpers = array('Tile', 'Html', 'Form', 'JSResize', 'Input');

    public function companyTileBadge($destination, $title) {
        $parameters = array('tile-size' => null,
            'color-bigarea' => 'bg-orange',
            'icon-bigarea' => 'icon-layers',
            'image-bigarea' => null,
            'destination-smallarea' => array('controller' => $destination['controller'], 'action' => 'add'),
            'text-overlay' => null,
            'text-overlay-color' => 'fg-white',
            'badge-color' => 'bg-emerald',
            'badge-icon' => 'icon-plus-2',
            'badge-valueAsIcon' => null,
            'destination-bigarea' => $destination,
            'title-bigarea' => $title,
            'title-smallarea' => __('Add companies')
        );

        return $this->Tile->badge($parameters);
    }

    public function userAsContent($tile, $content) {
        $result = "";
        $result .= "    <div id='" . $this->JSResize->accordionSummary . "'>";
        $result .= $tile;
        $result .= "    </div>";
        $result .= "    <div id='" . $this->JSResize->accordionList . "' class='span7'>";
        foreach ($content['users'] as $i => $user) {
            $result .= $this->usersTiles($content['users'][$i]);
        }
        $result .= "    </div>";
        return $result;
    }

    public function usersTiles(
    $user, $destination = null, $contentClass = "", $onclickHandler = array(), $selected = false, $id = null
    ) {
        if ($destination === null) {
            $destination = array(
                'controller' => 'users',
                'action' => 'edit', $user['User']['id']
            );
        }

        $parameters = array(
            'title' => $user['User']['username'],
            'tile-size' => 'double',
            'destination' => $destination,
            'color' => 'bg-grayLighter',
            'image' => $this->Html->image($user['Group']['picture_url'], array('alt' => $user['User']['username'], 'height' => '60', 'width' => '60')),
            'row1' => '<b>' . $user['User']['username'] . '</b>',
            'row2' => $user['User']['first_name'] . ' ' . $user['User']['last_name'],
            'row3' => $user['User']['phone'],
            'row4' => '<i>' . $user['Company']['name'] . '</i>',
            'row5' => $user['Company']['country'] . ', ' . $user['Company']['zip'] . ' ' . $user['Company']['city'] . '</i>',
        );

        return $this->Tile->fiveRowDoubleTileWithImage(
                        $parameters, $contentClass, $onclickHandler, $selected, $id, 24);
    }

    function listElements($elements) {
        $col = "";
        foreach ($elements as $element) {
            $col .= $this->entry($element['User']['username'], $element['User']['first_name'] . ' ' . $element['User']['last_name'], $element['Company']['name'], array('controller' => 'users', 'action' => 'edit', $element['User']['id']));
        }
        return $col;
    }

    function entry($title, $subtitle, $remark, $reference = array()) {
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

    function createInputFields($ref, $selection = null, $hidePasswordField = false) {
        $fields = array();
        $username = $this->Input->createTextInputField('username', __('Username'));
        if (isset($ref->params['data']['User']) &&
                $ref->Session->read('Auth.User.username') == $ref->params['data']['User']['username']) {
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

    function createLoginFields() {
        $fields = array();
        $fields['username'] = $this->Input->createTextInputField('username', __('Username'), null, __('Username'));
        $fields['pass'] = $this->Input->createInputField('password', __('Password'), 'password', __('Password'));
        return $fields;
    }

}

?>
