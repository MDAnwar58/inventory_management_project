@extends('layout.sideNav-layout')

@section('title', 'Report Page')

@section('content')
    <div class="container text-light text-dark">
        <div class="row">
            <div class="col-md-3">
                <div class="card card-body p-4">
                    <div class="h5 text-muted">Sale Report generate</div>
                    <label for="" class="fs-6 fw-semibold text-secondary">Date From</label>
                    <input type="date" id="FormDate" class="form-control focus-ring mb-2"
                        style="--bs-focus-ring-color: rgba(var(--bs-danger-rgb), .25)">
                    <label for="" class="fs-6 fw-semibold text-secondary">Date To</label>
                    <input type="date" id="ToDate" class="form-control focus-ring mb-2"
                        style="--bs-focus-ring-color: rgba(var(--bs-danger-rgb), .25)">
                    <button type="button" onclick="SalesReport()"
                        class="btn text-light btn-sm px-4 report_download">Download</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function SalesReport() {
            let FormDate = document.getElementById('FormDate').value;
            let ToDate = document.getElementById('ToDate').value;
            if (FormDate.length === 0 || ToDate.length === 0) {
                errorToast("Date Range Report!");
            }else{
                window.open('/sales-report/'+FormDate+'/'+ToDate);
            }
        }
    </script>
@endsection
