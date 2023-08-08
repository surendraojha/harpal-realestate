@extends('admin.layouts.main')
@section('title')
Dashboard
@endsection
@section('content')
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h1>Dashboard</h1>
                    {{-- <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">My Page</li>
                        </ol>
                    </nav> --}}
                </div>
                {{-- <div class="col-md-6 col-sm-12 text-right hidden-xs">
                    <a href="javascript:void(0);" class="btn btn-sm btn-primary" title="">Create Campaign</a>
                </div> --}}
            </div>
        </div>

        <div class="row clearfix">

            {{-- categories --}}
            <div class="col-lg-3 col-md-6">
                <a href="{{ route('category.index') }}">
                    <div class="card">
                        <div class="body">
                            <div class="d-flex align-items-center">
                                <div class="icon-in-bg bg-indigo text-white rounded-circle"><i
                                        class="fa fa-list-alt"></i></div>

                                <div class="ml-4">
                                    <span>Boost Request</span>
                                    <h4 class="mb-0 font-weight-medium"> {{ $boost_request }}</h4>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>

            </div>

            {{-- jobs --}}
            <div class="col-lg-3 col-md-6">
                <a href="{{ route('job.index') }}">
                    <div class="card">
                        <div class="body">
                            <div class="d-flex align-items-center">
                                <div class="icon-in-bg bg-indigo text-white rounded-circle">
                                    <i class="fa fa-briefcase"></i>
                                </div>
                                <div class="ml-4">
                                    <span>
                                        Jobs</span>
                                    <h4 class="mb-0 font-weight-medium"> {{ $jobs }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            {{-- Job Applications --}}
            <div class="col-lg-3 col-md-6">
                <a href="{{ route('apply-job.index') }}">

                    <div class="card">
                        <div class="body">
                            <div class="d-flex align-items-center">
                                <div class="icon-in-bg bg-indigo text-white rounded-circle"><i
                                        class="fa fa-envelope"></i></div>

                                <div class="ml-4">
                                    <span>
                                        Job Applications</span>
                                    <h4 class="mb-0 font-weight-medium"> {{ $job_applications }}</h4>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>

            </div>

            {{--  Employers --}}
            <div class="col-lg-3 col-md-6">
                <a href="{{ route('employer') }}">

                    <div class="card">
                        <div class="body">
                            <div class="d-flex align-items-center">
                                <div class="icon-in-bg bg-indigo text-white rounded-circle"><i
                                        class="fa fa-briefcase"></i></div>

                                <div class="ml-4">
                                    <span>
                                        Employers</span>
                                    <h4 class="mb-0 font-weight-medium"> {{ $employers }}</h4>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>

            </div>

            {{-- Job Applications --}}
            <div class="col-lg-3 col-md-6">
                <a href="{{ route('job-seeker') }}">

                    <div class="card">
                        <div class="body">
                            <div class="d-flex align-items-center">
                                <div class="icon-in-bg bg-indigo text-white rounded-circle"><i
                                        class="fa fa-briefcase"></i></div>

                                <div class="ml-4">
                                    <span>
                                        Job Seekers</span>
                                    <h4 class="mb-0 font-weight-medium"> {{ $job_seekers }}</h4>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>

            </div>


            @if(auth()->user()->type=='admin')


            {{-- events --}}
            <div class="col-lg-3 col-md-6">
                <a href="{{ route('event.index') }}">

                    <div class="card">
                        <div class="body">
                            <div class="d-flex align-items-center">
                                <div class="icon-in-bg bg-indigo text-white rounded-circle">
                                    <i class="fa fa-calendar" aria-hidden="true"></i>


                                </div>

                                <div class="ml-4">
                                    <span>
                                        Events</span>
                                    <h4 class="mb-0 font-weight-medium"> {{ $events }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            {{-- event_booking --}}
            <div class="col-lg-3 col-md-6">
                <a href="{{ route('event-booking.index') }}">

                    <div class="card">
                        <div class="body">
                            <div class="d-flex align-items-center">
                                <div class="icon-in-bg bg-indigo text-white rounded-circle">


                                    <i class="fa fa-ticket"></i>
                                </div>
                                <div class="ml-4">
                                    <span>Booth Booking</span>
                                    <h4 class="mb-0 font-weight-medium"> {{ $event_booking }}</h4>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>

            </div>

            {{-- event_booking_users --}}
            <div class="col-lg-3 col-md-6">
                <a href="{{ route('event-booking-user.index') }}">

                    <div class="card">
                        <div class="body">
                            <div class="d-flex align-items-center">
                                <div class="icon-in-bg bg-indigo text-white rounded-circle">
                                    <i class="fa fa-user"></i></div>
                                <div class="ml-4">
                                    <span>
                                        Booth Booking Users</span>
                                    <h4 class="mb-0 font-weight-medium"> {{ $event_booking_users }}</h4>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>

            </div>

            {{-- Team Category --}}
            <div class="col-lg-3 col-md-6">
                <a href="{{ route('team-category.index') }}">

                    <div class="card">
                        <div class="body">
                            <div class="d-flex align-items-center">
                                <div class="icon-in-bg bg-indigo text-white rounded-circle">
                                    <i class="fa fa-tag" aria-hidden="true"></i>
                                </div>

                                <div class="ml-4">
                                    <span>Team Category</span>
                                    <h4 class="mb-0 font-weight-medium"> {{ $team_categories }}</h4>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>

            </div>


            {{-- Team --}}
            <div class="col-lg-3 col-md-6">
                <a href="{{ route('team.index') }}">

                    <div class="card">
                        <div class="body">
                            <div class="d-flex align-items-center">
                                <div class="icon-in-bg bg-indigo text-white rounded-circle"><i class="fa fa-users"></i>
                                </div>

                                <div class="ml-4">
                                    <span>Team</span>
                                    <h4 class="mb-0 font-weight-medium"> {{ $teams }}</h4>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>

            </div>
            {{-- Our services --}}
            <div class="col-lg-3 col-md-6">
                <a href="{{ route('ourservice.index') }}">

                    <div class="card">
                        <div class="body">
                            <div class="d-flex align-items-center">
                                <div class="icon-in-bg bg-indigo text-white rounded-circle">
                                    <i class="fa fa-wrench" aria-hidden="true"></i>
                                </div>
                                <div class="ml-4">
                                    <span>Our Services</span>
                                    <h4 class="mb-0 font-weight-medium"> {{ $our_services }}</h4>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>

            </div>

            {{-- Buyer registrations --}}
            <div class="col-lg-3 col-md-6">
                <a href="{{ route('buyer.index') }}">
                    <div class="card">
                        <div class="body">
                            <div class="d-flex align-items-center">
                                <div class="icon-in-bg bg-indigo text-white rounded-circle">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                </div>
                                <div class="ml-4">
                                    <span>Buyer registrations</span>
                                    <h4 class="mb-0 font-weight-medium"> {{ $buyer_registrations }}</h4>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>

            </div>
            {{-- Business meetings --}}
            <div class="col-lg-3 col-md-6">
                <a href="{{ route('business-meeting.index') }}">

                    <div class="card">
                        <div class="body">
                            <div class="d-flex align-items-center">
                                <div class="icon-in-bg bg-indigo text-white rounded-circle">

                                    <i class="fa fa-users"></i></div>
                                <div class="ml-4">
                                    <span>Business Meetings</span>
                                    <h4 class="mb-0 font-weight-medium"> {{ $business_meetings }}</h4>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>

            </div>

            {{-- Meeting users --}}
            <div class="col-lg-3 col-md-6">
                <a href="{{ route('business-meeting-user.index') }}">

                    <div class="card">
                        <div class="body">
                            <div class="d-flex align-items-center">
                                <div class="icon-in-bg bg-indigo text-white rounded-circle"><i class="fa fa-user"></i>
                                </div>
                                <div class="ml-4">
                                    <span>Business Meeting Users</span>
                                    <h4 class="mb-0 font-weight-medium"> {{ $business_meeting_users }}</h4>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>

            </div>
            {{-- Meeting participant users  --}}

            <div class="col-lg-3 col-md-6">
                <a href="{{ route('meeting-participant.index') }}">

                    <div class="card">
                        <div class="body">
                            <div class="d-flex align-items-center">
                                <div class="icon-in-bg bg-indigo text-white rounded-circle"><i class="fa fa-user"></i>
                                </div>
                                <div class="ml-4">
                                    <span> Meeting participant users</span>
                                    <h4 class="mb-0 font-weight-medium"> {{ $meeting_participant_users }}</h4>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>

            </div>
            {{-- Trainings --}}
            <div class="col-lg-3 col-md-6">
                <a href="{{ route('training.index') }}">

                    <div class="card">
                        <div class="body">
                            <div class="d-flex align-items-center">
                                <div class="icon-in-bg bg-indigo text-white rounded-circle"><i
                                        class="fa fa-certificate"></i>
                                </div>
                                <div class="ml-4">
                                    <span> Trainings</span>
                                    <h4 class="mb-0 font-weight-medium"> {{ $trainings }}</h4>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>

            </div>
            {{-- training users --}}
            <div class="col-lg-3 col-md-6">
                <a href="{{ route('training-user.index') }}">

                    <div class="card">
                        <div class="body">
                            <div class="d-flex align-items-center">
                                <div class="icon-in-bg bg-indigo text-white rounded-circle"><i class="fa fa-user"></i>
                                </div>
                                <div class="ml-4">
                                    <span> Training Users</span>
                                    <h4 class="mb-0 font-weight-medium"> {{ $training_users }}</h4>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>

            </div>
            {{-- training participant users --}}

            <div class="col-lg-3 col-md-6">
                <a href="{{ route('training-participant.index') }}">

                    <div class="card">
                        <div class="body">
                            <div class="d-flex align-items-center">
                                <div class="icon-in-bg bg-indigo text-white rounded-circle"><i class="fa fa-user"></i>
                                </div>
                                <div class="ml-4">
                                    <span> Training Participant User</span>
                                    <h4 class="mb-0 font-weight-medium"> {{ $training_participant_users }}</h4>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>

            </div>


            @endif
        </div>

        <div class="row clearfix">

            <div class="col-lg-12 col-md-12">
                <div class="table-responsive">
                    <table class="table table-hover table-custom spacing5">
                        <thead>
                            <tr>
                                <th style="width: 20px;">#</th>
                                <th>Job Seeker</th>
                                <th>Job Title</th>
                                <th>Created At</th>
                                {{-- <th style="width: 50px;">Amount</th>
                                <th style="width: 50px;">Status</th> --}}

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @php
                            $count=0;
                            @endphp

                            @foreach ($recent_job_applications as $value)
                            <tr>
                                <td>

                                    {{ ++$count }}
                                </td>



                                <td>{{$value->name}}</td>
                                <td>{{$value->job_title}}</td>
                                <td>{{date('d M, Y',strtotime($value->created_at))}}</td>
                                <td>

                                    <a
                                    data-toggle="tooltip" title="View Details"

                                    href="{{route('admin-js-basic-info.show',$value->user_id)}}">
                                        <i class="fa fa-eye fa-lg"></i></a>
                                    </a>
                                </td>
                            </tr>

                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
