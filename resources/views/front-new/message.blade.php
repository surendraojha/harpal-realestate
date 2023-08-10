@extends('front-new.layouts.main')

@section('content')
<div class="contact-body">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-7 col-lg-8 contact-left">
          <h4>Send Us a Message</h4>
          <form action="{{route('front.contact-us')}}" method="post">
            @csrf
            <div class="row">
              <div class="col-md-12">
                <div class="md-form">
                    @php
                        $attributes = [
                           'type'=>'text',
                           'name'=>'name',
                           'class'=>'form-control',
                           'placeholder'=>'Your Name',
                           'required'=>true
                        ]
                    @endphp

                    <x-textbox :information="$attributes" />

                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="md-form">
                    @php
                    $attributes = [
                       'type'=>'email',
                       'name'=>'email',
                       'class'=>'form-control',
                       'placeholder'=>'Your email',
                       'required'=>true
                    ]
                @endphp

                <x-textbox :information="$attributes" />

                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="md-form">
                    @php
                    $attributes = [
                       'type'=>'number',
                       'name'=>'phone',
                       'class'=>'form-control',
                       'placeholder'=>'Phone no',
                       'required'=>true
                    ]
                @endphp

                <x-textbox :information="$attributes" />
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="md-form">

                    @php
                    $attributes = [
                       'type'=>'text',
                       'name'=>'contact_for',
                       'class'=>'form-control',
                       'placeholder'=>'Subject',
                       'required'=>true
                    ]
                @endphp

                <x-textbox :information="$attributes" />


                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="md-form">
                  <textarea type="text" name="message" placeholder="Your message">{{ old('message') }}</textarea>
                </div>
              </div>
              <div class="col-12 col-sm-12">
                <button type="submit" class="btn btn-primary">Send</button>
                {{-- <a class="btn btn-primary">Send</a> --}}
              </div>
            </div>
          </form>
        </div>
        <div class="col-12 col-sm-12 col-md-5 col-lg-4">
          <h4>Get in Touch</h4>
          <p><i class="fa fa-phone"></i> {{ $setting->phone }}</p>
          <p><i class="fa fa-envelope"></i> {{ $setting->email }}</p>
          <p><i class="fa fa-map-marker"></i> {{ $setting->address }}</p>
          <p><i class="fa fa-globe"></i> {{ request()->getHttpHost() }}</p>
        </div>
      </div>
    </div>
  </div>

@endsection
