@include('partials._formValidation')
@include('partials._bootstrap_switch')
<script type="text/javascript">
    mn_selected = 'mn_area';
</script>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="required" for="input_area_name">{{trans('Tên người dùng')}}</label>
            {!! Form::text('name', $users->name, array('class' => 'form-control', 'maxlength' => 100, 'id' => 'input_user_name', 'placeholder' => trans('Tên người dùng'))) !!} 
            @if ($errors->has('name'))
                <span class="help-block">
                    {{ $errors->first('name') }}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label class="required" for="input_area_name">{{trans('Tên đăng nhập')}}</label>
            {!! Form::text('name', $users->username, array('class' => 'form-control', 'maxlength' => 100, 'id' => 'input_user_username', 'placeholder' => trans('Tên đăng nhập'))) !!} 
            @if ($errors->has('username'))
                <span class="help-block">
                    {{ $errors->first('username') }}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label class="required" for="input_area_name">{{trans('Email')}}</label>
            {!! Form::email('email', $users->email, array('class' => 'form-control', 'maxlength' => 100, 'id' => 'input_user_email', 'placeholder' => trans('Email'))) !!} 
            @if ($errors->has('email'))
                <span class="help-block">
                    {{ $errors->first('email') }}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label class="required" for="input_area_name">{{trans('Số điện thoại')}}</label>
            {!! Form::text('phone', $users->phone, array('class' => 'form-control', 'maxlength' => 100, 'id' => 'input_user_phone', 'placeholder' => trans('Số điện thoại'))) !!} 
            @if ($errors->has('phone'))
                <span class="help-block">
                    {{ $errors->first('phone') }}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label class="" for="input_area_name">{{trans('Địa chỉ')}}</label>
            {!! Form::text('phone', $users->address, array('class' => 'form-control', 'maxlength' => 100, 'id' => 'input_user_address', 'placeholder' => trans('Địa chỉ'))) !!} 
            @if ($errors->has('address'))
                <span class="help-block">
                    {{ $errors->first('address') }}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label class="required" for="input_area_name">{{trans('Vai trò')}}</label>
            {!! Form::select('role', ['1' => 'Quản trị viên', '2' => 'Nhân viên bán hàng', '3' => 'Nhân viên kho', '4' => 'Khách hàng'], $users->role,array('class' => 'form-control', 'id' => 'input_user_role', 'placeholder' => trans('-- Chọn vai trò --'))) !!}
            
        </div>
        
       
        <div class="form-group">
            <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> {{trans('Lưu')}}</button>
            <a href="{{url('admin/user')}}" class="btn btn-default"><i class="fa fa-reply"></i> {{trans('Trở lại')}}</a>
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