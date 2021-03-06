@include('partials._formValidation')
@include('partials._bootstrap_switch')
<script type="text/javascript">
    mn_selected = 'mn_area';

</script>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="required" for="input_area_name">{{ trans('Tiêu đề') }}</label>
            {!! Form::text('title', $slide->title, ['class' => 'form-control', 'maxlength' => 100, 'id' =>
            'input_slider_title', 'placeholder' => trans('Tiêu đề')]) !!}
            @if ($errors->has('title'))
                <span class="help-block">
                    {{ $errors->first('title') }}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label class="required" for="input_area_name">{{ trans('Nội dung') }}</label>
            {!! Form::text('content', $slide->content, ['class' => 'form-control', 'maxlength' => 100, 'id' =>
            'input_slide_content', 'placeholder' => trans('Nội dung')]) !!}
            @if ($errors->has('content'))
                <span class="help-block">
                    {{ $errors->first('content') }}
                </span>
            @endif
        </div>
        <div class="form-group">
            @if ($slide->is_visible == 0)
            <aside class="display-images">
                <div class="dz-details" id="image_slide">
                    <div class="dz-error-mark"><span id="remove_image">✘</span></div>
                </div>
            </aside>
            <div class="dz-preview dz-file-preview">
                {!! Form::file('image', ['class' => 'dropImages', 'id' => 'input_slide_image',
                'placeholder' => trans('Hình ảnh')]) !!}
                <p class="dz-title">Drop files here or click to upload.</p>
            </div>  
            @else
                <label class="" for="input_area_name">{{ trans('Hình ảnh') }}</label>
                <aside class="display-images">
                    <div class="dz-details" id="image_slide">
                        <div class="dz-error-mark"><span id="remove_image">✘</span></div>
                    </div>
                </aside>
                <div class="dz-preview dz-file-preview">
                    {!! Form::file('image', ['class' => 'dropImages', 'id' => 'input_slide_image',
                    'placeholder' => trans('Hình ảnh')]) !!}
                    <p class="dz-title">Drop files here or click to upload.</p>
                </div>
            @endif
            @if ($errors->has('image'))
                <span class="help-block">
                    {{ $errors->first('image') }}
                </span>
            @endif
        </div>

        <div class="form-group">
            <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> {{ trans('Lưu') }}</button>
            <a href="{{ url('admin/supplier') }}" class="btn btn-default"><i class="fa fa-reply"></i>
                {{ trans('Trở lại') }}</a>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
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
                            message: '{{ trans('
                            Tên khu vực là bắt buộc ') }}'
                        }
                    }
                }
            }
        });
        
    });

</script>
