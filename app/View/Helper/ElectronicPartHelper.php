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
class ElectronicPartHelper extends AppHelper {

  public $helpers = array('Html', 'Form', 'Input');
    
  function createInputFields($selection = null) {
  	$fields = array();
  	$fields[] = $this->Input->createTextInputField('name', __('Part name'));
  	$fields[] = $this->Input->createTextInputField('conrad_number', __('Conrad number'));
  	$fields[] = $this->Input->createTextInputField('conrad_price', __('Conrad price'));
  	$fields[] = $this->Input->createTextInputField('reichelt_number', __('Reichelt number'));
  	$fields[] = $this->Input->createTextInputField('reichelt_price', __('Reichelt price'));
  	$fields[] = $this->Input->createTextInputField('additional_number', __('Additional number'));
  	$fields[] = $this->Input->createTextInputField('additional_price', __('Additional price'));
        $fields['choose'] = $this->Input->createChooseField('selection', __('Choose'), false);
  	$fields[] = $this->Input->createInputField('project_id', __('Project id'), 'selection', false, $selection, true);
  	return $fields;
  }
  
}