<?php
namespace App\Handlers;
use Casperlaitw\LaravelFbMessenger\Messages\{User,ReceiveMessage,Text};
use Casperlaitw\LaravelFbMessenger\Contracts\BaseHandler;

class SenderHandler extends BaseHandler{

    public function __construct(){
        $this->createBot(config('fb-messenger.app_token'));
    }

    public function handle(ReceiveMessage $message){
        //
    }

    public function sendMessage($userId, $text){
        $this->send(new Text($userId, $text));
    }

    public function sendMultipleMessages($userIds, $text){
        foreach($userIds as $userId){
            $this->send(new Text($userId, $text));
        }
    }
}