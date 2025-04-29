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
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">                                       
                        <svg class="stroke-icon">
                          <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                        </svg></a></li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <!-- Zero Configuration  Starts-->
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('cocktail-detail.index') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Cocktail Details</li>
                            </ol>
                        </nav>

                        <a href="{{ route('cocktail-detail.create') }}" class="btn btn-primary px-5 radius-30">+ Add Cocktails Details</a>
                    </div>


                    <div class="table-responsive custom-scrollbar">
                      <table class="display" id="basic-1">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Cocktails Title</th>
                            <th>Cocktails Image</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                           
                            @foreach ($details as $detail)
                                <tr>
                                    <td>{{ $loop->iteration }}</td> 
                                    <td>{{ $detail->blog->blog_heading }}</td>
                                    <td>
                                        @if ($detail->banner_image)
                                            <img src="{{ asset('uploads/community/' . $detail->banner_image) }}" alt="Banner Image" width="100">
                                        @else
                                            <p>No Image</p>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('cocktail-detail.edit', $detail->id) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('cocktail-detail.destroy', $detail->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this blog?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td> 
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
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

</body>

</html>