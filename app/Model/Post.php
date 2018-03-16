<?php

/**
 * Created by PhpStorm.
 * User: sasangachathumal
 * Date: 3/14/18
 * Time: 12:47 PM
 */
class Post extends AppModel
{
    public $validate = array(
        'title' => array(
            'rule' => 'notBlank'
        ),
        'body' => array(
            'rule' => 'notBlank'
        )
    );
}