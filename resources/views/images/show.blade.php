@extends('layouts.app')

@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2> Show Photo</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('images.index') }}"> Back</a>
	        </div>
	    </div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Photo:</strong><br>
                <img src="/uploads/{{ $image->name }}" alt="{{ $image->name }}" alt="{{ $image->name }}" style="max-width:90%;display:block; margin:auto" />
            </div>
        </div>
	</div>
@endsection
