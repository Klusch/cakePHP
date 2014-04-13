<?php

App::uses('AppModel', 'Model');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

class Property extends AppModel {

    public $useTable = false;

    public function listProperties() {
        $properties = array();

        $dir = new Folder(APP); //WWW_ROOT.'files'
        $files = $dir->find('.*\.properties');

        foreach ($files as $file) {
            $file = new File($dir->pwd() . DS . $file);
            $props = $this->extractProperties($file->read());
            $properties = array_merge($properties, $props);
            $file->close();
        }

        return $properties;
    }

    private function extractProperties($contents) {
        $keyVals = array();
        $lines = explode("\n", $contents);
        foreach ($lines as $line) {
            $temp = explode("=", $line);
            if (count($temp) > 1) {                 
              $keyVals[$temp[0]] = trim($temp[1]);
            }
        }
        return $keyVals;
    }

}
