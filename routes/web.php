<?php
use App\User;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
Route::get('/', 'HomeController@index')->name('home');

Route::get('/setup-card', function(Request $request){
    $user = User::find(auth()->user()->id);

    return view('update-payment-method', [
        'intent' => $user->createSetupIntent()
    ]);
});

Route::post('/card-save', function (Request $request) {
    $user = User::find(auth()->user()->id);

    $user->updateDefaultPaymentMethod($request->get('card'));
});

Route::get('/{sku}/product-buy', function(Request $request, $sku) {
    \Stripe\Stripe::setApiKey('sk_test_');
    $sku = \Stripe\SKU::retrieve($sku);
    $usr = User::find(auth()->user()->id);
    $usr->invoiceFor($sku->attributes->name, $sku->price, [
    ], [
        'tax_percent' => 16,
    ]);

     return redirect()->to('/');
})->name('product-buy');

Route::get('/{plan}/plan-buy', function (Request $request, $plan) {
    \Stripe\Stripe::setApiKey('sk_test_');
    $plan = \Stripe\Plan::retrieve($plan);
    $usr = User::find(auth()->user()->id);
    $usr->newSubscription($plan->product, $plan->id)->create($usr->defaultPaymentMethod()->asStripePaymentMethod()->id);
    return redirect()->to('/');
})->name('plan-buy');