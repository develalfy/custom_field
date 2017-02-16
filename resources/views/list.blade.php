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
								<tr id="entity_row_{{$entity['id']}}">
									<td><a href="{{ route('form.show', $entity['id']) }}">{{ $entity['name'] }}</a></td>
									<td>
										@if(!empty($entity['json']))
											@foreach($entity['json'] as $jsonKey)
												{{ $jsonKey['key'] }},
											@endforeach
										@else
											Null
										@endif
									</td>
									<td>
										<a href="{{ route('form.edit', $entity['id']) }}">Edit</a> - <a href="#"
										                                                                onclick="delete_entity({{$entity['id']}})">Delete</a>
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
		function delete_entity(id) {
			$.ajax({
				url: 'form/' + id,
				type: 'DELETE',
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				success: function (result) {
					if (result == "true"){
						$("#entity_row_" + id).remove();
						alert("Deleted successfully");
					} else {
						alert("Not deleted");
					}
				}
			});
		}
	</script>
@endsection
