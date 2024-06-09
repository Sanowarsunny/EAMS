<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asset Purchase Order Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .header {
            text-align: center;
            padding: 10px;
        }
        .header h2 {
            margin: 0;
        }
        .info-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .info-container > div {
            width: 48%;
        }
        .info-container p {
            margin: 5px 0;
        }
        .report-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .report-table th, .report-table td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .report-table th {
            background-color: #f2f2f2;
        }
        .signature {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 50px;
        }
        .signature div {
            flex-basis: calc(33.33% - 10px);
            text-align: center;
        }
        .signature p {
            margin: 0;
        }
    </style>
</head>
<body>
    <main id="main" class="main">
        <section class="section">
            <div class="header">
                <h2>Asset Purchase Order Report</h2>
            </div>

            <div class="info-container">
                <div class="order-info">
                    <p><strong>PO Gen ID:</strong> {{ $purchaseOrder->po_gen_id }}</p>
                    <p><strong>Approver:</strong> {{ $purchaseOrder->approver }}</p>
                    <p><strong>Workshop:</strong> {{ $purchaseOrder->workshop->name }}</p>
                    <p><strong>Supplier:</strong> {{ $purchaseOrder->supplier->name }}</p>
                    <p><strong>Status:</strong> {{ ucfirst($purchaseOrder->status) }}</p>
                </div>
                <div class="company-info">
                    <p><strong>Company Name:</strong> {{ $purchaseOrder->company->name }}</p>
                    <p><strong>Company Address:</strong> {{ $purchaseOrder->company->address }}</p>
                    <p><strong>Report Date:</strong> {{ \Carbon\Carbon::now()->format('d-M-Y') }}</p>
                </div>
            </div>

            <table class="report-table">
                <thead>
                    <tr>
                        <th>SL NO</th>
                        <th>Item Name</th>
                        <th>Brand</th>
                        <th>Model</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($purchaseOrder->details as $index => $detail)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $detail->categorymodel->name }}</td>
                        <td>{{ $detail->brand->name }}</td>
                        <td>{{ $detail->categorymodel->categorytype->name }}</td>
                        <td>{{ $detail->quantity }}</td>
                        <td>{{ $detail->unit_price }}</td>
                        <td>{{ $detail->total_amount }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="6" style="text-align: right;">Grand Total:</td>
                        <td>{{ $purchaseOrder->details->sum('total_amount') }}</td>
                    </tr>
                </tfoot>
            </table>

            <div class="signature">
                <div>
                    <p>_________________________</p>
                    <p>Received By</p>
                </div>
                <div>
                    <p>_________________________</p>
                    <p>Prepared By</p>
                </div>
                <div>
                    <p>_________________________</p>
                    <p>Approved By</p>
                </div>
            </div>
        </section>
    </main>

    <script src="{{ asset('admin/assets/js/main.js') }}"></script>
</body>
</html>
