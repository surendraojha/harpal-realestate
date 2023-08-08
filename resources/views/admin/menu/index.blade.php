@extends('admin.layouts.main')

@section('title')
    Frontend Menus
@endsection

@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h2>Frontend Menus</h2>
                    </div>
                </div>
            </div>
            <div class="row clearfix">

                <div class="col-lg-6">
                    <div class="card">
                        <div class="header">
                            <h2>Menu </h2>
                        </div>
                        <div class="table-responsive">
                            <form method="post">
                                @csrf

                                <table class="table table-hover table-custom spacing8">
                                    <thead>
                                        <tr>
                                            <th>
                                                <label class="fancy-checkbox">
                                                    <input class="checkbox-tick" type="checkbox" id="check_all">
                                                    <span>#</span>
                                                </label>
                                            </th>
                                            <th>Title</th>
                                            <th>Parent</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($informations as $value)
                                            <tr>
                                                <td>

                                                    <label class="fancy-checkbox">
                                                        <input class="checkbox-tick checkitem" type="checkbox" name="id[]"
                                                            value="{{ $value->id }}">
                                                        <span></span>
                                                    </label>
                                                </td>


                                                <td>

                                                    {{ $value->label }}
                                                </td>
                                                <td>{{ $value->parent }}</td>

                                                <td>{{ date('d M, Y', strtotime($value->created_at)) }}</td>
                                                <td>

                                                    <a href="{{ route('menu.edit', $value->id) }}"> <i
                                                            class="icon-pencil"></i> </a>
                                                    </a>

                                                    <a href="{{ route('menu.show', $value->id . '-' . $value->depth) }}">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </form>

                            {{-- {!! $informations->render() !!} --}}
                        </div>

                    </div>





                    {{-- view --}}


                    <div class="card">

                        <div class="header">
                            <h2>Menu Structure</h2>
                        </div>
                        <div class="body">

                            {!! \App\Helpers\MenuHelper::renderMenu() !!}

                        </div>
                    </div>
                </div>



                <div class="col-lg-6">
                    <div class="card">
                        <div class="header">
                            <h2>Create Menu</h2>
                        </div>

                        <div class="body mt-2">
                            {!! Form::open(['route' => 'menu.store', 'method' => 'post', 'files' => true]) !!}

                            @csrf
                            @include('admin.menu.form')
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Add</button>
                                <a class="btn btn-secondary" href="{{ route('menu.index') }}">
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
    {{-- @include('user::common.users.links') --}}
@endsection


@section('script')
    <script>
        function checkChild(id,child_id=null,div_id) {

            // alert(id);

            var sent_id = $('#'+id+' option:selected').val();

            var url = "{{ url('iv-admin/get-submenu') }}/"+sent_id;

            $.ajax({
                url: url,
                type: 'get',
                success: function(response) {
                    // console.log(response);
                    if (response.status == 200) {
                        console.log('have child');

                        $('#'+div_id).show();

                        $('#'+child_id).empty();


                        $('#'+child_id).append(`<option value='' selected disabled>Select Option</option>`);


                        jQuery.each(response.data, function(index, itemData) {
                            $('#'+child_id).append(`<option value='${itemData.id}' >${itemData.label}</option>`);

                        });

                    } else {
                        console.log('do not have child');
                        $('#'+div_id).hide();
                    }
                }
            });
        }
    </script>
@endsection
