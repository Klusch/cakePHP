<?php

/**
 * ResizeHelper
 *
 *
 * @package       app.View.Helper
 */
class JSResizeHelper extends AppHelper {

    public $accordionList = 'accordion-list';
    public $accordionSummary = 'accordion-summary';

    public function contentResizer($user, $controller) {
        $result = "";
        
        $group = $user['Group']['name'];
        if ($group == 'Supervisor') {
            return $this->Html->script('hagleitner/content-resizer-with-message.js');
        }
        $result .= $this->Html->script('hagleitner/content-resizer.js')."\n";
      
        switch ($controller) {
            case 'Users' : $result .= $this->Html->script('hagleitner/accordion-symbol-resize.js')."\n";
                break;
            default : $result .= $this->Html->script('hagleitner/accordion-resize.js')."\n";
        }
        
        return $result;
    }

}

?>