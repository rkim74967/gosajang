@extends('layouts.layout')
@section('content')
    @if(session()->has('message'))
        <script type="text/javascript">
            alert('저장되었습니다.')
        </script>
    @endif
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> 매출</h4>
                    </div>
                    <form action="">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-5 date-padding">
                                    <label>FROM</label>
                                    <div class="date">
                                        <input class="form-control pull-right filters" name="from" placeholder="" type="date" id="from">
                                    </div>
                                </div>
                                <div class="col-sm-5 date-padding">
                                    <label>TO</label>
                                    <div class="date">
                                        <input class="form-control pull-right filters" name="to" placeholder="" type="date" id="to">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <br>
                                    <button type="submit" class="btn-custom" id="searchDate" style="padding: 7px 10px;">검색</button>
                                </div>
                            </div>
                        </div>
                    </form>
{{--                    <form>--}}
                        <div class="date-btn-container">
                            <button class="btn-custom" id="today" onclick="getData(this)">오늘</button>
                            <button class="btn-custom" id="yesterday" onclick="getData(this)">어제</button>
                            <button class="btn-custom" id="lastweek" onclick="getData(this)">지난 주</button>
                            <button class="btn-custom" id="thismonth" onclick="getData(this)">이번 달</button>
                            <button class="btn-custom" id="lastmonth" onclick="getData(this)">지난 달</button>
                            <button class="btn-custom" id="all" onclick="refresh()">전체</button>
                        </div>
{{--                    </form>--}}
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <tr>
                                        <th>번호</th>
                                        <th>이름</th>
                                        <th>주소</th>
                                        <th>전화번호</th>
                                        <th>상품</th>
                                        <th>가격</th>
                                        <th>수량</th>
                                        <th>주문완료일</th>
                                    </tr>
                                </thead>
                                <tbody id="sale_table">
                                @if($sales != null)
                                @foreach($sales as $key => $sale)
                                    <tr>
                                        <td>{{$sales->firstItem() + $key}}</td>
                                        <td>{{$sale->name}}</td>
                                        <td>{{$sale->address}}</td>
                                        <td>{{$sale->phone}}</td>
                                        <td>{{$sale->product}}</td>
                                        <td>{{number_format((double)str_replace(',','',$sale->total_price), 0)}}원</td>
                                        <td>{{$sale->qty}}</td>
                                        <td>{{date_format($sale->created_at,'Y-m-d')}}</td>
{{--                                        <td>--}}
{{--                                            <a href="#" data-toggle="modal" id="{{ $sale->id }}" data-target="#editModal" onclick="whichOne(this)">--}}
{{--                                                수정--}}
{{--                                            </a> /--}}
{{--                                            <a href="#" id="{{ $sale->id }}" onclick="deleteThis(this)" >삭제</a>--}}
{{--                                        </td>--}}
                                    </tr>
                                @endforeach
                                @endif
                                </tbody>
                            </table>
{{--                            @include('sale.edit')--}}
                        </div>
                        {{ $sales->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="{{asset('assets/js/core/jquery.min.js')}}" type="text/javascript"></script>

    <script>
        function deleteThis(id){
            var i = id.id;
            var tr = id.closest("tr");
            console.log(id);
        }

        jQuery(document).ready(function(){
            jQuery('#searchDate').click(function(e){
                e.preventDefault();

                jQuery.ajax({
                    url: "{{ url('/sales/searchDate') }}",
                    method: 'post',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        from: jQuery('#from').val(),
                        to: jQuery('#to').val(),
                    },
                    success: function(result){
                        $('#sale_table > tr > td').remove();
                        var a = result.data;
                        for(var i = 0; i < a.length; i++){
                            $('#sale_table').append('<tr>')
                                .append('<td>'+a[i].id+'</td>')
                                .append('<td>'+a[i].name+'</td>')
                                .append('<td>'+a[i].address+'</td>')
                                .append('<td>'+a[i].phone+'</td>')
                                .append('<td>'+a[i].product+'</td>')
                                .append('<td>'+a[i].qty+'</td>')
                                .append('</tr>');
                        }
                    }});
            });
        });
        function getData(e){
            $('#sale_table').empty();
            var getBtnId = e.id
            jQuery.ajax({
               url:"{{ url('/sales/searchBtn/') }}"+'/'+getBtnId,
               method: 'post',
               data: {
                   "_token": "{{ csrf_token() }}",
               },
               success: function(result){
                   // $('#sale_table > tr').remove();
                   var a = result.data;
                   for(var i = 0; i < a.length; i++){
                       $('#sale_table').append('<tr>')
                           .append('<td>'+a[i].id+'</td>')
                           .append('<td>'+a[i].name+'</td>')
                           .append('<td>'+a[i].address+'</td>')
                           .append('<td>'+a[i].phone+'</td>')
                           .append('<td>'+a[i].product+'</td>')
                           .append('<td>'+a[i].qty+'</td>')
                           .append('</tr>');
                   }
               }
            });
        }
        function refresh(){
            window.location.reload();
        }


    </script>
@endsection


