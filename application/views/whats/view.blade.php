<div class="span16">
	<ul class="breadcrumb span6">
		<li>
			<a href="{{URL::to('whats')}}">Whats</a> <span class="divider">/</span>
		</li>
		<li class="active">Viewing What</li>
	</ul>
</div>

<div class="span16">
<p>
	<strong>Who:</strong>
	{{$what->who}}
</p>
<p>
	<strong>What:</strong>
	{{$what->what}}
</p>
<p>
	<strong>Ment:</strong>
	{{$what->ment}}
</p>
<p>
	<strong>Active:</strong>
	{{$what->active}}
</p>

<p><a href="{{URL::to('whats/edit/'.$what->id)}}" class="btn">Edit</a> <a href="{{URL::to('whats/delete/'.$what->id)}}" class="btn danger" onclick="return confirm('Are you sure?')">Delete</a></p>
