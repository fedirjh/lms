@extends('layouts.master')

@section('content')

<div class="container-fluid page__heading-container">
    <div class="page__heading d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-lg-between text-center text-lg-left">
        <div>
            <h1 class="m-lg-0">{{$formation->nom}}</h1>
            <!--<div class="d-inline-flex align-items-center">
                <i class="material-icons icon-16pt mr-1 text-muted">access_time</i> 2 <small class="text-muted ml-1 mr-1">hours</small>: 26 <small class="text-muted ml-1">min</small>
            </div>-->
        </div>
       @if (!Auth::user()->formation()->where('id', $formation->id)->exists())
       <div>
            <a href="{{ route('formation.inscrire', $formation->id)}}" class="btn btn-success">
                Purchase:
                <strong>{{$formation->prix}}</strong>
            </a>
        </div>
       @else
        <div>
            <a href="{{ route('formation.desinscrire', $formation->id)}}" class="btn btn-success">
                desinscrire
            </a>
        </div>
       @endif
    </div>
</div>

<div class="container-fluid page__container">
    <div class="row">
        <div class="col-md-8">

            <div class="card">
                <img src="{{ '/images/'. $formation->image}}" class="img-fluid" alt="">
            </div>
        </div>


        <div class="col-md-4">

            <!-- Lessons -->
            <div class="card">
                <div class="card-header card-header-large bg-light d-flex align-items-center">
                    <div class="flex">
                        <h4 class="card-header__title">Course Lessons</h4>
                    </div>
                </div>

                <ul class="list-group list-group-fit">
                   @foreach($formation->cours as $indexKey => $cour)
                    <li class="list-group-item">
                        <div class="media">
                            <div class="media-left">
                                <div class="text-muted">{{$indexKey + 1}}</div>
                            </div>
                            <div class="media-body">
                                <a href="#" class="text-muted">{{ $cour->titre }}</a>
                            </div>

                        </div>
                    </li>
                   @endforeach
                </ul>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="media align-items-center">

                        <div class="media-body">
                            <h4 class="card-header__title">{{$formation->formateur->name}}</h4>
                        </div>
                        <div class="media-right">
                            <a href="" class="btn btn-facebook btn-sm"><i class="fab fa-facebook"></i></a>
                            <a href="" class="btn btn-twitter btn-sm"><i class="fab fa-twitter"></i></a>
                            <a href="" class="btn btn-light btn-sm"><i class="fab fa-github"></i></a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="card">
                <div class="card-header card-header-large bg-light d-flex align-items-center">
                    <div class="flex">
                        <h4 class="card-header__title">Course Description</h4>
                    </div>
                </div>
                <div class="card-body">
                        {{ $formation->description }}
                </div>
            </div>
<!--
            <div class="card ">
                <div class="card-header card-header-large bg-light d-flex align-items-center">
                    <div class="flex">
                        <h4 class="card-header__title">Related Courses</h4>
                    </div>
                </div>
                <div class="card-body">

                    <div class="card card__course clear-shadow border">
                        <div class=" d-flex justify-content-center">
                            <a class="" href="#">
                                <img src="https://images.unsplash.com/photo-1562577309-4932fdd64cd1?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=clamp&amp;w=800&amp;h=250" style="width:100%" alt="...">
                            </a>
                        </div>
                        <div class="p-3">
                            <div class="d-flex align-items-center">
                                <div>
                                    <a class="text-body mb-1" href="fluid-#"><strong>Basics of Social Media</strong></a><br>
                                    <div class="d-flex align-items-center">
                                        <span class="text-blue mr-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 40 40" width="16" height="16" style="position:relative; top:-2px">
                                                <g transform="matrix(1.6666666666666667,0,0,1.6666666666666667,0,0)">
                                                    <path d="M2.5,16C2.224,16,2,15.776,2,15.5v-11C2,4.224,2.224,4,2.5,4h14.625c0.276,0,0.5,0.224,0.5,0.5V8c0,0.552,0.448,1,1,1 s1-0.448,1-1V4c0-1.105-0.895-2-2-2H2C0.895,2,0,2.895,0,4v12c0,1.105,0.895,2,2,2h5.375c0.138,0,0.25,0.112,0.25,0.25v1.5 c0,0.138-0.112,0.25-0.25,0.25H5c-0.552,0-1,0.448-1,1s0.448,1,1,1h7.625c0.552,0,1-0.448,1-1s-0.448-1-1-1h-2.75 c-0.138,0-0.25-0.112-0.25-0.25v-1.524c0-0.119,0.084-0.221,0.2-0.245c0.541-0.11,0.891-0.638,0.781-1.179 c-0.095-0.466-0.505-0.801-0.981-0.801L2.5,16z M3.47,9.971c-0.303,0.282-0.32,0.757-0.037,1.06c0.282,0.303,0.757,0.32,1.06,0.037 c0.013-0.012,0.025-0.025,0.037-0.037l2-2c0.293-0.292,0.293-0.767,0.001-1.059c0,0-0.001-0.001-0.001-0.001l-2-2 c-0.282-0.303-0.757-0.32-1.06-0.037s-0.32,0.757-0.037,1.06C3.445,7.006,3.457,7.019,3.47,7.031l1.293,1.293 c0.097,0.098,0.097,0.256,0,0.354L3.47,9.971z M7,11.751h2.125c0.414,0,0.75-0.336,0.75-0.75s-0.336-0.75-0.75-0.75H7 c-0.414,0-0.75,0.336-0.75,0.75S6.586,11.751,7,11.751z M18.25,16.5c0,0.276-0.224,0.5-0.5,0.5s-0.5-0.224-0.5-0.5v-5.226 c0-0.174-0.091-0.335-0.239-0.426c-1.282-0.702-2.716-1.08-4.177-1.1c-0.662-0.029-1.223,0.484-1.252,1.146 c-0.001,0.018-0.001,0.036-0.001,0.054v7.279c0,0.646,0.511,1.176,1.156,1.2c1.647-0.011,3.246,0.552,4.523,1.593 c0.14,0.14,0.33,0.219,0.528,0.218c0.198,0.001,0.388-0.076,0.529-0.215c1.277-1.044,2.878-1.61,4.527-1.6 c0.641-0.023,1.15-0.547,1.156-1.188v-7.279c-0.001-0.327-0.134-0.64-0.369-0.867c-0.236-0.231-0.557-0.353-0.886-0.337 c-1.496,0.016-2.963,0.411-4.265,1.148c-0.143,0.092-0.23,0.251-0.23,0.421V16.5z" stroke="none" fill="currentColor" stroke-width="0" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </g>
                                            </svg>
                                        </span>
                                        <a href="fluid-take-course.html" class="small">Social Media</a>
                                    </div>
                                </div>
                                <a href="#" class="btn btn-primary ml-auto">$99</a>
                            </div>
                        </div>
                    </div>

                    <div class="card card__course clear-shadow border">
                        <div class=" d-flex justify-content-center">
                            <a class="" href="#">
                                <img src="https://images.unsplash.com/photo-1470478626242-c4f9af4585f9?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=clamp&amp;w=800&amp;h=250" style="width:100%" alt="...">
                            </a>
                        </div>
                        <div class="p-3">
                            <div class="d-flex align-items-center">
                                <div>
                                    <a class="text-body mb-1" href="fluid-#"><strong>UI/UX Basics</strong></a><br>
                                    <div class="d-flex align-items-center">
                                        <span class="text-blue mr-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 40 40" width="16" height="16" style="position:relative; top:-2px">
                                                <g transform="matrix(1.6666666666666667,0,0,1.6666666666666667,0,0)">
                                                    <path d="M2.5,16C2.224,16,2,15.776,2,15.5v-11C2,4.224,2.224,4,2.5,4h14.625c0.276,0,0.5,0.224,0.5,0.5V8c0,0.552,0.448,1,1,1 s1-0.448,1-1V4c0-1.105-0.895-2-2-2H2C0.895,2,0,2.895,0,4v12c0,1.105,0.895,2,2,2h5.375c0.138,0,0.25,0.112,0.25,0.25v1.5 c0,0.138-0.112,0.25-0.25,0.25H5c-0.552,0-1,0.448-1,1s0.448,1,1,1h7.625c0.552,0,1-0.448,1-1s-0.448-1-1-1h-2.75 c-0.138,0-0.25-0.112-0.25-0.25v-1.524c0-0.119,0.084-0.221,0.2-0.245c0.541-0.11,0.891-0.638,0.781-1.179 c-0.095-0.466-0.505-0.801-0.981-0.801L2.5,16z M3.47,9.971c-0.303,0.282-0.32,0.757-0.037,1.06c0.282,0.303,0.757,0.32,1.06,0.037 c0.013-0.012,0.025-0.025,0.037-0.037l2-2c0.293-0.292,0.293-0.767,0.001-1.059c0,0-0.001-0.001-0.001-0.001l-2-2 c-0.282-0.303-0.757-0.32-1.06-0.037s-0.32,0.757-0.037,1.06C3.445,7.006,3.457,7.019,3.47,7.031l1.293,1.293 c0.097,0.098,0.097,0.256,0,0.354L3.47,9.971z M7,11.751h2.125c0.414,0,0.75-0.336,0.75-0.75s-0.336-0.75-0.75-0.75H7 c-0.414,0-0.75,0.336-0.75,0.75S6.586,11.751,7,11.751z M18.25,16.5c0,0.276-0.224,0.5-0.5,0.5s-0.5-0.224-0.5-0.5v-5.226 c0-0.174-0.091-0.335-0.239-0.426c-1.282-0.702-2.716-1.08-4.177-1.1c-0.662-0.029-1.223,0.484-1.252,1.146 c-0.001,0.018-0.001,0.036-0.001,0.054v7.279c0,0.646,0.511,1.176,1.156,1.2c1.647-0.011,3.246,0.552,4.523,1.593 c0.14,0.14,0.33,0.219,0.528,0.218c0.198,0.001,0.388-0.076,0.529-0.215c1.277-1.044,2.878-1.61,4.527-1.6 c0.641-0.023,1.15-0.547,1.156-1.188v-7.279c-0.001-0.327-0.134-0.64-0.369-0.867c-0.236-0.231-0.557-0.353-0.886-0.337 c-1.496,0.016-2.963,0.411-4.265,1.148c-0.143,0.092-0.23,0.251-0.23,0.421V16.5z" stroke="none" fill="currentColor" stroke-width="0" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </g>
                                            </svg>
                                        </span>
                                        <a href="fluid-take-course.html" class="small">Social Media</a>
                                    </div>
                                </div>
                                <a href="#" class="btn btn-primary ml-auto">$99</a>
                            </div>
                        </div>
                    </div>

                    <div class="card card__course clear-shadow border">
                        <div class=" d-flex justify-content-center">
                            <a class="" href="#">
                                <img src="https://images.unsplash.com/photo-1542690563-ca10289ac117?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=clamp&amp;w=800&amp;h=250" style="width:100%" alt="...">
                            </a>
                        </div>
                        <div class="p-3">
                            <div class="d-flex align-items-center">
                                <div>
                                    <a class="text-body mb-1" href="fluid-#"><strong>Learn Ruby on Rails</strong></a><br>
                                    <div class="d-flex align-items-center">
                                        <span class="text-blue mr-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 40 40" width="16" height="16" style="position:relative; top:-2px">
                                                <g transform="matrix(1.6666666666666667,0,0,1.6666666666666667,0,0)">
                                                    <path d="M2.5,16C2.224,16,2,15.776,2,15.5v-11C2,4.224,2.224,4,2.5,4h14.625c0.276,0,0.5,0.224,0.5,0.5V8c0,0.552,0.448,1,1,1 s1-0.448,1-1V4c0-1.105-0.895-2-2-2H2C0.895,2,0,2.895,0,4v12c0,1.105,0.895,2,2,2h5.375c0.138,0,0.25,0.112,0.25,0.25v1.5 c0,0.138-0.112,0.25-0.25,0.25H5c-0.552,0-1,0.448-1,1s0.448,1,1,1h7.625c0.552,0,1-0.448,1-1s-0.448-1-1-1h-2.75 c-0.138,0-0.25-0.112-0.25-0.25v-1.524c0-0.119,0.084-0.221,0.2-0.245c0.541-0.11,0.891-0.638,0.781-1.179 c-0.095-0.466-0.505-0.801-0.981-0.801L2.5,16z M3.47,9.971c-0.303,0.282-0.32,0.757-0.037,1.06c0.282,0.303,0.757,0.32,1.06,0.037 c0.013-0.012,0.025-0.025,0.037-0.037l2-2c0.293-0.292,0.293-0.767,0.001-1.059c0,0-0.001-0.001-0.001-0.001l-2-2 c-0.282-0.303-0.757-0.32-1.06-0.037s-0.32,0.757-0.037,1.06C3.445,7.006,3.457,7.019,3.47,7.031l1.293,1.293 c0.097,0.098,0.097,0.256,0,0.354L3.47,9.971z M7,11.751h2.125c0.414,0,0.75-0.336,0.75-0.75s-0.336-0.75-0.75-0.75H7 c-0.414,0-0.75,0.336-0.75,0.75S6.586,11.751,7,11.751z M18.25,16.5c0,0.276-0.224,0.5-0.5,0.5s-0.5-0.224-0.5-0.5v-5.226 c0-0.174-0.091-0.335-0.239-0.426c-1.282-0.702-2.716-1.08-4.177-1.1c-0.662-0.029-1.223,0.484-1.252,1.146 c-0.001,0.018-0.001,0.036-0.001,0.054v7.279c0,0.646,0.511,1.176,1.156,1.2c1.647-0.011,3.246,0.552,4.523,1.593 c0.14,0.14,0.33,0.219,0.528,0.218c0.198,0.001,0.388-0.076,0.529-0.215c1.277-1.044,2.878-1.61,4.527-1.6 c0.641-0.023,1.15-0.547,1.156-1.188v-7.279c-0.001-0.327-0.134-0.64-0.369-0.867c-0.236-0.231-0.557-0.353-0.886-0.337 c-1.496,0.016-2.963,0.411-4.265,1.148c-0.143,0.092-0.23,0.251-0.23,0.421V16.5z" stroke="none" fill="currentColor" stroke-width="0" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </g>
                                            </svg>
                                        </span>
                                        <a href="fluid-take-course.html" class="small">Social Media</a>
                                    </div>
                                </div>
                                <a href="#" class="btn btn-primary ml-auto">$99</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

    <div class="rating text-warning">
        <i class="material-icons">star</i>
        <i class="material-icons">star</i>
        <i class="material-icons">star</i>
        <i class="material-icons">star</i>
        <i class="material-icons">star_border</i>
    </div>
    <small class="text-muted">20 ratings</small>
</div>
</div> -->
        </div>
    </div>
</div>
@endsection
