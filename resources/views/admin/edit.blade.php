@extends("_layout")

@section("title")
تعديل على المستخدمين
@endsection



@section("content")

<form method="post" action="/admin/{{$admin->id}}" class="form-horizontal">
    {{csrf_field()}}
    <input type="hidden" value="put" name="_method" />
  <div class="form-group">
    <label for="name" class="col-sm-2 control-label">اسم المستخدم</label>
    <div class="col-sm-10">
      <input type="text" autofocus="true" value="{{$admin->name}}" class="form-control" name="name" id="name" placeholder="اسم المستخدم">
    </div>
  </div>
  <div class="form-group">
    <label for="email" class="col-sm-2 control-label">البريد الالكتروني</label>
    <div class="col-sm-10">
      <input type="email" readonly value="{{$admin->email}}" class="form-control" name="email" id="email" placeholder="البريد الالكتروني">
    </div>
  </div>
    
  <div class="form-group">
    <label for="password" class="col-sm-2 control-label">كلمة المرور</label>
    <div class="col-sm-10">
      <input type="password" value="" class="form-control" name="password" id="password" placeholder="كلمة المرور">
    </div>
  </div>
    <div class="form-group">
    <label for="phone" class="col-sm-2 control-label">رقم الهاتف</label>
    <div class="col-sm-10">
      <input type="text" value="{{$admin->phone}}" class="form-control" name="phone" id="phone" placeholder="رقم الهاتف">
    </div>
  </div>
    <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input {{$admin->active?"checked":""}} name="active" type="checkbox"> فعال
        </label>
      </div>
    </div>
  </div>
 
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">تعديل</button>
        <a href="/admin" class="btn btn-default">الغاء</a>
    </div>
  </div>
</form>
<hr>


@endsection