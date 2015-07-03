<!-- Modal -->
<div class="modal modal-danger fade" id="{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="{{ $id }}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="{{ $id }}Label"><i class="fa fa-trash-o"></i> Delete item</h4>
            </div>
            {!! Form::open(['route' => [$route, $entity->id], 'method' => 'DELETE']) !!}
                <div class="modal-body">
                    Confirm delete this item?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No, Cancel</button>
                    <button type="submit" class="btn btn-outline ">Yes</button>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>