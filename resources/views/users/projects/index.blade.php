@push('css')
    <style>


        .sting{
                background-color: transparent;
                border: unset;
        }
        .stingform{
            display:inline-block;
        }
    </style>
@endpush

@extends('users.layout',['page_name'=> 'My Projects' ])


@section('section')
<div class="instructor-content">

    <section class="cart-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="cart-wraps">
                        <div class="coupon-cart">
                            <div class="row">
                                <div class="col-lg-4 col-sm-5 offset-lg-4 text-center">
                                    <a href="{{ route('user.project.create') }}" class="default-btn update mx-auto">
                                        Add New Projects
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="cart-table mt-4 table-responsive">
                            <table class="table table-bordered ">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Phase</th>
                                        <th scope="col">Start Date</th>
                                        <th scope="col">End Date</th>
                                        <th scope="col"></th>

                                    </tr>
                                </thead>
                                @if (count($projects) > 0)
                                    <tbody>
                                        @foreach ($projects as $project)
                                            <tr>
                                                <td class="product-name">
                                                    <a href="javascript:void(0)">
                                                        {{ $loop->iteration }}
                                                    </a>
                                                </td>

                                                <td class="product-name">
                                                    <a href="javascript:void(0)">{{ $project->title }}</a>
                                                </td>
                                                <td class="product-name">
                                                    <a href="javascript:void(0)">{{ $project->phase }}</a>
                                                </td>
                                                <td class="product-name">
                                                    <a href="javascript:void(0)">{{ $project->start_date }}</a>
                                                </td>
                                                <td class="product-name">
                                                    <a href="javascript:void(0)">{{ $project->end_date }}</a>
                                                </td>
                                                <td class="product-subtotal">

                                                        <div class="row">
                                                            <div class="col-4">
                                                                <a style="margin-top: 3px" title="show" href="#project-{{ $project->id }}" data-bs-toggle="modal"
                                                                    >
                                                                    <i class="fa-solid fa-eye"></i>
                                                                </a>
                                                            </div>
                                                            <div class="col-4">
                                                                <a style="margin-top: 3px" title="edit" href="{{ route('user.project.edit', ['id'=>$project->id]) }}">
                                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                                </a>
                                                            </div>
                                                            <div class="col-4">
                                                                <form class="stingform" action="{{route('user.project.delete',['id'=>$project->id])}}" method="post">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button class="sting" type="submit" title="delete" style="float:unset;font-size:20px">
                                                                        <i class='bx bx-trash'></i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                @else
                                <tr>
                                    <td class="product-name" colspan="5">
                                        <a href="javascript:void(0)">Not Found Projects</a>
                                    </td>
                                </tr>
                                @endif
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

@if (count($projects) > 0)
    @include('allmodals')
@endif
@endsection
