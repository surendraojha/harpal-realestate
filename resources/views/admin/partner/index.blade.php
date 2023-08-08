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
                        <h2> {{ $module }}</h2>
                    </div>
                </div>
            </div>
            <div class="row clearfix">

                <!-- search -->
                {{-- <div class="col-12">
                <div class="card">
                    <form action="{{route('partner.index')}}" method="get">
                        <div class="body">
                            {{-- <div class="row">
                                <div class="col-lg-3 col-md-6">
                                    <div class="input-group">
                                        <input type="text"  class="form-control" name="keyword" value="{{@$keyword}}"
                                        placeholder="Type here to search  " autocomplete="off">
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6">
                                    <div class="input-group">
                                        <select name="ad_status" id="" class="form-control">
                                            <option value="">All</option>
                                            <option value="pending"
                                            {{old('ad_status',@$ad_status)=='pending'?'selected':''}}
                                            >Pending</option>
                                            <option value="active"
                                            {{old('ad_status',@$ad_status)=='active'?'selected':''}}
                                            >Active</option>
                                            <option value="expired"
                                            {{old('ad_status',@$ad_status)=='expired'?'selected':''}}

                                            >Expired / Fulfilled</option>


                                            <option value="my-properties"
                                            {{old('ad_status',@$ad_status)=='my-properties'?'selected':''}}

                                            >My Properties</option>


                                        </select>
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
            </div> --}}


                <div class="col-lg-12">
                    <div class="card">
                        <ul class="nav nav-tabs">
                            <li class="nav-item"><a class="nav-link @if (!session()->get('errors')) active show @endif"
                                    data-toggle="tab" href="#Users">{{ $module }} list
                                </a></li>
                            <li class="nav-item"><a class="nav-link @if (session()->get('errors')) active show @endif"
                                    data-toggle="tab" href="#addUser">Add {{ $module }}
                                </a></li>
                        </ul>
                        <div class="tab-content mt-0">
                            <div class="tab-pane  @if (!session()->get('errors')) active show @endif" id="Users">
                                <div class="table-responsive">
                                    <form method="post">
                                        @csrf


                                        @php
                                            $route = route('partner.delete');
                                        @endphp

                                        <x-delete-button :user="$user" :route="$route" />

                                        <table class="table table-hover table-custom spacing8" id="myTable">
                                            <thead>
                                                <tr>
                                                    <x-check-box-th :user="$user" />

                                                    <th>Logo/Photo</th>
                                                    <th>Order</th>
                                                    <th>Status</th>
                                                    <th>Created At</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($informations as $value)
                                                    <tr>
                                                        <x-check-box-td :value="$value" :user="$user" />


                                                        <td>
                                                            <img height="100px" src="{{ asset('uploads/' . $value->photo) }}"
                                                                alt="">
                                                        </td>
                                                        <td> {{ $value->order }}</td>
                                                        <td>
                                                            @if ($value->status == 1)
                                                                Active
                                                            @else
                                                                Inactive
                                                            @endif
                                                        </td>

                                                        <td>{{ date('d M, Y', strtotime($value->created_at)) }}</td>
                                                        <td>
                                                            <a href="{{ route('partner.edit', $value->id) }}"> <i
                                                                    class="icon-pencil"></i> </a>
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

                            {{-- create form --}}

                            <div class="tab-pane @if (session()->get('errors')) active show @endif" id="addUser">
                                <div class="body mt-2">

                                    {!! Form::open(['route' => 'partner.store', 'method' => 'post', 'files' => true]) !!}

                                    @csrf
                                    @include('admin.partner.form')
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Add</button>
                                        <a class="btn btn-secondary" href="{{ route('partner.index') }}">
                                            Close
                                        </a>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- @include('user::common.users.links') --}}
@endsection


@section('script')
    <script>
        getSubcategory();
        $('#category_id').on('change', function() {

            getSubcategory();

        });



        function getSubcategory() {
            var category_id = $('#category_id option:selected').val();

            // alert(category_id);
            var url = "{{ url('get-sub-category') }}/" + category_id;
            $.ajax({
                url: url,
                success: function(result) {

                    $('#sub_category_id').empty();
                    var data = result.data;

                    $('#sub_category_id').append(`<option value='' disabled selected>Select Option</option>`)

                    jQuery.each(data, function(index, itemData) {
                        $('#sub_category_id').append(
                            `<option value='${itemData.id}'>${itemData.title}</option>`)
                    });
                }
            });
        }
    </script>
@endsection
