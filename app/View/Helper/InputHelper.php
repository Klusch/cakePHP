
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
        // ===================== Refactoring =========================================

        /**
         * Creates a Fieldset that is needed for forms
         * 
         * <form>
         *      <fieldset>
         *          ...
         *      </fieldset>
         * </form>
         * 
         * @param array $fields   Fields, incl. type, label ...
         * @param array $buttons  Buttons for Form, e.g. submit
         * @return String         The fieldset
         */
        public function getFieldset($fields, $buttons) {
            $result = "<fieldset>";
            
            // fields
            foreach ($fields as $field) {
                switch ($field['type']) {
                    case 'selection' :
                        $result .= $this->getSelectionField($field);
                        break;
                    case 'text' :
                        $result .= $this->getTextInputField($field['id'], $field['label'], $field['placeholder'], null, false);
                        break;
                    case 'password' :
                        $result .= $this->getPasswordInputField($field['id'], $field['label'], $field['placeholder'], false);
                        break;
                    case 'hidden' :
                        $result .= $this->getHiddenInputField($field['id']);
                        break;
                    case 'file' :
                        $result .= $this->getFileInputField($field['id'], $field['label'], $field['placeholder']);
                        break;                       
                }
            }
            
            $result .= "<div align='right'>";    
            
            // buttons
            foreach ($buttons as $button) {
                switch ($button['type']) {
                    case 'link'   : $result .= $this->getLinkButton($button['destination']);
                        break;
                    case 'ok'     :
                    case 'save'   : $result .= $this->getSubmitButton($button['buttonText']);
                        break;
                    case 'saveByJScript' : $result .= $this->getSubmitButtonByJScript($button['buttonText'], $button['jsFunction']);
                        break;
                    case 'delete' : $result .= $this->getDeleteButton($button['buttonText']);
                        break;
                    case 'reset'  : $result .= $this->getResetButton($button['buttonText']);
                        break;
                    case 'selectAll'  : $result .= $this->getSelectAllButton($button['buttonText']);
                        break;                       
                }
            }
            
            $result .= "</div>";
            
            $result .= "</fieldset>";
            return $result;
        }
        
        /**
         * Creates the Form for model where fieldset is put in.
         * 
         * ISSUE: If you put in fieldset directly, as you expect, it fails.
         *        So, it is seperated into two methods.
         * 
         * @param String $model    The model for a form element.
         * @param String $fieldset Not used, because of issue
         * @return String          The first part of a form
         */
        public function getForm($model, $fieldset) {
            $target = $this->Form->create($model, array(
                                          'id' => $this->JSSubmit->modelFormId($model),
                                           'inputDefaults' => array(
                                               'label' => false,
					       'div' => false
				           )
		                                  )
                                         );
//            $target = $this->Form->create($model);
//            $target .= $fieldset;
//            $target .= $this->Form->end();
            return $target;
        }
        
        /**
         * This is the corresponding part to getForm()
         * 
         * @see getForm()
         * @return String   Rest of form element
         */
        public function closeForm() {
            return $this->Form->end();
        }

        /**
         * Creates a search field that does the JavaScript function doFilter()
         * on each released key
         * 
         * @param $id           An id for JavaScript
         * @param $withoutDiv   A switch for disabling sorounding div
         * @return String       The filter field
         */
        public function getFilterField($id, $withoutDiv = false) {
            $result = $this->abstractTextInputField($id, null, 'text', null, null, null, 'btn-search', false, null, "onkeyup='doFilter()'");
            
            if ($withoutDiv == false) {
                $result = "<div class='filter'>" . $result . "</div>";
            } 
            
            $result .= "<script>
                          function doFilter(){
                              contentRequest($('#".$id."').val());
                          }    
                        </script>";
            return $result;
        }
        
        /**
         * Creates a field with selectable options
         * 
         * @param array $field
         * @return String   A selection field
         */
        protected function getSelectionField($field) {
            $result = "<label>".$field['label']."</label>";
            
            $tmp = $this->kindOfTextFieldsHelper($field);
            $field = $tmp['field'];
            $inp = $tmp['inp'];
           
            $result .= $this->Form->input($field['id'], $inp);
            return $result;
        }        
        
        /**
         * @see abstractTextInputField()
         * @return String   An input field for text
         */
        protected function getTextInputField($id, $label, $hint, $preInsertedText = null, $disabled = false) {
            return $this->abstractTextInputField($id, $label, 'text', null, $hint, $preInsertedText, 'btn-clear', $disabled);
        }
        
        /**
         * @see abstractTextInputField()
         * @return String   A hidden input field
         */
        protected function getHiddenInputField($id) {
            return $this->abstractTextInputField($id, null, 'hidden', null, null, null, null, false);
        }        

        /**
         * @see abstractTextInputField()
         * @return String   An input field for passwords
         */        
        protected function getFileInputField($id, $label, $hint, $disabled = false) {
            return $this->abstractTextInputField($id, $label, 'file', null, $hint, null, 'btn-file', $disabled);
        }
        
        /**
         * @see abstractTextInputField()
         * @return String   An field for file selection
         */        
        protected function getPasswordInputField($id, $label, $hint, $disabled = false) {
            return $this->abstractTextInputField($id, $label, 'password', null, $hint, null, 'btn-reveal', $disabled);
        }        
        
        /**
         * @see abstractButton()
         * @return String   A button for submit of form
         */    
        protected function getSubmitButton($buttonText = 'OK') {
            $x = $buttonText . " <i class='icon-checkmark on-right'></i>";
            return $this->abstractButton('submitTileId', array('button', 'large', 'success'), $x, 'submit');     
        }
        
        /**
         * @Deprecated
         * @see abstractButton()
         * @return String   A button for submit of form
         */    
        protected function getSubmitButtonByJScript($buttonText = 'OK', $script = null) {
            $x = $buttonText . " <i class='icon-checkmark on-right'></i>";
            return $this->abstractButton('submitTileId', array('button', 'large', 'success'), $x, 'button', $script);     
        }        
        
         /**
         * @see abstractButton()
         * @return String   A button for deletion
         */    
        protected function getDeleteButton($buttonText = 'Delete') {
            $x = $buttonText . " <i class='icon-cancel-2 on-right'></i>";
            return $this->abstractButton('submitTileId', array('button', 'large', 'danger'), $x, 'submit');     
        }
        
         /**
         * @see abstractButton()
         * @return String   A button for reset a form
         */    
        protected function getResetButton($buttonText = 'Reset') {
            $x = $buttonText . " <i class='icon-cancel-2 on-right'></i>";
            return $this->abstractButton('submitTileId', array('button', 'large', 'danger'), $x, 'reset');     
        }
        
         /**
         * @see abstractButton()
         * @return String A button for select all tiles
         */    
        protected function getSelectAllButton($buttonText = 'Select') {
            $x = $buttonText . " <i class='icon-checkbox on-right'></i>";
            return $this->abstractButton('selectAll', array('button', 'large', 'primary'), $x, 'button', 'toggleSelectAll()');     
        }          
        
         /**
         * @see abstractButton()
         * @return String   A button for submit of form
         */
        protected function getLinkButton($destination) {
            $link = $this->Html->link($destination['title'],
                                      array('controller' => $destination['controller'],
                                            'action' => $destination['action']),
                                      array('style' => 'padding: 20px')
                                     );
//            return $this->abstractButton(null, array('button', 'link'), $link);     
            return $link;
        }        
        
        /**
         * @param $id (required): column in database / mapping to model
         * @param $type (required): text, password or file
         * @param $state (optional): warning-state, error-state, info-state or success-state
         * @param $inlineButtonClass (optional): btn-clear, btn-reveal or btn-file
         * 
         * @param $hint (optional): a hint inside field
         *                          1) automatically removed by typing
         *                          2) $preInsertedText overrides this value
         * @param $preInsertedText (optional): the value of this field prallocated
         * @param $disabled (optional): disables the field, no editing
         * @param $colorCSS (optional): A css-class for formating/coloring inputfield
         * @param $scriptComponent (optional): onabort, onblur, onchange, onclick, ondblclick, onerror,
         *                                     onfocus, onkeydown, onkeypress, onkeyup, onload, onmousedown,
         *                                     onmousemove, onmouseout, onmouseover, onmouseup, onreset,
         *                                     onselect, onsubmit, onunload, javascript
         */
        private function abstractTextInputField($id, $label, $type, $state, $hint, $preInsertedText, $inlineButtonClass, $disabled, $colorCSS = null, $scriptComponent = null) {
            $result = "<label>".$label."</label>
                          <div class='input-control".$state." ".$type." ".$state."' data-role='input-control' ".$scriptComponent.">";
             
             // Result: <input placeholder='".$hint."' value='".$preInsertedText."' type='text'>";
             $params = array('placeholder' => $hint,
                             'type'        => $type,
			     'value'       => $preInsertedText,
			     'disabled'    => $disabled,
                             'div'         => false,
                             'class'       => $colorCSS,
                             'label'       => false
	     );
             
             // AK: Dirty, but necessary as the form changes id
             if (isset($inlineButtonClass)) {
                 if ($inlineButtonClass == 'btn-search') {
                     $params['id'] = $id;
                 }
             }
                 
             $result .= $this->Form->input($id, $params); 
                             
             if (isset($inlineButtonClass)) {
                 $result .= "<button type='button' class='".$inlineButtonClass."'></button>";
                 

             }
             $result .= " </div>";
             return $result;
        }
        
        /**
         * 
         * @param $id (optional): only needed for jScript
         * @param array $buttonClasses (required): button, command-button, image-button, shortcut
         *                                         There are a lot of additional classes available @see Metro-UI
         * @param topic 
         * @return string
         */
        private function abstractButton($id, $buttonClasses, $topic, $type='button', $targetJSFunction='') {
            $classes = '';
            foreach ($buttonClasses as $class) {
                $classes .= $class . " ";
            }
            $result  = "<button id='".$id."' class='".$classes."' type='".$type."' onclick='".$targetJSFunction."'>";
            $result .= $topic;
            $result .= "</button>";
            return $result;
        }
        
        /**
         * 
         * @param $id (optional): only needed for jScript
         * @param array $buttonClasses (optional): mini, small, large, default, primary,
         *                                info, success, warning, danger, inverse, link
         * @param $text (required): Text shown on button
         * @param $type (required): submit, reset, button
         * @param inhalt
         * @return string
         */
        private function abstractStandardButton($id, $buttonClasses, $text, $type) {
            $classes = '';
            foreach ($buttonClasses as $class) {
                $classes .= $class . " ";
            }
            
            $result = "<input id='".$id."' class='button ".$classes."' value='".$text."' type='".$type."'>";
            
            return $result;
        }        
        
        // ===========================================================================
        // ===========================================================================

        
	// ===========================================================================
	// ====================== ADD/EDIT Masken ====================================


	public function createIdInputField() {
		return $this->createTextInputField('id', '', null);
	}

        /**
         * Reused after refactoring
         */
	public function createTextInputField($id, $label = '', $value = '', $placeholder = '') {
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
//	protected function createChooseField($id, $buttons, $label = '') {
//		return array(
//				'id' => $id,
//				'type' => 'choose',
//				'buttons' => $buttons,
//				'label' => $label
//		);
//	}

	// Bugy
//	protected function createSwitchField($id, $label, $enabled) {
//		return array(
//				'id' => $id,
//				'type' => 'switch',
//				'label' => $label,
//				'enabled' => $enabled
//		);
//	}

        /**
         * Reused after refactoring
         */
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

	/**
	 * Creates a unique tile div for form and JS submits.
	 * @return string the submit tile div
	 */
	public function submit() {
		return  $this->Tile->basic(
				$this->Tile->picture(
						array(
								'name' => __('Send response'),
								'picture_url' => 'navigation/enter.png'
						)
				),
				array(
						'id' => $this->JSSubmit->submitTileId,
						'tileClass' => AppHelper::$navTileColor
				)
		);
	}
	
	/**
	 * Creates a form div element supporting JS submit and adds the hidden id field, used in edit views.
	 *
	 * @param array $fields list of field parameters
	 * @return string the form div
	 */
	public function formDivJsSubmitWithId($fields = array()) {
		return $this->formDivWithId(null, $fields);
	}
	
	/**
	 * Creates a form div element supporting JS submit, used in add views.
	 *
	 * @param array $fields list of field parameters
	 * @return string the form div
	 */
	public function formDivJsSubmit($fields = array()) {
		return $this->formDiv(null, $fields);
	}
	
	/**
	 * Creates a form div element and adds the hidden id field, used in edit views.
	 *
	 * @param array $model the model name,
	 * if set used to support form submit,
	 * if set to an empty string, the JS submit function is used
	 * @param array $fields list of field parameters
	 * @return string the form div
	 */
	public function formDivWithId($model = null, $fields = array()) {
		$fields[] = $this->createIdInputField();
		return $this->formDiv($model, $fields);
	}

        
        //@@ To be refactored @@
	/**
	 * Creates a form div element, used in add views.
	 *
	 * @param array $model the model name,
	 * if set to an empty string, the JS submit function is used, otherwise the form submit
	 * @param array $fields list of field parameters
	 * @return string the form div
	 */
	public function formDiv($model = null, $fields = array()) {

		$target = '<div id="hgl-add" class="exampleXXX">';
		$target .= $this->Form->create($model, array(
				'id' => $this->JSSubmit->modelFormId($model),
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

		$target .= $this->JSSubmit->enter($model);

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

        /**
         * Extracted while Refactoring
         * 
         * @param type $field
         * @return type
         */
        private function kindOfTextFieldsHelper($field) {
		$inp = array(
				'selected' => $field['selection'],
				'label' => false,
				'disabled' => $field['disabled']
		);

		switch ($field['type']) {
			case 'text' :
				$inp['div'] = array('class' => 'input-control text', 'data-role' => 'input-control');
				break;
			case 'password' :
				$inp['autocomplete'] = 'off';
				$inp['type'] = 'password';
				$inp['div'] = array('class' => 'input-control password', 'data-role' => 'input-control');
				break;
                        case 'selection' :
				$inp['div'] = array('class' => 'input-control select', 'data-role' => 'input-control');
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
                
                return array('field' => $field, 'inp' => $inp);
        }
        
	private function kindOfTextFields($field) {
            $tmp = $this->kindOfTextFieldsHelper($field);
            $field = $tmp['field'];
            $inp = $tmp['inp'];

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
					<input id='" . $model . $dataFieldConcat . "' name='data[" . $model . "][" . $dataField . "]' ";
			if ($field['checked']) {
				$result .= "checked='' ";
			}
			$result .= "type='radio'>
					<span class='check'></span>" . $field['name'] .
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
						<input id='" . $model . $dataFieldConcat . "' name='data[" . $model . "][" . $dataField . "]' ";
		if ($fields['enabled']) {
			$result .= "checked='checked' ";
		}
		$result .= " type='checkbox'>
				<span class='check'></span>" .
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
						<input id='" . $model . $dataFieldConcat . "' value='" . $value . "' ";
		if ($value == 1) {
			$result .= "checked='false' ";
		}
		$result .= "type='checkbox' name='data[" . $model . "][" . $dataField . "]'>
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

        //@@ reused @@
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
