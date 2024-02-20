<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * SubcategoriesTransports Controller
 *
 * @property \App\Model\Table\SubcategoriesTransportsTable $SubcategoriesTransports
 * @method \App\Model\Entity\SubcategoriesTransport[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SubcategoriesTransportsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'SubCategories', 'Transports'],
        ];
        $subcategoriesTransports = $this->paginate($this->SubcategoriesTransports);

        $this->set(compact('subcategoriesTransports'));
    }

    /**
     * View method
     *
     * @param string|null $id Subcategories Transport id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $subcategoriesTransport = $this->SubcategoriesTransports->get($id, [
            'contain' => ['Users', 'SubCategories', 'Transports'],
        ]);

        $this->set(compact('subcategoriesTransport'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $subcategoriesTransport = $this->SubcategoriesTransports->newEmptyEntity();
        if ($this->request->is('post')) {
            $subcategoriesTransport = $this->SubcategoriesTransports->patchEntity($subcategoriesTransport, $this->request->getData());
            if ($this->SubcategoriesTransports->save($subcategoriesTransport)) {
                $this->Flash->success(__('The subcategories transport has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The subcategories transport could not be saved. Please, try again.'));
        }
        $users = $this->SubcategoriesTransports->Users->find('list', ['limit' => 200])->all();
        $subCategories = $this->SubcategoriesTransports->SubCategories->find('list', ['limit' => 200])->all();
        $transports = $this->SubcategoriesTransports->Transports->find('list', ['limit' => 200])->all();
        $this->set(compact('subcategoriesTransport', 'users', 'subCategories', 'transports'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Subcategories Transport id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $subcategoriesTransport = $this->SubcategoriesTransports->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $subcategoriesTransport = $this->SubcategoriesTransports->patchEntity($subcategoriesTransport, $this->request->getData());
            if ($this->SubcategoriesTransports->save($subcategoriesTransport)) {
                $this->Flash->success(__('The subcategories transport has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The subcategories transport could not be saved. Please, try again.'));
        }
        $users = $this->SubcategoriesTransports->Users->find('list', ['limit' => 200])->all();
        $subCategories = $this->SubcategoriesTransports->SubCategories->find('list', ['limit' => 200])->all();
        $transports = $this->SubcategoriesTransports->Transports->find('list', ['limit' => 200])->all();
        $this->set(compact('subcategoriesTransport', 'users', 'subCategories', 'transports'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Subcategories Transport id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $subcategoriesTransport = $this->SubcategoriesTransports->get($id);
        if ($this->SubcategoriesTransports->delete($subcategoriesTransport)) {
            $this->Flash->success(__('The subcategories transport has been deleted.'));
        } else {
            $this->Flash->error(__('The subcategories transport could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
