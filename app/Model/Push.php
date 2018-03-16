<?php

/**
 * Created by PhpStorm.
 * User: sasangachathumal
 * Date: 3/14/18
 * Time: 1:18 PM
 */

define( 'API_ACCESS_KEY', 'AAAA8UZcyJQ:APA91bG6BPAx_SxK03_YdJ-zrnj6ox4gClhswOk_o_GQprMJzzQjwXSyaB4e-ODfSRh2gOIEZoESjW8MDlejfX_mGNXfX-lf2HMF5w5fI5dttkjM-qKhPNX7GxXtFNgdhlnp0s3SSrpp');

class Push extends AppModel
{

    function registerDeviceToken($token) {
        $this->create();
        if($this->save($token)){
            $retuens = array(
                'status' => '200',
                'message' => 'Device successfully registered',
                'data' => array(
                    'token' => $token
                )
            );
            return json_encode($retuens);
        } else {
            $retuens = array(
                'status' => '500',
                'message' => 'Device registration fail',
                'error' => $this->validationErrors
            );
            return json_encode($retuens);
        }
    }

    function getProducts() {
        $pushes = array();
        $pushes = $this->find('all');
        return $pushes;
    }

    function notificationSender() {

        $deviceTokenArray = $this->getProducts();

        $notification = array(
            'title' => 'test',
            'body' => 'asdvuygadvyuafhsuvijekamsd',
            'sound' => 'mySound'
        );

        $data = $this->createPushRequestData($deviceTokenArray,$notification);

        return $this->sendPushRequest($data);

    }

    function createPushRequestHeader() {
        $headers = array
        (
            'Authorization: key=' . API_ACCESS_KEY,
            'Content-Type: application/json'
        );
        return $headers;
    }

    function createPushRequestData($deviceArray, $notification) {
        $fields = array
        (
            'registration_ids' 	=> $deviceArray,
            'notification' => $notification
        );
        return json_encode($fields);
    }

    function sendPushRequest($data) {
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $this->createPushRequestHeader() );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, $data );
        $result = curl_exec($ch );
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        curl_close( $ch );
        return $result;
    }

}