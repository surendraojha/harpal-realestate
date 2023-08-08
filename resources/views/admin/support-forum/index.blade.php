@extends('admin.layouts.main')

@section('title')
     {{$module}}
@endsection

@section('content')
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>  {{$module}}</h2>
                </div>
            </div>
        </div>
        <div class="row clearfix">

            <div class="col-lg-12">
                <div class="card">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link @if(!session()->get('errors')) active show @endif"
                                data-toggle="tab" href="#Users">{{$module}} list
                            </a></li>

                    </ul>
                    <div class="tab-content mt-0">
                        <div class="tab-pane  @if(!session()->get('errors')) active show @endif" id="Users">
                            <div class="table-responsive">
                                <form method="post">
                                    @csrf


                                     @php
                                            $route = route('support-forum.delete');
                                        @endphp

                                        <x-delete-button :user="$user" :route="$route" />
                                    <table class="table table-hover table-custom spacing8" id="myTable">
                                        <thead>
                                            <tr>
                                        <x-check-box-th  :user="$user"/>

                                                <th>Property</th>
                                                <th>Description</th>
                                                <th>Created At</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($informations as $value)

                                            <tr>
                                        <x-check-box-td :value="$value" :user="$user"/>


                                                <td>
                                                    {{@$value->property->title}}
                                                </td>
                                                <td> {{$value->comment}}



                                                </td>


                                                <td>{{date('d M, Y',strtotime($value->created_at))}}</td>
                                                <td>
                                                    <a href="{{route('support-forum.show',$value->id)}}"> <i
                                                            class="fa fa-eye"></i> </a>
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
{{--
                        <div class="tab-pane @if(session()->get('errors'))  active show  @endif" id="addUser">
                            <div class="body mt-2">

                                {!! Form::open(['route' => 'partner.store', 'method' => 'post','files'=>true]) !!}

                                    @csrf
                                    @include('admin.partner.form')
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Add</button>
                                        <a class="btn btn-secondary" href="{{route('partner.index')}}">
                                            Close
                                        </a>
                                    </div>
                                {!! Form::close() !!}
                            </div>
                        </div> --}}
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
