@layout('layouts.default')
@section('content')
    <h1>expenser</h1>
    <ul>
        <li>{{ HTML::link('../expenses/new', 'Enter an expense') }}</li>
        <li>add vendor types</li>
        <li>add expense types</li>
        <li>see your totals</li>
    </ul>
   
@endsection