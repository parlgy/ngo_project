@extends('dist/main')

@section('memberscount',$counts)

@section('welfarecount',$welf)


@section('paymentcount',$pays)

@section('unmergedcount',$unmerged)


@section('tablename', 'Payments')

@section('tablehead')
<thead>
    <tr>
    <th>No.</th>
    <th>Title</th>
    <th>Full Name</th>
    <th>Church</th>
    <th>Sub County</th>
    <th>Ward</th>
    <th>Transaction No.</th>
    <th>Amount</th>
    <th>Action</th>
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
            <td>{{$member['MpesaReceiptNumber']}}</td>
            <td>{{$member['Amount']}}</td>
            <td><button id="editing" data-regno="{{$member['RegNo']}}" data-title="{{$member['Title']}}" data-full_name="{{$member['FULL_Name']}}" data-church="{{$member['Church']}}" data-sub_county="{{$member['sub_county']}}" data-ward="{{$member['ward']}}" data-email="{{$member['email']}}" data-phone="{{$member['phone']}}" data-transaction="{{$member['MpesaReceiptNumber']}}"            data-amount="{{$member['Amount']}}" data-payid="{{$member['ID']}}"  data-idnumber="{{$member['ID_Number']}}" data-tdate="{{$member['TransactionDate']}}" class="btn btn-danger" data-toggle="modal" data-target="#payments" >Edit </button></td>
        </tr>
       
    @endforeach
    </tbody>
@endsection


