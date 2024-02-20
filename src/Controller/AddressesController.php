<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Addresses Controller
 *
 * @property \App\Model\Table\AddressesTable $Addresses
 * @method \App\Model\Entity\Address[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AddressesController extends AppController
{
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
            $addresses = $this->paginate($this->Addresses);

            $this->set(compact('addresses'));
        }


    }

    /**
     * View method
     *
     * @param string|null $id Address id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Authentication->getIdentity();
        if($user->get('role')!= "admin"){ //customers will be redirected to homepage
            return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
        }
        # If User ID is 111 (default ID set for non-registered Users)
        # or User role is 'customer' (default role set for non-registered Users)
        else{
            $address = $this->Addresses->get($id);

            $this->set(compact('address'));
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
            $address = $this->Addresses->newEmptyEntity();
            if ($this->request->is('post')) {
                $address = $this->Addresses->patchEntity($address, $this->request->getData());
                if ($this->Addresses->save($address)) {
                    $this->Flash->success(__('The address has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The address could not be saved. Please, try again.'));
            }
            $this->set(compact('address'));
        }


    }

    /**
     * Edit method
     *
     * @param string|null $id Address id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Authentication->getIdentity();
        if($user->get('role')!= "admin"){ //customer will be redirect to home
            return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
        } else{
            $address = $this->Addresses->get($id, [
                'contain' => [],
            ]);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $address = $this->Addresses->patchEntity($address, $this->request->getData());
                if ($this->Addresses->save($address)) {
                    $this->Flash->success(__('The address has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The address could not be saved. Please, try again.'));
            }
            $this->set(compact('address'));
        }

    }

    /**
     * Delete method
     *
     * @param string|null $id Address id.
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
            $address = $this->Addresses->get($id);
            if ($this->Addresses->delete($address)) {
                $this->Flash->success(__('The address has been deleted.'));
            } else {
                $this->Flash->error(__('The address could not be deleted. Please, try again.'));
            }

            return $this->redirect(['action' => 'index']);
        }

    }
}
