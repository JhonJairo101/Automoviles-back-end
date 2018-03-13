<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CarBrands Controller
 *
 * @property \App\Model\Table\CarBrandsTable $CarBrands
 *
 * @method \App\Model\Entity\CarBrand[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CarBrandsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $carBrands = $this->paginate($this->CarBrands);

        $this->set(compact('carBrands'));
    }

    /**
     * View method
     *
     * @param string|null $id Car Brand id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $carBrand = $this->CarBrands->get($id, [
            'contain' => []
        ]);

        $this->set('carBrand', $carBrand);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $carBrand = $this->CarBrands->newEntity();
        if ($this->request->is('post')) {
            $carBrand = $this->CarBrands->patchEntity($carBrand, $this->request->getData());
            if ($this->CarBrands->save($carBrand)) {
                $this->Flash->success(__('The car brand has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The car brand could not be saved. Please, try again.'));
        }
        $this->set(compact('carBrand'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Car Brand id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $carBrand = $this->CarBrands->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $carBrand = $this->CarBrands->patchEntity($carBrand, $this->request->getData());
            if ($this->CarBrands->save($carBrand)) {
                $this->Flash->success(__('The car brand has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The car brand could not be saved. Please, try again.'));
        }
        $this->set(compact('carBrand'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Car Brand id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $carBrand = $this->CarBrands->get($id);
        if ($this->CarBrands->delete($carBrand)) {
            $this->Flash->success(__('The car brand has been deleted.'));
        } else {
            $this->Flash->error(__('The car brand could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    /**
     * Obtener todas las marcas de autos
     * @return [type] [description]
     */
    public function getAllBrands(){
        
        $this->autoRender = false;

        $carBrands = $this->CarBrands->find();

        $carBrands = $carBrands->toArray();

        echo json_encode($carBrands);

    }

}
