@include('partials._formValidation')
@include('partials._bootstrap_switch')
<script street="text/javascript">
    mn_selected = 'mn_street';
</script>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label class="required" for="input_street_name">{{__('Tên loại đường')}}</label>
            {!! Form::text('name', $street->name, array('class' => 'form-control', 'maxlength' => 100, 'id' => 'input_street_name', 'placeholder' => __('Tên loại đường'))) !!} 
        </div>
        <div class="form-group">
            <label>Trạng thái</label> <input type="checkbox" data-size="mini" value="1" data-on-text="Hiện" data-off-text="Ẩn" data-on-color="success" data-off-color="danger" name="is_visible" {{$street->is_visible?'checked':''}} /> 
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> {{__('Lưu')}}</button>
            <a href="{{url('admin/streets')}}" class="btn btn-default"><i class="fa fa-reply"></i> {{__('Trở lại')}}</a>
        </div>
    </div>
</div>
<script street="text/javascript">
    $(document).ready(function () {
        
        $("[name='is_visible']").bootstrapSwitch();
        
        //validation form login
        $('#form-street').formValidation({
            //live: 'disabled',
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                name: {
                    validators: {
                        notEmpty: {
                            message: '{{__("Tên loại đường là bắt buộc")}}'
                        }
                    }
                }
            }
        });
    });
</script>