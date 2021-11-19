<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
        @page {
            margin: 0cm 0cm;
        }
        body {
            margin-top: 3cm;
            margin-left: 2cm;
            margin-right: 2cm;
            margin-bottom: 2cm;
            color: #000;
        }
        
        
        table tr th{
            font-size: 15px;
        }
        
        table tr td{
            font-size: 12px;
        }
        p {
            font-size: 12px;
        }
        
    </style>
    
</head>
<body>
    
    <div style="text-align: center">
        <h5 style="display:inline !important">Movement Request</h5>
        <h5 style="margin-top:0">{{ Carbon\Carbon::parse($item->approved_at)->format('Y') }}/MR-{{ $item->id }}/{{ $item->id }}</h5>
    </div>
    
    <table >
        <tr>
            <td>No</td>
            <td>: MR-{{ $item->id }}</td>
        </tr>
        <tr>
            <td>Invoice</td>
            <td>: ORM-{{ $item->id }}</td>
        </tr>
        <tr>
            <td>Client</td>
            <td>: {{ $item->name }}</td>
        </tr>
        <tr>
            <td>Phone Number</td>
            <td>: {{ $item->phone_number }}</td>
        </tr>
        <tr>
            <td>Approved At</td>
            <td>: {{ Carbon\Carbon::parse($item->approved_at)->format('d-m-Y H:i') }}</td>
        </tr>
    </table>
    
    <table style="text-align: center; " border="1" cellspacing="0" cellpadding="8" width="100%">
        <thead>
            <tr>
                <th></th>
                <th>Category Product</th>
                <th>Product Name</th>
            </tr>
        </thead>
        <tbody>
            
            <tr>
                <td>1</td>
                <td>{{ $item->productList->productCategory->category }}</td>
                <td>{{ $item->productList->product_name }}</td>
            </tr>
            <tr>
                <td colspan="2">Total Product</td>
          
                <td>{{ $item->quantity }}</td>
            </tr>

            
        </tbody>
    </table>
    <table style="margin-top: 30px" width="100%">
        <tr>
            <td align="right">Jakarta, {{ \Carbon\Carbon::now()->format('d - m - Y') }}</td>
        </tr>
        <tr><td></td></tr>
        <tr><td></td></tr>
        <tr><td></td></tr>
        <tr><td></td></tr>
        <tr><td></td></tr>
        <tr><td></td></tr>
        <tr><td></td></tr>
        <tr><td></td></tr>
        <tr><td></td></tr>
        <tr><td></td></tr>
        <tr><td></td></tr>
        <tr><td></td></tr>
        <tr><td></td></tr>
        <tr><td></td></tr>
        <tr>
            <td align="right"><span style="margin-right:5px;">.................................. </span> 
            </td>
        </tr>
    </table>
</body>
</html>