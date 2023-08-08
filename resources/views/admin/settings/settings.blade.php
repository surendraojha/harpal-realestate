 @extends('admin.layouts.main')

 @section('title')
     Settings
 @endsection

 @section('content')
     <div id="main-content">
         <div class="container-fluid">
             <div class="block-header">
                 <div class="row clearfix">
                     <div class="col-md-6 col-sm-12">
                         <h2>Settings</h2>
                     </div>

                 </div>
             </div>

             <div class="row clearfix">

                 <div class="col-xl-8 col-lg-8 col-md-7">
                     <form action="{{ route('settings.update') }}" method="post" enctype="multipart/form-data">

                         <div class="card">

                             <div class="body">

                                 @csrf
                                 <div class="row clearfix">
                                     <div class="col-lg-6 col-md-12">
                                         <div class="form-group">
                                             <div class="input-group">
                                                 <div class="input-group-prepend">
                                                     <span class="input-group-text">Company Name
                                                     </span>
                                                 </div>
                                                 <input type="text" class="form-control" name="company_name"
                                                     value="{{ old('company_name', @$setting->company_name) }}"
                                                     placeholder="Company's Name *" required>
                                             </div>
                                         </div>
                                     </div>



                                     <!-- email -->
                                     <div class="col-lg-6 col-md-12">
                                         <div class="form-group">
                                             <div class="input-group">
                                                 <div class="input-group-prepend">
                                                     <span class="input-group-text">Email</span>
                                                 </div>
                                                 <input type="email" class="form-control" name="email"
                                                     value="{{ old('email', @$setting->email) }}" placeholder="Email"
                                                     required>
                                             </div>
                                         </div>
                                     </div>



                                     <!-- Phone -->
                                     <div class="col-lg-6 col-md-12">
                                         <div class="form-group">
                                             <div class="input-group">
                                                 <div class="input-group-prepend">
                                                     <span class="input-group-text">Phone</span>
                                                 </div>
                                                 <input type="text" class="form-control" name="phone"
                                                     value="{{ old('phone', @$setting->phone) }}" placeholder="Phone"
                                                     required>
                                             </div>
                                         </div>
                                     </div>

                                     <!-- Whatsapp -->
                                     <div class="col-lg-6 col-md-12">
                                         <div class="form-group">
                                             <div class="input-group">
                                                 <div class="input-group-prepend">
                                                     <span class="input-group-text">Mobile/Whatsapp</span>
                                                 </div>
                                                 <input type="text" class="form-control" name="mobile"
                                                     value="{{ old('mobile', @$setting->mobile) }}"
                                                     placeholder="Mobile/Whatsapp">
                                             </div>
                                         </div>
                                     </div>











                                     <!-- CompanyId -->
                                     <div class="col-lg-6 col-md-12">
                                         <div class="form-group">
                                             <div class="input-group">
                                                 <div class="input-group-prepend">
                                                     <span class="input-group-text">Tagline</span>
                                                 </div>
                                                 <textarea name="tagline" class="form-control">{{ old('tagline', @$setting->tagline) }}</textarea>

                                             </div>
                                         </div>
                                     </div>



                                      <!-- CompanyId -->
                                      <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Pre Footer Text</span>
                                                </div>
                                                <textarea name="choose_property_text" class="form-control ckeditor">{{ old('choose_property_text', @$setting->choose_property_text) }}</textarea>

                                            </div>
                                        </div>
                                    </div>

                                      <!-- CompanyId -->
                                      <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Vendor Welcome Text</span>
                                                </div>
                                                <textarea name="vendor_dashboard_content"
                                                 class="form-control ckeditor">{{ old('vendor_dashboard_content', @$setting->vendor_dashboard_content) }}</textarea>

                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Featured Property Label</span>
                                                </div>
                                                <input type="text" name="featured_term" class="form-control" value="{{ old('featured_term', @$setting->featured_term) }}">

                                            </div>
                                        </div>
                                    </div>


                                     <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Recommended Propery Label</span>
                                                </div>
                                                <input type="text" name="recommended_term" class="form-control" value="{{ old('recommended_term', @$setting->recommended_term) }}">

                                            </div>
                                        </div>
                                    </div>

                                     <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">New Delas Label</span>
                                                </div>
                                                <input type="text" name="new_deals_term" class="form-control" value="{{ old('new_deals_term', @$setting->new_deals_term) }}">

                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Ad Video</span>
                                                </div>
                                                <input type="text" name="ad_video" class="form-control" value="{{ old('ad_video', @$setting->ad_video) }}">

                                            </div>
                                        </div>
                                    </div>


                                     <!-- facebook -->
                                     <div class="col-lg-6 col-md-12">
                                         <div class="form-group">
                                             <div class="input-group">
                                                 <div class="input-group-prepend">
                                                     <span class="input-group-text">Facebook</span>
                                                 </div>
                                                 <input type="text" class="form-control" name="facebook"
                                                     value="{{ old('facebook', @$setting->facebook) }}"
                                                     placeholder="Facebook" required>
                                             </div>
                                         </div>
                                     </div>

                                     <!-- twitter -->
                                     <div class="col-lg-6 col-md-12">
                                         <div class="form-group">
                                             <div class="input-group">
                                                 <div class="input-group-prepend">
                                                     <span class="input-group-text">Twitter</span>
                                                 </div>
                                                 <input type="text" class="form-control" name="twitter"
                                                     value="{{ old('twitter', @$setting->twitter) }}" placeholder="Twitter"
                                                     required>
                                             </div>
                                         </div>
                                     </div>

                                     {{-- youtube --}}
                                     <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Youtube</span>
                                                </div>
                                                <input type="text" class="form-control" name="youtube"
                                                    value="{{ old('youtube', @$setting->youtube) }}" placeholder="Youtube"
                                                    required>
                                            </div>
                                        </div>
                                    </div>

                                     <!-- instagram -->

                                     <div class="col-lg-6 col-md-12">
                                         <div class="form-group">
                                             <div class="input-group">
                                                 <div class="input-group-prepend">
                                                     <span class="input-group-text">Instagram</span>
                                                 </div>
                                                 <input type="text" class="form-control" name="instagram"
                                                     value="{{ old('instagram', @$setting->instagram) }}"
                                                     placeholder="Instagram" required>
                                             </div>
                                         </div>
                                     </div>


                                     <div class="col-lg-6 col-md-12">
                                         <div class="form-group">
                                             <div class="input-group">
                                                 <div class="input-group-prepend">
                                                     <span class="input-group-text">Tiktok</span>
                                                 </div>
                                                 <input type="text" class="form-control" name="tiktok"
                                                     value="{{ old('tiktok', @$setting->tiktok) }}" placeholder="Tiktok"
                                                     required>
                                             </div>
                                         </div>
                                     </div>

                                     {{-- linkedin --}}

                                     <div class="col-lg-6 col-md-12">
                                         <div class="form-group">
                                             <div class="input-group">
                                                 <div class="input-group-prepend">
                                                     <span class="input-group-text">LinkedIn</span>
                                                 </div>
                                                 <input type="text" class="form-control" name="linkedin"
                                                     value="{{ old('linkedin', @$setting->linkedin) }}"
                                                     placeholder="LinkedIn" required>
                                             </div>
                                         </div>
                                     </div>


                                     <!-- address -->

                                     <div class="col-lg-12 col-md-12">
                                         <div class="input-group">
                                             <div class="input-group-prepend">
                                                 <span class="input-group-text">Address </span>
                                             </div>
                                         </div>
                                         <div class="form-group">

                                             <textarea rows="4" name="address" type="text" class='form-control'
                                                 placeholder="Adress *">{{ old('address', @$setting->address) }}</textarea>
                                         </div>
                                     </div>
                                     <div class="col-lg-12 col-md-12">



                                     <iframe width="100%" height="150" frameborder="0" style="border:0" allowfullscreen
                                     src="https://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=
                                        {{ str_replace(',', '', str_replace(' ', '+', @$setting->address)) }}&z=14&output=embed">
                                 </iframe>

                                     </div>

                                 </div>
                                 <button type="submit" class="btn btn-round btn-primary">Update</button> &nbsp;&nbsp;
                                 <a href="{{ route('settings.index') }}" class="btn btn-round btn-default">Close</a>

                                 <!-- session messages -->
                             </div>
                         </div>
                 </div>

                 <div class="col-xl-4 col-lg-4 col-md-5">

                     <div class="card">
                         <div class="body">

                             <p>Official Logo
                             </p>

                             <div>
                                 <img  height="75px" style="object-fit: contain"
                                     src="{{ asset('uploads') . '/' . @$setting->company_logo }}" alt="">
                             </div>




                             {{-- file upload code --}}
                             <br>
                             <div class="input-group mb-3">
                                 <div class="input-group-prepend">
                                     {{-- <span class="input-group-text">Upload</span> --}}
                                 </div>
                                 <div class="custom-file">
                                     <input type="file" accept="image/*" name="company_logo" class="custom-file-input"
                                         id="inputGroupFile01">
                                     <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                 </div>
                             </div>
                             <hr>




                             <p>Favicon
                             </p>

                             <div>
                                 <img  height="50px" style="object-fit: contain"
                                     src="{{ asset('uploads') . '/' . @$setting->favicon }}" alt="">
                             </div>




                             {{-- file upload code --}}
                             <br>
                             <div class="input-group mb-3">
                                 <div class="input-group-prepend">
                                     {{-- <span class="input-group-text">Upload</span> --}}
                                 </div>
                                 <div class="custom-file">
                                     <input type="file" accept="image/*" name="favicon" class="custom-file-input"
                                         id="inputGroupFile01">
                                     <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                 </div>
                             </div>



                             <p>Banner
                            </p>

                            <div>
                                <img  height="100px" style="object-fit: contain"
                                    src="{{ asset('uploads') . '/' . @$setting->banner }}" alt="">
                            </div>




                            {{-- file upload code --}}
                            <br>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    {{-- <span class="input-group-text">Upload</span> --}}
                                </div>
                                <div class="custom-file">
                                    <input type="file" accept="image/*" name="banner" class="custom-file-input"
                                        id="inputGroupFile01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>


                            <p>QR Code
                            </p>

                            <div>
                                <img  height="75px" style="object-fit: contain"
                                    src="{{ asset('uploads') . '/' . @$setting->qr_code }}" alt="">
                            </div>




                            {{-- file upload code --}}
                            <br>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    {{-- <span class="input-group-text">Upload</span> --}}
                                </div>
                                <div class="custom-file">
                                    <input type="file" accept="image/*" name="qr_code" class="custom-file-input"
                                        id="inputGroupFile01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>
                            <hr>


                         </div>
                     </div>

                     </form>

                 </div>


             </div>

         </div>
     </div>

     <!-- include jquery -->

     <script>
         // select2 for branch

         // $(document).ready(function() {
         //     $('.date').select2({
         //         placeholder: "Select Date",
         //         theme: "material",
         //         allowClear: true
         //     });


         // });
     </script>
 @endsection
