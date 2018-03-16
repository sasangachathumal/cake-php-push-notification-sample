<?php

/**
 * Created by PhpStorm.
 * User: sasangachathumal
 * Date: 3/14/18
 * Time: 1:20 PM
 */

class PushesController extends AppController
{
    public function index() {
        if ($this->request->is('post')) {
            $this->layout = null;
            $this->autoRender = false;
            return $this->Push->registerDeviceToken($this->request->input('json_decode'));
        }
    }

    public function getAll() {
        if ($this->request->is('get')) {
            $this->layout = null;
            $this->autoRender = false;
            return json_encode($this->Push->getProducts());
        }
    }

    public function sendPushNotification() {
        if ($this->request->is('get')) {
            $this->layout = null;
            $this->autoRender = false;
            return json_encode($this->Push->notificationSender());
        }
    }

}