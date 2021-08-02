@extends("_layout")

@section("title")
المستخدمون
@endsection



@section("content")
<div class="row">
    <div class="col-sm-10">
        <form method="get" action="/admin/index" class="row">
            <div class="col-sm-6">
                <input autofocus name="q" value="{{$q}}" type="text" class="form-control" placeholder="بحث في المستخدمين">
            </div>
            <div class="col-sm-1">
                <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
            </div>          
        </form>
    </div>
    <div class="col-sm-2 text-right">
        <a class="btn btn-success" href="/admin/create"><i class="glyphicon glyphicon-plus"></i> اضافة مستخدم جديد</a>
    </div>
</div>
@if($admins->count()>0)
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>اسم المستخدم</th>
            <th>البريد الالكتروني</th>
            <th>رقم الهاتف</th>
              <th>الفعالية</th>
            <th>تاريخ التعديل</th>
            <th width="13%"></th>
        </tr>
    </thead>
    <tbody>  
        @foreach($admins as $a)
        <tr>
            <td>{{$a->name}}</td>
            <td>{{$a->email}}</td>
            <td>{{$a->phone}}</td>
         <td><input type="checkbox" disabled {{$a->active?"checked":""}} /></td>
            <td>{{$a->updated_at}}</td>
          
            <td>
                <a href="/admin/{{$a->id}}/permission" class="btn btn-warning btn-xs">
                    <i class="glyphicon glyphicon-lock"></i>
                </a>
                <a href="/admin/{{$a->id}}/edit" class="btn btn-primary btn-xs">
                    <i class="glyphicon glyphicon-edit"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$admins->links()}}
@else
<br>
<br>
<div class="alert alert-warning">نأسف لا يوجد بيانات لعرضها </div>
@endif
@endsection


