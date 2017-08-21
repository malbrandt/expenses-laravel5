<?php
//
//namespace Tests\Unit;
//
//use App\Http\Requests\Store\StorePayment;
//use Tests\Helpers\DatabaseMigrationsWithSeeding;
//use Tests\TestCase;
//use Illuminate\Foundation\Testing\DatabaseTransactions;
//
//class PaymentAuthorizationTest extends TestCase
//{
//    use DatabaseMigrationsWithSeeding;
//    use DatabaseTransactions;
//
//    /**
//     * @var \App\User
//     */
//    protected $admin;
//
//    /**
//     * @var \App\User
//     */
//    protected $user;
//
//    public function setUp()
//    {
//        parent::setUp();
//
//        $this->admin = factory(\App\User::class)->create();
//        $this->admin->assignRole('admin');
//
//        $this->user = factory(\App\User::class)->create();
//        $this->user->assignRole('user');
//    }
//
//    /**
//     * A basic test example.
//     *
//     * @return void
//     */
//    public function testStorePaymentPermissions()
//    {
//        $this->actingAs($this->user);
//
//        $request = new StorePayment();
//        $request->setContainer($this->app);
//        $request->route('/payment/');
//        $attributes = [
//            'amount' => 15,
//        ];
//        $request->initialize([], $attributes);
//        $this->app->instance('request', $request);
//        $authorized = $request->authorize();
//
//        $this->assertEquals(true, $authorized);
//    }
//}
