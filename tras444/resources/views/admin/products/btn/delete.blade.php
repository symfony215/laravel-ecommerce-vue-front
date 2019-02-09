<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#del_admin{{ $id }}"><i class="fa fa-trash"></i></button>

<!-- Modal -->
<div id="del_admin{{ $id }}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{ trans('admin.delete') }}</h4>
      </div>
      {!! Form::open(['route'=>['products.destroy',$id],'method'=>'delete']) !!}
 
      {!! Form::close() !!}
    </div>

  </div>
</div>
