@extends('layouts.app')
@section('content')

<div class="container">
	<form class="form-horizontal col-md-8 col-md-offset-2" action="{{route('mail')}}" method="post">
		@if(Session::has('msg'))
		<div class="alert alert-dismissible alert-success">
		  <button type="button" class="close" data-dismiss="alert">&times;</button>
		  {{Session::get('msg')}}
		</div>
		@endif
		{{ csrf_field() }}
		<fieldset>
			<legend>Send mail</legend>
			<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
				<label for="email" class="col-md-2 control-label">E-Mail</label> 
				<div class="col-md-10">
					<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" >

					@if ($errors->has('email'))
					<span class="help-block">
						<strong>{{ $errors->first('email') }}</strong>
					</span>
					@endif
				</div>
			</div>
			<div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
				<label for="textArea" class="col-md-2 control-label">Content</label>
				<div class="col-md-10">
					<textarea class="form-control" rows="10" id="textArea" name="content"></textarea>  
					@if ($errors->has('content'))
					<span class="help-block">
						<strong>{{ $errors->first('content') }}</strong>
					</span>
					@endif
				</div>
			</div>  
			<div class="form-group"><hr>
				<div class="col-md-4 col-md-offset-8"> 
					<button type="submit" class="btn btn-primary btn-block pull-right">Send</button>
				</div>
			</div>
		</fieldset>
	</form>
</div>

@stop