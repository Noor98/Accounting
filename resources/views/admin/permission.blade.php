@extends("_layout")

@section("title")
صلاحيات - {{$admin->name}}
@endsection



@section("content")

<form method="post" action="/admin/setpermission/{{$admin->id}}" class="form-horizontal">
    {{csrf_field()}}
    <div class="form-group">
    <div class="col-sm-10">
        <?php
        $adminId=$admin->id;
        $links =\DB::table("link")->selectRaw("link.*,(select count(*) from admin_link where admin_id=$adminId and link_id=link.id)as access")->where("parent_id",0)->get();
        ?>
        <ul class="list-unstyled">
        @foreach($links as $l)
            <li>
                <label><input class="cbPermission" {{$l->access?"checked":""}} type="checkbox" name="permission[]" value="{{$l->id}}" /> <b>{{$l->title}}</b>
                </label>
                <?php
                $sublinks =\DB::table("link")->where("parent_id",$l->id)->selectRaw("link.*,(select count(*) from admin_link where admin_id=$adminId and link_id=link.id)as access")->get(); ?>
                <ul class="list-unstyled">
                @foreach($sublinks as $sl)
                    <li>
                        <label><input class="cbPermission" {{$sl->access?"checked":""}} type="checkbox" name="permission[]" value="{{$sl->id}}" /> {{$sl->title}}
                        </label>
                    </li>
                @endforeach 
                </ul>
                
            </li>
        @endforeach
        </ul>
    </div>
  </div>
    <div class="form-group">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">حفظ الصلاحيات</button>
        <a href="/admin" class="btn btn-default">الغاء</a>
    </div>
  </div>
</form>
@endsection

@section("js")
<script>
    $(function(){
        $(".cbPermission").click(function(){
           $(this).parent().next().find(":checkbox").prop("checked"
                      ,$(this).prop("checked"));
            
            $(this).closest("ul").each(function(){$(this).prev().find(":checkbox").prop("checked",$(this).find(":checked").size()>0);
            });
        });
    })
</script>
@endsection