<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Mailer\TransportFactory;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Utility\Security;
use Cake\Mailer\Mailer;

define('PRIVATE_CODE', 'shining_glass');
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->Authorization->Authorize($this->Users->newEmptyEntity());
        $key = $this->request->getQuery('key');
        if ($key) {
            $query = $this->Users->find('all')->where(['OR' => [['first_name like' => '%' . $key . '%'],
                ['last_name like' => '%' . $key . '%'], ['email like' => '%' . $key . '%']],]);
        } else {
            $query = $this->Users;
        }
        $users = $this->paginate($query);

        $this->set(compact('users'));

    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id);

        $this->set(compact('user'));

        $this->Authorization->Authorize($user);

    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $hashing = new DefaultPasswordHasher();
        $password = $this->request->getData('password');

        $user = $this->Users->newEmptyEntity();
        $this->Authorization->skipAuthorization();

        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $hashed_password = $hashing->hash($password);
            $user->password = $hashed_password;
            if ($this->Users->save($user)) {

                $this->Flash->success(__('Account created, please log in.'));

                return $this->redirect([
                    'controller' => 'Users',
                    'action' => 'login',
                    '?' => array('result' => 'success')
                ]);

            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));

            return $this->redirect([
                'controller' => 'Users',
                'action' => 'login',
                '?' => array('result' => 'failure')
            ]);
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        $this->Authorization->Authorize($user);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));

    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        $this->Authorization->Authorize($user);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }



        return $this->redirect(['action' => 'index']);
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->Authentication->addUnauthenticatedActions(['login']);
    }

    public function login()
    {
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            // redirect to /articles after login success
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Pages',
                'action' => 'homepage',
            ]);

            return $this->redirect($redirect);
        }
        // display error if user submitted and authentication failed
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid username or password'));
        }
    }

    public function logout()
    {
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Pages', 'action' => 'homepage']);
        }
    }

    public function signup()
    {
        $this->Authorization->skipAuthorization();

    }

    public function forgot()
    {
        $this->Authorization->skipAuthorization();

        $hashing = new DefaultPasswordHasher();

        if ($this->request->is('post')) {
            $users = $this->getTableLocator()->get('Users');
            $user = $this->Users->find('all',  array(
                'conditions' => array('email' => $this->request->getData('email'))
            ))->first();
            if (!$user){
                $this->Flash->error(__('This email is not registered.'));
            } else {

                $private = 'shining_glass';
                //$correctCode = $hashing->hash($user->password . PRIVATE_CODE);
                $correctCode = md5($user->password . PRIVATE_CODE);
                if ($this->request->getData('code') == $correctCode){
                    $password = $this->request->getData('password');
                    $hashed_password = $hashing->hash($password);
                    $user->password = $hashed_password;
                    if ($this->Users->save($user)) {

                        $this->Flash->success(__('Password updated, please log in.'));

                        return $this->redirect([
                            'controller' => 'Users',
                            'action' => 'login',
                            '?' => array('result' => 'reset')
                        ]);
                    }
                    $this->Flash->error(__('The password could not be updated. Please, try again.'));
                } else {
                    $this->Flash->error(__('This link has expired. Please request a new password reset email.'));
                }
            }
        }
    }

    public function requestpassword()
    {
        $this->Authorization->skipAuthorization();

        if ($this->request->is('post')) {

            $recipient = $this->getTableLocator()->get('Users')
                ->find()
                ->where(['email =' => $this->request->getData('email')])
                ->first();
            if (!$recipient){
                $this->Flash->error(__('This email is not registered.'));
            } else {
                $code = md5($recipient->password . PRIVATE_CODE);

                $mailer = new Mailer('default');
                $mailer
                    ->setEmailFormat('html')
                    ->setFrom(['shining_glass@u22s1010.monash-ie.me' => 'Shining Glass'])
                    ->setTo($recipient->email)
                    ->setSubject('Shining Glass password reset request')
                    ->viewBuilder()
                    ->setTemplate('resetpassword');

                $mailer->setViewVars([
                    'email' => $this->request->getData('email'),
                    'name' => $recipient->first_name,
                    'code' => $code,
                ]);

                // Deliver mail
                if ($mailer->deliver()) {
                    $this->Flash->success(__('Password reset email sent.'));
                } else {
                    $this->Flash->error(__('Failed to send password reset email.'));
                }
            }

            return $this->redirect(['action' => 'requestpassword']);
        }

    }
}
