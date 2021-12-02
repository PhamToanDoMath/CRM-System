<?php

namespace App\Handlers;

use App\Models\Voucher;
use App\Postbacks\WelcomePostback;
use Casperlaitw\LaravelFbMessenger\Messages\Text;
use Casperlaitw\LaravelFbMessenger\Messages\UrlButton;
use Casperlaitw\LaravelFbMessenger\Contracts\BaseHandler;
use Casperlaitw\LaravelFbMessenger\Messages\ButtonTemplate;
use Casperlaitw\LaravelFbMessenger\Messages\ReceiveMessage;

class ShowProductMenuHandler extends BaseHandler
{

    /**
     * Handle the chatbot message
     *
     * @param ReceiveMessage $message
     *
     * @return mixed
     * @throws \Casperlaitw\LaravelFbMessenger\Exceptions\NotCreateBotException
     */
    public function handle(ReceiveMessage $message)
    {
        $senderId = $message->getSender();
        $messageLower = strtolower($message->getMessage());

        if ($messageLower === 'get started') {
            $this->send(new Text($senderId, 'Welcome to Lau Chay Restaurant!'));

            $postback = new WelcomePostback();
            $this->send($postback->createMainMenu($senderId));
        }
        elseif (str_contains($messageLower, 'recommend') ||
            str_contains($messageLower, 'assist')
        ) {
            $this->send(new Text($senderId, 'Welcome to Lau Chay Restaurant!'));
            $postback = new WelcomePostback();
            $this->send($postback->createMainMenu($senderId));
        }
        elseif(str_contains($messageLower, 'thank')){
            $this->send(new Text($senderId, "Thank you for using our service!"));
        }
        else{
            $senderId = $message->getSender();
            $voucher_code = Voucher::find(1)->voucher_id;
            $this->send(new Text($senderId, "Sorry I don't understand what you're saying!"));

            $template = new ButtonTemplate($senderId, "Anyway here is a voucher for your effort: {$voucher_code}\nPlease visit our website and apply the discount.");
            $template->add(new UrlButton('Website', 'https://damp-dawn-45655.herokuapp.com/'));
            // $postback = new WelcomePostback();
            $this->send($template);
        }
    }
}
