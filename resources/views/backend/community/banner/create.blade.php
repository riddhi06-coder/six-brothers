<!doctype html>
<html lang="en">
    
<head>
    @include('components.backend.head')
</head>
	   
		@include('components.backend.header')

	    <!--start sidebar wrapper-->	
	    @include('components.backend.sidebar')
	   <!--end sidebar wrapper-->


        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h4>Add Banner Form</h4>
                </div>
                <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                    <a href="{{ route('community-banner-details.index') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Add Banner</li>
                </ol>

                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                    <div class="card-header">
                        <h4>Banner Form</h4>
                        <p class="f-m-light mt-1">Fill up your true details and submit the form.</p>
                    </div>
                    <div class="card-body">
                        <div class="vertical-main-wizard">
                        <div class="row g-3">    
                            <!-- Removed empty col div -->
                            <div class="col-12">
                            <div class="tab-content" id="wizard-tabContent">
                                <div class="tab-pane fade show active" id="wizard-contact" role="tabpanel" aria-labelledby="wizard-contact-tab">
                                <form class="row g-3 needs-validation custom-input" novalidate action="{{ route('community-banner-details.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                     <!-- Banner Heading -->
                                     <div class="col-xxl-4 col-sm-6">
                                        <label class="form-label" for="banner_heading">Banner Heading <span class="txt-danger">*</span></label>
                                        <input class="form-control" id="banner_heading" type="text" name="banner_heading" placeholder="Enter Banner Heading" value="{{ old('banner_heading') }}" required>
                                        <div class="invalid-feedback">Please enter a banner Heading.</div>
                                    </div>


                                    <!-- Banner Image Upload with Preview -->
                                    <div class="col-xxl-4 col-sm-6">
                                        <label class="form-label" for="banner_image">
                                            Upload Banner Image <span class="txt-danger">*</span>
                                        </label>
                                        <input class="form-control" id="banner_image" type="file" name="banner_image"
                                            accept="image/*" required onchange="previewImage(event)">

                                        <small class="text-secondary d-block mt-1"><b>Note: The file size should be less than 2MB.</b></small>
                                        <small class="text-secondary d-block"><b>Note: Only files in .jpg, .jpeg, .png, .webp format can be uploaded.</b></small>

                                        <!-- Image Preview BELOW input -->
                                        <div class="mt-3">
                                            <img id="imagePreview" src="#" alt="Image Preview"
                                                style="max-width: 100%; height: auto; display: none; border: 1px solid #ddd; padding: 5px;">
                                        </div>
                                    </div>

                                    <!-- Form Actions -->
                                    <div class="col-12 text-end">
                                        <a href="{{ route('community-banner-details.index') }}" class="btn btn-danger px-4">Cancel</a>
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </div>
                                </form>


                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

          </div>
        </div>
        <!-- footer start-->
        @include('components.backend.footer')
        </div>
        </div>


       
       @include('components.backend.main-js')


    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            const preview = document.getElementById("imagePreview");

            if (file) {
                const validTypes = ["image/jpeg", "image/png", "image/jpg", "image/webp"];
                
                if (!validTypes.includes(file.type)) {
                    alert("Please upload a valid image file (.jpg, .jpeg, .png, .webp).");
                    return;
                }
                
                if (file.size > 2 * 1024 * 1024) { // 2MB limit
                    alert("The file size should be less than 2MB.");
                    return;
                }

                const reader = new FileReader();

                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = "block";
                };

                reader.readAsDataURL(file);
            } else {
                preview.style.display = "none";
            }
        }
    </script>


</body>

</html>