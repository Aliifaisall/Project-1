<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\Locator\LocatorAwareTrait;
use Cake\Core\Configure;
use Cake\Mailer\Mailer;

/**
 * Transactions Controller
 *
 * @property \App\Model\Table\TransactionsTable $Transactions
 * @method \App\Model\Entity\Transaction[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 *
 */
class TransactionsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->Authorization->Authorize($this->Transactions->newEmptyEntity());
        $this->paginate = [
            'contain' => ['Users', 'Items'],
            'order' => array(
                'Item.id' => 'desc'
            )
        ];
        $transactions = $this->paginate($this->Transactions);

        $this->set(compact('transactions'));
    }

    /**
     * View method
     *
     * @param string|null $id Transaction id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $transaction = $this->Transactions->get($id, [
            'contain' => ['Users', 'Items'],
        ]);

        $this->Authorization->Authorize($transaction);
        $this->set(compact('transaction'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $transaction = $this->Transactions->newEmptyEntity();
        $this->Authorization->Authorize($transaction);
        if ($this->request->is('post')) {
            $transaction = $this->Transactions->patchEntity($transaction, $this->request->getData());
            if ($this->Transactions->save($transaction)) {
                $this->Flash->success(__('The transaction has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transaction could not be saved. Please, try again.'));
        }
        $users = $this->Transactions->Users->find('list', ['limit' => 200])->all();
        $items = $this->Transactions->Items->find('list', ['limit' => 200])->all();
        $this->set(compact('transaction', 'users', 'items'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Transaction id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $transaction = $this->Transactions->get($id, [
            'contain' => [],
        ]);
        $this->Authorization->Authorize($transaction);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $transaction = $this->Transactions->patchEntity($transaction, $this->request->getData());
            if ($this->Transactions->save($transaction)) {
                $this->Flash->success(__('The transaction has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transaction could not be saved. Please, try again.'));
        }
        $users = $this->Transactions->Users->find('list', ['limit' => 200])->all();
        $items = $this->Transactions->Items->find('list', ['limit' => 200])->all();
        $this->set(compact('transaction', 'users', 'items'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Transaction id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $transaction = $this->Transactions->get($id);
        $this->Authorization->Authorize($transaction);
        if ($this->Transactions->delete($transaction)) {
            $this->Flash->success(__('The transaction has been deleted.'));
        } else {
            $this->Flash->error(__('The transaction could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function invoice()
    {
        $transaction = $this->Transactions->newEmptyEntity();
        $this->Authorization->Authorize($transaction);
        if ($this->request->is('post')) {

            $user = $this->request->getAttribute('identity');
            $user_id = $user->id;

            $item_id = $this->request->getData('item_id');
            $price = $this->request->getData('price');

            $data = [
                'user_id' => $user_id,
                'item_id' => $item_id,
                'paid_amount' => $price,
            ];

            $transaction = $this->Transactions->patchEntity($transaction, $data);

            if ($this->Transactions->save($transaction)) {
                return $this->redirect([
                    'controller' => 'Items',
                    'action' => 'gallery',
                    '?' => array('result' => 'success')
                ]);
            }
            return $this->redirect([
                'controller' => 'Items',
                'action' => 'gallery',
                '?' => array('result' => 'failure')
            ]);
        }
        $users = $this->Transactions->Users->find('list', ['limit' => 200])->all();
        $items = $this->Transactions->Items->find('list', ['limit' => 200])->all();
        $this->set(compact('transaction', 'users', 'items'));
    }

    public function sendInvoice($id = null){
        $transaction = $this->Transactions->get($id);
        $this->Authorization->Authorize($transaction);

        $recipient = $this->getTableLocator()->get('Users')
            ->find()
            ->where(['id =' => $transaction->user_id])
            ->first();

        $item = $this->getTableLocator()->get('Items')
            ->find()
            ->where(['id =' => $transaction->item_id])
            ->first();

        $mailer = new Mailer('default');
        $mailer
            ->setEmailFormat('html')
            ->setFrom(['shining_glass@u22s1010.monash-ie.me' => 'Shining Glass'])
            ->setTo($recipient->email)
            ->setSubject('Invoice for Shining Glass Order')
            ->viewBuilder()
            ->setTemplate('invoice');

        $mailer ->setViewVars([
            'transaction_id' => $transaction->id,
            'first_name' => $recipient->first_name,
            'last_name' => $recipient->last_name,
            'user_email' => $recipient->email,
            'item_id' => $item->id,
            'item_name' => $item->name,
            'paid_amount' => $transaction->paid_amount,
            'date_created' => $transaction->date_created,
        ]);

        if ($mailer->deliver()){
            $transactionsTable = $this->getTableLocator()->get('Transactions');
            $transaction->status = 'Invoice Sent';
            $transactionsTable->save($transaction);
            $this->Flash->success(__('Invoice sent.'));
        } else {
            $this->Flash->error(__('Invoice failed to send.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function markComplete($id = null){
        $transaction = $this->Transactions->get($id);
        $this->Authorization->Authorize($transaction);
        $transactionsTable = $this->getTableLocator()->get('Transactions');
        $transaction->status = 'Complete';

        $itemsTable = $this->getTableLocator()->get('Items');
        $item = $itemsTable
            ->find()
            ->where(['id =' => $transaction->item_id])
            ->first();

        $item->for_sale = 0;

        if ($transactionsTable->save($transaction) AND $itemsTable->save($item)){
            $this->Flash->success(__('Order marked as complete.'));
        } else {
            $this->Flash->error(__('Failed to mark as complete.'));
        }

        return $this->redirect(['action' => 'index']);

    }
}
