<div class="row">
    <div class="col-lg-3 col-md-4 col-6 mb-3">
        <div class="mx-2">
            <div class="card animate__animated animate__fadeIn rounded-4 border-0">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="title">
                            <span class="h2 fs-3" id="product">00</span><br>
                            <span class="text-muted">Product</span>
                        </div>
                        <div class="store-icon">
                            <div class="store-icon-bg p-2 rounded text-light">
                                <img src="{{ asset('images/icons8-shop-32.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-6 mb-3">
        <div class="mx-2">
            <div class="card animate__animated animate__fadeIn rounded-4 border-0">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="title">
                            <span class="h2 fs-3" id="category">00</span><br>
                            <span class="text-muted">Category</span>
                        </div>
                        <div class="store-icon">
                            <div class="store-icon-bg p-2 rounded text-light">
                                <img src="{{ asset('images/icons8-shop-32.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-6 mb-3">
        <div class="mx-2">
            <div class="card animate__animated animate__fadeIn rounded-4 border-0">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="title">
                            <span class="h2 fs-3" id="customer">00</span><br>
                            <span class="text-muted">Customer</span>
                        </div>
                        <div class="store-icon">
                            <div class="store-icon-bg p-2 rounded text-light">
                                <img src="{{ asset('images/icons8-shop-32.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-6 mb-3">
        <div class="mx-2">
            <div class="card animate__animated animate__fadeIn rounded-4 border-0">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="title">
                            <span class="h2 fs-3" id="invoice">00</span><br>
                            <span class="text-muted">Invoice</span>
                        </div>
                        <div class="store-icon">
                            <div class="store-icon-bg p-2 rounded text-light">
                                <img src="{{ asset('images/icons8-shop-32.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-6 mb-3">
        <div class="mx-2">
            <div class="card animate__animated animate__fadeIn rounded-4 border-0">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="title">
                            <span class="h2 fs-3">$<span id="total">00</span></span><br>
                            <span class="text-muted">Total Sale</span>
                        </div>
                        <div class="store-icon">
                            <div class="store-icon-bg p-2 rounded text-light">
                                <img src="{{ asset('images/icons8-shop-32.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-6 mb-3">
        <div class="mx-2">
            <div class="card animate__animated animate__fadeIn rounded-4 border-0">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="title">
                            <span class="h2 fs-3">$<span id="vat">00</span></span><br>
                            <span class="text-muted">Vat Collection</span>
                        </div>
                        <div class="store-icon">
                            <div class="store-icon-bg p-2 rounded text-light">
                                <img src="{{ asset('images/icons8-shop-32.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-6 mb-3">
        <div class="mx-2">
            <div class="card animate__animated animate__fadeIn rounded-4 border-0">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="title">
                            <span class="h2 fs-3">$<span id="payable">00</span></span><br>
                            <span class="text-muted">Total Collection</span>
                        </div>
                        <div class="store-icon">
                            <div class="store-icon-bg p-2 rounded text-light">
                                <img src="{{ asset('images/icons8-shop-32.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('script')
<script>
    getList();

   async function getList() {
        showLoader();

        const res = await axios.get("/summary");
        document.getElementById('product').innerText = res.data.product;
        document.getElementById('category').innerText = res.data.category;
        document.getElementById('customer').innerText = res.data.customer;
        document.getElementById('invoice').innerText = res.data.invoice;
        document.getElementById('total').innerText = res.data.total;
        document.getElementById('vat').innerText = res.data.vat;
        document.getElementById('payable').innerText = res.data.payable;

        hideLoader();
    }
</script>
@endsection
