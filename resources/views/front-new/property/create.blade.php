@extends('front-new.layouts.main')

@section('content')
    <div class="propertylist-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 property-box">
                    <form method="post" action="{{ route('my-property.store') }}" enctype="multipart/form-data">
                        @csrf
                        <h2>{{ $title }}</h2>

                        @include('front-new.property.form')

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        function getSubCategory(id, child_category_id) {
            var url = "{{ route('get.sub-category') }}?id=" + id;
            var mainData;
            $.ajax({
                url: url, // Replace with your Laravel route
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $(child_category_id).append('<option value="">-- Select Sub-Category --</option>');
                    $.each(data.data, function(key, value) {
                        $(child_category_id).append('<option value="' + value.id + '">' + value
                            .title +
                            '</option>');
                    });
                }
            });



        }


        $('#main_category_id').on('change', function() {
            var id = $('#main_category_id option:selected').val();
            $('#sub_category_id').empty();

            var data = getSubCategory(id, '#sub_category_id');
            // console.log('data',data);
        });



        $('#sub_category_id').on('change', function() {
            var id = $('#sub_category_id option:selected').val();
            $('#child_category_id').empty();
            var data =  getSubCategory(id,'#child_category_id');
        });
    </script>
@endpush
