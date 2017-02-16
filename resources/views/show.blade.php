@extends('layouts.app')

@section('content')
	<div class="container">
		@if(Session::has('flash_message'))
			<div class="alert alert-success">{{ Session::get('flash_message') }}</div>
		@endif
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading"><a href="{{ route('form.create') }}">Create form</a></div>

					<div class="panel-body">
						<div class="text-center">
							<h1>Welcome to {{ $entity['name'] }}</h1>
							@foreach($entity['json'] as $key => $field)
								<b>{{ $field['key'] }}: </b>{{ $field['value'] }}
								<br>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
