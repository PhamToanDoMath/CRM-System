<?php
$order_Items = OrderItem::where('order_id',$order->id)->get();