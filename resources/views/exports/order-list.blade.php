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
    
    <div >
        <table width="100%">
            <td width="10%">
                <img  src="{{public_path('assets/img/logo-setjen.jpg')}}" height="150" width="150">
            </td>
            <td width="90%" style="text-align: center">
                <div>
                    <h4 style="">SEKRETARIAT JENDERAL</h4>
                    <h4 style="">DEWAN PERWAKILAN RAKYAT REPUBLIK INDONESIA</h4>
                    <p style="font-size: 14px">JLN. JENDERAL GATOT SUBROTO JAKARTA KODE POS 10270</p>
                    <p style="font-size: 14px">TELP (021) 5715 349 FAX (021) 5715 423 / 5715 925, WEBSITE: www.dpr.go.id</p>
                </div>
            </td>
        </table>
        
    </div>
    
    
    <table style="text-align: center; margin-top:40px" border="1" cellspacing="0" cellpadding="8" width="100%">
        <thead>
            <tr>
                <th>Invoice No</th>
                <th>Product</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Quantity</th>
                <th>Status</th>
                <th>Order Time</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($items as $item)
            
            <tr>
                <td>ORM-{{ $item->id }}</td>
                <td>{{ $item->productList->product_name }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->phone_number }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->status }}</td>
                <td>{{ Carbon\Carbon::create($item->created_at)->format('d-m-Y H:i') }}</td>
            </tr>
            
            @empty
            <tr>
                <td colspan="6" style="text-align: center">Data Kosong</td>
            </tr>
            @endforelse
            
        </tbody>
    </table>
    <table style="margin-top: 30px" width="100%">
        <tr>
            <td align="right">Jakarta, {{ \Carbon\Carbon::now()->format('d - m - Y') }}</td>
        </tr>
        {{-- <tr>
            <td align="right"><span style="margin-right:45px">Mengetahui,</span></td>
        </tr>
        <tr>
            <td align="right"><span style="margin-right:60px">Pimpinan</span></td>
        </tr> --}}
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