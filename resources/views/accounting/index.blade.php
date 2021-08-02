@extends("_layout")
@section("title")
إدارة الحسابات
@endsection

@section("subtitle")
التحكم بالحسابات وإدارتها
@endsection


@section("content")

<div class="row">
    <div class="col-sm-10">
        <form method="get" action="/account" class="row">
            <div class="col-sm-4">
                <input autofocus name="q" value="{{$q}}" type="text" class="form-control" placeholder="بحث عن حساب - أدخل رقم الحساب">
            </div>
            <div class="col-sm-3">
                <select name="type_id" class="form-control">
                    <option value="">نوع الحساب</option>
                    @foreach($account_types as $c)
                    <option {{$type_id==$c->id?"selected":""}} value="{{$c->id}}">{{$c->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-3">
                <select name="route_id" class="form-control">
                    <option value="">نوع التوجيه</option>
                    @foreach($account_routes as $c)
                    <option {{$route_id==$c->id?"selected":""}} value="{{$c->id}}">{{$c->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-2">
                <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
            </div>          
        </form>
    </div>
    <div class="col-sm-2 text-right">
        <a class="btn btn-success" href="/account/create"><i class="glyphicon glyphicon-plus"></i>إضافة حساب جديد</a>
    </div>
</div>


@if($items->count()>0)
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th width="10%">رقم الحساب</th>
            <th>الإسم</th>
            <th>النوع</th>
            <th>التوجيه</th>
            <th width="10%">الرصيد</th>
            <th width="20%">تاريخ التعديل</th>
            <th width="13%"></th>
        </tr>
    </thead>
    <tbody>  
        @foreach($items as $a)
        <tr>
            <td>{{$a->number}}</td>
            <td>{{$a->name}}</td>
            <td>{{$a->account_type->name}}</td>
            <td>{{$a->account_route->name}}</td>
            <td>{{$a->balance}}</td>
            <td>{{$a->updated_at}}</td>
            
            <td>
                <a href="/account/{{$a->id}}/delete" class="btn Confirm btn-danger btn-xs">
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