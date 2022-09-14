<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Images Controller
 *
 * @property \App\Model\Table\ImagesTable $Images
 * @method \App\Model\Entity\Image[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ImagesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->Authorization->Authorize($this->Images->newEmptyEntity());
        $images = $this->paginate($this->Images);

        $this->set(compact('images'));
    }

    /**
     * View method
     *
     * @param string|null $id Image id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $image = $this->Images->get($id, [
            'contain' => ['Items'],
        ]);

        $this->Authorization->Authorize($image);

        $this->set(compact('image'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $image = $this->Images->newEmptyEntity();
        $this->Authorization->Authorize($image);
        if ($this->request->is('post')) {
            $image = $this->Images->patchEntity($image, $this->request->getData());

            if(!$image->getErrors) {
                $images = $this->request->getData('image_file');

                $targetPath = 'productimages/thumbnails/GlassArt' . $this->request->getQuery('item_id') . '.jpg';

                $name = 'GlassArt' . $this->request->getQuery('item_id');

                if ($name)
                    $images->moveTo($targetPath);


                $image->images=$name;
            }
            $image->name = 'GlassArt' . $this->request->getQuery('item_id');
            $image->file_path = 'productimages/GlassArt' . $this->request->getQuery('item_id') . '.jpg';
            $image->thumbnail_file_path = 'productimages/thumbnails/GlassArt' . $this->request->getQuery('item_id') . '.jpg';

            if ($this->Images->save($image)) {
                $this->Flash->success(__('The image has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The image could not be saved. Please, try again.'));
        }
        $items = $this->Images->Items->find('list', ['limit' => 200])->all();
        $this->set(compact('image', 'items'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Image id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $image = $this->Images->get($id, [
            'contain' => ['Items'],
        ]);
        $this->Authorization->Authorize($image);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $image = $this->Images->patchEntity($image, $this->request->getData());
            if ($this->Images->save($image)) {
                $this->Flash->success(__('The image has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The image could not be saved. Please, try again.'));
        }
        $items = $this->Images->Items->find('list', ['limit' => 200])->all();
        $this->set(compact('image', 'items'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Image id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $image = $this->Images->get($id);
        $this->Authorization->Authorize($image);
        if ($this->Images->delete($image)) {
            $this->Flash->success(__('The image has been deleted.'));
        } else {
            $this->Flash->error(__('The image could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
