 <div class="tabpanel">
		    <div class="container-fluid">
			    <div class="card-body">
			        @include('partials.navbar')
    <div class="flash-message">
            @if(Session::has('flash_message_delete'))
                <div class="alert alert-danger"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message_delete') !!}</em></div>
            @endif
            
             @if(Session::has('flash_message_update_data'))
                <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message_update_data') !!}</em></div>
            @endif
            
             @if(Session::has('flash_message_update_error'))
                <div class="alert alert-danger"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message_update_error') !!}</em></div>
            @endif
    </div> <!-- end .flash-message -->
    
    <div class="row header" style="text-align:center;color:red">
        <h3> Bundle Details </h3>
    </div>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Sr.No.</th>
                <th>Design Product Image</th>
                <th>Bundle Name</th>
                <th>Bundle Product Name</th>
                <th>Product Title</th>
                <th>Notes</th>
                <th>Created AT</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $counter =1; ?>
            @foreach($get_bundle as $bundle)
            <tr>
                <td><?php echo $counter; ?>.</td>
                <td><img style='width:100px;height:100px' src="{{ asset('public/images/'.$bundle->design_product_image) }}"/></td>
                <td>{{ $bundle->bundle_name }}</td>
                <td>{{ $bundle->bundle_product_name }}</td>
                <td>{{ $bundle->bundle_product_title }}</td>
                <td>{{ $bundle->notes }}</td>
                <td>{{ $bundle->created_at }}</td>    
                <td><a href='{{ url('edit-bundle/'.$bundle->id) }}' class="edit" title="Edit" data-toggle="tooltip" id=""><i class="fa fa-pencil"></i></a>
                |&nbsp;<a onclick="return confirm('Are you sure?')"  href='{{ url('delete-bundle/'.$bundle->id) }}' class="delete" title="Delete" data-toggle="tooltip" id=""><i class="fa fa-trash-o"></i></a>
                </td>
            </tr>
            <?php $counter++; ?>
            @endforeach
         
        </tbody>
        <tfoot>
            <tr>
            <th>Sr.No.</th>
            <th>Design Product Image</th>
            <th>Bundle Name</th>
            <th>Product Name</th>
            <th>Product Title</th>
            <th>Notes</th>
            <th>Created AT</th>
            <th>Action</th>
            </tr>
        </tfoot>
    </table>

</div>
</div>
</div>
<script>
    $(document).ready(function() {
$('#example').DataTable();
} );
</script>
