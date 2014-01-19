<?php
App::uses('AppController', 'Controller');
/**
 * Costs Controller
 *
 * @property Cost $Cost
 * @property PaginatorComponent $Paginator
 */
class CostsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	private function startList() {
		$values = '[';
		$labels = '[';
		$valuesAndLabels['values'] = $values;
		$valuesAndLabels['labels'] = $labels;
		return $valuesAndLabels;
	}
	
	private function specialSQL($valuesAndLabels, $name, $conditions, $setComma = false) {
		$values = $valuesAndLabels['values'];
		$labels = $valuesAndLabels['labels'];
		
		if ($setComma) {
			$values .= ',';
			$labels .= ',';
		}
		
		$options = array(
		   'fields' => 'SUM(price) AS val',
		   'conditions' => $conditions
		   );
		$tmp = $this->Cost->find('first', $options);
		$values .= $tmp[0]['val'];	
		$labels .= "'" . $name . "'";

		$newValuesAndLabels = array();
		$newValuesAndLabels['values'] = $values;
		$newValuesAndLabels['labels'] = $labels;
		return $newValuesAndLabels;
	}
	
	private function getOnlyValue($conditions) {
	    $tmpValuesAndLabels = array('values' => '', 'labels' => '');
		$tmpValuesAndLabels = $this->specialSQL($tmpValuesAndLabels, 'NA', $conditions);
		return $tmpValuesAndLabels['values'];
	}
	
	private function stopList($valuesAndLabels) {
		$values = $valuesAndLabels['values'];
		$labels = $valuesAndLabels['labels'];
		$values .= ']';
		$labels .= ']';
		
		$this->set('values', $values);
		$this->set('labels', $labels);
	}
		
	public function overall() {
        $valuesAndLabels = $this->startList();
		
		$conditions = array('NOT' => array( 'Category.name' => array('Hochzeitsreise', 'Sonstiges') ));
		$valuesAndLabels = $this->specialSQL($valuesAndLabels, 'Hochzeitsfeier', $conditions);
	
		$conditions = array('Category.name' => 'Sonstiges');
		$valuesAndLabels = $this->specialSQL($valuesAndLabels, 'Sonstiges', $conditions, true);

		$conditions = array('Category.name' => 'Hochzeitsreise');
		$valuesAndLabels = $this->specialSQL($valuesAndLabels, 'Reise', $conditions, true);		
		
        $this->stopList($valuesAndLabels);
	}
	
    public function journey() {
    	$valuesAndLabels = $this->startList();
		
		$conditions = array('Category.name' => 'Hochzeitsreise',
		                    'Cost.name LIKE' => 'Hotel%' );
		$valuesAndLabels = $this->specialSQL($valuesAndLabels, 'Hotels', $conditions);	
		
		$conditions = array('Category.name' => 'Hochzeitsreise',
		                    'Cost.name LIKE' => 'Flug%' );
		$valuesAndLabels = $this->specialSQL($valuesAndLabels, 'Fluege', $conditions, true);			

		$conditions = array('Category.name' => 'Hochzeitsreise',
		                    'Cost.name LIKE' => 'Mietwagen%' );
		$valuesAndLabels = $this->specialSQL($valuesAndLabels, 'Mietwaegen', $conditions, true);			
		
		$conditions = array('Category.name' => 'Hochzeitsreise',
		                    'Cost.name LIKE' => 'Bargeld%' );
		$valuesAndLabels = $this->specialSQL($valuesAndLabels, 'Bargeld', $conditions, true);			
		
        $this->stopList($valuesAndLabels);		
    }
	
	public function festivity() {
		$valuesAndLabels = $this->startList();

		// -------------------
		$conditions = array('Category.name' => 'Hochzeitsfeier', 'Subcategory.name' => null);
		$tmpValue = $this->getOnlyValue($conditions);
		
		$conditions = array('Category.name' => 'Standesamt', 'Subcategory.name' => null);
        $tmpValue += $this->getOnlyValue($conditions);
        
		$conditions = array('Category.name' => 'Kirche', 'Subcategory.name' => null);
        $tmpValue += $this->getOnlyValue($conditions);
		
		$valuesAndLabels['values'] .= $tmpValue;
		$valuesAndLabels['labels'] .= "'Sonstiges'";
		// --------------------
		
		$conditions = array('Subcategory.name' => 'Blumenladen');
		$valuesAndLabels = $this->specialSQL($valuesAndLabels, 'Blumenschmuck', $conditions, true);		

		$conditions = array('Cost.name NOT LIKE ' => 'Probeessen%',
		                    'Subcategory.name' => 'Essen und Trinken');
		$valuesAndLabels = $this->specialSQL($valuesAndLabels, 'Speisen und Getraenke', $conditions, true);			
		
		$conditions = array('Subcategory.name' => 'Musik');
		$valuesAndLabels = $this->specialSQL($valuesAndLabels, 'Musik', $conditions, true);

		// --------------------
		$conditions = array('Category.name' => 'Hochzeitsfeier',
		                    'Subcategory.name LIKE' => 'Kleidung%');
		$tmpValue = $this->getOnlyValue($conditions);
        
		$conditions = array('Category.name' => 'Ringe');
        $tmpValue += $this->getOnlyValue($conditions);

        $valuesAndLabels['values'] .= ','.$tmpValue;
		$valuesAndLabels['labels'] .= ", 'Kleidung und Ringe'";
		// ---------------------
		
		$conditions = array('Category.name' => 'Karten');
		$valuesAndLabels = $this->specialSQL($valuesAndLabels, 'Einladungskarten', $conditions, true);
		
        $this->stopList($valuesAndLabels);
	}
	
	public function clothes() {
		$valuesAndLabels = $this->startList();

		$conditions = array('Category.name' => 'Hochzeitsfeier', 'Subcategory.name' => 'Kleidung (Braut)');
		$valuesAndLabels = $this->specialSQL($valuesAndLabels, 'Braut Kleidung', $conditions);

		$conditions = array('Category.name' => 'Hochzeitsfeier',
		                    'Subcategory.name LIKE' => '%utigam)');
		$valuesAndLabels = $this->specialSQL($valuesAndLabels, 'Braeutigam Kleidung', $conditions, true);		

		$conditions = array('Category.name' => 'Ringe');
		$valuesAndLabels = $this->specialSQL($valuesAndLabels, 'Ringe', $conditions, true);			
		$this->stopList($valuesAndLabels);
	}
	
	public function catering() {
		$valuesAndLabels = $this->startList();

		$conditions = array('Category.name' => 'Hochzeitsfeier', 'Subcategory.name' => 'Essen und Trinken',
		                    'Cost.name NOT LIKE' => 'Getr%');
		$valuesAndLabels = $this->specialSQL($valuesAndLabels, 'Essen', $conditions);

		$conditions = array('Category.name' => 'Hochzeitsfeier', 'Subcategory.name' => 'Essen und Trinken',
		                    'Cost.name LIKE' => 'Getr%');
		$valuesAndLabels = $this->specialSQL($valuesAndLabels, 'Getraenke', $conditions, true);		

		$conditions = array('Category.name' => 'Standesamt', 'Subcategory.name' => 'Essen und Trinken');
		$valuesAndLabels = $this->specialSQL($valuesAndLabels, 'Speisen nach Standesamt', $conditions, true);		
		
		$this->stopList($valuesAndLabels);
	}
	
	public function interest() {
		$valuesAndLabels = $this->startList();

		$conditions = array('Category.name' => 'Hochzeitsfeier', 'Subcategory.name' => null);
		$valuesAndLabels = $this->specialSQL($valuesAndLabels, 'Opportunitaetskosten', $conditions);		
		
		$conditions = array('Category.name' => 'Hochzeitsfeier', 'Subcategory.name' => 'Blumenladen');
		$valuesAndLabels = $this->specialSQL($valuesAndLabels, 'Blumenschmuck', $conditions, true);		

		$conditions = array('Category.name' => 'Hochzeitsfeier', 'Subcategory.name' => 'Essen und Trinken',
		                    'Cost.name NOT LIKE' => 'Getr%');
		$valuesAndLabels = $this->specialSQL($valuesAndLabels, 'Essen', $conditions, true);

		$conditions = array('Category.name' => 'Hochzeitsfeier', 'Subcategory.name' => 'Essen und Trinken',
		                    'Cost.name LIKE' => 'Getr%');
		$valuesAndLabels = $this->specialSQL($valuesAndLabels, 'Getraenke', $conditions, true);				
		
		$conditions = array('Category.name' => 'Hochzeitsfeier', 'Subcategory.name' => 'Musik');
		$valuesAndLabels = $this->specialSQL($valuesAndLabels, 'Musik', $conditions, true);

		$conditions = array('Category.name' => 'Hochzeitsfeier', 'Subcategory.name' => 'Kleidung (Braut)');
		$valuesAndLabels = $this->specialSQL($valuesAndLabels, 'Braut Kleidung', $conditions, true);

		$conditions = array('Category.name' => 'Hochzeitsfeier',
		                    'Subcategory.name LIKE' => '%utigam)');
		$valuesAndLabels = $this->specialSQL($valuesAndLabels, 'Braeutigam Kleidung', $conditions, true);		
				
        $this->stopList($valuesAndLabels);
	}	
	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		switch ($this->Session->read('Auth.User.username')) {
			case 'developer' : break;
			default : $this->redirect(array('controller' => 'costs', 'action' => 'overall'));
		}
		
		$this->Cost->recursive = 0;
		$this->set('costs', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Cost->exists($id)) {
			throw new NotFoundException(__('Invalid cost'));
		}
		$options = array('conditions' => array('Cost.' . $this->Cost->primaryKey => $id));
		$this->set('cost', $this->Cost->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Cost->create();
			if ($this->Cost->save($this->request->data)) {
				$this->Session->setFlash(__('The cost has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cost could not be saved. Please, try again.'));
			}
		}
		$categories = $this->Cost->Category->find('list');
		$subCategories = $this->Cost->SubCategory->find('list');
		$this->set(compact('categories', 'subCategories'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Cost->exists($id)) {
			throw new NotFoundException(__('Invalid cost'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Cost->save($this->request->data)) {
				$this->Session->setFlash(__('The cost has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cost could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Cost.' . $this->Cost->primaryKey => $id));
			$this->request->data = $this->Cost->find('first', $options);
		}
		$categories = $this->Cost->Category->find('list');
		$subCategories = $this->Cost->SubCategory->find('list');
		$this->set(compact('categories', 'subCategories'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Cost->id = $id;
		if (!$this->Cost->exists()) {
			throw new NotFoundException(__('Invalid cost'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Cost->delete()) {
			$this->Session->setFlash(__('The cost has been deleted.'));
		} else {
			$this->Session->setFlash(__('The cost could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
