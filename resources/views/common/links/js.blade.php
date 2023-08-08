<script src="{{asset('admin/js/libscripts.bundle.js')}}"></script>
<script src="{{asset('admin/js/vendorscripts.bundle.js')}}"></script>
<script src="{{asset('admin/js/c3.bundle.js')}}"></script>
<script src="{{asset('admin/js/mainscripts.bundle.js')}}"></script>
<script src="{{asset('admin/js/index.js')}}"></script>
<script src="{{asset('admin//bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>


{{-- job hide show --}}
{{-- <script src="{{ asset('front/assets/js/job.js') }}"></script> --}}


{{-- add new location --}}
{{-- <script src="{{ asset('front/assets/js/main.js') }}"></script> --}}


<!-- select 2 -->
<script src="{{asset('admin/js/select2.min.js')}}"></script>



<script src="{{ asset('admin/js/check_all.js') }}"></script>


<script src="{{ asset('admin//js/toggle.js') }}"></script>

<script src="{{ asset('admin/js/datepicker.js') }}"></script>
{{-- <script src="{{ asset('admin/js/double_submit.js') }}"></script> --}}


{{-- <script src="{{asset('vendor/unisharp/laravel-ckeditor/adapters/jquery.js')}}"></script> --}}
{{--
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script src="{{ asset('ckeditor_4.16.1_full/ckeditor/config.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

<script>
  var options = {
    filebrowserImageBrowseUrl: "{{asset('laravel-filemanager?type=Images')}}",
    filebrowserImageUploadUrl: "{{asset('laravel-filemanager/upload?type=Images&_token=')}}",
    filebrowserBrowseUrl: "{{asset('laravel-filemanager?type=Files')}}",
    filebrowserUploadUrl: "{{asset('laravel-filemanager/upload?type=Files&_token=')}}"
  };

//   $('textarea').ckeditor(options);
  CKEDITOR.replace('.ckeditor', options);

</script> --}}

<script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/ckeditor.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/adapters/jquery.js"></script>
<script>

    var route_prefix = "{{asset('laravel-filemanager')}}";
  $('.ckeditor').ckeditor({
    height: 100,
    filebrowserImageBrowseUrl: route_prefix + '?type=Images',
    // filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
    // filebrowserBrowseUrl: route_prefix + '?type=Files',
    filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
  });
</script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>








<script type="text/javascript">

    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
  @endif

  </script>




<script>
    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif

    @if(Session::has('error'))
        toastr.error("{{ Session::get('error') }}");
    @endif
</script>




@yield('script')
