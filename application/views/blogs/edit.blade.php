<div class="span16">
	<ul class="breadcrumb span6">
		<li>
			<a href="{{URL::to('blogs')}}">Blogs</a> <span class="divider">/</span>
		</li>
		<li class="active">Editing Blog</li>
	</ul>
</div>

{{Form::open(null, 'post', array('class' => 'form-stacked span16'))}}
	<fieldset>
		<div class="clearfix">
			{{Form::label('title', 'Title')}}

			<div class="input">
				{{Form::textarea('title', Input::old('title', $blog->title), array('class' => 'span10'))}}
			</div>
		</div>
		<div class="clearfix">
			{{Form::label('content', 'Content')}}

			<div class="input">
				{{Form::textarea('content', Input::old('content', $blog->content), array('class' => 'span10'))}}
			</div>
		</div>
		<div class="clearfix">
			{{Form::label('urlslug', 'Urlslug')}}

			<div class="input">
				{{Form::text('urlslug', Input::old('urlslug', $blog->urlslug), array('class' => 'span6'))}}
			</div>
		</div>

		<div class="actions">
			{{Form::submit('Save', array('class' => 'btn primary'))}}

			or <a href="{{URL::to(Request::referrer())}}">Cancel</a>
		</div>
	</fieldset>
{{Form::close()}}