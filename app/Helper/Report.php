<?php

namespace App\Helper;

use App\Address;

class Report {
    private $date;
    private $user_id;

    public function __construct($date, $user_id) {
        $this->date = $date;
        $this->user_id = $user_id;
    }

    public function scatter() {
        $addresses = Address::whereDate('created_at', $this->date)->whereUserId($this->user_id)->get();

        $positions = [];
        foreach ($addresses as $key => $address) {
            $positions[] = [intval($address->street), intval($address->career)];
        }
        
        $options = [
            'series' => [
                [
                    'name' => 'Direcciones',
                    'data' => $positions
                ]
            ],
            'chart' => [
                'height' => 350,
                'type' => 'scatter',
                'zoom' => [
                    'enabled' => true,
                    'type' => 'xy'
                ]
            ],
            'xaxis' => [
                'tickAmount' => 10,
            ],
            'yaxis' => [
                'tickAmount' =>  7
            ],
            'grid' => [
                'strokeDashArray' => 4,
                'xaxis' => [
                    'lines' => [
                        'show' => true
                    ]
                ],
            ]            
        ]; 

        return compact('options');
    }
}