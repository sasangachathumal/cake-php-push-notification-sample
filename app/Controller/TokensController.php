<?php

/**
 * Created by PhpStorm.
 * User: sasangachathumal
 * Date: 3/14/18
 * Time: 11:24 AM
 */

App::uses('AppController', 'Controller');

class TokensController extends AppController
{

    public function registerDeviceToken() {


//        $this->Token->create();

        $data = $this->token->create();

//        $data = $this->Token->save($this->request->data);
//        $data = $this->request->input('json_decode');

        $this->layout = null;
//        $data = $this->request->input('json_decode');

        $this->set(compact('loggedIn', 'data'));
        $this->set('_serialize', ['loggedIn', 'data']);

    }

}