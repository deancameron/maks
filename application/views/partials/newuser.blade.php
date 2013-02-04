@layout('layouts.default')
@section('content')

<div class="span4">
<p class="lead">Sign Up</p>
      {{ Form::open('newuser', 'POST',array('class'=>'well')); }}
    
      {{ $errors->first('name', Alert::error(":message")) }}
      {{ Form::text('name', Input::old('name'), array('class' => 'span3', 'placeholder' => 'Full Name'));}}
      {{ $errors->first('username', Alert::error(":message")) }}
      {{ Form::text('username', Input::old('username'), array('class' => 'span3', 'placeholder' => 'Username'));}}
      {{ $errors->first('password', Alert::error(":message")) }}
      {{ Form::password('password', array('class' => 'span3', 'placeholder' => 'New Password'));}}
      {{ Form::submit('Sign up', array('class'=>'btn-warning'));}}
      {{ Form::close() }}
</div>

@endsection