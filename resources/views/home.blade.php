
@extends('layouts.main')
@push('title')
    <title>Home</title>
@endpush
@section('main')
    <form method="POST" action="{{$url}}">
        @csrf
         {!! method_field($method) !!}
        @if(isset($user))
            <x-input type='text' name='name' label='Name' value="{{$user->name}}"/>
            <x-input type='email' name='email' label='Email' value="{{$user->email}}"/>
        @else
            <x-input type='text' name='name' label='Name' value="{{old('name')}}"/>
            <x-input type='email' name='email' label='Email' value=" {{old('email')}}"/>
            <x-input type='password' name='password' label='Password' value="" />
            <x-input type='password' name='password_confirmation' label='Confirm Password'  value=""/>
        @endif
        <div class="mb-5">
        <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection
