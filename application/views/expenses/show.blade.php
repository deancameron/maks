@layout('layouts.default')
@section('content')
    <h2 class="inline">expenses</h2>
    <span class='tiny_link'>{{ HTML::link('expenses/new/', 'create expense') }}</span>
    <table class="table table-striped table-condensed">
        <thead>
            <tr>
                <th>expense</th>
                <th>vendor</th>
                <th>type</th> 
                <th>date</th>
                <th>amount</th>                        
            </tr>
        </thead> 
        <tbody>
    @if (count($expenses) > 0)
        @foreach($expenses as $expense)
            <tr>
                <td>{{ $expense->name }} </td>
                <td>{{ $expense->vendor()->first()->name }}</td>

                <td>@if (count($expense->types() ) > 0 )
                        @foreach($expense->types()->get() as $type)
                            {{ $type->name }}
                        @endforeach
                    @endif
                </td>
                <td>{{ $expense->date }}</td>
                <td>{{ $expense->amount }}</td>
            </tr>
            
        @endforeach
    @else
        <tr>
            <td colspan="5">no expenses? what the...</td>
        </tr>
    @endif
            <tr>
                <td colspan="4" class="bold right">total: </td>
                <td  class="bold red">{{ $total = DB::table('expenses')->sum('amount'); }}</td>
            </tr>
            </tbody>
    </table>

 @endsection