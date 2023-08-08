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

                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4> Title:   {{$information->comment}}</h4>
                                            @if($information->property)
                                            <h5>Propery Name: {{$information->property->title}}</h5>
                                            @endif
                                        </div>


                                        @foreach ($informations as $value)

                                        @if($value->user)
                                            <div class="col-md-12">

                                                <p>
                                                <img height="30px" style="border-radius: 30px;" src="{{asset('uploads/'.@$value->user->profile->photo)}}" alt="">
                                                   <strong>{{$value->user->name}}</strong>


                                                        {{$value->comment}}

                                                </p>

                                                @if($user->role!='editor')
                                                <form action="{{route('support-forum.destroy',$value->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button onclick="return confirm('Are You Sure You Want To Delete This Comment?')" class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>


                                                </form>
                                                @endif

                                            </div>

                                            @endif
                                        @endforeach


                                        <div class="col-md-12">

                                            <form action="{{route('support-forum.store')}}" method="post">
                                                @csrf

                                                <input type="hidden" name="parent" value="{{$information->id}}">
                                            <label for="comment">Add Your Comment</label>
                                            <textarea id="comment" name="comment" class="form-control">{{old('comment')}}</textarea>

                                                <button type="submit" class="btn btn-success">Reply</button>
                                        </form>
                                        </div>
                                    </div>
                                </div>

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
