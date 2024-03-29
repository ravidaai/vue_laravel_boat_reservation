<?php

namespace App\Http\Controllers;

use App\Http\Requests\InquiryRequest;
use App\Http\Requests\StripeRequest;
use App\Http\Requests\RequestRequest;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\URL;
use App\Mail\RegistrationEmail;
use Illuminate\Support\Facades\Mail;
use Stripe;
use Session;


class FrontendController extends Controller
{

    public function register(RequestRequest $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $charge = Stripe\Charge::create ([
                "amount" => env('BOAT_FEE')*100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => env('PAID_FOR'),
                "metadata" => array("name" => $request->name, 'email' => $request->email, 'state' => $request->state, 'phone' => $request->phone, 'zip_code' => $request->zip_code)
        ]);


        $data = ['name' => $request->name, 'email' => $request->email, 'state' => $request->state, 'phone' => $request->phone, 'stripe_receipt_url' => $charge->receipt_url];
        Mail::to(env('MAIL_TO_ADDRESS'))->send(new RegistrationEmail($data));

        return response()->json([
            'success' => 'true'
        ]);
    }

    public function payment(InquiryRequest $request)
    {
        return redirect(Url::signedRoute('make.payment_process', ['name' => $request->input('name'), 'email' => $request->input('email'), 'state' => $request->input('state'), 'phone' => $request->input('phone')]));
    }

    public function paymentProcess(Request $request)
    {
        return view('stripe', ['name' => $request->input('name'), 'email' => $request->input('email'), 'state' => $request->input('state'), 'phone' => $request->input('phone')]);        
    }

    public function paymentSuccess(StripeRequest $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $charge = Stripe\Charge::create ([
                "amount" => env('BOAT_FEE')*100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => env('PAID_FOR'),
                "metadata" => array("name" => $request->name, 'email' => $request->email, 'state' => $request->state, 'phone' => $request->phone)
        ]);


        $data = ['name' => $request->name, 'email' => $request->email, 'state' => $request->state, 'phone' => $request->phone, 'stripe_receipt_url' => $charge->receipt_url];
        Mail::to(env('MAIL_TO_ADDRESS'))->send(new RegistrationEmail($data));
    
        Session::flash('success', 'Payment has been successfully processed. We will be reaching out soon for details.');
        return back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $state_list = array(
            'AL' => "Alabama",
            'AK' => "Alaska",
            'AZ' => "Arizona",
            'AR' => "Arkansas",
            'CA' => "California",
            'CO' => "Colorado",
            'CT' => "Connecticut",
            'DE' => "Delaware",
            'DC' => "District Of Columbia",
            'FL' => "Florida",
            'GA' => "Georgia",
            'HI' => "Hawaii",
            'ID' => "Idaho",
            'IL' => "Illinois",
            'IN' => "Indiana",
            'IA' => "Iowa",
            'KS' => "Kansas",
            'KY' => "Kentucky",
            'LA' => "Louisiana",
            'ME' => "Maine",
            'MD' => "Maryland",
            'MA' => "Massachusetts",
            'MI' => "Michigan",
            'MN' => "Minnesota",
            'MS' => "Mississippi",
            'MO' => "Missouri",
            'MT' => "Montana",
            'NE' => "Nebraska",
            'NV' => "Nevada",
            'NH' => "New Hampshire",
            'NJ' => "New Jersey",
            'NM' => "New Mexico",
            'NY' => "New York",
            'NC' => "North Carolina",
            'ND' => "North Dakota",
            'OH' => "Ohio",
            'OK' => "Oklahoma",
            'OR' => "Oregon",
            'PA' => "Pennsylvania",
            'RI' => "Rhode Island",
            'SC' => "South Carolina",
            'SD' => "South Dakota",
            'TN' => "Tennessee",
            'TX' => "Texas",
            'UT' => "Utah",
            'VT' => "Vermont",
            'VA' => "Virginia",
            'WA' => "Washington",
            'WV' => "West Virginia",
            'WI' => "Wisconsin",
            'WY' => "Wyoming"
        );
        return view('home', ['stateArr' => $state_list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
