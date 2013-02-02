<div id="addVendor" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 id="myModalLabel">Enter A New Vendor</h3>
    </div>
    <div class="modal-body">
    {{ Form::open('vendors', 'POST', array('id' => 'vendorForm')) }}
            <label for="name">name</label>
            <input id="vendorName" name="name" type="text">
            <br>

            <input id="vendorBtn" type="submit" value="do it">
    </div>
    <script type="text/javascript">

       /* $('#vendorBtn').click(function(e){
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: '{{ URL::to("vendors") }}',
                data: $('#vendorName').val(),
                success: success
            })
            return false;
        })

        function success(){
            alert('Vendor saved');
            $('#addVendor').modal('hide')
        }*/

    </script>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">close</button>
        <button class="btn btn-primary" type="submit">add vendor</button>
    </div>
    {{ Form::close() }}
</div>