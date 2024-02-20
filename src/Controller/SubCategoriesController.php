<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * SubCategories Controller
 *
 * @property \App\Model\Table\SubCategoriesTable $SubCategories
 * @method \App\Model\Entity\SubCategory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SubCategoriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $user = $this->Authentication->getIdentity();
        if ($user->get('role') != 'admin') { //customers will be redirected to homepage
            return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
        } else {
            $subCategories = $this->paginate($this->SubCategories);

            $this->set(compact('subCategories'));
        }
    }

    /**
     * View method
     *
     * @param string|null $id Sub Category id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Authentication->getIdentity();
        if ($user->get('role') != 'admin') { //customer will be redirected to homepage
            return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
        } else {
            $subCategory = $this->SubCategories->get($id, [
                'contain' => ['Categories'],
            ]);

            $this->set(compact('subCategory'));
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
        if ($user->get('role') != 'admin') { //customer will be redirect to home
            return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
        } else {
            $subCategory = $this->SubCategories->newEmptyEntity();
            if ($this->request->is('post')) {
                $subCategory = $this->SubCategories->patchEntity($subCategory, $this->request->getData());
                if ($this->SubCategories->save($subCategory)) {
                    $this->Flash->success(__('The sub category has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The sub category could not be saved. Please, try again.'));
            }
            $categories = $this->SubCategories->Categories->find('list', ['limit' => 200])->all();
            $this->set(compact('subCategory', 'categories'));
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Sub Category id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Authentication->getIdentity();
        if ($user->get('role') != 'admin') { //customer will be redirect to home
            return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
        } else {
            $subCategory = $this->SubCategories->get($id, [
                'contain' => [],
            ]);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $subCategory = $this->SubCategories->patchEntity($subCategory, $this->request->getData());
                if ($this->SubCategories->save($subCategory)) {
                    $this->Flash->success(__('The sub category has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The sub category could not be saved. Please, try again.'));
            }
            $categories = $this->SubCategories->Categories->find('list', ['limit' => 200])->all();
            $this->set(compact('subCategory', 'categories'));
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Sub Category id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $user = $this->Authentication->getIdentity();
        if ($user->get('role') != 'admin') { //customer will be redirect to home
            return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
        } else {
            $this->request->allowMethod(['post', 'delete']);
            $subCategory = $this->SubCategories->get($id);
            if ($this->SubCategories->delete($subCategory)) {
                $this->Flash->success(__('The sub category has been deleted.'));
            } else {
                $this->Flash->error(__('The sub category could not be deleted. Please, try again.'));
            }

            return $this->redirect(['action' => 'index']);
        }
    }
}
