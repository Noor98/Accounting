@extends("_layout")

@section("title")
السندات
@endsection
@section("content")
<div class="row">
    <div class="col-sm-10">
        <form method="get" action="/payment" class="row">
            <div class="col-sm-2">
                <input type="hidden" name="type_id" value="{{$type_id}}" />
                <input autofocus name="q" value="{{$q}}" type="text" class="form-control" placeholder=" اسم الحساب">
            </div>
            <div class="col-sm-1">
                <input name="account_id" value="{{$account_id}}" type="text" class="form-control" placeholder="#">
            </div>
            <div class="col-sm-3">                
                <input name="from" value="{{$from}}" type="date" class="form-control" placeholder="من تاريخ">
            </div>
            <div class="col-sm-3">                
                <input name="to" value="{{$to}}" type="date" class="form-control" placeholder="الى تاريخ">
            </div>
            <div class="col-sm-2">                
                 <select name="type_id" id="type_id" class="form-control">
                        <option value="">نوع السند</option>
                        @foreach($value_types as $c)
                            <option {{$type_id==$c->id?"selected":""}} value="{{$c->id}}">{{$c->name}} </option>
                        @endforeach
                    </select>
            </div>
            <div class="col-sm-1">
                <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
            </div>          
        </form>
    </div>
    <div class="col-sm-2 text-right">
        <a class="btn btn-success" href="/payment/create"><i class="glyphicon glyphicon-plus"></i> سند جديدة</a>
    </div>
</div>


@if($items->count()>0)
<table class="table table-hover table-striped">
    <thead>
        <tr>        
            <th>#</th> 
            <th>الحساب</th>
            <th>نوع السند</th>
            <th>المبلغ</th>
            <th>رقم السند</th>
            <th width="20%">التاريخ</th>
        </tr>
    </thead>
    <tbody>  
        @foreach($items as $a)
        <tr>
            <td>{{$a->account_id}}</td>
            <td>{{$a->account->name}}</td>
            <td>{{$a->payment_value_type->name}}</td>
            <td>{{$a->value}}</td>
            <td>{{$a->serial}}</td>
            <td>{{date('d-m-Y', strtotime($a->created_at))}}</td>
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
