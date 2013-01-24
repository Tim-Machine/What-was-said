@if(count($whats) == 0)
	<p>No whats.</p>
@else
	<table>
		<thead>
			<tr>
				<th>Who</th>
				<th>What</th>
				<th>Ment</th>
				<th>Active</th>
				<th></th>
			</tr>
		</thead>

		<tbody>
			@foreach($whats as $what)
				<tr>
					<td>{{$what->who}}</td>
					<td>{{$what->what}}</td>
					<td>{{$what->ment}}</td>
					<td>{{$what->active}}</td>
					<td>
						<a href="{{URL::to('whats/view/'.$what->id)}}" class="btn">View</a>
						<a href="{{URL::to('whats/edit/'.$what->id)}}" class="btn">Edit</a>
						<a href="{{URL::to('whats/delete/'.$what->id)}}" class="btn danger" onclick="return confirm('Are you sure?')">Delete</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endif

<p><a class="btn success" href="{{URL::to('whats/create')}}">Create new What</a></p>