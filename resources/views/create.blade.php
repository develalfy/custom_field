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
						<form class="form-horizontal" id="simple_form" role="form" method="POST" action="{{ route('form.store') }}">
							{{ csrf_field() }}

							<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
								<label for="name" class="col-md-4 control-label">Entity name</label>

								<div class="col-md-6">
									<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

									@if ($errors->has('name'))
										<span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
									@endif
								</div>
							</div>

							<hr />
							<hr />

							<div id="custom_fields"></div>

							<div class="form-group">
								<div class="col-md-6 col-md-offset-4" id="new_custom_field">
									<a id="new_custom_field" href="#">Add a new custom field</a>
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									<button type="submit" class="btn btn-primary">
										Save
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
						"<input id=\"key\" type=\"text\" class=\"form-control\" name=\"json["+i+"][key]\">" +
						'</div>' +
						'</div>' +
						'<div class="form-group">' +
						'<label for="value" class="col-md-4 control-label">Value</label>' +
						'<div class="col-md-6">' +
						"<input id=\"value\" type=\"text\" class=\"form-control\" name=\"json["+i+"][value]\">" +
						'</div>' +
						'</div>' +
						'</div>' +
						'<hr />'
				);
			});
		});
	</script>
@endsection
