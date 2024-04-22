@foreach ($projects as $project)
<div class="modal fade product-view-one" id="project-{{ $project->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-bs-dismiss="modal">
                <span aria-hidden="true">
                    <i class="bx bx-x"></i>
                </span>
            </button>
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="product-view-one-image">
                        <img style="width: 338px;height:338px" src="{!! asset('img/data/projects/img1.jpg') !!}" alt="Image">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product-content">
                        <h3>
                            <a href="javascript:void(0)">{{ $project->title }}</a>
                        </h3>
                        <ul class="product-info">
                            <li>
                                <span>Owner :</span> <a href="javascript:void(0)">{{ $project->user->username }}</a>
                            </li>
                            <li>
                                <span>Phase :</span> <a href="javascript:void(0)">{{ $project->phase }}</a>
                            </li>
                            <li>
                                <span>Start :</span> <a href="javascript:void(0)">{{ $project->start_date }}</a>
                            </li>
                            <li>
                                <span>End :</span> <a href="javascript:void(0)">{{ $project->end_date }}</a>
                            </li>
                            <li>
                                <span>Description :</span> <a href="javascript:void(0)">{{ $project->short_description }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

