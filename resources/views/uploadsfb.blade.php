@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Upload SFB') }}</div>

                <div class="card-body">
      
                    @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <p>{{ \Session::get('success') }}</p>
                    </div><br />
                    @endif
                
                    <form method="post" action="/createSFB" enctype="multipart/form-data">
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
                            <label for="sfbFile" class="col-md-4 col-form-label text-md-right">{{ __('SFB File') }}</label>

                            <div class="col-md-6">
                                <input id="sfbFile" type="file" class="form-control{{ $errors->has('sfbFile') ? ' is-invalid' : '' }}" name="sfbFile" value="{{ old('sfbFile') }}" required autofocus>

                                @if ($errors->has('sfbFile'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('sfbFile') }}</strong>
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
  