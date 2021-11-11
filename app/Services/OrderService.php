<?php

namespace App\Services;

use App\Models\{Menu,Order};

class OrderService {

    public function isValid($order){
        if (empty($order)) return false;
        
        $total = 0;
        foreach($order['order_items'] as $order_item){
            $total += Menu::find($order_item['menu_id'])->price * (int)$order_item['quantity'];
        }

        return $total === (int)$order['total'] ? true: false;
    }

}