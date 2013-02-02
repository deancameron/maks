@layout('layouts.default')
@section('content')
    <h2 class="inline">expenses</h2>
    <span class='tiny_link'>{{ HTML::link('expenses/new/', 'create expense') }}</span>
    <table class="table table-striped table-condensed">
        <thead>
            <tr>
                <th>expense</th>
                <th>amount</th>
                <th>date</th>
                <th>type</th>
                <th>vendor</th>                         
            </tr>
        </thead> 
        <tbody>
    @if (count($expenses) > 0)
        @foreach($expenses as $expense)
            <tr>
                <td>{{ $expense->name }} </td>
                <td>{{ $expense->amount }}</td>
                <td>{{ $expense->date }}</td>
                <td>{{ $expense->vendor()->first()->name }}</td>
                <td><?php if ($expense->types()) {
                    foreach ($expense->types()->get() as $type) {
                                echo $type->name .', ';
                            }        
                } ?>
                </td>
            </tr>
            
        @endforeach
    @else
        <tr>
            <td colspan="5">no expenses? what the...</td>
        </tr>
    @endif
            </tbody>
    </table>

 @endsection