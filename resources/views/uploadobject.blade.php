@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Upload Furniture') }}</div>

                <div class="card-body">
      
                    @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <p>{{ \Session::get('success') }}</p>
                    </div><br />
                    @endif
                
                    <form method="post" action="/createobject" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Furniture Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ old('price') }}" required autofocus>

                                @if ($errors->has('price'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>

                            <div class="col-md-6">
                                <input id="type" type="text" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}" name="type" value="{{ old('type') }}" required autofocus>

                                @if ($errors->has('type'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="object3d" class="col-md-4 col-form-label text-md-right">{{ __('3D Object') }}</label>

                            <div class="col-md-6">
                                <input id="object3d" type="file" class="form-control{{ $errors->has('object3d') ? ' is-invalid' : '' }}" name="object3d" value="{{ old('object3d') }}" required autofocus>

                                @if ($errors->has('object3d'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('object3d') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="object2d" class="col-md-4 col-form-label text-md-right">{{ __('2D Image') }}</label>

                            <div class="col-md-6">
                                <input id="object2d" type="file" class="form-control{{ $errors->has('object2d') ? ' is-invalid' : '' }}" name="object2d" value="{{ old('object2d') }}" required autofocus>

                                @if ($errors->has('object2d'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('object2d') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Upload') }}
                                </button>
                            </div>
                        </div>

                        <!-- <p style="font-size:5vh;" align="center">3D Object</p>
                        <div class="row">
                        <div class="col-md-4"></div>
                        <div class="form-group col-md-4">
                            <input id= "object3d" type="file" name="object3d">    
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-4"></div>
                    
                        </div> -->

                        <!-- <p style="font-size:5vh;" align="center">2D Image</p>

                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="form-group col-md-4">
                                <input id= "object2d" type="file" name="object2d">    
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-md-4"></div> -->
<!--                         
                            <div class="form-group col-md-4">
                                <button type="submit" class="btn btn-success">Upload</button>
                            </div> -->
                            <!-- </div> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
  