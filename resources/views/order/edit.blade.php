
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
            <form role="form" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="product">상품</label>
                        <select class="form-control" name="product_id" id="product_id">
                            @foreach($products as $p)
                                <option value="{{$p->id}}">{{$p->name}}</option>
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
                        <label for="exampleInputEmail1">배송비</label>
                        <input type="number" class="form-control" name="delivery" id="ord_delivery">
                    </div>
                    <div class="form-group">
                        <label for="status">주문상태</label>
                        <select class="form-control" name="status" id="ord_status">
                            <option value="1">배송준비</option>
                            <option value="2">배송완료</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary editOrd">Submit</button>
                    <input type="hidden" id="setId">
                </div>
            </form>
            @endif
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
<script>
    function whichOne(id){
        var setId = id.id;
        var tr = id.closest("tr");
        $('#qty').val(tr.querySelectorAll('.ord_qty')[0].innerHTML);
        $('#name').val(tr.querySelectorAll('.ord_cName')[0].innerHTML);
        $('#address').val(tr.querySelectorAll('.ord_ad')[0].innerHTML);
        $('#phone').val(tr.querySelectorAll('.ord_phone')[0].innerHTML);
        $('#eta').val(tr.querySelectorAll('.ord_eta')[0].innerHTML);
        $('#setId').val(setId) ?? null;
    }
    $('.editOrd').click(function (){
        var getId = $('#setId').val();
        var url = '{{url('order')}}';
        url = url+'/'+getId;
        var getStatus = $('#ord_status option:selected').val();
        if(getStatus == 2){
            confirm('주문을 완료합니다.');
        }
        $.ajax({
            url: url,
            method: 'PATCH',
            data: {
                'product_id': $('#product_id option:selected').val(),
                'qty': $('#qty').val(),
                'name': $('#name').val(),
                'address': $('#address').val(),
                'phone': $('#phone').val(),
                'eta': $('#eta').val(),
                'delivery': $('#ord_delivery').val(),
                'status': getStatus,
                "_token": '{{csrf_token()}}',
            },
            success: function(data){
                location.reload();
            }
        })
    });


</script>

