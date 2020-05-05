@include('partials._formValidation')
@include('partials._bootstrap_switch')
<script type="text/javascript">
    mn_selected = 'mn_project';
</script>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label class="required" for="input_project_name">{{__('Tên dự án')}}</label>
            {!! Form::text('name', $project->name, array('class' => 'form-control', 'maxlength' => 100, 'id' => 'input_project_name', 'placeholder' => __('Tên dự án'))) !!} 
        </div>
        <div class="form-group">
            <label>Trạng thái</label> <input type="checkbox" data-size="mini" value="1" data-on-text="Hiện" data-off-text="Ẩn" data-on-color="success" data-off-color="danger" name="is_visible" {{$project->is_visible?'checked':''}} /> 
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> {{__('Lưu')}}</button>
            <a href="{{url('admin/projects')}}" class="btn btn-default"><i class="fa fa-reply"></i> {{__('Trở lại')}}</a>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        
        $("[name='is_visible']").bootstrapSwitch();
        
        //validation form login
        $('#form-project').formValidation({
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
                            message: '{{__("Tên dự án là bắt buộc")}}'
                        }
                    }
                }
            }
        });
    });
</script>