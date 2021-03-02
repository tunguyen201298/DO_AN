<!-- Modal Delete -->
<div id="deleteModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            {!! Form::open(array('url' => "", 'class' => 'form-horizontal', 'id' => 'form_modal_delete')) !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">{{trans('Thông báo')}}</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" id="del_modal_id" />
                <p><i class="fa fa-exclamation-triangle red"></i> {{trans(' Bạn chắc chắn muốn xóa?')}}</p>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">{{trans('Có')}}</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('Không')}}</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>