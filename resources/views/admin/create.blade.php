@extends("_layout")

@section("title")
اضافة مستخدم جديد
@endsection



@section("content")

<form method="post" action="/admin" class="form-horizontal">
    {{csrf_field()}}
  <div class="form-group">
    <label for="name" class="col-sm-2 control-label">اسم المستخدم</label>
    <div class="col-sm-10">
      <input type="text" autofocus="true" value="{{old("name")}}" class="form-control" name="name" id="name" placeholder="اسم المستخدم">
    </div>
  </div>
  <div class="form-group">
    <label for="email" class="col-sm-2 control-label">البريد الالكتروني</label>
    <div class="col-sm-10">
      <input type="email" value="{{old("email")}}" class="form-control" name="email" id="email" placeholder="البريد الالكتروني">
    </div>
  </div>
  <div class="form-group">
    <label for="password" class="col-sm-2 control-label">كلمة المرور</label>
    <div class="col-sm-10">
      <input type="password" value="{{old("password")}}" class="form-control" name="password" id="password" placeholder="كلمة المرور">
    </div>
  </div>
    <div class="form-group">
    <label for="email" class="col-sm-2 control-label">رقم الهاتف</label>
    <div class="col-sm-10">
      <input type="text" value="{{old("phone")}}" class="form-control" name="phone" id="phone" placeholder=" رقم الهاتف">
    </div>
  </div>
  
 
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input {{old("active")?"checked":""}} name="active" type="checkbox"> فعال
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">اضافة</button>
        <a href="/admin" class="btn btn-default">الغاء</a>
    </div>
  </div>
</form>

@endsection
