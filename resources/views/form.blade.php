@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">Create form</div>

					<div class="panel-body">
						<form class="form-horizontal" id="simple_form" role="form" method="POST" action="{{ route('form.store') }}">
							{{ csrf_field() }}

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
			$("#new_custom_field").click(function () {
				$("#custom_fields").append(
						'<div class="key_value_group">' +
						'<div class="form-group">' +
						'<label for="key" class="col-md-4 control-label">Key</label>' +
						'<div class="col-md-6">' +
						'<input id="key" type="text" class="form-control" name="key[]">' +
						'</div>' +
						'</div>' +
						'<div class="form-group">' +
						'<label for="value" class="col-md-4 control-label">Value</label>' +
						'<div class="col-md-6">' +
						'<input id="value" type="text" class="form-control" name="value[]">' +
						'</div>' +
						'</div>' +
						'</div>' +
						'<hr />'
				);
			});
		});
	</script>
@endsection
