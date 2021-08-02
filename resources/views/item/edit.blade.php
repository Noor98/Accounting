@extends("_layout")

@section("title")
تعديل الصنف
@endsection
div class="row">
    
@section("content")
<div class="row">
    <div class="col-md-8">
        
        <form method="post" action="/item/{{$item->id}}" class="form-horizontal">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="put"/>
            
            <div class="form-group">
                <label for="customer_type_id" class="col-sm-2 control-label">
                التصنيف
                </label>
                <div class="col-sm-10">
                    <select name="category_id" id="category_id" class="form-control">
                        <option value="">التصنيف</option>
                        @foreach($categories as $c)
                            <option {{$item->category_id==$c->id?"selected":""}} value="{{$c->id}}">{{$c->name}} </option>
                        @endforeach
                    </select>
                </div>
                </div> 
        <div class="form-group">
             <label for="name" class="col-sm-2 control-label">اسم الصنف</label>
                <div class="col-sm-10">
                    <input type="text" autofocus="true" value="{{$item->name}}" class="form-control" name="name" id="name" placeholder="اسم الصنف">
                 </div>
        </div>
        <div class="form-group">
            <label for="sell_price" class="col-sm-2 control-label">سعر الصنف</label>
                <div class="col-sm-10">
                    <input type="number" autofocus="true" value="{{$item->sell_price}}" class="form-control" name="sell_price" id="sell_price" placeholder="سعر الصنف">
                </div>
        </div>
        <div class="form-group">
            <label for="buy_price" class="col-sm-2 control-label">ثمن البيع</label>
                <div class="col-sm-10">
                    <input type="number" autofocus="true" value="{{$item->buy_price}}" class="form-control" name="buy_price" id="buy_price" placeholder="ثمن البيع">
                </div>
        </div>
         <div class="form-group">
                <label for="customer_type_id" class="col-sm-2 control-label">
                الوحدة
                </label>
                <div class="col-sm-10">
                    <select name="unit_id" id="unit_id" class="form-control">
                        <option value="">نوع الوحدة</option>
                        @foreach($units as $c)
                            <option {{$item->unit_id==$c->id?"selected":""}} value="{{$c->id}}">{{$c->name}} </option>
                        @endforeach
                    </select>
                </div>
                </div> 
            
         <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary">تعديل</button>
                <a href="/item" class="btn btn-default">الغاء</a>
            </div>
          </div>
    
</form>
    </div>
</div>
@endsection
