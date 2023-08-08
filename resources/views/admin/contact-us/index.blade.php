@extends('admin.layouts.main')

@section('title')
    Find Me Room
@endsection

@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h2>Find Me room</h2>
                    </div>
                </div>
            </div>
            <div class="row clearfix">

                <!-- search -->
                <div class="col-12">
                    <div class="card">
                        <form action="{{ route('contact-us.index') }}" method="get">
                            <div class="body">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6">
                                        <div class="input-group">
                                            @include('admin.common.search')

                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-6">

                                        <button type="submit" class="btn btn-sm btn-primary btn-block">Search
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="card">
                        <ul class="nav nav-tabs">
                            <li class="nav-item"><a class="nav-link @if (!session()->get('errors')) active show @endif"
                                    data-toggle="tab" href="#Users">Contacts</a></li>
                        </ul>
                        <div class="tab-content mt-0">
                            <div class="tab-pane  @if (!session()->get('errors')) active show @endif" id="Users">
                                <div class="table-responsive">
                                    <form method="post">
                                        @csrf


                                        @php
                                            $route = route('contact-us.delete');
                                        @endphp

                                        <x-delete-button :user="$user" :route="$route" />
                                        <table class="table table-hover table-custom spacing8">
                                            <thead>
                                                <tr>
                                                    <x-check-box-th :user="$user" />

                                                    <th class="w60">Contact Info</th>
                                                    <th>Location</th>
                                                    <th>Rental Type</th>
                                                    <th>Created Date</th>
                                                    <th>
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($informations as $value)
                                                    <tr>
                                                        <x-check-box-td :value="$value" :user="$user" />


                                                        <td>
                                                            <h6 class="mb-0">{{ $value->name }}</h6>
                                                            {{-- <span> Email: {{$value->email}}</span> <br> --}}
                                                            <span>Phone: {{ $value->phone }}</span>
                                                            <span>Email: {{ $value->email }}</span>

                                                        </td>
                                                        <td>
                                                            @php
                                                                $location = json_decode($value->location);

                                                            @endphp
                                                            @if (is_array($location))
                                                                @foreach ($location as $v)
                                                                    {{ $v }} <br>
                                                                @endforeach
                                                            @else
                                                                {{ $location }}
                                                            @endif

                                                        </td>
                                                        <td>
                                                            @php
                                                                $rental_type = json_decode($value->rental_type);
                                                            @endphp


                                                            @if (is_array($rental_type))
                                                                @foreach ($rental_type as $v)
                                                                    {{ $v }} <br>
                                                                @endforeach
                                                            @else
                                                                {{ $rental_type }}
                                                            @endif

                                                        </td>

                                                        <td>{{ date('d M, Y', strtotime($value->created_at)) }}</td>
                                                        <td>


                                                            <a href="{{ route('find-room.status', $value->id) }}">


                                                                @if ($value->read == 1)
                                                                    <span style="color: green">Approved</span>
                                                                @else
                                                                    <span style="color:red;">Pending</span>
                                                                @endif

                                                            </a>
                                                            <a href="{{ route('contact-us.show', $value->id) }}">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach


                                            </tbody>
                                        </table>
                                    </form>

                                    <x-pagination :informations="$informations" />
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
