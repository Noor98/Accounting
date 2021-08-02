@extends("_layout")
@section("title")
ادارة الزبائن
@endsection

@section("subtitle")

@endsection


@section("content")

<div class="row">
    <div class="col-sm-10">
        <form method="get" action="/customer" class="row">
            <div class="col-sm-3">
                <input autofocus name="q" value="{{$q}}" type="text" class="form-control" placeholder="بحث عن اسم او ايميل الزبون">
            </div>
            <div class="col-sm-3">
                <input autofocus name="mobile" value="{{$mobile}}" type="text" class="form-control" placeholder="بحث عن جوال او هاتف ">
            </div>
             <div class="col-sm-3">
                <input autofocus name="address" value="{{$address}}" type="text" class="form-control" placeholder="بحث عن العنوان">
            </div>
            <div class="col-sm-2">
                <select name="customer_type_id" class="form-control">
                    <option value="">نوع الزبون</option>
                    @foreach($customer_typeList as $c)
                    <option {{$customer_type_id==$c->id?"selected":""}} value="{{$c->id}}">{{$c->name}}</option>
                    @endforeach
                </select>
            </div>
            
                <div class="col-sm-1">
                <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
            </div>          
        </form>
    </div>
      <div class="col-sm-2 text-right">
        <a class="btn btn-success" href="/customer/create"><i class="glyphicon glyphicon-plus"></i> اضافة زبون جديد</a>
    </div>
</div>

 



@if($customers->count()>0)
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>الاسم</th>
            <th>الجوال</th>
            <th>الهاتف</th>
            <th>العنوان</th>
            <th>الايميل</th>
            <th>النوع</th>
            <th>الحساب</th>
            <th width="15%">تاريخ التعديل</th>
            <th width="10%"></th>
        </tr>
    </thead>
    <tbody>  
        @foreach($customers as $a)
        <tr>
            <td>{{$a->name}}</td>
            <td>{{$a->mobile}}</td>
            <td>{{$a->phone}}</td>
            <td>{{$a->address}}</td>
            <td>{{$a->email}}</td>
            <td>{{$a->customer_type->name}}</td>
            <td>{{$a->account->name}}</td>
            
            <td>{{$a->updated_at}}</td>
            <td>
                <a href="/customer/{{$a->id}}/edit" class="btn btn-primary btn-xs">
                    <i class="glyphicon glyphicon-edit"></i>
                </a>
                <a href="/customer/{{$a->id}}/delete" class="btn Confirm btn-danger btn-xs">
                    <i class="glyphicon glyphicon-trash"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$customers->links()}}
@else
<br>
<br>
<div class="alert alert-warning">نأسف لا يوجد بيانات لعرضها </div>
@endif

@endsection