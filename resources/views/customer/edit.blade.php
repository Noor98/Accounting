@extends("_layout")
@section("title")
تعديل بيانات زبون
@endsection

@section("subtitle")

@endsection


@section("content")


<div class="row">
    <div class="col-md-8">
        <form method="post" action="/customer/{{$customers->id}}" class="form-horizontal">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="put"/>
          <div class="form-group">
            <label for="name" class="col-sm-2 control-label">الاسم</label>
            <div class="col-sm-10">
              <input type="text" readonly autofocus="true" value="{{$customers->name}}" class="form-control" name="name" id="name" placeholder="اسم الزبون">
            </div>
         </div>
        <div class="form-group">
            
            <label for="mobile" class="col-sm-2 control-label">الجوال</label>
            <div class="col-sm-10">
              <input type="text" value="{{$customers->mobile}}" class="form-control" name="mobile" id="mobile" placeholder="االجوال">
            </div>
          </div>
            
              <div class="form-group">
            <label for="phone" class="col-sm-2 control-label">الهاتف</label>
            <div class="col-sm-10">
              <input type="text" value="{{$customers->phone}}" class="form-control" name="phone" id="phone" placeholder="الهاتف">
            </div>
          </div>
              <div class="form-group">
            <label for="address" class="col-sm-2 control-label">العنوان</label>
            <div class="col-sm-10">
              <input type="text" value="{{$customers->address}}" class="form-control" name="address" id="address" placeholder="العنوان">
            </div>
          </div>
              <div class="form-group">
                  
            <label for="email" class="col-sm-2 control-label">الايميل</label>
            <div class="col-sm-10">
              <input type="text"  value="{{$customers->email}}" class="form-control" name="email" id="email" placeholder="الايميل">
            </div>
          </div>
              <div class="form-group">
                <label for="customer_type_id" class="col-sm-2 control-label">نوع الزبون</label>
                <div class="col-sm-10">
                    <select disabled name="customer_type_id" id="customer_type_id" class="form-control">
                        <option value="">نوع الزبون</option>
                        @foreach($customer_types as $c)
                            <option {{$customers->customer_type_id==$c->id?"selected":""}} value="{{$c->id}}">{{$c->name}} </option>
                        @endforeach
                    </select>
                    <input type="hidden" name="customer_type_id" value="{{$customers->customer_type_id}}"/>
                </div>
                </div>  
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary">تعديل البيانات</button>
                <a href="/customer" class="btn btn-default">الغاء الأمر</a>
            </div>
          </div>
        </form>
    </div>
</div>

@endsection