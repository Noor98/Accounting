@extends("_layout")
@section("title")
اضافة زبون جديد
@endsection

@section("subtitle")

@endsection


@section("content")


<div class="row">
    <div class="col-md-8">
        <form method="post" action="/customer" class="form-horizontal">
            {{csrf_field()}}
          <div class="form-group">
            <label for="name" class="col-sm-2 control-label">الاسم</label>
            <div class="col-sm-10">
              <input type="text" autofocus="true" value="{{old("name")}}" class="form-control" name="name" id="name" placeholder="اسم الزبون">
            </div>
          </div>
        <div class="form-group">
            
            <label for="mobile" class="col-sm-2 control-label">الجوال</label>
            <div class="col-sm-10">
              <input type="text" autofocus="true" value="{{old("mobile")}}" class="form-control" name="mobile" id="mobile" placeholder="االجوال">
            </div>
          </div>
            
              <div class="form-group">
            <label for="phone" class="col-sm-2 control-label">الهاتف</label>
            <div class="col-sm-10">
              <input type="text" autofocus="true" value="{{old("phone")}}" class="form-control" name="phone" id="phone" placeholder="الهاتف">
            </div>
          </div>
              <div class="form-group">
            <label for="address" class="col-sm-2 control-label">العنوان</label>
            <div class="col-sm-10">
              <input type="text" autofocus="true" value="{{old("address")}}" class="form-control" name="address" id="address" placeholder="العنوان">
            </div>
          </div>
              <div class="form-group">
                  
            <label for="email" class="col-sm-2 control-label">الايميل</label>
            <div class="col-sm-10">
              <input type="text"  autofocus="true" value="{{old("email")}}" class="form-control" name="email" id="email" placeholder="الايميل">
            </div>
          </div>
              <div class="form-group">
                <label for="customer_type_id" class="col-sm-2 control-label">نوع الزبون</label>
                <div class="col-sm-10">
                    <select name="customer_type_id" id="customer_type_id" class="form-control">
                        <option value="">نوع الزبون</option>
                        @foreach($customer_types as $c)
                            <option {{old("customer_type_id")==$c->id?"selected":""}} value="{{$c->id}}">{{$c->name}} </option>
                        @endforeach
                    </select>
                </div>
                </div> 
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary">اضافة</button>
                <a href="/customer" class="btn btn-default">الغاء الأمر</a>
            </div>
          </div>
        </form>
    </div>
</div>

@endsection