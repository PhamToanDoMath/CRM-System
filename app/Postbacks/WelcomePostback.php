<?php

namespace App\Postbacks;

use App\Models\Customer;
use App\Models\MessengerCustomer;
use Illuminate\Support\Facades\Log;
use Casperlaitw\LaravelFbMessenger\Messages\Text;
use Casperlaitw\LaravelFbMessenger\Messages\User;
use Casperlaitw\LaravelFbMessenger\Messages\UrlButton;
use Casperlaitw\LaravelFbMessenger\Messages\ButtonTemplate;
use Casperlaitw\LaravelFbMessenger\Messages\ReceiveMessage;
use Casperlaitw\LaravelFbMessenger\Contracts\PostbackHandler;

class WelcomePostback extends PostbackHandler
{
    /**
     * Define payload (support regex)
     *
     * @var string
     */
    protected $payload = '^WELCOME_MESSAGE$';

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

        // Get User Profile
        $user = $this->send(new User($senderId));
        $this->send(new Text($senderId, "Hi, {$user['first_name']}"));

        // Show template
        $this->send($this->createMainMenu($senderId));
    }

    /**
     * @param $senderId
     * @return ButtonTemplate
     */
    public function createMainMenu($senderId)
    {
        //Check if customer exists in registered table
        $customer = Customer::where('psid',$senderId)->first();

        // Make button template
        $template = new ButtonTemplate($senderId, 'Sign in to get more features');
        
        if (!$customer){
            $template->add(new UrlButton('Sign In', 'https://google.com?psid='.$senderId));
        }
        $template->add(new UrlButton('Purchase History', 'https://google.com'));
        // $template->addPostBackButton('Product 2', 'BUY_PRODUCT_2');

        return $template;
    }
}
