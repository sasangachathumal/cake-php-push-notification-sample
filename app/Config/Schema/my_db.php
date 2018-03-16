<?php

/**
 * Created by PhpStorm.
 * User: sasangachathumal
 * Date: 3/14/18
 * Time: 10:50 AM
 */
class my_db extends CakeSchema {

    public $pushTokens = array(
        'token' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 10000, 'key' => 'primary'),
        'indexes' => array('PRIMARY' => array('column' => 'token', 'unique' => 1)),
        'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'MyISAM')
    );

}