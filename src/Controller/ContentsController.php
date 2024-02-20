<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Contents Controller
 *
 * @property \App\Model\Table\ContentsTable $Contents
 * @method \App\Model\Entity\Content[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ContentsController extends AppController
{

    /**
     * Controller initialize override
     *
     * @return void
     */
    public function initialize(): void {
        parent::initialize();

        // Define types of contents in view
        $this->set('content_types', [
            'text' => 'Plaintext',
            'html' => 'HTML',
            'image' => 'Image',
        ]);

        // Controller-level function/action whitelist for authentication
        //$this->Authentication->allowUnauthenticated(['index', 'view', 'edit', 'add', 'delete']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $user = $this->Authentication->getIdentity();
        if($user->get('role')!= "admin"){ //customer will be redirect to home
            return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
        } else{
            $this->paginate = [
                'order' => [
                    'parent' => 'asc',
                    'key' => 'asc',
                ],
            ];

            $contents = $this->paginate($this->Contents);


            $this->set(compact('contents'));
        }
    }

    /**
     * View method
     *
     * @param string|null $id Content id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Authentication->getIdentity();
        if($user->get('role')!= "admin"){ //customer will be redirect to home
            return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
        } else{
            $content = $this->Contents->get($id, [
                'contain' => [],
            ]);

            $this->set(compact('content'));
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
        if($user->get('role')!= "admin"){ //customer will be redirect to home
            return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
        } else{
            $content = $this->Contents->newEmptyEntity();
            if ($this->request->is('post')) {
                $content = $this->Contents->patchEntity($content, $this->request->getData());
                if ($this->Contents->save($content)) {
                    $this->Flash->success(__('The content has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The content could not be saved. Please, try again.'));
            }
            $this->set(compact('content'));
        }

    }

    /**
     * Edit method
     *
     * @param string|null $id Content id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {

        $user = $this->Authentication->getIdentity();
        if($user->get('role')!= "admin"){ //customer will be redirect to home
            return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
        } else{
            $content = $this->Contents->get($id, [
                'contain' => [],
            ]);

            if ($this->request->is(['patch', 'post', 'put'])) {
                $content = $this->Contents->patchEntity($content, $this->request->getData());

                if ($content->isDirty('content_value'))
                    $content->previous_value = $content->getOriginal('content_value');


                if ($this->Contents->save($content)) {
                    $this->Flash->success(__('The content has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The content could not be saved. Please, try again.'));
            }
            $this->set(compact('content'));
        }

    }

    /**
     * Delete method
     *
     * @param string|null $id Content id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $user = $this->Authentication->getIdentity();
        if($user->get('role')!= "admin"){ //customer will be redirect to home
            return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
        } else{
            $this->request->allowMethod(['post', 'delete']);
            $content = $this->Contents->get($id);
            if ($this->Contents->delete($content)) {
                $this->Flash->success(__('The content has been deleted.'));
            } else {
                $this->Flash->error(__('The content could not be deleted. Please, try again.'));
            }

            return $this->redirect(['action' => 'index']);
        }

    }

    /**
     * Restore method
     *
     * @param string|null $id Content Block id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function restore($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $content = $this->Contents->get($id);

        // Restore previous_value to content_value, then clear the previous_value field
        $content->content_value = $content->previous_value;
        $content->previous_value = null;

        if ($this->Contents->save($content)) {
            $this->Flash->success(__('The content block has been restored.'));
        } else {
            $this->Flash->error(__('The content block could not be restored. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
