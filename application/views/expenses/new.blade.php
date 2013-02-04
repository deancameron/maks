@layout('layouts.default')
@section('content')
    <h2 class="inline">enter an expense</h2>
    <span class="inline">{{ HTML::link('expenses', 'show expenses') }} </span>
<!-- $vendors = Vendor::order_by('name', 'asc')->get(); -->
    {{ Form::open('expenses', 'POST') }}
    {{ Form::label('vendor ', 'vendor') }}
        <select name="vendor" class="inline">
            @foreach($vendors as $vendor)
                    <option value={{$vendor->id}}>{{ $vendor->name }}</option>
            @endforeach
        </select>
        <a href="#addVendor"  data-toggle="modal" rel="tooltip" title="enter the name of the place you went">add vendor</a>
        <p>type <a href="#addType" data-toggle="modal" rel="tooltip" title="add a type of expense">add type</a></p>
        

        <select name="type" multiple="true" class="chosen">
            
           
                @foreach($types as $type)
                    <option value={{$type->id}}>{{ $type->name }}</option>
                @endforeach
        </select>
        <br>
        {{ Form::label('name ', 'name') }}
        {{ Form::text('name')}}

        {{ Form::label('amount', 'amount') }}
        {{ Form::text('amount')}}
        <br>
        {{ Form::submit('do it') }}

    {{ Form::close() }}
        
 
    <!-- Modal -->
        {{ render('partials.vendormodal') }}
        {{ render('partials.typemodal') }}
@endsection