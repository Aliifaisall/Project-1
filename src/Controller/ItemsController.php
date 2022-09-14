<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Items Controller
 *
 * @property \App\Model\Table\ItemsTable $Items
 * @method \App\Model\Entity\Item[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */

class ItemsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {

        $this->Authorization->Authorize($this->Items->newEmptyEntity());
        $key = $this->request->getQuery('key');
        if ($key) {
            $query = $this->Items->find('all')->where(['name like' => '%' . $key . '%']);
        } else {
            $query = $this->Items;
        }

        $items = $this->paginate($query);

        $this->set(compact('items'));
    }

    /**
     * View method
     *
     * @param string|null $id Item id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $item = $this->Items->get($id, [
            'contain' => ['Collections', 'Images', 'Transactions'],
        ]);
        $this->Authorization->Authorize($item);
        $this->set(compact('item'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $item = $this->Items->newEmptyEntity();
        $this->Authorization->Authorize($item);
        if ($this->request->is('post')) {
            $item = $this->Items->patchEntity($item, $this->request->getData());

            if ($this->Items->save($item)) {
                $this->Flash->success(__('The item has been saved.'));

                return $this->redirect([
                    'controller' => 'Images',
                    'action' => 'add',
                    '?' => array('item_id' => $item->id)
                ]);
            }
            $this->Flash->error(__('The item could not be saved. Please, try again.'));
        }
        $collections = $this->Items->Collections->find('list', ['limit' => 200])->all();
        $images = $this->Items->Images->find('list', ['limit' => 200])->all();
        $this->set(compact('item', 'collections', 'images'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Item id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $item = $this->Items->get($id, [
            'contain' => ['Collections', 'Images'],
        ]);
        $this->Authorization->Authorize($item);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $item = $this->Items->patchEntity($item, $this->request->getData());
            if ($this->Items->save($item)) {
                $this->Flash->success(__('The item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The item could not be saved. Please, try again.'));
        }
        $collections = $this->Items->Collections->find('list', ['limit' => 200])->all();
        $images = $this->Items->Images->find('list', ['limit' => 200])->all();
        $this->set(compact('item', 'collections', 'images'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Item id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $item = $this->Items->get($id);
        $this->Authorization->Authorize($item);

        if ($this->Items->delete($item)) {
            $this->Flash->success(__('The item has been deleted.'));
        } else {
            $this->Flash->error(__('The item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * @return void
     */
    public function gallery()
    {
        $items = $this->getTableLocator()->get('Items');
        $item = $items->find();
        $key = $this->request->getQuery('key');
        $order = $this->request->getQuery('sort_by');
        if ($key) {
            $item = $this->Items->find('all')->where(['name like' => '%' . $key . '%']);
        }

        if ($order) {
            $item->order([$order => 'ASC', true]);
        }

        $this->set(compact('item'));
        //$collections = $this->Items->Collections->find('list', ['limit' => 200])->all();
        //$images = $this->Items->Images->find('list', ['limit' => 200])->all();
    }
}
