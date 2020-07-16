@include('partials._formValidation')
@include('partials._bootstrap_switch')
<script type="text/javascript">
    mn_selected = 'mn_area';
</script>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="required" for="input_area_name">{{trans('Tên nhà cung cấp')}}</label>
            {!! Form::text('name', $suppliers->name, array('class' => 'form-control', 'maxlength' => 100, 'id' => 'input_supplier_name', 'placeholder' => trans('Tên nhà cung cấp'))) !!} 
            @if ($errors->has('name'))
                <span class="help-block">
                    {{ $errors->first('name') }}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label class="required" for="input_area_name">{{trans('Địa chỉ 1')}}</label>
            {!! Form::text('street_1', $suppliers->street_1, array('class' => 'form-control', 'maxlength' => 100, 'id' => 'input_supplier_street_1', 'placeholder' => trans('Địa chỉ 1'))) !!} 
            @if ($errors->has('street_1'))
                <span class="help-block">
                    {{ $errors->first('street_1') }}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label class="" for="input_area_name">{{trans('Địa chỉ 2')}}</label>
            {!! Form::text('street_2', $suppliers->street_2, array('class' => 'form-control', 'maxlength' => 100, 'id' => 'input_supplier_street_2', 'placeholder' => trans('Địa chỉ 2'))) !!} 
            @if ($errors->has('street_2'))
                <span class="help-block">
                    {{ $errors->first('street_2') }}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label class="required" for="input_area_name">{{trans('Số điện thoại')}}</label>
            {!! Form::text('phone', $suppliers->phone, array('class' => 'form-control', 'maxlength' => 100, 'id' => 'input_supplier_phone', 'placeholder' => trans('Số điện thoại'))) !!} 
            @if ($errors->has('phone'))
                <span class="help-block">
                    {{ $errors->first('phone') }}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label class="required" for="input_area_name">{{trans('Email')}}</label>
            {!! Form::email('email', $suppliers->email, array('class' => 'form-control', 'maxlength' => 100, 'id' => 'input_supplier_email', 'placeholder' => trans('Email'))) !!} 
            @if ($errors->has('email'))
                <span class="help-block">
                    {{ $errors->first('email') }}
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