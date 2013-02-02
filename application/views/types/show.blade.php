@layout('layouts.default')
@section('content')
    <h2 class="inline">types</h2>
    <span class='tiny_link'><a href="#addType"  data-toggle="modal">add type name</a></span>
    <table class="table table-striped table-condensed">
        <thead>
            <tr>
                <th>type</th>                      
            </tr>
        </thead> 
        <tbody>
@if (count($types) > 0)
    @foreach($types as $type)
        <tr>
            <td>{{ $type->name }} </td>
        </tr>
        
    @endforeach
    @else
    <tr>
        <td>no types? what the...?</td>
    </tr>
    @endif
            </tbody>
    </table>
    {{ render('partials.typemodal') }}
 @endsection