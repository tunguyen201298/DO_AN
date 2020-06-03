@include('partials._formValidation')
@include('partials._bootstrap_switch')
<script type="text/javascript">
    mn_selected = 'mn_area';
</script>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="required" for="input_image_name">{{trans('Hình ảnh')}}</label>
            {!! Form::file('image', ['class' => 'form-control',  'placeholder' => trans('Hình ảnh')]) !!} 
            
        </div>
        <div class="form-group">
            <label class="required" for="input_area_name">{{trans('Tiêu đề bài viết')}}</label>
            {!! Form::text('title', $blog->title, array('class' => 'form-control', 'maxlength' => 100, 'id' => 'input_blog_title', 'placeholder' => trans('Tiêu đề bài viết'))) !!} 
            @if ($errors->has('title'))
                <span class="help-block">
                    {{ $errors->first('title') }}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label class="required" for="input_area_name">{{trans('Nội dung bài viết')}}</label>
            {!! Form::text('content', $blog->content, array('class' => 'form-control', 'maxlength' => 100, 'id' => 'input_blog_content', 'placeholder' => trans('Nội dung bài viết'))) !!} 
            @if ($errors->has('content'))
                <span class="help-block">
                    {{ $errors->first('content') }}
                </span>
            @endif
        </div>
        
       
        <div class="form-group">
            <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> {{trans('Lưu')}}</button>
            <a href="{{url('admin/supplier')}}" class="btn btn-default"><i class="fa fa-reply"></i> {{trans('Trở lại')}}</a>
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
                            message: '{{trans("Tên khu vực là bắt buộc")}}'
                        }
                    }
                }
            }
        });
    });
</script>