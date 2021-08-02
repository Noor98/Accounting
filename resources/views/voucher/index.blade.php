@extends("_layout")

@section("title")
القيود
@endsection
@section("content")
<div class="row">
    <div class="col-sm-10">
        <form method="get" action="/voucher" class="row">
            <div class="col-sm-4">
                <input autofocus name="q" value="{{$q}}" type="text" class="form-control" placeholder=" كلمة البحث">
            </div>
            <div class="col-sm-3">                
                <input name="from" value="{{$from}}" type="date" class="form-control" placeholder="من تاريخ">
            </div>
            <div class="col-sm-1 text-center">الى</div>
            <div class="col-sm-3">                
                <input name="to" value="{{$to}}" type="date" class="form-control" placeholder="الى تاريخ">
            </div>
            <div class="col-sm-1">
                <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
            </div>          
        </form>
    </div>
    <div class="col-sm-2 text-right">
        <a class="btn btn-success" href="/voucher/create"><i class="glyphicon glyphicon-plus"></i> قيد جديدة</a>
    </div>
</div>


@if($items->count()>0)
<table class="table table-hover table-striped">
    <thead>
        <tr>        
            <th>#</th> 
            <th>الوصف</th>
            <th>اجمالي</th>
            <th width="20%">التاريخ</th>
            
            <th width="13%"></th>
        </tr>
    </thead>
    <tbody>  
        @foreach($items as $a)
        <tr>
            <td>{{$a->id}}</td>
            <td>{{$a->description}}</td>
            <td>{{$a->vouture_value}}</td>
            <td>{{date('d-m-Y', strtotime($a->voucher_date))}}</td>
            <td>
                <a title="{{$a->description}}" href="/voucher/{{$a->id}}" class="btn PopUp btn-info btn-xs">
                    <i class="glyphicon glyphicon-list"></i>
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
