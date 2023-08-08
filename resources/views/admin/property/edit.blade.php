@extends('admin.layouts.main')

@section('title')
Edit {{$module}}

@endsection

@section('content')
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>Edit {{$module}}
                    </h2>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#addUser">Edit
                                {{$information->title}}
                            </a></li>
                    </ul>
                    <div class="tab-content mt-0">

                        <div class="tab-pane active show" id="addUser">
                            <div class="body mt-2">
                                {!! Form::model($information,['route' => ['property.update',$information->id],
                                'method' => 'post','files'=>true]) !!}

                                @csrf
                                @method('put')
                                @include('admin.property.form')
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a class="btn btn-secondary" href="{{route('property.index')}}">
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

@endsection
@section('script')
    <script>
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


    // add photos
    var count = 0;

function addPhotos(){
    $('#add-more-photos').append(`
        <div class='mb-3' id="photo-${count}">
        <input type='file' name="photo[]" accept="image/*">

        <button class="btn btn-danger" onclick="event.preventDefault();deletePhoto('photo-'+${count})"><i class='fa fa-trash'></i></button>
        <div>
    `);

    count++;
}

function deletePhoto(id){
    $('#'+id).remove();
}

// delete photo from server

function deletePhotoServer(id,div_id){

if(confirm('Are you sure you want to delete this photo?')){
var url = "{{ url('delete-photo') }}/" + id +'/'+div_id;
$.ajax({
    url: url,
    success: function(result) {

        // $('#sub-category').empty();
        var data = result.div_id;



        // alert(data);

        if(data){
            $('#'+data).remove();
        }
        // $('#sub-category').append(`<option value='' disabled selected>Select Option</option>`)

        // jQuery.each(data, function(index, itemData) {
        //     $('#sub-category').append(
        //         `<option value='${itemData.id}'>${itemData.title}</option>`)
        // });
    }
});
}

}
function deleteVideo(id){


    if(confirm('Are you sure , you want to delete this video?')){


    var url = "{{url('iv-admin/delete-video/')}}/"+id;

    $.ajax({
                url: url,
                success: function(result) {

                    var data = result.status;

                    if(data){
                        $('#video-div').remove();
                    }

                }
            });
        }
}

    </script>
@endsection
