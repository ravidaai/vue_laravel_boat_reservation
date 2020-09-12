
@extends('layouts.app')

@section('title', 'Boat Registration USA')

@section('content')
<h1>Register your boat
    in Texas Today!</h1>
<form method="POST" action="{{ route('make.inquiry') }}" action="">
    {{ csrf_field() }}
    @method('POST')
    
    {{-- @method('PUT')
    @csrf --}}

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
        @if ($errors->has('name'))
                <span class="invalid">
                    <strong>{{ $errors->first('name') }}.</strong>
                </span>
        @endif
      </div>

    <div class="form-group">
      <label for="email">Email</label> 
      <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
      @if ($errors->has('email'))
                <span class="invalid">
                    <strong>{{ $errors->first('email') }}.</strong>
                </span>
        @endif

        @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

    </div>
    <div class="form-group">
      <label for="state">State</label>
      <select class="form-control" name="state" id="state">
        <option value="1">1</option>
        <option value="3">2</option>
      </select>
      @if ($errors->has('state'))
                <span class="invalid">
                    <strong>{{ $errors->first('state') }}.</strong>
                </span>
        @endif
    </div>
    <div class="form-group">
    <button type="submit" class="btn btn-primary mb-2">Submit</button>
    </div>

    @if(count($errors))
            <div class="form-group">
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
    
  </form>
@endsection