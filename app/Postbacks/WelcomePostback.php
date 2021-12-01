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
        
        if (!$customer){
            // Make button template
            $template = new ButtonTemplate($senderId, 'Sign in to get more features');
            $template->add(new UrlButton('Menu', 'https://damp-dawn-45655.herokuapp.com/'));
            $template->add(new UrlButton('Sign In', route('customers.register') .'?psid='.$senderId));
        }else{
            // Make button template
            $template = new ButtonTemplate($senderId, 'Please take a look on our website. ');
            $template->add(new UrlButton('Website', 'https://damp-dawn-45655.herokuapp.com/'));
            $template->add(new UrlButton('Purchase History', route('customers.purchase')));
            // $template->addPostBackButton('Product 2', 'BUY_PRODUCT_2');
        }
        return $template;
    }
}
