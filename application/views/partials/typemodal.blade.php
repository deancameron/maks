<div id="addType" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 id="myModalLabel">Enter A New Expense Type</h3>
    </div>
    <div class="modal-body">
    {{ Form::open('types', 'POST') }}
        <label for="name">name</label>
        <input name="name" type="text">
        <br>
        <input type="submit" value="do it">
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">close</button>
        <button class="btn btn-primary" type="submit">add type</button>
    </div>
    {{ Form::close() }}
</div>