@extends("_layout")
@section("title")
تعديل حساب  
@endsection

@section("subtitle")

@endsection


@section("content")


<div class="row">
    <div class="col-md-8">
        
        <form method="post" action="/account/{{$account_number->id}}" class="form-horizontal">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="put"/>
          <div class="form-group">
            <label for="number" class="col-sm-2 control-label">الرقم</label>
            <div class="col-sm-10">
              <input type="text" autofocus="true" value="{{$account_number->number}}" class="form-control" name="number" id="number" placeholder="رقم الحساب">
            </div>
          </div>
            
            <div class="form-group">
            <label for="name" class="col-sm-2 control-label">الاسم</label>
            <div class="col-sm-10">
              <input type="text"  value="{{$account_number->name}}" class="form-control" name="name" id="name" placeholder="اسم صاحب الحساب">
            </div>
          </div>
            
            <div class="form-group">
            <label for="account_type_id" class="col-sm-2 control-label">نوع الحساب</label>
            <div class="col-sm-10">
                <select name="account_type_id" id="account_type_id" class="form-control">
                    <option value="">إختر نوع الحساب</option>
                    @foreach($account_t as $a)
                    <option {{$account_number->account_type_id==$a->id?"selected":""}} value="{{$a->id}}">{{$a->name}}</option>
                    @endforeach
                </select>
            </div>
          </div>
            
            
            <div class="form-group">
            <label for="balance" class="col-sm-2 control-label">الرصيد</label>
            <div class="col-sm-10">
              <input type="text"  value="{{$account_number->balance}}" class="form-control" name="balance" id="balance" placeholder="رصيد الحساب">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary">حفظ</button>
                <a href="/account" class="btn btn-default">الغاء الأمر</a>
            </div>
          </div>
            
        </form>
    </div>
</div>

@endsection