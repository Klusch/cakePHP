<?php

App::uses('AppController', 'Controller');

/**
 * Properties Controller
 *
 */
class PropertiesController extends AppController {

    /**
     * Scaffold
     *
     * @var mixed
     */
    public $scaffold;

    public function index() {
        $this->set('properties', $this->Property->listProperties());
    }

    public function getValueForProperty($key) {
        $properties = $this->Property->listProperties();
        if (isset($properties[$key])) {
          return $properties[$key];
        } else {
          return "";
        }
    }

}
