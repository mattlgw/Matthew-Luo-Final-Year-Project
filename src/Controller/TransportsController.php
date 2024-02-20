<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Transports Controller
 *
 * @property \App\Model\Table\TransportsTable $Transports
 * @method \App\Model\Entity\Transport[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TransportsController extends AppController
{
    /**
     * Controller initialize override
     *
     * @return void
     */
    public function initialize(): void {
        parent::initialize();

        // Controller-level function/action whitelist for authentication
        $this->Authentication->allowUnauthenticated(['index', 'view', 'edit', 'add', 'delete']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $user = $this->Authentication->getIdentity();
        if($user->get('role')!= "admin"){ //customers will be redirected to homepage
            return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
        }
        # If User ID is 111 (default ID set for non-registered Users)
        # or User role is 'customer' (default role set for non-registered Users)
        else{
            $transports = $this->paginate($this->Transports);

            $this->set(compact('transports'));
        }


    }

    /**
     * View method
     *
     * @param string|null $id Transport id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Authentication->getIdentity();
        if ($user->get('role')!= "admin")
        { //customer will be redirected to homepage
            return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
        }
        else
        {
            $transport = $this->Transports->get($id);

            $this->set(compact('transport'));
        }

    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Authentication->getIdentity();
        if ($user->get('role') != "admin") { //customer will be redirect to home
            return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
        } else {
            $transport = $this->Transports->newEmptyEntity();
            if ($this->request->is('post')) {
                $transport = $this->Transports->patchEntity($transport, $this->request->getData());
                if ($this->Transports->save($transport)) {
                    $this->Flash->success(__('The transport has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The transport could not be saved. Please, try again.'));
            }
            $this->set(compact('transport'));
        }

    }

    /**
     * Edit method
     *
     * @param string|null $id Transport id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Authentication->getIdentity();
        if($user->get('role')!= "admin"){ //customer will be redirect to home
            return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
        } else{
            $transport = $this->Transports->get($id, [
                'contain' => [],
            ]);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $transport = $this->Transports->patchEntity($transport, $this->request->getData());
                if ($this->Transports->save($transport)) {
                    $this->Flash->success(__('The transport has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The transport could not be saved. Please, try again.'));
            }
            $this->set(compact('transport'));
        }


    }

    /**
     * Delete method
     *
     * @param string|null $id Transport id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $user = $this->Authentication->getIdentity();
        if ($user->get('role') != "admin") { //customer will be redirect to home
            return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
        } else {
            $this->request->allowMethod(['post', 'delete']);
            $transport = $this->Transports->get($id);
            if ($this->Transports->delete($transport)) {
                $this->Flash->success(__('The transport has been deleted.'));
            } else {
                $this->Flash->error(__('The transport could not be deleted. Please, try again.'));
            }

            return $this->redirect(['action' => 'index']);
        }


    }
}
