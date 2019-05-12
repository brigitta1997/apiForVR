@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        	<div class="row justify-content-center">
	        	<div class="col-md-2 links">
	        		<a href="/createobject">Upload Object</a>
	        	</div>

				<div class="col-md-2 links">
					<a href="/createSFB">Upload SFB</a>
				</div>
			
			
				<div class="col-md-2">
					<a href="/lookObj"> Look at objects</a>
				</div>

				<div class="col-md-2">
					<a href="/uploadSlider"> Upload photo for slider</a>
				</div>
			</div>
		</div>
    </div>
</div>

@endsection