<div class="span16">
	<ul class="breadcrumb span6">
		<li>
			<a href="{{URL::to('whos')}}">Whos</a> <span class="divider">/</span>
		</li>
		<li class="active">New Who</li>
	</ul>
</div>

{{Form::open(null, 'post', array('class' => 'form-stacked span16'))}}
	<fieldset>
		<div class="clearfix">
			{{Form::label('name', 'Name')}}

			<div class="input">
				{{Form::textarea('name', Input::old('name'), array('class' => 'span10'))}}
			</div>
		</div>

		<div class="actions">
			{{Form::submit('Save', array('class' => 'btn primary'))}}

			or <a href="{{URL::to(Request::referrer())}}">Cancel</a>
		</div>
	</fieldset>
{{Form::close()}}