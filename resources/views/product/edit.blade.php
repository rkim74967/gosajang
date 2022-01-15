
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">수정</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form role="form" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">이름</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">수량</label>
                        <input type="number" class="form-control" name="qty" id="qty">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">가격</label>
                        <input type="text" class="form-control" name="price" id="price">
                        <input type="hidden" id="setId">
                    </div>
                    <button type="button" class="btn btn-primary editPrd">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
<script>

    function whichOne(id){
        var setId = id.id;
        var tr = id.closest("tr");
        $('#name').val(tr.querySelectorAll('.name')[0].innerHTML) ?? null;
        $('#qty').val(tr.querySelectorAll('.qty')[0].innerHTML) ?? null;
        $('#price').val(tr.querySelectorAll('.price')[0].innerHTML.replace('원','')) ?? null;
        $('#setId').val(setId) ?? null;
    }
    $('.editPrd').click(function (){
        var getId = $('#setId').val();
        var url = '{{url('product')}}';
        url = url+'/'+getId;
        console.log(url);

        $.ajax({
            url: url,
            method: 'PATCH',
            data: {
                'name': $('#name').val(),
                'qty': $('#qty').val(),
                'price': $('#price').val(),
                "_token": '{{csrf_token()}}',
            },
            success: function(){
                location.reload();
            }
        })
    });

</script>

