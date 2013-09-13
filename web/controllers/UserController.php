<?php

namespace web\controllers;

use \common\models\User;

class UserController extends \web\ext\Controller {

    /**
     * Instance of logged user
     * @var type 
     */
    private $_user;

    /**
     * Init
     */
    public function init() {
        parent::init();

        // Set default action
        $this->defaultAction = 'me';

        // Set active main menu item
        // $this->setNavActiveItem('main', 'profile');
    }

    /**
     * Before action
     *
     * @param \CAction $action
     * @return bool
     */
    protected function beforeAction($action) {
        if (!parent::beforeAction($action))
            return false;

        // Take away not loggedin users
        if (\yii::app()->user->isGuest) {
            return $this->redirect('/');
        }

        // Get instance of logged in user
        $this->_user = \yii::app()->user->getInstance();

        return true;
    }

    public function actionMe() {
        $role = $this->_user->role;
        $this->render('me', array(
            'userInfo' => $this->_user
                )
        );
    }

    public function missingAction($action_id) {
        /**
         * Support dash separated action ids: convert whatever-action-id to actionWhateverActionId method name, check if it exists and if it does - run it.
         */
        $action_id = explode('-', $action_id);
        $action_id = array_map('strtolower', $action_id);
        $action_id = array_map('ucfirst', $action_id);
        $action_id = implode('', $action_id);
        if (method_exists($this, 'action' . $action_id) || array_key_exists('action' . $action_id, $this->actions())) {
            $this->setAction($action_id);
            $this->run($action_id);
        } else {
            throw new CHttpException(404);
        }
    }

    public function actionEdit() {
        $errors = array();
        $this->render('edit', array(
            'userInfo' => $this->_user,
            'errors'   => $errors,
                )
        );
    }

    public function actionEditInfo() {
        $role = $this->_user->role;
        if ($role == User::ROLE_STUDENT) {
            $this->render('editStudent');
        } elseif ($role == User::ROLE_TEACHER) {
            $this->render('editTeacher');
        } else {
            return $this->redirect('/');
        }
    }

}

