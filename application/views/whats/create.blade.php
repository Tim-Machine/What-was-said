<div class="span16">
	<ul class="breadcrumb span6">
		<li>
			<a href="{{URL::to('whats')}}">Whats</a> <span class="divider">/</span>
		</li>
		<li class="active">New What</li>
	</ul>
</div>

{{Form::open(null, 'post', array('class' => 'form-stacked span16'))}}
	<fieldset>
		<div class="clearfix">
			{{Form::label('who', 'Who')}}

			<div class="input">
			</div>
		</div>
		<div class="clearfix">
			{{Form::label('what', 'What')}}

			<div class="input">
				{{Form::textarea('what', Input::old('what'), array('class' => 'span10'))}}
			</div>
		</div>
		<div class="clearfix">
			{{Form::label('ment', 'Ment')}}

			<div class="input">
				{{Form::textarea('ment', Input::old('ment'), array('class' => 'span10'))}}
			</div>
		</div>
		<div class="clearfix">
			{{Form::label('active', 'Active')}}

			<div class="input">
			</div>
		</div>

		<div class="actions">
			{{Form::submit('Save', array('class' => 'btn primary'))}}

			or <a href="{{URL::to(Request::referrer())}}">Cancel</a>
		</div>
	</fieldset>
{{Form::close()}}