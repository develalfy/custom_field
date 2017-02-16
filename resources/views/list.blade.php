@extends('layouts.app')

@section('content')
	<div class="container">
		@if(Session::has('flash_message'))
			<div class="alert alert-success">{{ Session::get('flash_message') }}</div>
		@endif
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">Create form</div>

					<div class="panel-body">
						<table class="table">
							<thead>
							<tr>
								<th>Name</th>
								<th>Key</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>
							@foreach($entities as $key => $entity)
								<tr>
									<td>{{ $entity['name'] }}</td>
									<td>
										@foreach($entity['json'] as $jsonKey)
											{{ $jsonKey['key'] }},
										@endforeach
									</td>
									<td>
										<a href="#">Edit</a>
										-
										<a href="#">Delete</a>
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
@endsection

@section('script')
	<script>
		$(document).ready(function () {
			var i = 0;
			$("#new_custom_field").click(function () {
				i += 1;
				$("#custom_fields").append(
						'<div class="key_value_group">' +
						'<div class="form-group">' +
						'<label for="key" class="col-md-4 control-label">Key</label>' +
						'<div class="col-md-6">' +
						"<input id=\"key\" type=\"text\" class=\"form-control\" name=\"json[" + i + "][key]\">" +
						'</div>' +
						'</div>' +
						'<div class="form-group">' +
						'<label for="value" class="col-md-4 control-label">Value</label>' +
						'<div class="col-md-6">' +
						"<input id=\"value\" type=\"text\" class=\"form-control\" name=\"json[" + i + "][value]\">" +
						'</div>' +
						'</div>' +
						'</div>' +
						'<hr />'
				);
			});
		});
	</script>
@endsection
