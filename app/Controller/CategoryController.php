<?php

/**
 * Created by PhpStorm.
 * User: sasangachathumal
 * Date: 3/14/18
 * Time: 12:25 PM
 */

App::uses('AppController', 'Controller');

class CategoryController extends AppController {

    var $name = 'Categories';

    function index() {
        $this->layout = null;
//        try {
//
//        } catch($e) {
//
//        }

        $this->set('categories', $this->Category->find('all'));

        $data = $this->request->input('json_decode');

        $this->set(compact('loggedIn', 'data'));
        $this->set('_serialize', ['loggedIn', 'data']);
//        $this->set('categories', $this->Category->find('all'));
    }

}