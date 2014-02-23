
<?php

/**
 * InputHelper
 *
 *
 * @package       app.View.Helper
 */
class InputHelper extends AppHelper {

    public $helpers = array('Html', 'Form');
    private $datePicker = 'datepicker';

    // ===========================================================================
    // ====================== ADD/EDIT Masken ====================================


    public function createChooseField($id, $label) {
        return $this->createTextInputField($id, $label, 'checkbox');
    }

    public function createTextInputField($id, $label = '') {
        return $this->createInputField($id, $label, 'text');
    }

    public function createDatePickerField($label) {
        return $this->createInputField($this->datePicker, $label, $this->datePicker);
    }

    public function createIdInputField() {
        return $this->createTextInputField('id');
    }

    public function createInputField($id, $label, $type, $disabled = false, $selection = null, $emptySelectable = false, $options = array()) {
        return array(
            'id' => $id,
            'label' => $label,
            'type' => $type,
            'disabled' => $disabled,
            'selection' => $selection,
            'emptySelectable' => $emptySelectable,
            'options' => $options
        );
    }

    public function submit() {
        return $this->specialTile('icon-enter-2', null, 'bg-emerald', null, array('id' => 'submitTileId'));
    }

    public function formDivWithId($model, $fields = array()) {
        $fields[] = $this->createIdInputField();
        return $this->formDiv($model, $fields);
    }

    public function formDiv($model, $fields = array()) {

        $target = '<div id="hgl-add" class="exampleXXX">';

        $target .= $this->Form->create($model, array('id' => $model . 'Form',
            'inputDefaults' => array(
                'label' => false,
            //'div' => false
        )));

        $target .= '<table class="table striped">
				<tbody>';

        foreach ($fields as $i => $field) {
            if (strcmp($i, 'choose') == 0) {
               $target .= $this->replaceForChoose($field);
            } else {
                if ($field['id'] == 'id') {
                    $target .= $this->Form->input($field['id']);
                } else {
                    $target .= $this->typeField($field);
                }
            }
        }

        $target .= '</tbody>
				</table>';

        $target .= '<script>
				(function execute() {
		  $( "#submitTileId" ).click(function() {
				$( "#' . $model . 'Form' . '" ).submit();
	});
	})();
						</script>';

        $target .= '</div>';

        return $target;
    }

    private function replaceForChoose($field) {
        return "<tr>
                  <td class='text-left' style='vertical-align:middle'><strong>Check me</strong><td>
                  <div class='input-control checkbox' data-role='input-control'>
                      <label class='inline-block'>
                            <input checked='' type='checkbox'>
                            <span class='check'></span></label>
                  </div>
                  </td>
                </tr>";
    }
    
    private function typeField($field) {

        $class = 'input-control text nbm';
        $dataRole = 'input-control';

        switch ($field['type']) {
            case 'text' : break;
            case 'password' : $class = 'input-control password nbm';
                break;
            case 'selection' : $class = 'input-control select nbm';
                break;
            case $this->datePicker : $class = 'input-control text';
                $dataRole = 'datepicker';
                break;
        }

        $inp = array('selected' => $field['selection'],
            'label' => false,
            'disabled' => $field['disabled'],
            'div' => array('class' => $class, 'data-role' => $dataRole)
        );
        if ($field['type'] == 'password') {
            $inp['autocomplete'] = 'off';
        }


        if ($field['type'] == $this->datePicker) {
            $inp['id'] = $field['id'];
            $inp['after'] = "<button class='btn-date'></button>";
            $inp['readonly'] = 'readonly';
            $inp['div'] = array_merge($inp['div'], array('data-format' => $this->dateFormat));
        }

        if ($field['emptySelectable']) {
            $inp['empty'] = true;
        }
        if ($field['options']) {
            $inp['options'] = $field['options'];
        }

        $result = "";
        $result .= "<tr>";
        $result .= "  <td class='text-left' style='vertical-align:middle'><strong>" . $field['label'] . ":</strong></td>";
        $result .= "  <td>";
        $result .= $this->Form->input($field['id'], $inp);

        $result .= "  </td>";
        $result .= "</tr>";
        return $result;
    }

}

?>