
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">수정</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('/sales/')}}/{{$sale->id}}/edit" method="PUT" id="editForm">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">이름</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">수량</label>
                        <input type="number" class="form-control" name="qty" id="qty">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>

    function whichOne(id){
        var i = id.id;
        var tr = id.closest("tr");
        $('#name').val(tr.querySelectorAll('.name')[0].innerHTML);
        $('#qty').val(tr.querySelectorAll('.qty')[0].innerHTML);
        $('#editForm').attr(`action`,`{{url('/order/')}}`+'/'+i+`/edit`);


    }

</script>

