@include('partials._formValidation')
@include('partials._bootstrap_switch')
<script type="text/javascript">
    mn_selected = 'mn_area';
</script>
<div class="row">
    <div class="col-sm-5">
        <div class="form-group">
            <label class="required" for="input_area_name">{{trans('Tên sản phẩm mới')}}</label>
            {!! Form::text('name', $area->name, ['class' => 'form-control', 'maxlength' => 100,  'placeholder' => trans('Tên Sản Phẩm')]) !!} 
            @if ($errors->has('name'))
                <span class="help-block">
                    {{ $errors->first('name') }}
                </span>
            @endif
        </div>
        
        <div class="form-group">
            <label class="required" for="input_area_name">{{trans('Loại sản phẩm')}}</label>
            <select name="category" class="form-control" placeholder="trans('Loại sản phẩm')">
                @foreach($category as $categorys)
                    <option value="{{$categorys->id}}">{{$categorys->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label class="required" for="input_area_name">{{trans('Nhà cung cấp')}}</label>
            <select name="category" class="form-control" placeholder="trans('Nhà cung cấp')">
                @foreach($supplier as $suppliers)
                    <option value="{{$suppliers->id}}">{{$suppliers->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label class="required" for="input_area_name">{{trans('Giá Tiền')}}</label>
            {!! Form::text('price', $area->price, ['class' => 'form-control', 'maxlength' => 100,  'placeholder' => trans('Nội Dung')]) !!} 
            @if ($errors->has('price'))
                <span class="help-block">
                    {{ $errors->first('price') }}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label class="required" for="input_area_name">{{trans('Hình ảnh')}}</label>
            {!! Form::file('image', ['class' => 'form-control', 'maxlength' => 100,  'placeholder' => trans('Nội Dung')]) !!} 
            @if ($errors->has('image'))
                <span class="help-block">
                    {{ $errors->first('image') }}
                </span>
            @endif
        </div>

        
        <!-- <div class="form-group">
            <label>Trạng thái</label> <input type="checkbox" data-size="mini" value="1" data-on-text="Hiện" data-off-text="Ẩn" data-on-color="success" data-off-color="danger" name="is_visible"  /> 
        </div> -->
        <div class="form-group">
            <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> {{trans('Lưu')}}</button>
            <a href="{{url('admin/slide')}}" class="btn btn-default"><i class="fa fa-reply"></i> {{trans('Trở lại')}}</a>
        </div>
    </div>
    <div class="col-sm-7">
        <!-- quick email widget -->
        <div class="form-group">
            <label  for="input_area_name">{{trans('Chi tiết')}}</label>
            <div class="box box-info">
                <div class="box-body">
                    <form action="#" method="post">
                        <div>

                            <textarea name="detail" class="ckeditor" id="ckeditor" placeholder="Message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $area->detail }}</textarea>
                        </div>
                    </form>
                </div>
            </div>
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