
<?php

/**
 * InputHelper
 *
 *
 * @package       app.View.Helper
 */
class InputHelper extends AppHelper {

    public $helpers = array('Html', 'Form', 'Tile', 'JSSubmit');
    private $datePicker = 'datepicker';

    // ===========================================================================
    // ====================== ADD/EDIT Masken ====================================


    public function createIdInputField() {
        return $this->createTextInputField('id', '', null);
    }

    public function createTextInputField($id, $label = '', $value = null, $placeholder = '') {
        return $this->createInputField($id, $label, 'text', false, null, false, array(), $value, $placeholder);
    }

    public function createDatePickerField($label, $id = null, $value = null) {
        if ($id == null) {
            $id = $this->datepicker;
        }
        return $this->createInputField($id, $label, $this->datePicker, false, null, false, array(), $value);
    }

    public function createChoiseField($id, $model, $label = '', $enabled = false) {      
         return array(
            'id' => $id,
            'type' => 'choise',
            'label' => $label,
            'enabled' => $enabled,
            'model' => $model,
            'dataField' => $id,
            'text' => ''
        );       
    }
    
    // Bugy
    protected function createChooseField($id, $buttons, $label = '') {
        return array(
            'id' => $id,
            'type' => 'choose',
            'buttons' => $buttons,
            'label' => $label
        );
    }

    // Bugy
    protected function createSwitchField($id, $label, $enabled) {
        return array(
            'id' => $id,
            'type' => 'switch',
            'label' => $label,
            'enabled' => $enabled
        );
    }    
    
    public function createInputField($id, $label, $type, $disabled = false, $selection = null, $emptySelectable = false, $options = array(), $value = null, $placeholder = '') {
        return array(
            'id' => $id,
            'label' => $label,
            'type' => $type,
            'disabled' => $disabled,
            'selection' => $selection,
            'emptySelectable' => $emptySelectable,
            'options' => $options,
            'value' => $value,
            'placeholder' => $placeholder
        );
    }

    public function submit() {
        return $this->Tile->basic(
                        $this->Tile->icon('enter-2', __('Send response')), array(
                    'tileClass' => 'bg-emerald',
                    'id' => 'submitTileId',
                    'xxx' => 'yyy')
        );
    }

    public function formDivWithId($model, $fields = array()) {
        $fields[] = $this->createIdInputField();
        return $this->formDiv($model, $fields);
    }

    public function formDiv($model, $fields = array()) {

        $target = '<div id="hgl-add" class="exampleXXX">';

        $target .= $this->Form->create($model, array(
            'id' => $model . 'Form',
            'inputDefaults' => array(
                'label' => false,
                //'div' => false
            )
        ));

        $target .= '<table class="table striped">
				<tbody>';

        foreach ($fields as $i => $field) {
            if ($field['id'] == 'id') {
                $target .= $this->Form->input($field['id']);
            } else {
                $target .= $this->typeField($field);
            }
        }

        $target .= '</tbody>
				</table>';

        $formname = $model . 'Form';
        $target .= $this->JSSubmit->enter($formname);

        $target .= '</div>';

        return $target;
    }

    private function typeField($field) {
        switch ($field['type']) {
            case 'choise' :
                return $this->choiseFields($field);
            case 'choose' :
                return $this->chooseFields($field);                
            case 'switch' :
                return $this->switchFields($field);
            default:
                return $this->kindOfTextFields($field);
        }
    }

    private function kindOfTextFields($field) {
        $inp = array(
            'selected' => $field['selection'],
            'label' => false,
            'disabled' => $field['disabled']
        );

        switch ($field['type']) {
            case 'text' :
                $inp['div'] = array('class' => 'input-control text nbm', 'data-role' => 'input-control');
                break;
            case 'password' :
                $inp['autocomplete'] = 'off';
                $inp['type'] = 'password';
                $inp['div'] = array('class' => 'input-control password nbm', 'data-role' => 'input-control');
                break;
            case 'selection' :
                $inp['div'] = array('class' => 'input-control select nbm', 'data-role' => 'input-control');
                break;
            case $this->datePicker :
                $inp['id'] = $field['id'];
                $inp['readonly'] = 'readonly';
                $inp['div'] = array('class' => 'input-control text', 'data-role' => 'datepicker', 'data-format' => $this->dateFormat);
                break;
        }


        if ($field['value'] != null) {
            $inp['value'] = $field['value'];
        }

        if ($field['emptySelectable']) {
            $inp['empty'] = true;
        }
        if ($field['options']) {
            $inp['options'] = $field['options'];
        }

        $inp['placeholder'] = $field['placeholder'];

        return $this->createTableElement($field, $inp);        
    }
    
    private function createTableElement($field, $inp) {
        return "<tr>
                  <td class='text-left' style='vertical-align:middle;'><strong>" . $field['label'] . ":</strong></td>
                  <td>" . $this->Form->input($field['id'], $inp) . "</td>
                </tr>";
    }

    private function chooseFields($fields) {
$model = 'BaseStation';
$dataFieldConcat = 'AquireData';
$dataField = 'aquire_data';        
       $result = "<tr>
                     <td class='text-left' style='vertical-align:middle;'><strong>" . $fields['label'] . "</strong></td>
                     <td>
                        <div class='input-control radio default-style inline-block' data-role='input-control'>";
       foreach ($fields['buttons'] as $field) {
           $result .= "<label class='inline-block'>
                          <input id='" . $model.$dataFieldConcat . "' name='data[".$model."][" . $dataField . "]' ";
                             if ($field['checked']) { $result .= "checked='' "; }
           $result .= "type='radio'>
                             <span class='check'></span>". $field['name'] .
                       "</label>";
       }
       $result .= "</div></td></tr>";
       return $result;
    }    
    
    private function choiseFields($fields) {
       $model = $fields['model'];
       $dataField = $fields['dataField'];
       $dataFieldConcat = Inflector::camelize($dataField);
       $text = $fields['text'];

       $result = "<tr>
                     <td class='text-left' style='vertical-align:middle;'><strong>" . $fields['label'] . "</strong></td>
                     <td>
                     <div class='input-control checkbox' data-role='input-control'>
                        <label class='inline-block'>
                            <input id='" . $model.$dataFieldConcat . "' name='data[".$model."][" . $dataField . "]' ";
                            if($fields['enabled']) { $result .= "checked='checked' "; }
       $result .=                 " type='checkbox'>
                            <span class='check'></span>".
                            $text 
                     . "</label>
                     </div>
                     </td>
                   </tr>";
       return $result;
    }
    
    private function switchFields($field) {
$model = 'BaseStation';
$dataFieldConcat = 'AquireData';
$dataField = 'aquire_data';
$value = $this->request->data[$model][$dataField];        

       $result = "<tr>
                     <td class='text-left' style='vertical-align:middle;'><strong>" . $field['label'] . "</strong></td>
                     <td class='text-left' style='vertical-align:middle;'>
                        <div class='input-control switch' data-role='input-control'>
                           <label class='inline-block' style='margin-right: 20px'>
                              <input id='" . $model.$dataFieldConcat . "' value='" . $value . "' ";
                                 if ($value == 1) { $result .= "checked='false' "; }
        $result .=                        "type='checkbox' name='data[".$model."][" . $dataField . "]'>
                              <span class='check'></span>
                           </label>
                        </div>
                      </td>
                  </tr>";
       return $result;
    }    
    
    public function dynamicTextField($id, $label, $value = '', $options = array()) {
        $options = $this->fillDefaults($options, array(
            'maxlength' => 255,
            'type' => 'text',
            'required' => false
        ));
        $maxlength = $options['maxlength'];
        $required = $options['required'] ? "required='required'" : "";
        return "
            <div class='input-control text' data-role='input-control'>
                <input maxlength='$maxlength' type='text' value='$value' id='$id' placeholder='$label' $required>
                <button class='btn-clear' tabindex='-1' type='button'></button>
            </div>
            ";
    }

    public function dynamicForm($contents) {
        $width = '200px';
        return "
            <div style='width:$width'>" .
                implode(" ", $contents) . "
            </div>";
    }

    public function dynamicSelectionField($id, $possibilities, $selected = null) {
        return "
            <div id='$id' class='input-control select' data-role='input-control'>
                <select>" .
                call_user_func(function ($possibilities) use ($selected) {
                    $r = "";
                    foreach ($possibilities as $i => $p) {
                        $r .= "<option value='$i'" . ($i == $selected ? " selected='selected'" : "") . "> $p </option>";
                    }
                    return $r;
                }, $possibilities) . "
                </select>
            </div>
            "
        ;
    }

    public function dynamicDatePicker($id, $label, $default = null) {
        return "
            <div id='$id' class='input-control text'>
                <input type='text'>
                    <button class='btn-date'></button>
                </input>
            </div>   
            <script>" .
                ($default != null ? "$('input', '#$id').val('$default')" : "") . "
                $('#$id').datepicker();
            </script>
            ";
    }

}

?>
