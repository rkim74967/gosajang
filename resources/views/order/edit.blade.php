
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">주문수정</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @if(count($orders))
            <form action="{{url('/order/')}}/{{$order->id}}/edit" method="PUT" id="editForm">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="product">상품</label>
                        <select class="form-control" name="product_name">
                            @foreach($products as $p)
                                <option value="{{$p->name}}">{{$p->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">주문수량</label>
                        <input type="number" class="form-control" name="qty" id="qty">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">이름</label>
                        <input type="text" class="form-control" name="customer_name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">주소</label>
                        <input type="text" class="form-control" name="address" id="address">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">전화번호</label>
                        <input type="text" class="form-control" name="phone" id="phone">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">예정출하일</label>
                        <input type="date" class="form-control" name="eta" id="eta">
                    </div>
                    <div class="form-group">
                        <label for="product">주문상태</label>
                        <select class="form-control" name="status" id="status">
                            <option value="0">배송준비</option>
                            <option value="1">배송완료</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            @endif
        </div>
    </div>
</div>

<script>

    function whichOne(id){
        var i = id.id;
        var tr = id.closest("tr");
        $('#product').val(tr.querySelectorAll('.ord_pName')[0].innerHTML);
        $('#qty').val(tr.querySelectorAll('.ord_qty')[0].innerHTML);
        $('#name').val(tr.querySelectorAll('.ord_cName')[0].innerHTML);
        $('#address').val(tr.querySelectorAll('.ord_ad')[0].innerHTML);
        $('#phone').val(tr.querySelectorAll('.ord_phone')[0].innerHTML);
        $('#eta').val(tr.querySelectorAll('.ord_eta')[0].innerHTML);
        $('#editForm').attr(`action`,`{{url('/order/')}}`+'/'+i+`/edit`);
    }

</script>

