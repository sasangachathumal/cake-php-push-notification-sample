<?php

/**
 * Created by PhpStorm.
 * User: sasangachathumal
 * Date: 3/14/18
 * Time: 11:08 AM
 */

App::uses('Model', 'Model');

class Token extends Model {

    public $name = 'token';
    public $useTable = 'token';
    public $primaryKey = 'id';
    public $displayField = 'Token';

}