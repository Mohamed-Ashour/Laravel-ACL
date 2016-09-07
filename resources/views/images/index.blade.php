@extends('layouts.app')

@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Photo CRUD</h2>
	        </div>
	        <div class="pull-right">
	        	@permission('image-create')
	            <a class="btn btn-success" href="{{ route('images.create') }}"> Create New Photo</a>
	            @endpermission
	        </div>
	    </div>
	</div>
	@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	@endif
	<table class="table table-bordered">
		<tr>
			<th>No</th>
			<th>Photo</th>
			<th width="280px">Action</th>
		</tr>
	@foreach ($images as $key => $image)
	<tr>
		<td>{{ ++$i }}</td>
		<td><img src="/uploads/{{ $image->name }}" alt="{{ $image->name }}" height="200" style="display:block; margin:auto"/></td>
		<td>
			<a class="btn btn-info" href="{{ route('images.show',$image->id) }}">Show</a>
			@permission('image-edit')
			<a class="btn btn-primary" href="{{ route('images.edit',$image->id) }}">Edit</a>
			@endpermission
			@permission('image-delete')
			{!! Form::open(['method' => 'DELETE','route' => ['images.destroy', $image->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        	{!! Form::close() !!}
        	@endpermission
		</td>
	</tr>
	@endforeach
	</table>
	{!! $images->render() !!}
@endsection
