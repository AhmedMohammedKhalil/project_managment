@extends('users.layout')
@section('section')
<div class="instructor-content">
    <div class="row align-items-center">
        <div class="col-lg-4">
            <div class="advisor-img">
                @if (auth('user')->user()->image == null)
                <img src="{{ asset('img/users/default.jpg') }}" alt="Image">
                @else
                <img src="{{asset('img/users/'.auth('user')->user()->id.'/'.auth('user')->user()->image)}}"
                    alt="Image">
                @endif
            </div>
        </div>
        <div class="col-lg-8">
            <div class="advisor-content">
                <a href="#">
                    <h3>{{ auth('user')->user()->name }}</h3>
                </a>
                <p>{{ auth('user')->user()->email }}</p>
                <p>{{ auth('user')->user()->c_number }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
