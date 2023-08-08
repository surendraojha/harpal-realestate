@extends('admin.layouts.main')

@section('title')
    {{ $module }}
@endsection

@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h2>{{ $module }}</h2>
                    </div>
                </div>
            </div>
            <div class="row clearfix">




                <div class="col-lg-12">
                    <div class="card">

                        <div class="tab-content mt-0">
                            <div class="tab-pane  @if (!session()->get('errors')) active show @endif" id="Users">
                                <div class="table-responsive">
                                    <form method="post">
                                        @csrf

                                        <table class="table table-hover table-custom spacing8" id="myTable">

                                            <tbody>


                                                <tr>
                                                    <th>Type</th>
                                                    <td>{{ $information->type }}</td>

                                                </tr>

                                                @php
                                                    $deposit_slip = public_path() . '/uploads/' . $information->deposit_slip;
                                                @endphp


                                                <tr>
                                                    <th>Deposit Slip</th>
                                                    <td>
                                                        @if (file_exists($deposit_slip) && $information->deposit_slip)
                                                            <a target="_blank" href="{{ asset('uploads/' . $information->deposit_slip) }}">Show Slip</a>
                                                        @else
                                                            Not Available
                                                        @endif
                                                    </td>
                                                </tr>





                                                <tr>
                                                    <th>Location</th>

                                                    <td>

                                                        <strong>Pickup Location: </strong>
                                                        {{ $information->pick_up_location }}
                                                        <br>
                                                        <strong>DropOff Location: </strong>
                                                        {{ $information->drop_off_location }}
                                                    </td>

                                                <tr>

                                                    <th>Items</th>



                                                    <td>
                                                        @php
                                                            $items = json_decode($information->items);

                                                            if (!$items) {
                                                                $items = [];
                                                            }
                                                        @endphp


                                                        @foreach ($items as $v)
                                                            <strong> {{ $v->item }} </strong>: {{ $v->quantity }}
                                                            <br>
                                                        @endforeach

                                                    </td>
                                                </tr>


                                                <tr>
                                                    <th>Phone</th>
                                                    <td>{{ $information->phone }}</td>

                                                </tr>

                                                <tr>
                                                <th>Message</th>
                                                <td>
                                                {!!$information->message!!}
                                                </td>
                                                </tr>



                                                <tr>

                                                    <th>Schedule Time</th>
                                                    <td>


                                                        @if ($information->when != 'Instant Booking')
                                                            {{ date('h:i A', strtotime($information->schedule_time)) }}

                                                            {{ date('d M, Y', strtotime($information->schedule_date)) }}
                                                        @else
                                                            Instant Booking
                                                        @endif
                                                    </td>

                                                </tr>


                                                <tr>

                                                    <th>Created At</th>
                                                    <td>{{ date('h:i:s a d M, Y', strtotime($information->created_at)) }}
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th>Action</th>
                                                    <td>


                                                        @if ($information->read == 0)
                                                            <a class="btn btn-success"
                                                                href="{{ route('shift-home.read', $information->id) }}">Mark
                                                                As
                                                                Done <i class="fa fa-times"></i></a>
                                                        @else
                                                            <a class="btn btn-success"
                                                                href="{{ route('shift-home.read', $information->id) }}">
                                                                <span>Done <i class="fa fa-check"></i> </span>
                                                            </a>
                                                        @endif


                                                        {{-- show more details --}}


                                                    </td>
                                                </tr>


                                            </tbody>
                                        </table>


                                </div>
                            </div>

                            {{-- create form --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- @include('user::common.users.links') --}}
@endsection
