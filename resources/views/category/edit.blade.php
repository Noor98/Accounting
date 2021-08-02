@extends("_layout")
@section("title")
تعديل تصنيف 
@endsection

@section("subtitle")

@endsection


@section("content")


<div class="row">
    <div class="col-md-8">
        <form method="post" action="/category/{{$item->id}}" class="form-horizontal">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="put"/>
          <div class="form-group">
            <label for="name" class="col-sm-2 control-label">الاسم</label>
            <div class="col-sm-10">
              <input type="text" autofocus="true" value="{{$item->name}}" class="form-control" name="name" id="name" placeholder="اسم التصنيف">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary">حفظ</button>
                <a href="/category" class="btn btn-default">الغاء الأمر</a>
            </div>
          </div>
        </form>
    </div>
</div>

@endsection