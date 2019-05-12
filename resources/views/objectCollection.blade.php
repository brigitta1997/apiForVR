@extends('layouts.app')

@push('scripts')
   <script src="{{ asset('js/objectCollection.js') }}" defer ></script>
@endpush

@push('stylesheets')
   <link href="{{ asset('css/objectCollection.css') }}" rel="stylesheet">
@endpush

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        	<div class="row">
	        	@foreach($objs as $obj)

	        	<div class="col-md-2 obj">
	        		<img src="{{$obj->obj2dl}}" data-id="{{$obj->id}}" onClick="objClick()"/>
	        	</div>
	        	@endforeach
	        	<div class="col-md-2 obj">
	        		<img src="https://s3-ap-southeast-1.amazonaws.com/fypprojectstoragevr/icon/add.png" 
	        		id="add_img" class="add_img" onClick="window.location='{{ url("/createobject") }}'"/>
	        	</div>
        	</div>
        </div>
    </div>
</div>

@endsection