@extends('dist/main')


@section('memberscount',$counts)

@section('welfarecount',$welf)


@section('paymentcount',$pays)

@section('unmergedcount',$unmerged)


@section('tablename', 'Welfare members')

@section('tablename', 'Welfare members')

@section('tablehead')
<thead>
    <tr>
    <th>Mem No.</th>
    <th>Title</th>
    <th>Name</th>
    <th>Church</th>
    <th>Sub County</th>
    <th>Ward</th>
    </tr>
</thead>
@endsection



@section('tablebody')
<tbody>
    @foreach($members as $member)
        <tr>
            <td>{{$member['id']}}</td>
            <td>{{$member['Title']}}</td>
            <td>{{$member['FULL_Name']}}</td>
            <td>{{$member['Church']}}</td>
            <td>{{$member['sub_county']}}</td>
            <td>{{$member['ward']}}</td>
        </tr>
    @endforeach
    </tbody>
   
    
@endsection


