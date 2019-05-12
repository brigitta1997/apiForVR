@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Upload Slider Image') }}</div>

                <div class="card-body">
      
                    @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <p>{{ \Session::get('success') }}</p>
                    </div><br />
                    @endif
                
                    <form method="post" action="/uploadSlider" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="objId" class="col-md-4 col-form-label text-md-right">{{ __('Furniture Id') }}</label>

                            <div class="col-md-6">
                                <input id="objId" type="text" class="form-control{{ $errors->has('objId') ? ' is-invalid' : '' }}" name="objId" value="{{ old('objId') }}" required autofocus>

                                @if ($errors->has('objId'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('objId') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="imgLink" class="col-md-4 col-form-label text-md-right">{{ __('Image File') }}</label>

                            <div class="col-md-6">
                                <input id="imgLink" type="file" class="form-control{{ $errors->has('imgLink') ? ' is-invalid' : '' }}" name="imgLink" value="{{ old('imgLink') }}" required autofocus>

                                @if ($errors->has('imgLink'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('imgLink') }}</strong>
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

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection