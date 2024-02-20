<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * SearchRecords Controller
 *
 * @property \App\Model\Table\SearchRecordsTable $SearchRecords
 * @method \App\Model\Entity\SearchRecord[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SearchRecordsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */


    public function index() //ONLY ADMIN CAN SEE
    {

        // Check if a user is authenticated (logged in)
        $user = $this->Authentication->getIdentity();

        if ($user->get('role')!= "admin") {
            // If user is not authenticated, redirect them to the homepage
            return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
        } else {
            // User is authenticated, so they can access the search records
            $this->paginate = [
                'contain' => ['Users', 'Addresses'],
            ];

            $searchRecords = $this->paginate($this->SearchRecords);

            $this->set(compact('searchRecords'));
        }


    }



    /**
     * View method
     *
     * @param string|null $id Search Record id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) //record for admin
    {
        $user = $this->Authentication->getIdentity();

        if (!$user) {
            // If user is not authenticated, redirect them to the homepage
            return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
        }

        if ($user->get('role') !== 'admin') {
            // If the user is not an admin, restrict access
            // Filter the search record by the user's ID
            $searchRecord = $this->SearchRecords->find('all')
                ->where(['id' => $id, 'user_id' => $user->id])
                ->contain(['Users', 'Addresses'])
                ->first();

            if (!$searchRecord) {
                // If the search record does not exist or does not belong to the user, redirect to homepage
                return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
            }
        } else {
            // Admin can view any search record

            $searchRecord = $this->SearchRecords->get($id, [
                'contain' => ['Users', 'Addresses'],
            ]);
        }

        $this->set(compact('searchRecord'));
    }

    public function record($id = null) //for customer see there indivdual search record
    {
        $user = $this->Authentication->getIdentity();

        if (!$user) {
            // If user is not authenticated, redirect them to the homepage
            return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
        }

        if ($user->get('role') !== 'admin') {
            // If the user is not an admin, restrict access
            // Filter the search record by the user's ID
            $searchRecord = $this->SearchRecords->find('all')
                ->where(['id' => $id, 'user_id' => $user->id])
                ->contain(['Users', 'Addresses'])
                ->first();

            if (!$searchRecord) {
                // If the search record does not exist or does not belong to the user, redirect to homepage
                return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
            }
        } else {
            // Admin can view any search record

            $searchRecord = $this->SearchRecords->get($id, [
                'contain' => ['Users', 'Addresses'],
            ]);
        }

        $this->set(compact('searchRecord'));
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
            $searchRecord = $this->SearchRecords->newEmptyEntity();
            if ($this->request->is('post')) {
                $searchRecord = $this->SearchRecords->patchEntity($searchRecord, $this->request->getData());
                if ($this->SearchRecords->save($searchRecord)) {
                    $this->Flash->success(__('The search record has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The search record could not be saved. Please, try again.'));
            }
            $users = $this->SearchRecords->Users->find('list', ['limit' => 200])->all();
            $addresses = $this->SearchRecords->Addresses->find('list', ['limit' => 200])->all();
            $this->set(compact('searchRecord', 'users', 'addresses'));
        }


    }

    /**
     * Edit method
     *
     * @param string|null $id Search Record id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Authentication->getIdentity();
        if($user->get('role')!= "admin"){ //customer will be redirect to home
            return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
        } else{
            $searchRecord = $this->SearchRecords->get($id, [
                'contain' => [],
            ]);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $searchRecord = $this->SearchRecords->patchEntity($searchRecord, $this->request->getData());
                if ($this->SearchRecords->save($searchRecord)) {
                    $this->Flash->success(__('The search record has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The search record could not be saved. Please, try again.'));
            }
            $users = $this->SearchRecords->Users->find('list', ['limit' => 200])->all();
            $addresses = $this->SearchRecords->Addresses->find('list', ['limit' => 200])->all();
            $this->set(compact('searchRecord', 'users', 'addresses'));
        }


    }

    /**
     * Delete method
     *
     * @param string|null $id Search Record id.
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
            $searchRecord = $this->SearchRecords->get($id);
            if ($this->SearchRecords->delete($searchRecord)) {
                $this->Flash->success(__('The search record has been deleted.'));
            } else {
                $this->Flash->error(__('The search record could not be deleted. Please, try again.'));
            }

            return $this->redirect(['action' => 'index']);
        }


    }

    public function customer()
    {
        // Check if a user is authenticated (logged in)
        $user = $this->Authentication->getIdentity();

        if (!$user) {
            // If user is not authenticated, redirect them to the homepage
            return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
        }

        // User is authenticated, so they can access the search records
        $this->paginate = [
            'contain' => ['Users', 'Addresses'],
        ];

        // Filter search records by the currently logged-in user's user_id
        $searchRecords = $this->SearchRecords->find('all')
            ->where(['user_id' => $user->id])
            ->contain(['Users', 'Addresses']);

        $this->set(compact('searchRecords'));
    }
}
