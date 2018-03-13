<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Cars Controller
 *
 * @property \App\Model\Table\CarsTable $Cars
 *
 * @method \App\Model\Entity\Car[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CarsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['CarBrands']
        ];
        $cars = $this->paginate($this->Cars);

        $this->set(compact('cars'));
    }

    /**
     * View method
     *
     * @param string|null $id Car id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $car = $this->Cars->get($id, [
            'contain' => ['CarBrands', 'Users']
        ]);

        $this->set('car', $car);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $car = $this->Cars->newEntity();
        if ($this->request->is('post')) {
            $car = $this->Cars->patchEntity($car, $this->request->getData());
            if ($this->Cars->save($car)) {
                $this->Flash->success(__('The car has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The car could not be saved. Please, try again.'));
        }
        $carBrands = $this->Cars->CarBrands->find('list', ['limit' => 200]);
        $users = $this->Cars->Users->find('list', ['limit' => 200]);
        $this->set(compact('car', 'carBrands', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Car id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $car = $this->Cars->get($id, [
            'contain' => ['Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $car = $this->Cars->patchEntity($car, $this->request->getData());
            if ($this->Cars->save($car)) {
                $this->Flash->success(__('The car has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The car could not be saved. Please, try again.'));
        }
        $carBrands = $this->Cars->CarBrands->find('list', ['limit' => 200]);
        $users = $this->Cars->Users->find('list', ['limit' => 200]);
        $this->set(compact('car', 'carBrands', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Car id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $car = $this->Cars->get($id);
        if ($this->Cars->delete($car)) {
            $this->Flash->success(__('The car has been deleted.'));
        } else {
            $this->Flash->error(__('The car could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    /**
     * Obtener todos los autos
     * @return [type] [description]
     */
    public function getAllCars(){

        $this->autoRender = false;

        $cars = $this->Cars->find();

        $cars->contain(['CarBrands','Users']);

        $cars = $cars->toArray();

        echo json_encode($cars);
    }

    /**
     * Agregar un auto
     */
    public function addCar()
    {   
        $this->autoRender = false;

        $data = $this->request->data;

        // $data['model'] = $data['model'] . "-zxc";
        
        $car = $this->Cars->newEntity();

        $car = $this->Cars->patchEntity($car, $this->request->getData());

        if ($this->Cars->save($car)) {

            echo json_encode($car);
        }


    }

    /**
     * Eliminar un auto
     * @return [type] [description]
     */
    public function deleteCar(){


        $this->autoRender = false;

        $data = $this->request->data;

        $id = $data['id']; 

        $car = $this->Cars->get($id);

        if ($this->Cars->delete($car)) {
            
            echo json_encode(Array('result'=>'ok'));
            
        } else {
            


        }
    
    }


    /**
     * Editar un auto
     * @return [type] [description]
     */
    public function editCar(){

        $this->autoRender = false;

        $data = $this->request->data;

        $id = $data['id']; 

        $car = $this->Cars->get($id);   

        unset($data['car_brand']);
        unset($data['users']);

        $car = $this->Cars->patchEntity($car, $data);

        if ($this->Cars->save($car)) {

            echo json_encode($car);

        }

    }



}
