@extends('layout')

@section('content')




	<div class="row" id="app">
		
        <add-student></add-student>

        <view-student></view-student>

		
	</div>



<!--   MODAL FOR VIEW AND UPDATE DATA   -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View and Update Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	    <form>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Name</label>
		    <input type="text" class="form-control" name="name" aria-describedby="emailHelp" placeholder="Enter email">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Varsity Id</label>
		    <input type="text" class="form-control" name="v_id" aria-describedby="emailHelp" placeholder="Enter Varsity Id">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Department</label>
		    <input type="text" class="form-control" name="dept" aria-describedby="emailHelp" placeholder="Enter Department">
		  </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary">Save changes</button>
	      </div>
      </form>
    </div>
  </div>
</div>





@endsection