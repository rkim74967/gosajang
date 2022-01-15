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
                        <h4 class="card-title"> 상품</h4>
                        <button type="button" class="btn btn-primary newOrdBtn" data-toggle="modal" data-target="#exampleModal">
                            신규상품
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <tr>
                                        <th>번호</th>
                                        <th>상품</th>
                                        <th>수량</th>
                                        <th>액션</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $key => $product)
                                    <tr>
                                        <td class="num">{{$products->firstItem() + $key }}</td>
                                        <td class="name">{{$product->name}}</td>
                                        <td class="qty">{{$product->qty}}</td>
                                        <td class="price">{{number_format((double)str_replace(',','',$product->price), 0)}}원</td>
                                        <td>
                                            <a href="#" data-toggle="modal" id="{{ $product->id }}" data-target="#editModal" onclick="whichOne(this)">
                                                수정
                                            </a> /
                                            <a href="#" id="{{ $product->id }}" onclick="removeThis(this)">삭제</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            @include('product.add')
                            @include('product.edit')
                        </div>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

<script>
    function removeThis(id){
        var setId = id.id;
        var token = $(this).data("token");
        var url = '{{url('product/')}}';
        url = url+'/'+setId;
        console.log(url);

        if(confirm("삭제하시겠습니까?")){
            $.ajax({
                url: url,
                type: 'DELETE',  // user.destroy
                data: {
                    "id": setId,
                    "_token": '{{csrf_token()}}',
                },
                success: function(result) {
                    location.reload();
                }
            });
        }


    }
</script>
