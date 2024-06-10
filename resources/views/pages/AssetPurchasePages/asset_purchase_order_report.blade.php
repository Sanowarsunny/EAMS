<!-- Place this PHP function at the top of your Blade file or in an autoloaded helper file -->
<?php
if (!function_exists('number_to_words')) {
    function number_to_words($number) {
        $formatter = new NumberFormatter("en", NumberFormatter::SPELLOUT);
        return $formatter->format($number);
    }
}
?>



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
            margin-bottom: 20px;
        }
        .header h2, .header p {
            margin: 0;
        }
        .header p {
            margin-top: 5px;
        }
        .info-table {
            width: 100%;
            border-collapse: collapse;
            border: none;
            margin-bottom: 20px;
        }
        .info-table th, .info-table td {
            border: none;
            padding: 8px;
            text-align: left;
        }
        .info-table th {
            background-color: #f2f2f2;
        }
        .report-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .report-table th, .report-table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }
        .report-table th {
            background-color: #f2f2f2;
        }
        .footer {
            margin-top: 30px;
        }
        .footer p {
            margin: 5px 0;
        }
        
        .note {
            margin-top: 30px;
        }
        .note p {
            margin: 5px 0;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <main id="main" class="main">
        <section class="section">
            <div class="header">
                <h2>{{ $purchaseOrder->company->name }}</h2>
                <p>{{ $purchaseOrder->company->address }}</p>
                <p>Asset Purchase Order Report</p>
                <p>Print Date: {{ \Carbon\Carbon::now()->format('d-M-Y') }}</p>
            </div>

            <table class="info-table">
                <tr>
                    <td>
                        <p><strong>PO Gen ID:</strong> {{ $purchaseOrder->po_gen_id }}</p>
                        <p><strong>Workshop:</strong> {{ $purchaseOrder->workshop->name }}</p>
                        <p><strong>Supplier:</strong> {{ $purchaseOrder->supplier->name }}</p>
                        <p><strong>LC NO:</strong> {{ $purchaseOrder->LC_no }}</p>
                        <p><strong>LC Date:</strong> {{ $purchaseOrder->LC_date }}</p>

                    </td>
                    <td>
                        <p><strong>PO Date:</strong> {{ $purchaseOrder->created_at }}</p>
                        <p><strong>Currency:</strong> {{ $purchaseOrder->currency }}</p>
                        <p><strong>Prepared By:</strong> {{ $purchaseOrder->updated_by }}</p>
                        <p><strong>Approved By:</strong> {{ $purchaseOrder->approver}}</p>
                        <p><strong>Status:</strong> {{ $purchaseOrder->status }}</p>
                    </td>
                </tr>
            </table>

            <table class="report-table">
                <thead>
                    <tr>
                        <th>SL No</th>
                        <th>Item Name</th>
                        <th>Brand</th>
                        <th>Category Type</th>
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
                        <td colspan="6" style="text-align: right;"><strong>Grand Total:</strong></td>
                        <?php $totalAmount = $purchaseOrder->details->sum('total_amount'); ?>
                        <td>{{ $totalAmount }}</td>
                    </tr>
                </tfoot>
            </table>


            <div class="footer">
                
                    <?php $totalAmountWords = ucfirst(number_to_words($totalAmount)); ?>
                
                <p><strong>In Word:</strong> {{ $totalAmountWords }} Only</p>
            </div>

            

            <div class="note">
                <p><strong>Note:</strong></p>
                <ol>
                    <li>Partial Delivery is allowed.</li>
                    <li>After passing QC, Item will be stored else item(s) may return.</li>
                    <li>Bill pay will execute Only QC passed item(s).</li>
                    <li>Depends on company policy.</li>
                </ol>
            </div>
        </section>
    </main>

    <script src="{{ asset('admin/assets/js/main.js') }}"></script>
</body>
</html>
