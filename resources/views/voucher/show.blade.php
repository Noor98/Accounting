<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>رقم الحساب</th>
            <th>الحساب</th>
            <th>الوصف</th>
            <th>مدين</th>
            <th>دائن</th>
        </tr>
    </thead>
    <tbody>
        @foreach($voucher->details as $i)
        <tr>
            <td>{{$i->account_id}}</td>
            <td>{{$i->account->name}}</td>
            <td>{{$i->description}}</td>
            <td>{{$i->account_transaction_type_id==2?$i->amount:""}}</td>
            <td>{{$i->account_transaction_type_id==1?$i->amount:""}}</td>
        </tr>
        @endforeach
    </tbody>
    <thead>
        <tr>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th><b>المجموع</b></th>
            <th>{{$voucher->vouture_value}}</th>
            <th>{{$voucher->vouture_value}}</th>
        </tr>
    </thead>
</table>