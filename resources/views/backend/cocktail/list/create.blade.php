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
                  <h4>Add Cocktails Form</h4>
                </div>
                <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                    <a href="{{ route('cocktails.index') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Add Cocktails</li>
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
                        <h4>Cocktails Form</h4>
                        <p class="f-m-light mt-1">Fill up your true details and submit the form.</p>
                    </div>
                    <div class="card-body">
                        <div class="vertical-main-wizard">
                        <div class="row g-3">    
                            <!-- Removed empty col div -->
                            <div class="col-12">
                            <div class="tab-content" id="wizard-tabContent">
                                <div class="tab-pane fade show active" id="wizard-contact" role="tabpanel" aria-labelledby="wizard-contact-tab">
                                    <form class="row g-3 needs-validation custom-input" novalidate action="{{ route('cocktails.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <!-- Thumbnail Images -->
                                        <div class="col-6">
                                            <label class="form-label" for="thumbnail">Thumbnail Images <span class="txt-danger">*</span></label>
                                            <input type="file" class="form-control" id="thumbnail" name="thumbnail" accept="image/*" required  onchange="previewImage1(event)">
                                            <div class="invalid-feedback">Please upload a thumbnail image.</div>
                                            <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                                            <br>
                                            <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp format can be uploaded.</b></small>
                                            <img id="thumbnail-preview" src="#" alt="Image Preview" style="display: none; margin-top: 10px; max-width: 100px; max-height: 100px;">
                                        </div>


                                        <!-- Cocktail Name -->
                                        <div class="col-6">
                                            <label class="form-label" for="blog_heading">Cocktail Name <span class="txt-danger">*</span></label>
                                            <input type="text" class="form-control" id="blog_heading" name="blog_heading" placeholder="Enter Cocktail Name" value="{{ old('blog_heading') }}" required>
                                            <div class="invalid-feedback">Please enter a Cocktail Name.</div>
                                        </div>

                                        <!-- Description -->
                                        <div class="col-12">
                                            <label class="form-label" for="description">Description </label>
                                            <textarea class="form-control" id="summernote" name="description" placeholder="Enter Description" >{{ old('description') }}</textarea>
                                            <div class="invalid-feedback">Please enter a short description.</div>
                                        </div>

                                        <!-- Form Actions -->
                                        <div class="col-12 text-end">
                                            <a href="{{ route('cocktails.index') }}" class="btn btn-danger px-4">Cancel</a>
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
            // for thumbnail image preview
            function previewImage1(event) {
                const preview = document.getElementById('thumbnail-preview');
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        preview.style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                } else {
                    preview.style.display = 'none';
                }
            }
    </script>



</body>

</html>