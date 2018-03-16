<?php

/**
 * Created by PhpStorm.
 * User: sasangachathumal
 * Date: 3/14/18
 * Time: 10:32 AM
 */

App::uses('AppController', 'Controller');

class helloController extends AppController {

    public function sayHello() {

        $response = [
            'result' => false,
            'code' => 'access-denied',
            'message' => 'Invalid credentials or access denied.'
        ];

        $this->set(compact('loggedIn', 'response'));
        $this->set('_serialize', ['loggedIn', 'response']);

    }

}