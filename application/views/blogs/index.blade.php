@if(count($blogs) == 0)
	<p>No blogs.</p>
@else
	<table>
		<thead>
			<tr>
				<th>Title</th>
				<th>Content</th>
				<th>Urlslug</th>
				<th></th>
			</tr>
		</thead>

		<tbody>
			@foreach($blogs as $blog)
				<tr>
					<td>{{$blog->title}}</td>
					<td>{{$blog->content}}</td>
					<td>{{$blog->urlslug}}</td>
					<td>
						<a href="{{URL::to('blogs/view/'.$blog->id)}}" class="btn">View</a>
						<a href="{{URL::to('blogs/edit/'.$blog->id)}}" class="btn">Edit</a>
						<a href="{{URL::to('blogs/delete/'.$blog->id)}}" class="btn danger" onclick="return confirm('Are you sure?')">Delete</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endif

<p><a class="btn success" href="{{URL::to('blogs/create')}}">Create new Blog</a></p>