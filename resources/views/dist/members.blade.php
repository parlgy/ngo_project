@extends('dist/main')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="d-flex align-items-center justify-content-between">
            <div class="">
             <i class="fas fa-table"></i> 
         </div>
         <div class="input-group may-0" style="width:15em;">
            <input class="form-control form-control-sm" name="idnumber" id="memberid" type="text" placeholder="Search with ID" />
            <div class="input-group-append">
                <button class="btn" style="height: 2em;" id="sr" type="button"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </div>

</div>
<div>
    <div class="table-responsive" style="overflow: auto;">
        <table class="table-bordered"  width="100%">
            <thead>
                <tr>
                    <!-- `First_name`, `Middle_name`, `Last_Name`, `Id_nmber`, `Country`, `County`, `Sub_county`, `Ward`, `Location`, `Sub_location`, `Village`, `Phone`, `DOB`, `Email`, `Church`, `Gender`, `created_at`, `updated_at` -->
                    <th style="width:5%;"><span style="white-space: nowrap; margin-left: 2px; margin-right: 2px; padding: 3px;">ID Number.</span></th>
                    <th style="width:20%; overflow: auto;"><span style="white-space: nowrap; margin-left: 2px; margin-right: 2px; padding: 3px;">Name</span></th>
                    <th style="width: 7%;"><span style="white-space: nowrap; margin-left: 2px; margin-right: 2px; padding: 3px;">Phone</span></th>
                    <th style="width: 25%;"><span style="white-space: nowrap; margin-left: 2px; margin-right: 2px; padding: 3px;">Church</span></th>
                    <th style="width: 10%;"><span style="white-space: nowrap; margin-left: 2px; margin-right: 2px; padding: 3px;">County</span></th>
                    <th style="width: 16%;"><span style="white-space: nowrap; margin-left: 2px; margin-right: 2px; padding: 3px;">Sub_County</span></th>
                    <th style="width: 17%;"><span style="white-space: nowrap; margin-left: 2px; margin-right: 2px; padding: 3px;">Ward</span></th>
                    <th style="width: 17%;"><span style="white-space: nowrap; margin-left: 2px; margin-right: 2px; padding: 3px;">Expected</span></th>
                    <th style="width: 17%;"><span style="white-space: nowrap; margin-left: 2px; margin-right: 2px; padding: 3px;">Paid</span></th>
                    <th style="width: 17%;"><span style="white-space: nowrap; margin-left: 2px; margin-right: 2px; padding: 3px;">Ballance</span></th>                    
                </tr>
            </thead>
            <tbody>
                @foreach($members as $member)
                <tr>
                    <td><span style="white-space: nowrap; margin-left: 2px; margin-right: 2px; padding: 3px;">{{$member['Id_nmber']}}</span></td>
                    <td><span style="white-space: nowrap; margin-left: 2px; margin-right: 2px; padding: 3px;">{{$member['First_name']}}  {{$member['Middle_name']}}  {{$member['Last_Name']}}</span></td>
                    <td><span style="white-space: nowrap; margin-left: 2px; margin-right: 2px; padding: 3px;">{{$member['Phone']}}</span></td>
                    <td><span style="white-space: nowrap; margin-left: 2px; margin-right: 2px; padding: 3px;">{{$member['Church']}}</span></td>
                    <td><span style="white-space: nowrap; margin-left: 2px; margin-right: 2px; padding: 3px;">{{$member['County']}}</span></td>
                    <td><span style="white-space: nowrap; margin-left: 2px; margin-right: 2px; padding: 3px;">{{$member['sub_county']}}</span></td>
                    <td><span style="white-space: nowrap; margin-left: 2px; margin-right: 2px; padding: 3px;">{{$member['Ward']}}</span></td>
                    <td><span style="white-space: nowrap; margin-left: 2px; margin-right: 2px; padding: 3px;">100</span></td>
                    <td><span style="white-space: nowrap; margin-left: 2px; margin-right: 2px; padding: 3px;">100</span></td>
                    <td><span style="white-space: nowrap; margin-left: 2px; margin-right: 2px; padding: 3px;">100</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer" align="center">
        
    </div>                          
</div>





@endsection


