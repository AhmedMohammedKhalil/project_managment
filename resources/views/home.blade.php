@extends('layouts.app')
@push('css')
    <style>
        .page-title-area {
            height: 800px;
        }
        .page-title-area::before{
            background-color: unset !important
        }
    </style>
@endpush
@section('main')

    <div class="page-title-area"  style="margin-top: 60px; background-image:url({{ asset('img/data/sliders/slider1.jpg') }})">
        <div class="container">
            <div class="page-title-content">
            </div>
        </div>
    </div>


    <section class="banner-area-two pt-100 pb-70" id="about">
        <div class="section-title">
            <h2>About Us</h2>
            <img src="{{ asset('img/section-title-shape.png') }}" alt="Image" />
        </div>
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container-fluid social">
                    <div class="row align-items-center">
                        <div class="col-lg-7">
                            <div class="banner-content " style="margin: 0">
                                <h1 class="wow animate__animated animate__fadeInLeft" data-wow-delay="0.3s">
                                    About Us
                                </h1>
                                <p class="wow animate__animated animate__fadeInLeft" data-wow-delay="0.6s">
                                    Content
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div style="margin-top: unset" class="banner-img wow animate__animated animate__fadeInRight" data-wow-delay="0.3s">
                                <img style="height: 500px;border-radius:10%" src="{{ asset('img/abouts/about.jpg') }}" alt="Image" />
                                <div class="banner-shape-1">
                                    <img src="{{ asset('img/banner-img/shape-img-1.png') }}" alt="Image" />
                                </div>
                                <div class="banner-shape-2">
                                    <img src="{{ asset('img/banner-img/shape-img-2.png') }}" alt="Image" />
                                </div>
                                <div class="banner-shape-3">
                                    <img src="{{ asset('img/banner-img/shape-img-3.png') }}" alt="Image" />
                                </div>
                                <div class="banner-shape-4">
                                    <img src="{{ asset('img/banner-img/shape-img-4.png') }}" alt="Image" />
                                </div>
                                <div class="banner-shape-5 rotated">
                                    <img src="{{ asset('img/banner-img/shape-img-5.png') }}" alt="Image" />
                                </div>
                                <div class="banner-shape-6">
                                    <img src="{{ asset('img/banner-img/shape-img-6.png') }}" alt="Image" />
                                </div>
                                <div class="banner-shape-7 rotated">
                                    <img src="{{ asset('img/banner-img/shape-img-7.png') }}" alt="Image" />
                                </div>
                                <div class="banner-shape-8">
                                    <img src="{{ asset('img/banner-img/shape-img-8.png') }}" alt="Image" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if (count($projects) > 0)
    <section class="courses-area-three ptb-100 jarallax" data-jarallax='{"speed": 0.3}'>
        <div class="container">
            <div class="section-title white-title">
                <h2>جميع المشاريع</h2>
                <img src="{{ asset('img/section-title-shape.png') }}" alt="Image" />
            </div>
            @if(count($projects) > 3)
            <div class="courses-slider-three owl-theme owl-carousel">
                @include('allprojects')
            </div>
            @else
                @include('projects')
            @endif
        </div>
    </section>
    @endif
    @if (count($projects) > 0)
        @include('allmodals')
    @endif
@endsection
