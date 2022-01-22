@extends('layouts.layout')
@section('content')
    @if(session()->has('message'))
        <script type="text/javascript">
            alert('저장되었습니다.')
        </script>
    @endif
    @if(session()->has('error'))
        <script type="text/javascript">
            alert('주문수량 한도 초과입니다.')
        </script>
    @endif
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> 주문</h4>
                        <button type="button" class="btn btn-primary newOrdBtn" data-toggle="modal" data-target="#exampleModal">
                            신규주문
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <tr>
                                        <th>번호</th>
                                        <th>상품</th>
                                        <th>주문수량</th>
                                        <th>이름</th>
                                        <th>주소</th>
                                        <th>전화번호</th>
                                        <th>예정 출하일</th>
                                        <th>주문상황</th>
                                        <th>액션</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if($orders != null)
                                @foreach($orders as $key => $order)
                                    <tr>
                                        <td class="ord_num">{{$orders->firstItem() + $key}}</td>
                                        <td class="ord_pName">{{$order->product->name ?? null}}</td>
                                        <td class="ord_qty">{{$order->qty ?? null}}</td>
                                        <td class="ord_cName">{{$order->customer_name ?? null}}</td>
                                        <td class="ord_ad">{{$order->address ?? null}}</td>
                                        <td class="ord_phone">{{$order->phone ?? null}}</td>
                                        <td class="ord_eta">{{str_replace('00:00:00','',$order->eta) ?? null}}</td>
                                        <td class="ord_status">{{$order->status->status}}</td>
                                        <td>
                                            <a href="#" data-toggle="modal" id="{{ $order->id }}" data-target="#editModal" onclick="whichOne(this)">
                                                수정
                                            </a> /
                                            <a onclick="return confirm('선택하신 주문이 삭제됩니다.')" href="{{ route('order.destroy', ['id' => $order->id]) }}">삭제</a> /
                                            <a href="#">프린트</a></td>
                                    </tr>
                                @endforeach
                                @endif
                                </tbody>
                            </table>
                            @include('order.add')
                            @include('order.edit')
                        </div>
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

