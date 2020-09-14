
@extends('layouts.app')

@section('title', 'Boat Registration USA')

@section('content')



<div class="page-content">
    <div class="form-v4-content">
        <div class="form-left">
            <img src="{{asset('img/review-1.png')}}" width="100%">
           
        </div>


<form class="form-detail" method="POST" action="{{ route('make.payment') }}" id="myform">
    {{ csrf_field() }}
    @method('POST')
            <h2>Register your boat in Texas Today!</h2>
           
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
                <input type="submit" name="register" class="register" value="Proceed">
            </div>
        </form>
    </div>
</div>

@endsection

@section('footer_script')

@endsection