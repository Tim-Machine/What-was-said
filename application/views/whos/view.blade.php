<div class="span16">
	<ul class="breadcrumb span6">
		<li>
			<a href="{{URL::to('whos')}}">Whos</a> <span class="divider">/</span>
		</li>
		<li class="active">Viewing Who</li>
	</ul>
</div>

<div class="span16">
<p>
	<strong>Name:</strong>
	{{$who->name}}
</p>

<p><a href="{{URL::to('whos/edit/'.$who->id)}}" class="btn">Edit</a> <a href="{{URL::to('whos/delete/'.$who->id)}}" class="btn danger" onclick="return confirm('Are you sure?')">Delete</a></p>
