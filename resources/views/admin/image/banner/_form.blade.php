@include('partials._formValidation')
@include('partials._bootstrap_switch')
<script type="text/javascript">
    mn_selected = 'mn_area';
</script>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="required" for="input_image_name">{{trans('Hình ảnh')}}</label>
            {!! Form::file('name', ['class' => 'form-control',  'placeholder' => trans('Hình ảnh')]) !!} 
            
        </div>
        <div class="form-group">
            <label class="required" for="input_area_name">{{trans('Type')}}</label>
            <select name="type" class="form-control" placeholder="trans('Type')">
                <option value="logo">logo</option>
                <option value="banner">banner</option>
                <option value="slide">Slide</option>
            </select>
        </div>
       
        <div class="form-group">
            <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> {{trans('Lưu')}}</button>
            <a href="{{url('admin/img/banner')}}" class="btn btn-default"><i class="fa fa-reply"></i> {{trans('Trở lại')}}</a>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        
        $("[name='is_visible']").bootstrapSwitch();
        
        //validation form login
        $('#form-area').formValidation({
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
                            message: '{{trans("Hình ảnh là bắt buộc")}}'
                        }
                    }
                }
            }
        });
    });
</script>