<?php


namespace App\Services;

use App\Models\Order;
use App\Models\Voucher;
use App\Models\{Customer};
use App\Handlers\SenderHandler;

class MessengerService{

    public function sendFirstTimeRegisterVoucher($psid){
        $voucher = Voucher::find(1); // default voucher for newly registered customer
        $text = "Thank you for using your service. Here is new membership voucher for you {$voucher->voucher_id}";
        (new SenderHandler())->sendMessage($psid, $text);
    }

    public function notifyVoucher(Voucher $voucher){
        $text = "Hey customer. We have new voucher just for you {$voucher->voucher_id}.\n
        Remember to use it before {$voucher->end_at->format('d/m/Y')}";
        
        $senderIds = Customer::whereNotNull('psid')->pluck('psid')->toArray();
        (new SenderHandler())->sendMultipleMessages($senderIds,$text);
    }

    public function notifyConfirmedOrder(Order $order, $senderId){
        $formatString = sprintf('%08d', $order->id);
        $text = "Your order #{$formatString} has been confirmed";
        (new SenderHandler())->sendMessage($senderId,$text);
    }

    public function notifyCompletedOrder(Order $order, $senderId){
        $formatString = sprintf('%08d', $order->id);
        $text1 = "Order #{$formatString} is completed. Please proceed to the bar to take your order";
        $text2 = "Thanks for your purchasing. Please come back at any time.";
        $senderHandler = new SenderHandler();
        $senderHandler->sendMessage($senderId,$text1);
        $senderHandler->sendMessage($senderId,$text2);
    }
}