
@extends('layouts.app')

@section('title', 'Boat Registration USA')

@section('header')
<style>
   .hide{
      display:none!important;
    }
</style>   
@endsection

@section('content')


<div class="page-content">
 
    <div class="form-v4-content">
      

        <div class="form-left">
            <h2>Your detail</h2>
            <p class="text-1"><strong>Name: </strong> {{$name}}</p>
            <p class="text-1"><strong>Email: </strong> {{$email}}</p>
            <p class="text-1"><strong>Phone: </strong> {{$phone}}</p>
            <p class="text-1"><strong>State: </strong> {{$state}}</p>

        </div>

        <form role="form" action="{{ route('make.payment_success') }}" method="post" class="form-detail validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">

          @csrf
          @method('POST')
    {{ Form::hidden('name', $name) }}
{{ Form::hidden('email', $email) }}
{{ Form::hidden('phone', $phone) }}
{{ Form::hidden('state', $state) }}

@if (Session::has('success'))
                        <div class="success-message">
                           
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif


            <h2>Payment for registration</h2>
            <p class="registration">Boat Registration is only $100 plus Government fees</p>

            <div class="form-row">
                <label>Your name card</label>
                <input type="text" class="input-text" value="{{$name}}" required>
            </div>

            <div class="form-row">
                <label>Card Number</label> 
                <input autocomplete='off' class='input-text card-num' size='20' type='text'>
            </div>

            <div class="form-row">
                <label>CVC</label>
                <input autocomplete='off' class='input-text card-cvc' placeholder='e.g 415' size='4' type='text'>
            </div>

            <div class="form-group">
              <div class="form-row form-row-1">
                  <label>Expiration Month</label>
                  <input class='input-text card-expiry-month' placeholder='MM' size='2' type='text'>
              </div>
              <div class="form-row form-row-1">
                  <label>Expiration Year</label>
                  <input class='input-text card-expiry-year' placeholder='YYYY' size='4' type='text'>
              </div>
          </div>
          <div class='form-row row'>
            <div class='col-md-12 hide error form-group'>

                <label class="error">Fix the errors before you begin.</label>
            </div>
        </div>
            <div class="form-row-last">
              <input type="submit" name="register" class="register" value="HAPPY TO PAY">
             
            </div>
        </form>
    </div>
</div>

@endsection


@section('footer_script')
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
  
<script type="text/javascript">
$(function() {
    var $form         = $(".validation");
  $('form.validation').bind('submit', function(e) {
    var $form         = $(".validation"),
        inputVal = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputVal),
        $errorStatus = $form.find('div.error'),
        valid         = true;
        $errorStatus.addClass('hide');
 
        $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
      var $input = $(el);
      if ($input.val() === '') {
        $input.parent().addClass('has-error');
        $errorStatus.removeClass('hide');
        e.preventDefault();
      }
    });
  
    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
      Stripe.createToken({
        number: $('.card-num').val(),
        cvc: $('.card-cvc').val(),
        exp_month: $('.card-expiry-month').val(),
        exp_year: $('.card-expiry-year').val()
      }, stripeHandleResponse);
    }
  
  });
  
  function stripeHandleResponse(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            var token = response['id'];
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
  
});
</script>
@endsection