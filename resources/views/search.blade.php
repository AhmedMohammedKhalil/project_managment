@extends('layouts.app')
@section('main')
    <div class="page-title-area" style="margin-top: 60px; background-image:url({{ asset('img/data/sliders/slider1.jpg') }})">
        <div class="container">
            <div class="page-title-content">
                <h2>بحث</h2>
                <p>ابحث عن المشاريع التى تريدها</p>
            </div>
        </div>
    </div>
    <livewire:search />
    <livewire:searching />
@endsection
