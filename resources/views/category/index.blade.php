@extends("_layout")
@section("title")
ادارة التصنيفات
@endsection

@section("subtitle")
التحكم بتصنيفات الاصناف
@endsection


@section("content")

<div class="row">
    <div class="col-sm-10">
        <form method="get" action="/category" class="row">
            <div class="col-sm-6">
                <input autofocus name="q" value="{{$q}}" type="text" class="form-control" placeholder="بحث عن تصنيفات">
            </div>
            <div class="col-sm-1">
                <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
            </div>          
        </form>
    </div>
    <div class="col-sm-2 text-right">
        <a class="btn btn-success" href="/category/create"><i class="glyphicon glyphicon-plus"></i> اضافة تصنيف جديد</a>
    </div>
</div>


@if($items->count()>0)
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>التصنيف</th>
            <th width="20%">تاريخ التعديل</th>
            <th width="13%"></th>
        </tr>
    </thead>
    <tbody>  
        @foreach($items as $a)
        <tr>
            <td>{{$a->name}}</td>
            <td>{{$a->updated_at}}</td>
            <td>
                <a href="/category/{{$a->id}}/edit" class="btn btn-primary btn-xs">
                    <i class="glyphicon glyphicon-edit"></i>
                </a>
                <a href="/category/{{$a->id}}/delete" class="btn Confirm btn-danger btn-xs">
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