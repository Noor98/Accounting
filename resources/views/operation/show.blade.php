<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>الصنف</th>
            <th>الكمية</th>
            <th>السعر</th>
            <th>المجموع</th>
            <th>الخصم</th>
            <th>الاجمالي</th>
        </tr>
    </thead>
    <tbody>
        @foreach($operation->details as $i)
        <tr>
            <td>{{$i->item->name}}</td>
            <td>{{$i->quantity}} {{$i->item->unit->name}}</td>
            <td>{{$i->price}}</td>
            <td>{{$i->total_price}}</td>
            <td>{{$i->discount}}</td>
            <td>{{$i->amount}}</td>
        </tr>
        @endforeach
    </tbody>
</table>