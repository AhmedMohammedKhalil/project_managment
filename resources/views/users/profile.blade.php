@extends('users.layout')
@section('section')
<div class="instructor-content">
    <div class="row align-items-center">
        <div class="col-lg-4">
            <div class="advisor-img">
                <img src="{{ asset('img/admins/default.jpg') }}" alt="Image">
            </div>
        </div>
        <div class="col-lg-8">
            <div class="advisor-content">
                <a href="#">
                    <h3>{{ auth('user')->user()->username }}</h3>
                </a>
                <p>{{ auth('user')->user()->email }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
