@include('partials._formValidation')
@include('partials._bootstrap_switch')
<script type="text/javascript">
    mn_selected = 'mn_area';
</script>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="required" for="input_image_name">{{trans('Hình ảnh')}}</label><br>
            @if(\Request::is('admin/blog/edit/*'))
                <img src="{{asset('storage/app/blog-post/'.$blog->image)}}" style="width: 200px">
            @endif
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
        
        
    </div>
    <div class="col-sm-12">
        <div class="form-group">
            <label class="required" for="input_area_name">{{trans('Nội dung bài viết')}}</label>
            <textarea name="content" class="ckeditor" id="ckeditor" placeholder="Message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $blog->content }}</textarea>
            @if ($errors->has('content'))
                <span class="help-block">
                    {{ $errors->first('content') }}
                </span>
            @endif
        </div>
        
       <div class="form-group">
            <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> {{trans('Lưu')}}</button>
            <a href="{{url('admin/blog')}}" class="btn btn-default"><i class="fa fa-reply"></i> {{trans('Trở lại')}}</a>
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
<script type="text/javascript" src="{{ asset('public/editor/ckeditor/ckeditor.js')}}"></script>