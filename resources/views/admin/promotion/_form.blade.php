@include('partials._formValidation')
@include('partials._bootstrap_switch')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script type="text/javascript">
    mn_selected = 'mn_area';
</script>
 
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="required" for="input_area_name">{{trans('Tên khuyến mãi')}}</label>
            {!! Form::text('promotion_name', $promotions->promotion_name, array('class' => 'form-control', 'maxlength' => 100, 'id' => 'input_promotion_name', 'placeholder' => trans('Tên khuyến mãi'))) !!} 
            @if ($errors->has('promotion_name'))
                <span class="help-block">
                    {{ $errors->first('promotion_name') }}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label class="required" for="input_area_name">{{trans('Ngày bắt đầu')}}</label>
            {!! Form::text('star_date', $promotions->star_date, array('class' => 'form-control input--style-1 js-datepicker',  'id' => 'input_promotio_star_date', 'placeholder' => trans('Ngày bắt đầu'))) !!}
            @if ($errors->has('star_date'))
                <span class="help-block">
                    {{ $errors->first('star_date') }}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label class="required" for="input_area_name">{{trans('Ngày kết thúc')}}</label>
            {!! Form::text('end_date', $promotions->end_date, array('class' => 'form-control input--style-1 js-datepicker1',  'id' => 'input_promotio_end_date', 'placeholder' => trans('Ngày kết thúc'))) !!}
            @if ($errors->has('end_date'))
                <span class="help-block">
                    {{ $errors->first('end_date') }}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label class="required" for="input_area_name">{{trans('Nội dung')}}</label>
            {!! Form::text('detail', $promotions->detail, array('class' => 'form-control',  'id' => 'input_supplier_detail', 'placeholder' => trans('Nội dung'))) !!} 
            @if ($errors->has('detail'))
                <span class="help-block">
                    {{ $errors->first('detail') }}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label class="required" for="input_area_name">{{trans('Mô tả')}}</label>
            {!! Form::text('description', $promotions->description, array('class' => 'form-control',  'id' => 'input_supplier_detail', 'placeholder' => trans('Mô tả'))) !!} 
            @if ($errors->has('description'))
                <span class="help-block">
                    {{ $errors->first('description') }}
                </span>
            @endif
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> {{trans('Lưu')}}</button>
            <a href="{{url('admin/promotion')}}" class="btn btn-default"><i class="fa fa-reply"></i> {{trans('Trở lại')}}</a>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label class="required" for="input_area_name">{{trans('Chọn sản phẩm')}}</label>

            <select class="js-example-basic-multiple form-control" name="products[]" multiple="multiple">
               <option value="{{$products->id}}" selected="selected">{{$products->name}}</option>
            </select>
        </div>
    </div>
</div>

  

<script type="text/javascript">
    $(document).ready(function () {
         $('.js-example-basic-multiple').select2({
            minimumInputLength: 10,
          ajax: {
            url: '{{url("admin/product/search")}}',
            processResults: function (data) {
              // Transforms the top-level key of the response object from 'items' to 'results'
              return {
                results: data
              };
            }
          }
        });
        
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
                            message: '{{trans("Tên là bắt buộc")}}'
                        }
                    }
                }
            }
        });
    });
</script>