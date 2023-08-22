<div class="container text-light text-dark sale_page">
    <div class="row main_row pb-5">
        <div class="col-lg-4 col-md-6">
            <div class="card card-body">
                <div class="row billed_row px-3">
                    <div class="col-8">
                        <h5 class="text-uppercase">billed to</h5>
                        <div class="text-muted text-info">Name: <span id="CName"></span></div>
                        <div class="text-muted text-info">Email: <span id="CEmail"></span></div>
                        <div class="text-muted text-info">User Id: <span id="CId"></span></div>
                    </div>
                    <div class="col-4">
                        <div class="">
                            <img src="{{ url('images/logo.png') }}" style="width: 40px; height: 15px;" alt="">
                            <div class="h6">Invoice</div>
                            <div class="text-muted text-info">Date: <span>{{ date('Y-m-d') }}</span></div>
                        </div>
                    </div>
                    <hr class="mt-3">
                    <div class="col-md-12">
                        <table class="table table-hover" id="billed_table">
                            <thead>
                                <tr class="">
                                    <th class="text-muted fw-normal">Name</th>
                                    <th class="text-muted fw-normal">Qty</th>
                                    <th class="text-muted fw-normal">Total</th>
                                    <th class="text-muted fw-normal">Remove</th>
                                </tr>
                            </thead>
                            <tbody id="invoiceList"></tbody>
                        </table>
                    </div>
                    <hr class="mt-3">
                    <div class="col-md-12">
                        <h6 class="text-uppercase text-amount">Total: $<span id="total"></span></h6>
                        <h6 class="text-uppercase text-amount">Payable: $<span id="payable"></span></h6>
                        <h6 class="text-uppercase text-amount">vat(5%): $<span id="vat"></span></h6>
                        <h6 class="text-uppercase text-amount">Discount: $<span id="discount"></span></h6>
                        <div class="form-group">
                            <label for="discount" class="text-muted text-discount">Discount(%)</label><br>
                            <div class="input-group">
                                <input type="text" id="discountP" value="0" onchange="DiscountChange()"
                                    class="text-center border border-1 border-dark rounded-end-0 border-end-0 border-secondary rounded text-secondary py-1"
                                    style="width: 115px;">
                                <span class="input-group-text bg-transparent border border-start-0 border-dark">
                                    <div>
                                        <div class="increment_btn text-secondary" onclick="increment_btn()">
                                            <i class="fa fa-chevron-up" style="font-size: 9px;" aria-hidden="true"></i>
                                        </div>
                                        <div class="decrement_btn text-secondary" onclick="decrement_btn()">
                                            <i class="fa fa-chevron-down" style="font-size: 9px;"
                                                aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </span>
                            </div>
                        </div>
                        <button type="button" onclick="createInvoice()"
                            class="btn btn-danger mt-2 px-5 confirm_button text-uppercase">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 px-lg-3 ps-md-3 mt-md-0 mt-3">
            <div class="card card-body">
                <table class="table table-hover" id="productTable">
                    <thead>
                        <tr>
                            <th scope="col" class="text-muted fw-normal">Product</th>
                            <th scope="col" class="text-muted fw-normal">Pick</th>
                        </tr>
                    </thead>
                    <tbody id="productList"></tbody>
                </table>
            </div>
        </div>
        <div class="d-lg-none col-md-3"></div>
        <div class="col-lg-4 col-md-6 mt-lg-0 mt-3 mb-md-0">
            <div class="card card-body">
                <table class="table table-hover" id="customerTable">
                    <thead>
                        <tr>
                            <th scope="col" class="text-muted fw-normal">Customer</th>
                            <th scope="col" class="text-muted fw-normal">Pick</th>
                        </tr>
                    </thead>
                    <tbody id="customerList"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@section('script')
    <script>
        (async () => {
            showLoader();
            await CustomerList();
            await ProductList();
            hideLoader();
        })();

        let InvoiceItemList = [];

        function ShowInvoiceItem() {
            let InvoiceList = $('#invoiceList');
            InvoiceList.empty();

            InvoiceItemList.forEach((item, index) => {
                let row = `<tr>
                                    <th>${item['product_name']}</th>
                                    <td>${item['qty']}</td>
                                    <td>${item['sale_price']}</td>
                                    <td>
                                        <button type="button" data-index="${index}" class="btn btn-light btn-sm text-uppercase rounded-3 text-muted remove">remove</button>
                                    </td>
                                </tr>`;
                InvoiceList.append(row);
            });

            CalculateGrandTotal();

            $('.remove').on('click', function() {
                let index = $(this).data('index');
                removeItem(index);
            });
        }

        function removeItem(index) {
            InvoiceItemList.splice(index, 1);
            ShowInvoiceItem();
        }

        function DiscountChange() {
            CalculateGrandTotal();
        }

        function CalculateGrandTotal() {
            let Total = 0;
            let Vat = 0;
            let Payable = 0;
            let Discount = 0;
            let discountPercentage = (parseFloat(document.getElementById('discountP').value));

            InvoiceItemList.forEach(function(item) {
                Total = Total + parseFloat(item['sale_price']);
            });
            if (discountPercentage === 0) {
                Vat = ((Total * 5) / 100).toFixed(2);
            } else {
                Discount = (Total * discountPercentage) / 100;
                Total = (Total - ((Total * discountPercentage) / 100)).toFixed(2);
                Vat = ((Total * 5) / 100).toFixed(2);
            }

            Payable = (parseFloat(Total) + parseFloat(Vat)).toFixed(2);
            // console.log("Total:"Total, "Payable:"Payable, "Vat:"Vat, "Discount:"Discount);
            document.getElementById('total').innerText = Total;
            document.getElementById('payable').innerText = Payable;
            document.getElementById('vat').innerText = Vat;
            document.getElementById('discount').innerText = Discount;
        }

        function add() {
            let PId = document.getElementById('PId').value;
            let PName = document.getElementById('PName').value;
            let PPrice = document.getElementById('PPrice').value;
            let PQty = document.getElementById('PQty').value;
            let PTotalPrice = (parseFloat(PPrice) * parseFloat(PQty)).toFixed(2);

            if (PId.length === 0) {
                errorToast("Product ID Required");
            } else if (PName.length === 0) {
                errorToast("Product Name Required");
            } else if (PPrice.length === 0) {
                errorToast("Product Price Required");
            } else if (PQty.length === 0) {
                errorToast("Product Quantity Required");
            } else {
                let item = {
                    product_name: PName,
                    product_id: PId,
                    qty: PQty,
                    sale_price: PTotalPrice
                };
                InvoiceItemList.push(item);
                console.log(InvoiceItemList);
                $("#add_product").modal("hide");
                ShowInvoiceItem();
            }
        }

        function addModal(id, name, price) {
            document.getElementById('PId').value = id;
            document.getElementById('PName').value = name;
            document.getElementById('PPrice').value = price;
            $('#add_product').modal('show');
        }
        async function CustomerList() {
            let res = await axios.get('/list-customer');
            let customerList = $('#customerList');
            let customerTable = $('#customerTable');
            if ($.fn.DataTable.isDataTable(customerTable)) {
                customerTable.DataTable().destroy();
                customerTable.empty();
            }

            res.data.forEach((item, index) => {
                let row = `
                        <tr>
                            <td class="text-muted">
                                <i class="fa fa-user-o me-1" aria-hidden="true"></i>${item['name']}
                            </td>
                            <td>
                                <button type="button"
                                data-name="${item['name']}" data-email="${item['email']}" data-id="${item['id']}"
                                    class="btn btn-sm btn-outline-dark text-uppercase rounded-3 add_btn addCustomer">add</button>
                            </td>
                        </tr>
                    `;
                customerList.append(row);
            });

            $('.addCustomer').on('click', function() {
                let name = $(this).data('name');
                let email = $(this).data('email');
                let id = $(this).data('id');

                $('#CName').text(name);
                $('#CEmail').text(email);
                $('#CId').text(id);
            });

            customerTable.DataTable({
                order: [
                    [0, 'desc']
                ],
                paging: true,
                pageLength: 10,
                lengthChange: false,
                info: false,
                responsive: true
            });
        }


        async function ProductList() {
            let res = await axios.get('/list-product');
            let productList = $('#productList');
            let productTable = $('#productTable');
            if ($.fn.DataTable.isDataTable(productTable)) {
                productTable.DataTable().destroy();
                productTable.empty();
            }

            res.data.forEach(function(item, index) {
                let row = `
                        <tr>
                            <td>
                                <img src="${item['img_url']}" style="width: 20px; height: 20px;"
                                    alt="">
                                <span class="text-muted">${item['name']} ($ ${item['price']})</span>
                            </td>
                            <td>
                                <button type="button"
                                    data-id="${item['id']}" data-price="${item['price']}" data-name="${item['name']}"
                                    class="btn btn-sm btn-outline-dark text-uppercase rounded-3 add_btn addProduct"
                                    data-bs-toggle="modal" data-bs-target="#add_product">
                                    add
                                </button>
                            </td>
                        </tr>
                    `;
                productList.append(row);
            });

            $('.addProduct').on('click', async function() {
                let PName = $(this).data('name');
                let PPrice = $(this).data('price');
                let PId = $(this).data('id');
                addModal(PId, PName, PPrice);
            });

            productTable.DataTable({
                order: [
                    [0, 'desc']
                ],
                paging: true,
                pageLength: 10,
                lengthChange: false,
                info: false,
                responsive: true
            });
        }

        async function createInvoice() {
            let total = document.getElementById('total').innerText;
            let payable = document.getElementById('payable').innerText;
            let vat = document.getElementById('vat').innerText;
            let discount = document.getElementById('discount').innerText;
            let CId = document.getElementById('CId').innerText;

            let Data = {
                "total": total,
                "discount": discount,
                "vat": vat,
                "payable": payable,
                "customer_id": CId,
                "products": InvoiceItemList
            }

            if (CId.length === 0) {
                errorToast("Customer Required!")
            } else if (InvoiceItemList.length === 0) {
                errorToast("Product Required!")
            } else {
                showLoader();
                let res = await axios.post('/invoice-create', Data);
                hideLoader();
                if (res.data === 1) {
                    successToast("Invoice Created");
                    window.location.href = '/invoicePage';
                } else {
                    errorToast("Something Went Wrong");
                }
            }
        }

        function increment_btn() {
            let discountValue = document.getElementById("discountP");
            discountValue.value = (parseFloat(discountValue.value) + .25).toFixed(2);
            CalculateGrandTotal();
        }

        function decrement_btn() {
            let discountValue = document.getElementById("discountP");
            if (discountValue.value > 0) {
                discountValue.value = (parseFloat(discountValue.value) - .25).toFixed(2);
                CalculateGrandTotal();
            }
        }
    </script>
@endsection
