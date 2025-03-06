<?php

//namespace phpincthirteen\class;
class Business{

    //properties, with member visibility
    public $item;
    public $price;

    //constructor
    public function __construct($item, $price) {
        $this->item = $item;
        $this->price = $price;
    }

    //method
    public function item() {
          $cats = [
        [
            'item' => 'Brownie'
        ],
        [
            'price' => '19.99'
        ]
    ];

    echo json_encode($cats);
    }

}