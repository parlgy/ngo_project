
@extends('dist/main')

@section('memberscount',$counts)

@section('welfarecount',$welf)


@section('paymentcount',$pays)


@section('unmergedcount',$trans)

@section('tablename', 'Un Merged Payments')

@section('tablehead')
<thead>
    <tr>
    <th>Transaction No.</th>
    <th>Amount</th>
    <th>Transction Time</th>
    <th>Phone</th>
    <th>Action</th>
    </tr>
</thead>
@endsection
@section('tablebody')
<tbody>
    @foreach($members as $member)
        <tr>
            <td>{{$member['MpesaReceiptNumber']}}</td>
            <td>{{$member['Amount']}}</td>
            <td>{{$member['TransactionDate']}}</td>
            <td>{{$member['PhoneNumber']}}</td>
            <td><button id="editing" data-reciept="{{$member['MpesaReceiptNumber']}}" data-amount="{{$member['Amount']}}"  data-transactiondate="{{$member['TransactionDate']}}" data-phonenumber="{{$member['PhoneNumber']}}" data-payid="{{$member['ID']}}" class="btn btn-danger" data-toggle="modal" data-target="#unmerged" >Edit </button></td>
        </tr>
    @endforeach
    </tbody>
    
@endsection


