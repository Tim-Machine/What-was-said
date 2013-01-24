<div class="span16">
	<ul class="breadcrumb span6">
		<li>
			<a href="{{URL::to('blogs')}}">Blogs</a> <span class="divider">/</span>
		</li>
		<li class="active">Viewing Blog</li>
	</ul>
</div>

<div class="span16">
<p>
	<strong>Title:</strong>
	{{$blog->title}}
</p>
<p>
	<strong>Content:</strong>
	{{$blog->content}}
</p>
<p>
	<strong>Urlslug:</strong>
	{{$blog->urlslug}}
</p>

<p><a href="{{URL::to('blogs/edit/'.$blog->id)}}" class="btn">Edit</a> <a href="{{URL::to('blogs/delete/'.$blog->id)}}" class="btn danger" onclick="return confirm('Are you sure?')">Delete</a></p>
