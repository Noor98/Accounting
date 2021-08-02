@extends("_layout")

@section("title")
ادراة الاصناف
@endsection
@section("content")
<div class="row">
    <div class="col-sm-10">
        <form method="get" action="/item" class="row">
            <div class="col-sm-4">
                <input autofocus name="q" value="{{$q}}" type="text" class="form-control" placeholder="بحث عن تصنيفات">
            </div>
            <div class="col-sm-3">
                <select name="category_id" class="form-control">
                    <option value="">التصنيف</option>
                    @foreach($categories as $c)
                    <option {{$category_id==$c->id?"selected":""}} value="{{$c->id}}">{{$c->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-3">
                <select name="unit_id" class="form-control">
                    <option value="">الوحدة</option>
                    @foreach($units as $c)
                    <option {{$unit_id==$c->id?"selected":""}} value="{{$c->id}}">{{$c->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-1">
                <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
            </div>          
        </form>
    </div>
    <div class="col-sm-2 text-right">
        <a class="btn btn-success" href="/item/create"><i class="glyphicon glyphicon-plus"></i> اضافة صنف جديد</a>
    </div>
</div>


@if($items->count()>0)
<table class="table table-hover table-striped">
    <thead>
        <tr>        
            <th>الصنف</th>
            <th>التصنيف</th>
            <th>الوحدة</th>
            <th width="10%">سعر الصنف</th>
            <th width="10%">ثمن البيع</th>
            <th width="10%">الرصيد</th>
            <th width="20%">تاريخ التعديل</th>
            
            <th width="13%"></th>
        </tr>
    </thead>
    <tbody>  
        @foreach($items as $a)
        <tr>
            <td>{{$a->name}}</td>
            <td>{{$a->category->name}}</td>
            <td>{{$a->unit->name}}</td>
            <td>{{$a->sell_price}}</td>
            <td>{{$a->buy_price}}</td>
            <td>{{$a->balance}}</td>
            <td>{{$a->created_at}}</td>

            <td>
                <a href="/item/{{$a->id}}/edit" class="btn btn-primary btn-xs">
                    <i class="glyphicon glyphicon-edit"></i>
                </a>
                <a href="/item/{{$a->id}}/delete" class="btn Confirm btn-danger btn-xs">
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
