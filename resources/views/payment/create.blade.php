@extends("_layout")
@section("title")
اضافة سند جديد
@endsection

@section("subtitle")

@endsection


@section("content")


<div class="row">
    <div class="col-md-8">
        <form method="post" action="/payment" class="form-horizontal">
            {{csrf_field()}}
            <div class="form-group">
             <label for="value_type_id" class="col-sm-2 control-label">نوع السند</label>
                <div class="col-sm-5">
                    <select name="value_type_id" id="value_type_id" class="form-control">
                        <option value="">نوع السند</option>
                        @foreach($value_types as $c)
                            <option {{old("value_type_id")==$c->id?"selected":""}} value="{{$c->id}}">{{$c->name}} </option>
                        @endforeach
                    </select>
                 </div>
        </div>
        <div class="form-group">
            
            <label for="mobile" class="col-sm-2 control-label">الحساب</label>
            <div class="col-sm-10">
              <select name="account_id" id="account_id" class="form-control">
                                <option value="">اختر الحساب</option>
                                @foreach($accounts as $c)
                                    <option value="{{$c->id}}">{{$c->name}} </option>
                                @endforeach
                            </select>
            </div>
          </div>
            
              
        <div class="form-group">
            <label for="value" class="col-sm-2 control-label">المبلغ</label>
                <div class="col-sm-5">
                    <input type="number" min="0" value="{{old("value")}}" class="form-control" name="value" id="value" placeholder="قيمة الخصم">
                </div>
        </div>
            
        <div class="form-group">
            <label for="serial" class="col-sm-2 control-label">رقم السند</label>
                <div class="col-sm-5">
                    <input type="number" min="0" value="{{old("serial")}}" class="form-control" name="serial" id="serial" 
                           placeholder="رقم السند">
                </div>
        </div>
              <div class="form-group">
            <label for="comment" class="col-sm-2 control-label">ملاحظات</label>
            <div class="col-sm-10">
              <input type="text"  value="{{old("comment")}}" class="form-control" name="comment" id="comment" placeholder="ملاحظات">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary">اضافة</button>
                <a href="/payment" class="btn btn-default">الغاء الأمر</a>
            </div>
          </div>
        </form>
    </div>
</div>

@endsection