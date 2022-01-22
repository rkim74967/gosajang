<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">신규주문</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{action('OrderController@store')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">상품</label>
                        <select class="form-control" name="product_id">
                            @foreach($products as $p)
                            <option value="{{$p->id}}">{{$p->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">주문수량</label>
                        <input type="number" class="form-control" name="qty">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">이름</label>
                        <input type="text" class="form-control" name="customer_name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">주소</label>
                        <input type="text" class="form-control" name="address">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">전화번호</label>
                        <input type="text" class="form-control" name="phone">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">예정출하일</label>
                        <input type="date" class="form-control" name="eta">
                    </div>
                    <div class="form-group">
                        <label for="product">주문상태</label>
                        <select class="form-control" name="status" id="status">
                            <option value="1">배송준비</option>
{{--                            <option value="2">배송완료</option>--}}
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

