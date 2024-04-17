<div class="modal fade" id="modalDelete">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('marketplace.destroy') }}" method="post" autocomplete="off">
                {{ method_field('delete') }}
                {{ csrf_field() }}
                <div class="modal-body">
                    <p>هل انت متاكد من عملية الحذف ؟</p>
                    <input type="hidden" name="product_id" id="product_id" value="">
                    <input type="text" class="form-control" name="product_name" id="product_name" readonly>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">تاكيد</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                </div>
            </form>
        </div>
    </div>
</div>
