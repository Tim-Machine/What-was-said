@if(count($whos) == 0)
	<p>No whos.</p>
@else
	<table>
		<thead>
			<tr>
				<th>Name</th>
				<th></th>
			</tr>
		</thead>

		<tbody>
			@foreach($whos as $who)
				<tr>
					<td>{{$who->name}}</td>
					<td>
						<a href="{{URL::to('whos/view/'.$who->id)}}" class="btn">View</a>
						<a href="{{URL::to('whos/edit/'.$who->id)}}" class="btn">Edit</a>
						<a href="{{URL::to('whos/delete/'.$who->id)}}" class="btn danger" onclick="return confirm('Are you sure?')">Delete</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endif

<p><a class="btn success" href="{{URL::to('whos/create')}}">Create new Who</a></p>