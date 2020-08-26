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
            <label class="required" for="input_area_name">{{trans('Chọn nhà cung cấp')}}</label>
            {!! Form::select('supplier', $supplier,trans('-- Chọn nhà cung cấp --'), array('class' => 'form-control', 'id' => 'input_supplier', 'placeholder' => $s)) !!}
            @if ($errors->has('supplier'))
                <span class="help-block">
                    {{ $errors->first('supplier') }}
                </span>
            @endif
        </div>
        
    </div>
    
</div>
<div class="row" id="addHtml">
   
    <table id="myTable" class="table table-striped order-list">
    <thead>
        <tr>
            <th class="w_400">Chọn sản phẩm</th>
            <th>Số lượng nhập</th>
            <th class="w_100">Đơn giá</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="col-sm-6">
                <select id="select2_0" class="js-example-basic-multiple form-control" name="products[0][product_id]" multiple="multiple" required>
                @if(\Request::is('admin/promotion/edit/*'))
                    @foreach($products as $item)
                        <option value="{{$item->id}}" selected="selected">{{$item->name}}</option>
                    @endforeach
                @endif
            </select>
            </td>
            <td class="col-sm-2">
                {!! Form::text('products[0][quantity]', $import_bills->quantity, array('class' => 'form-control', 'maxlength' => 100,  'placeholder' => trans('Số lương nhập vào'),'required' => 'required')) !!} 
            @if ($errors->has('quantity'))
                <span class="help-block">
                    {{ $errors->first('quantity') }}
                </span>
            @endif
            </td>
            <td class="col-sm-3">
                {!! Form::text('products[0][total]', $import_bills->total, array('class' => 'form-control', 'maxlength' => 100,  'placeholder' => trans('Giá nhập vào'),'required' => 'required')) !!} 
            @if ($errors->has('total'))
                <span class="help-block">
                    {{ $errors->first('total') }}
                </span>
            @endif
            </td>
            <td ><a class="deleteRow"></a>

            </td>
        </tr>
    </tbody>
</table>
     
</div>
 <div class="row">
    <div class="col-sm-10"></div>
        <div class="col-sm-2">
           <button id="addrow" type="button" class="btn btn-primary"><i class="fa fa-plus-square"></i> {{trans('Thêm mới')}}</button> 
        </div>
          
      </div>  
<div class="row">
    <div class="col-sm-6">
    <div class="form-group">
            <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> {{trans('Lưu')}}</button>
            <a href="{{url('admin/supplier')}}" class="btn btn-default"><i class="fa fa-reply"></i> {{trans('Trở lại')}}</a>
        </div>
        </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        var optionSelect2 = {
            minimumInputLength: 1, 
            maximumSelectionSize: 1,
          ajax: {
            url: '{{url("admin/product/search")}}',
            processResults: function (data) {
              // Transforms the top-level key of the response object from 'items' to 'results'
              return {
                results: data
              };
            }
          }
        };

        var counter = 1;
        $("#addrow").on("click", function () {
        var newRow = $("<tr>");
        var cols = "";

        cols += `<td class="col-sm-6">
                <select id="select2_${counter}" class="js-example-basic-multiple form-control" name="products[${counter}][product_id]" multiple="multiple">
                @if(\Request::is('admin/promotion/edit/*'))
                    @foreach($products as $item)
                        <option value="{{$item->id}}" selected="selected">{{$item->name}}</option>
                    @endforeach
                @endif
            </select>
            </td>
            <td>{!! Form::text('products[${counter}][quantity]', $import_bills->quantity, array('class' => 'form-control', 'maxlength' => 100,  'placeholder' => trans('Số lương nhập vào'),'required' => 'required')) !!}</td>
            <td class="col-sm-3">
                {!! Form::text('products[${counter}][total]', $import_bills->total, array('class' => 'form-control', 'maxlength' => 100,  'placeholder' => trans('Giá nhập vào'),'required' => 'required')) !!} 
            
            </td>
            <td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>`;
        newRow.append(cols);
        $("table.order-list").append(newRow);
        $(`#select2_${counter}`).select2(optionSelect2).on('select2-opening', function(e) {
            if ($(this).select2('val').length > 0) {
                e.preventDefault();
            }
        });   
        counter++;
    });



    $("table.order-list").on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove();       
        counter -= 1
    });


        $('.js-example-basic-multiple').select2(optionSelect2).on('select2-opening', function(e) {
    if ($(this).select2('val').length > 0) {
        e.preventDefault();
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
                            message: '{{trans("Tên khu vực là bắt buộc")}}'
                        }
                    }
                }
            }
        });
    });
</script>