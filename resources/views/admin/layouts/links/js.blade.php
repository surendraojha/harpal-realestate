<script src="{{asset('admin/js/libscripts.bundle.js')}}"></script>
<script src="{{asset('admin/js/vendorscripts.bundle.js')}}"></script>
<script src="{{asset('admin/js/c3.bundle.js')}}"></script>
<script src="{{asset('admin/js/mainscripts.bundle.js')}}"></script>
<script src="{{asset('admin/js/index.js')}}"></script>
<script src="{{asset('admin//bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>


{{-- job hide show --}}
<script src="{{ asset('front/assets/js/job.js') }}"></script>


{{-- add new location --}}
<script src="{{ asset('front/assets/js/main.js') }}"></script>


<!-- select 2 -->
<script src="{{asset('admin/js/select2.min.js')}}"></script>



<script src="{{ asset('admin/js/check_all.js') }}"></script>

<script src="{{ asset('admin/js/common/load_recurring.js') }}"></script>

<script src="{{ asset('admin//js/toggle.js') }}"></script>

<script src="{{ asset('admin/js/datepicker.js') }}"></script>
<script src="{{ asset('admin/js/double_submit.js') }}"></script>
<script src="{{ asset('nepali_type/nayaEN2NPinit.js') }}"></script>

{{-- event booking ajax --}}
<script src="{{ asset('front/assets/js/event-booking.js') }}"></script>


{{-- Business meeting ajax --}}
<script src="{{ asset('front/assets/js/business_meeting.js') }}"></script>



{{-- Training booking ajax --}}
<script src="{{ asset('front/assets/js/training.js') }}"></script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>


{{-- exhibitor profile --}}
<script src="{{ asset('admin//js/exhibitor.js') }}"></script>


{{-- tinymce init --}}
<script>
    tinymce.init({
        selector:'textarea.tinymce',
        width: 900,
        height: 300
    });
</script>




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
<script src="{{ asset('front/assets/js/event-booking.js') }}"></script>




<script>
    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif
</script>
