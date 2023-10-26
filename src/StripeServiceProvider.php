<?php
namespace cita\stripe;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
use App\Contracts\PaymentInterface;
use App\Plugins\Cita;

class StripeServiceProvider extends ServiceProvider{
    private $base = "cita\stripe\Stripe";

    public function register()
    {
        $this->app->bind(PaymentInterface::class, $this->base);
    }

    public function boot()
    {
        $cita =  App::make(Cita::class);
        $cita::register("cita/stripe", 1, $this->base);
    }
}
?>