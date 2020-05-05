@include('partials._formValidation')
@include('partials._bootstrap_switch')
<script type="text/javascript">
    mn_selected = 'mn_price_range';
</script>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label class="required" for="input_price_range_name">{{__('Tên khoảng giá')}}</label>
            {!! Form::text('name', $priceRange->name, array('class' => 'form-control', 'maxlength' => 100, 'id' => 'input_price_range_name', 'placeholder' => __('Tên khoảng giá'))) !!} 
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="required" for="input_price_range_from">{{__('Từ')}}</label>
                    {!! Form::text('from', $priceRange->from, array('class' => 'form-control', 'maxlength' => 100, 'id' => 'input_price_range_from', 'placeholder' => __('Từ'))) !!} 
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="required" for="input_price_range_to">{{__('Đến')}}</label>
                    {!! Form::text('to', $priceRange->to, array('class' => 'form-control', 'maxlength' => 100, 'id' => 'input_price_range_to', 'placeholder' => __('Đến'))) !!} 
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Trạng thái</label> <input type="checkbox" data-size="mini" value="1" data-on-text="Hiện" data-off-text="Ẩn" data-on-color="success" data-off-color="danger" name="is_visible" {{$priceRange->is_visible?'checked':''}} /> 
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> {{__('Lưu')}}</button>
            <a href="{{url('admin/price-ranges')}}" class="btn btn-default"><i class="fa fa-reply"></i> {{__('Trở lại')}}</a>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {

        $("[name='is_visible']").bootstrapSwitch();

        //validation form login
        $('#form-price-range').formValidation({
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
                            message: '{{__("Tên khoảng giá là bắt buộc")}}'
                        }
                    }
                }
            }
        });
    });
</script>