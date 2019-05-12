@extends('layouts.app')

@push('scripts')
   <script src="{{ asset('js/profile.js') }}" defer ></script>
@endpush

@push('stylesheets')
   <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
               
                	<div class="tab">
					  <button class="tablinks" onclick="openTab(event,'personal')">
					  		Personal
					  </button>
					  <button class="tablinks" onclick="openTab(event,'company')">Company</button>
					</div>
               

                

					<!-- Tab content -->
					<div id="personal" class="tabcontent active">
					  <p>Name: {{ $user->name }}</p>
					  <p>Email: {{ $user->email }}</p>
					</div>

					<div id="company" class="tabcontent">
					  <p>Name         : {{ $company->name }}</p> 
					  <p>Contact No.  : {{ $company->contactNum }}
					  <p>Address      : {{ $company->address }}
					  @if($company->logo == null)
					  <br/><br/>
					  <!-- Trigger the modal with a button -->
  						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add Logo</button>
					  
					  @else
					  
					  <p>Logo         : <img src="{{$company->logo }}"/> </p>
					  
					  @endif
					</div>

					 <!-- Modal -->
					  <div class="modal fade" id="myModal" role="dialog">
					    <div class="modal-dialog">
					    
					      <!-- Modal content-->
					      <div class="modal-content">
					        <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Upload Logo</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					        </div>
					        <div class="modal-body">
					        	<form method="post" action="/addLogo" enctype="multipart/form-data">
					        	@csrf
						         	 <div class="form-group row">
		                            	<label for="logo" class="col-md-4 col-form-label text-md-right">{{ __('Logo') }}</label>

			                            <div class="col-md-6">
			                                <input id="logo" type="file" class="form-control{{ $errors->has('logo') ? ' is-invalid' : '' }}" name="logo" value="{{ old('logo') }}" required autofocus>

			                                @if ($errors->has('logo'))
			                                    <span class="invalid-feedback" role="alert">
			                                        <strong>{{ $errors->first('logo') }}</strong>
			                                    </span>
			                                @endif
			                            </div>
		                        	</div>
		                        	 <button type="submit" class="btn btn-primary">Upload</button>
	                       		</form>
					        </div>
					        {{-- <div class="modal-footer">
					          <button type="submit" class="btn btn-primary">Upload</button>
					        </div> --}}
					      </div>
					      
					    </div>
					  </div>

               

            </div>
        </div>
    </div>
</div>
@endsection