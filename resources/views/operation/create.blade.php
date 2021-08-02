@extends("_layout")

@section("title")
اضافة عملية جديدة
@endsection


@section("css")

<link href="/metronic-rtl/assets/global/plugins/bootstrap-toastr/toastr-rtl.min.css" rel="stylesheet" type="text/css" />
@endsection
@section("content")
<div class="row">
    <div class="col-md-12">
        
        <form method="post" action="/operation" class="ajaxForm form-horizontal">
            {{csrf_field()}}
             
        <div class="form-group">
             <label for="name" class="col-sm-2 control-label">نوع العملية</label>
                <div class="col-sm-5">
                    <select name="operation_type_id" id="operation_type_id" class="form-control">
                        <option value="">نوع العملية</option>
                        @foreach($operation_types as $c)
                            <option {{old("operation_type_id")==$c->id?"selected":""}} value="{{$c->id}}">{{$c->name}} </option>
                        @endforeach
                    </select>
                 </div>
        </div>
            <div class="form-group">
                <label for="account_id" class="col-sm-2 control-label">
                الحساب
                </label>
                <div class="col-sm-5">
                    <select name="account_id" id="account_id" class="form-control">
                        <option value="">اختر الحساب</option>                        
                    </select>
                </div>
                </div>
        <div class="form-group">
            <label for="operation_date" class="col-sm-2 control-label">تاريخ العملية</label>
                <div class="col-sm-5">
                    <input type="date" value="{{old("operation_date")}}" class="form-control" name="operation_date" id="operation_date" placeholder="تاريخ العملية">
                </div>
        </div>
        <div class="form-group">
            <label for="discount" class="col-sm-2 control-label">قيمة الخصم</label>
                <div class="col-sm-5">
                    <input type="number" value="{{old("discount")}}" class="form-control" name="discount" id="discount" placeholder="قيمة الخصم">
                </div>
        </div>
        <div class="form-group">
            <label for="description" class="col-sm-2 control-label">ملاحظات</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="description" id="description" placeholder="ملاحظات">{{old("description")}}</textarea>
                </div>
        </div>
         <div class="form-group">
            <label for="description" class="col-sm-2 control-label">الاصناف</label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <select name="item_id" id="item_id" class="form-control">
                                <option value="">اختر الصنف</option>
                                @foreach($items as $c)
                                    <option data-unit='{{$c->unit->name}}' data-sellprice='{{$c->sell_price}}' data-buyprice='{{$c->buy_price}}' value="{{$c->id}}">{{$c->name}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <input type="number" min="1" step="0.5" id="quantity" name="quantity" placeholder="الكمية" class="form-control" />
                        </div>
                        
                        <div class="col-sm-2">
                            <input readonly id="unit" placeholder="الوحدة" class="form-control" />
                        </div>
                        
                        <div class="col-sm-2">
                            <input readonly id="price" placeholder="السعر" class="form-control" />
                        </div>
                        <div class="col-sm-2">
                            <input type="number" id="unit_discount" name="unit_discount" min="0" step="0.5" placeholder="الخصم" class="form-control" />
                        </div>
                        <div class="col-sm-1">
                            <button id="btnAdd" class="btn btn-success" type="button"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                    <hr>
                    <div class="panel">
                        <div class="panel-heading">
                            الاصناف
                        </div>
                        <table class="table table-striped table-hover" id="tbl">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الصنف</th>
                                    <th>الوحدة</th>
                                    <th>سعر الوحدة</th>
                                    <th>الكمية</th>
                                    <th>المجموع</th>
                                    <th>الخصم</th>
                                    <th>الاجمالي</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                        <div class="item_id_arr"></div>
                        <div class="qty_arr"></div>
                        <div class="discount_arr"></div>
                    </div>
                </div>
        </div>
            
         <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary">أضافة</button>
                <a href="/voucher" class="btn btn-default">الغاء</a>
            </div>
          </div>
    
</form>
    </div>
</div>
@endsection

@section("js")
    <script src="/metronic-rtl/assets/global/plugins/bootstrap-toastr/toastr.min.js" type="text/javascript"></script>
    <script src="/metronic-rtl/assets/pages/scripts/ui-toastr.min.js" type="text/javascript"></script>
    <script src="/js/jquery.form.js"></script>
    <script>
        
          toastr.options = {
              "closeButton": false,
              "debug": false,
              "newestOnTop": false,
              "progressBar": false,
              "positionClass": "toast-bottom-right",
              "preventDuplicates": false,
              "onclick": null,
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
           }
           function ShowMessage(msg,color,title){			
               Command: toastr[color](msg,title);
           }
        $(function(){
            $('.ajaxForm').ajaxForm({
                success:function(json) { 
                    $("#tbl tbody").html("");
                    $(".form-control").val("");
                    ShowMessage("تمت عملية الاضافة بنجاح","success","ادارة العمليات");
                },                
				error: function(json) {
                    errorsHtml="<ul>";
                    $.each(json.responseJSON.errors, function (key, item) {  
                         errorsHtml += '<li>' + item + '</li>';
                    });
                    errorsHtml+="</ul>";
					ShowMessage(errorsHtml,"error","ادارة العمليات");
				}
            }); 
            $("#operation_type_id").change(function(){
                $("#account_id").prop("disabled",true);
                $("#account_id").children(":gt(0)").remove();
                var id=$(this).val();
                $.get("/account/by_operation_type/"+id,function(json){
                    $("#account_id").prop("disabled",false);
                    $(json.accounts).each(function(){
                        $("#account_id").append("<option value='"+this.account_id+"'>"+this.account+"</option>");
                    });
                },"json");
                $("#item_id").change();
            });
            
            $("#quantity").keypress(function(e){
                if(e.which==13){
                    $("#unit_discount").focus();
                    return false;
                }
            });
            $("#unit_discount").keypress(function(e){
                if(e.which==13){
                    $("#btnAdd").click();
                    return false;
                }
            });
            $("#item_id").change(function(){
                if($(this).val()!=""){
                    $("#unit").val($(this).children(":selected").data("unit"));
                    var ot=$("#operation_type_id").val();
                    if(ot==1 || ot==3)
                        $("#price").val($(this).children(":selected")
                                        .data("buyprice")+" $");
                    else if(ot==2 || ot==4)
                        $("#price").val($(this).children(":selected")
                                        .data("sellprice")+" $");
                    $("#quantity").focus();
                }
                else{
                    $("#unit,#price").val("");
                }
            });
            $(document).on("click",".btnDel",function(){
                $(this).closest("tr").remove();
                UpdateHiddenFields();
            });
            $(document).on("change",".error",function(){
                if($(this).val()!="")
                    $(this).removeClass("error");
            });
            $("#btnAdd").click(function(){
                var id=$("#item_id").val();
                var name=$("#item_id").children(":selected").text();
                var price=$("#price").val();
                var unit=$("#unit").val();
                var quantity=$("#quantity").val();
                var discount=0;
                if($("#unit_discount").val()!="")
                   discount=parseFloat($("#unit_discount").val());
                var price_num=parseFloat(price.split(' ')[0]);
                var total=quantity*price_num;
                var final=total-discount;
                var error=false;
                
                if($("#operation_type_id").val()==""){
                    if(!error)
                        $("#operation_type_id").focus();
                    $("#operation_type_id").addClass("error");
                    error=true; 
                }
                if(id==""){
                    if(!error)
                        $("#item_id").focus();
                    $("#item_id").addClass("error");
                    error=true; 
                }
                if(quantity<=0){
                    if(!error)
                        $("#quantity").focus();
                    $("#quantity").addClass("error");
                    error=true;
                }
                if(discount>total){                    
                    if(!error)
                        $("#unit_discount").focus();
                    $("#unit_discount").addClass("error");
                    error=true;
                }
                if(!error){
                    $("#tbl tbody").append('<tr>'+
                    '<td class="id">'+id+'</td>'+
                    '<td>'+name+'</td>'+
                    '<td>'+unit+'</td>'+
                    '<td>'+price+'</td>'+
                    '<td class="quantity">'+quantity+'</td>'+
                    '<td>'+total+'</td>'+
                    '<td class="discount">'+discount+'</td>'+
                    '<td>'+final+'</td>'+
                    '<td><button class="btn btnDel btn-xs btn-danger"><i class="fa fa-trash"></i></button></td>'+
                    '</tr>');
                    $("#item_id").val("").change().focus();
                    $("#quantity,#unit_discount,#price").val("");
                    UpdateHiddenFields();
                }
            });
        });
        function UpdateHiddenFields(){            
            $(".item_id_arr").html("");
            $(".qty_arr").html("");
            $(".discount_arr").html("");
            $("#tbl tbody tr").each(function(){
                var id=$(this).find(".id").text();
                $(".item_id_arr").append("<input type='hidden' name='item_id_arr[]' value='"+id+"' />");
                
                var quantity=$(this).find(".quantity").text();
                $(".qty_arr").append("<input type='hidden' name='qty_arr[]' value='"+quantity+"' />");
                
                var discount=$(this).find(".discount").text();
                $(".discount_arr").append("<input type='hidden' name='discount_arr[]' value='"+discount+"' />");
            });
        }
    </script>
@endsection