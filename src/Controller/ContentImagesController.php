<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ContentImages Controller
 *
 * @property \App\Model\Table\ContentImagesTable $ContentImages
 * @method \App\Model\Entity\ContentImage[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */




class ContentImagesController extends AppController
{
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

            $contentImages = $this->paginate($this->ContentImages);

            $this->set(compact('contentImages'));
        }



    }

    /**
     * View method
     *
     * @param string|null $id Content Image id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Authentication->getIdentity();
        if($user->get('role')!= "admin"){ //customer will be redirect to home
            return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
        } else{
            $contentImage = $this->ContentImages->get($id, [
                'contain' => [],
            ]);

            $this->set(compact('contentImage'));
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
            $contentImage = $this->ContentImages->newEmptyEntity();
            if ($this->request->is('post')) {
                $contentImage = $this->ContentImages->patchEntity($contentImage, $this->request->getData());

                //image
                if (!$contentImage->getErrors){
                    $image = $this->request->getData('image_file');
                    $name = $image->getClientFilename();

                    if( !is_dir(WWW_ROOT.'img'.DS.'gemino_img'))mkdir(WWW_ROOT.'img'.DS.'gemino_img',0775);


                    $targetPath = WWW_ROOT.'img'.DS.'gemino_img'.DS.$name;

                    if ($name)
                        $image->moveTo($targetPath);

                    $contentImage->image_file = 'gemino_img/'.$name;

                    //return debug($targetPath);
                    //return debug($product);

                }

                if ($this->ContentImages->save($contentImage)) {
                    $this->Flash->success(__('The content image has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The content image could not be saved. Please, try again.'));
            }
            $this->set(compact('contentImage'));
        }

    }

    /**
     * Edit method
     *
     * @param string|null $id Content Image id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Authentication->getIdentity();
        if($user->get('role')!= "admin"){ //customer will be redirect to home
            return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
        } else{
            $contentImage = $this->ContentImages->get($id, [
                'contain' => [],
            ]);

            //image
            if($this->request->is(['patch', 'post', 'put'])) {

                $contentImage = $this->ContentImages->patchEntity($contentImage, $this->request->getData());

                if (!$contentImage->getErrors){
                    $image = $this->request->getData('change_image');
                    $name = $image->getClientFilename();

                    if($name){
                        if( !is_dir(WWW_ROOT.'img'.DS.'gemino_img'))mkdir(WWW_ROOT.'img'.DS.'gemino_img',0775);


                        $targetPath = WWW_ROOT.'img'.DS.'gemino_img'.DS.$name;


                        $image->moveTo($targetPath);

                        //delete image when it is replace
                        $imgpath = WWW_ROOT.'img'.DS.$contentImage->image_file;
                        if(file_exists($imgpath)){
                            unlink($imgpath);
                        }

                        $contentImage->image_file = 'gemino_img/'.$name;

                    }

                }

                if($this->ContentImages->save($contentImage)){
                    $this->Flash->success(__('The content image has been saved.'));

                    return $this->redirect(['action' => 'index']);

                }
                $this->Flash->error(__('The content image could not be saved. Please, try again.'));

            }
            $this->set(compact('contentImage'));
        }

    }

    /**
     * Delete method
     *
     * @param string|null $id Content Image id.
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
            $contentImage = $this->ContentImages->get($id);

            $imgpath = WWW_ROOT.'img'.DS.$contentImage->image_file;

            if ($this->ContentImages->delete($contentImage)) {

                //delete link file eg image, when the products are deleted
                if(file_exists($imgpath)){
                    unlink($imgpath);
                }

                $this->Flash->success(__('The content image has been deleted.'));
            } else {
                $this->Flash->error(__('The content image could not be deleted. Please, try again.'));
            }

            return $this->redirect(['action' => 'index']);
        }

    }
}
