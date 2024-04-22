
<div class="row">

    @foreach ($projects as $project)
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="single-shop pb-5" style="background-color: var(--white-color);border-radius:10%;overflow:hidden">
            <div class="shop-img pt-5">
                <img style="height: 400px" src="{!! asset('img/data/projects/img1.jpg') !!}" alt="Image">
                <ul>
                    <li>
                        <a href="#">
                            <a href="#project-{{ $project->id }}" data-bs-toggle="modal">
                                <i class="bx bx-show-alt"></i>
                            </a>
                        </a>
                    </li>
                </ul>
            </div>
            <h3>{{ $project->title }}</h3>
            <span> Owner : {{ $project->user->username }}</span>
            <span> Phase : {{ $project->phase }}</span>
            <span> Start : {{ $project->start_date }}</span>
            <span> End  : {{ $project->end_date }}</span>
        </div>
    </div>
    @endforeach

</div>



