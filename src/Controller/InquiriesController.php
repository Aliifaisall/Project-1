<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Mailer\Mailer;

/**
 * Inquiries Controller
 *
 * @property \App\Model\Table\InquiriesTable $Inquiries
 * @method \App\Model\Entity\Inquiry[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InquiriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $inquiries = $this->paginate($this->Inquiries);
        $this->set(compact('inquiries'));

        $this->Authorization->Authorize($this->Inquiries->newEmptyEntity());
    }

    /**
     * View method
     *
     * @param string|null $id Inquiry id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $inquiry = $this->Inquiries->get($id, [
            'contain' => [],
        ]);

        $this->Authorization->Authorize($inquiry);

        $this->set(compact('inquiry'));


    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $inquiry = $this->Inquiries->newEmptyEntity();
        $this->Authorization->skipAuthorization();

        if ($this->request->is('post')) {
            $inquiry = $this->Inquiries->patchEntity($inquiry, $this->request->getData());

            if ($this->Inquiries->save($inquiry)) {
                $this->Flash->success(__('The inquiry has been saved.'));

                return $this->redirect([
                    'controller' => 'Pages',
                    'action' => 'homepage',
                    '#' => 'inquiry',
                    '?' => array('result' => 'success')
                ]);

            }
            $this->Flash->error(__('The inquiry could not be saved. Please, try again.'));
            return $this->redirect([
                'controller' => 'Pages',
                'action' => 'homepage',
                '#' => 'inquiry',
                '?' => array('result' => 'failure')
            ]);
        }
        $this->set(compact('inquiry'));

    }


    /**
     * Edit method
     *
     * @param string|null $id Inquiry id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $inquiry = $this->Inquiries->get($id, [
            'contain' => [],
        ]);
        $this->Authorization->Authorize($inquiry);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $inquiry = $this->Inquiries->patchEntity($inquiry, $this->request->getData());
            if ($this->Inquiries->save($inquiry)) {
                $this->Flash->success(__('The inquiry has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The inquiry could not be saved. Please, try again.'));
        }
        $this->set(compact('inquiry'));


    }

    /**
     * sendEmail method
     *
     * @param string|null $id Inquiry id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function sendEmail($id = null)
    {
        $inquiry = $this->Inquiries->get($id);
        $this->Authorization->Authorize($inquiry);

        $reply_body = $this->request->getData('body');

        $mailer = new Mailer('default');
        $mailer
            ->setEmailFormat('html')
            ->setFrom(['shining_glass@u22s1010.monash-ie.me' => 'Shining Glass'])
            ->setTo($inquiry->email)
            ->setSubject('Shining Glass Inquiry on ' . $inquiry->date_created)
            ->viewBuilder()
            ->setTemplate('inquiry');

        $mailer ->setViewVars([
            'date_created' => $inquiry->date_created,
            'name' => $inquiry->full_name,
            'inquiry_body' => $inquiry->message,
            'reply_body' => $reply_body,
        ]);

        // Deliver mail
        if ($mailer->deliver()){
            $inquiriesTable = $this->getTableLocator()->get('Inquiries');
            $inquiry->reply_sent = true;
            $inquiriesTable->save($inquiry);
            $this->Flash->success(__('Response sent.'));
        } else {
            $this->Flash->error(__('Response failed to send.'));
        }

        return $this->redirect(['action' => 'index']);

    }

    /**
     * Delete method
     *
     * @param string|null $id Inquiry id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {

        $this->request->allowMethod(['post', 'delete']);
        $inquiry = $this->Inquiries->get($id);

        $this->Authorization->Authorize($inquiry);

        if ($this->Inquiries->delete($inquiry)) {
            $this->Flash->success(__('The inquiry has been deleted.'));
        } else {
            $this->Flash->error(__('The inquiry could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function reply($id = null){
        $inquiry = $this->Inquiries->get($id);
        $this->Authorization->Authorize($inquiry);
        $this->set(compact('inquiry'));

    }
}
