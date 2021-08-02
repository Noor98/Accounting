@extends("_layout")

@section("title")
العمليات
@endsection
@section("content")
<div class="row">
    <div class="col-sm-10">
        <form method="get" action="/operation" class="row">
            <div class="col-sm-3">
                <input type="hidden" name="type_id" value="{{$type_id}}" />
                <input autofocus name="q" value="{{$q}}" type="text" class="form-control" placeholder=" اسم الحساب">
            </div>
            <div class="col-sm-2">
                <input name="account_id" value="{{$account_id}}" type="text" class="form-control" placeholder="رقم الحساب">
            </div>
            <div class="col-sm-3">                
                <input name="from" value="{{$from}}" type="date" class="form-control" placeholder="من تاريخ">
            </div>
            <div class="col-sm-3">                
                <input name="to" value="{{$to}}" type="date" class="form-control" placeholder="الى تاريخ">
            </div>
            <div class="col-sm-1">
                <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
            </div>          
        </form>
    </div>
    <div class="col-sm-2 text-right">
        <a class="btn btn-success" href="/operation/create"><i class="glyphicon glyphicon-plus"></i> عملية جديدة</a>
    </div>
</div>


@if($items->count()>0)
<table class="table table-hover table-striped">
    <thead>
        <tr>        
            <th>#</th> 
            <th>الحساب</th>
            <th>نوع العملية</th>
            <th>اجمالي</th>
            <th width="10%">الخصم</th>
            <th width="10%">بعد الخصم</th>
            <th width="20%">التاريخ</th>
            
            <th width="13%"></th>
        </tr>
    </thead>
    <tbody>  
        @foreach($items as $a)
        <tr>
            <td>{{$a->account_id}}</td>
            <td>{{$a->account->name}}</td>
            <td>{{$a->operation_type->name}}</td>
            <td>{{$a->price}}</td>
            <td>{{$a->discount}}</td>
            <td>{{$a->amount}}</td>
            <td>{{date('d-m-Y', strtotime($a->operation_date))}}</td>
            <td>
                <a title="{{$a->operation_type->name}} - {{$a->account->name}}" href="/operation/{{$a->id}}" class="btn PopUp btn-info btn-xs">
                    <i class="glyphicon glyphicon-list"></i>
                </a>
                <a href="/operation/{{$a->id}}/delete" class="btn Confirm btn-danger btn-xs">
                    <i class="glyphicon glyphicon-trash"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$items->links()}}
@else
<br>
<br>
<div class="alert alert-warning">نأسف لا يوجد بيانات لعرضها </div>
@endif

@endsection
