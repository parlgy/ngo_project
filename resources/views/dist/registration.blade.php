@extends('dist/main')

@section('memberscount',$counts)

@section('welfarecount',$welf)


@section('paymentcount',$pays)

@section('unmergedcount',$unmerged)


@section('tablename', 'Payments')

@section('tablehead')
<thead>
    <tr>
    <th>Mem No.</th>
    <th>Title</th>
    <th>Full Name</th>
    <th>Church</th>
    <th>Sub County</th>
    <th>Ward</th>
    <th>Transaction No.</th>
    <th>Amount</th>
    <th>Year</th>
    </tr>
</thead>
@endsection

@section('tablebody')
<tbody>
    @foreach($members as $member)
        <tr>
            <td>{{$member['RegNo']}}</td>
            <td>{{$member['Title']}}</td>
            <td>{{$member['FULL_Name']}}</td>
            <td>{{$member['Church']}}</td>
            <td>{{$member['sub_county']}}</td>
            <td>{{$member['ward']}}</td>
            <td>{{$member['Transaction_No']}}</td>
            <td>{{$member['Amount']}}</td>
            <th>{{$member['Reg_Year']}}</th>
        </tr>
       
    @endforeach
    </tbody>
@endsection


