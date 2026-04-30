<div id="paginationArea" class="card-footer bg-white border-top py-3">
    <div class="d-flex align-items-center justify-content-between">
        <span class="text-muted small">
            Showing {{$products->firstItem()}} to {{$products->lastItem()}} of {{$products->total()}} products
        </span>
            {{ $products->links() }}
    </div>
</div>