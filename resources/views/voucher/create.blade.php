@extends("_layout")

@section("title")
اضافة قيد جديدة
@endsection


@section("css")

<link href="/metronic-rtl/assets/global/plugins/bootstrap-toastr/toastr-rtl.min.css" rel="stylesheet" type="text/css" />
@endsection
@section("content")
<div class="row">
    <div class="col-md-12">
        
        <form method="post" action="/voucher" class="ajaxForm form-horizontal">
            {{csrf_field()}}
             
        <div class="form-group">
            <label for="voucher_date" class="col-sm-2 control-label">تاريخ العملية</label>
                <div class="col-sm-5">
                    <input type="date" value="{{old("voucher_date")}}" class="form-control" name="voucher_date" id="voucher_date" placeholder="تاريخ العملية">
                </div>
        </div>
        <div class="form-group">
            <label for="description" class="col-sm-2 control-label">البيان</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="description" id="description" placeholder="البيان">{{old("description")}}</textarea>
                </div>
        </div>
         <div class="form-group">
            <label for="description" class="col-sm-2 control-label">الحسابات</label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-4">
                            <select name="account_id" id="account_id" class="form-control">
                                <option value="">اختر الحساب</option>
                                @foreach($items as $c)
                                    <option value="{{$c->id}}">{{$c->name}} </option>
                                @endforeach
                            </select>
                        </div>                        
                        <div class="col-sm-3">
                            <input id="account_description" placeholder="البيان" class="form-control" />
                        </div>
                                             
                        <div class="col-sm-2">
                            <select name="transaction_type_id" id="transaction_type_id" class="form-control">
                                <option value="">اختر العملية</option>
                                @foreach($transaction_types as $c)
                                    <option value="{{$c->id}}">{{$c->name}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <input id="value" placeholder="القيمة" class="form-control" />
                        </div>
                        <div class="col-sm-1">
                            <button id="btnAdd" class="btn btn-success" type="button"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                    <hr>
                    <div class="panel">
                        <div class="panel-heading">
                            الحسابات
                        </div>
                        <table class="table table-striped table-hover" id="tbl">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الحساب</th>
                                    <th>نوع العملية</th>
                                    <th>القيمة</th>
                                    <th>البيان</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                        <div class="account_arr"></div>
                        <div class="type_arr"></div>
                        <div class="amount_arr"></div>
                        <div class="desc_arr"></div>
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
                    if(json.status>0){
                        $("#tbl tbody").html("");
                        $(".form-control").val("");
                        ShowMessage("تمت عملية الاضافة بنجاح","success","ادارة القيود");
                    }
                    else{
                        ShowMessage(json.msg,"error","ادارة القيود");
                    }
                },                
				error: function(json) {
                    errorsHtml="<ul>";
                    $.each(json.responseJSON.errors, function (key, item) {  
                         errorsHtml += '<li>' + item + '</li>';
                    });
                    errorsHtml+="</ul>";
					ShowMessage(errorsHtml,"error","ادارة القيود");
				}
            });
            
            $("#account_description").keypress(function(e){
                if(e.which==13){
                    $("#transaction_type_id").focus();
                    return false;
                }
            });
            $("#value").keypress(function(e){
                if(e.which==13){
                    $("#btnAdd").click();
                    return false;
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
                var id=$("#account_id").val();
                var name=$("#account_id").children(":selected").text();
                var desc=$("#account_description").val();
                var type=$("#transaction_type_id").val();
                var value=$("#value").val();
                
                var error=false;
                
                if($("#account_id").val()==""){
                    if(!error)
                        $("#account_id").focus();
                    $("#account_id").addClass("error");
                    error=true; 
                }
                if(type==""){
                    if(!error)
                        $("#transaction_type_id").focus();
                    $("#transaction_type_id").addClass("error");
                    error=true; 
                }
                if(value<=0){
                    if(!error)
                        $("#value").focus();
                    $("#value").addClass("error");
                    error=true;
                }
                if(!error){
                    $("#tbl tbody").append('<tr data-type="'+type+'">'+
                    '<td class="id">'+id+'</td>'+
                    '<td>'+name+'</td>'+
                    '<td>'+(type=="1"?"دائن":"مدين")+'</td>'+
                    '<td class="value">'+value+'</td>'+
                    '<td class="desc">'+desc+'</td>'+
                    '<td><button class="btn btnDel btn-xs btn-danger"><i class="fa fa-trash"></i></button></td>'+
                    '</tr>');
                    $("#account_id").val("").change().focus();
                    $("#transaction_type_id,#value,#account_description").val("");
                    UpdateHiddenFields();
                }
            });
        });
        function UpdateHiddenFields(){            
            $(".account_arr").html("");
            $(".type_arr").html("");
            $(".amount_arr").html("");
            $(".desc_arr").html("");
            $("#tbl tbody tr").each(function(){
                var id=$(this).find(".id").text();
                $(".account_arr").append("<input type='hidden' name='account_arr[]' value='"+id+"' />");
                
                var desc=$(this).find(".desc").text();
                $(".desc_arr").append("<input type='hidden' name='desc_arr[]' value='"+desc+"' />");
                
                
                var type=$(this).data("type");
                $(".type_arr").append("<input type='hidden' name='type_arr[]' value='"+type+"' />");
                
                var value=$(this).find(".value").text();
                $(".amount_arr").append("<input type='hidden' name='amount_arr[]' value='"+value+"' />");
            });
        }
    </script>
@endsection
