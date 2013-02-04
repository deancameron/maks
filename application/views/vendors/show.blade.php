@layout('layouts.default')
@section('content')
    <h2 class="inline">vendors</h2>
    <span class='tiny_link'><a href="#addVendor"  data-toggle="modal">add vendor name</a></span>
    <table class="table table-striped table-condensed">
        <thead>
            <tr>
                <th>vendor</th>                      
            </tr>
        </thead> 
        <tbody>
@if (count($vendors) > 0)
    @foreach($vendors as $vendor)
        <tr>
            <td>{{ $vendor->name }} </td>
        </tr>
        
    @endforeach
    @else
    <tr>
        <td>no vendors? what the...?</td>
    </tr>
    @endif
            </tbody>
    </table>
    {{ render('partials.vendormodal') }}
 @endsection