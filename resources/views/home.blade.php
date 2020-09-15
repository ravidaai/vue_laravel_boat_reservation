
@extends('layouts.app')

@section('title', 'Boat Registration USA')

@section('content')



<div class="page-content">
    <div class="form-v4-content">
        <div class="form-left">
            <h2 class="text-center">Fast & Easy Registration </h2>
            <hr>
            <h3 class="text-center">FAQ’s</h3>
            <p class="faq-q">How long does it take to register a boat in Texas?</p>
            <p class="faq-a">We submit your paperwork within 24 hours and typically receive your registration in 7-14 days.</p>

            <p class="faq-q">What Government fees associated with registering a boat?</p>
            <p class="faq-a">Government fees range from around $20-$60 depending on the vessel and are included in the cost of signup.</p>
<p>&nbsp;</p><p>&nbsp;</p>
            <img src="{{asset('img/review-1.png')}}" width="100%">
           
        </div>


<form class="form-detail" method="POST" action="{{ route('make.payment') }}" id="myform">
    {{ csrf_field() }}
    @method('POST')
            <h3 class="text-center">Register Your Boat in Texas Today.</h3>
            <p>Boat Registration is only $100. Government Fees are included.</p>
           
            <div class="form-row">
                <label for="name">Name</label>
                <input type="text" class="input-text" name="name" id="name" value="{{ old('name') }}" required>
                @error('name')<div class="alert alert-danger">{{ $message }}</div>@enderror
            </div>


            <div class="form-row">
                <label for="email">Email</label> 
                <input type="email" class="input-text" name="email" id="email" value="{{ old('email') }}" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
                @error('email')<div class="alert alert-danger">{{ $message }}</div>@enderror
            </div>

            <div class="form-row">
                <label for="phone">Phone</label> 
                <input type="tel" class="input-text" name="phone" id="phone" value="{{ old('phone') }}">
                @error('phone')<div class="alert alert-danger">{{ $message }}</div>@enderror
            </div>

            <div class="form-row">
                <label for="state">State</label>
                {!! Form::select('state',$stateArr,null,['class'=>'input-text']) !!}
              @error('state')<div class="alert alert-danger">{{ $message }}</div>@enderror
            </div>
            <div class="form-row-last">
                <input type="submit" name="register" class="register" value="GET REGISTERED">
            </div>
        </form>
    </div>
</div>

@endsection

@section('footer_script')

@endsection