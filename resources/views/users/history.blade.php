@extends('layouts.app') @section('content')
    {{-- CDN MDB --}}
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    
    {{-- END CDN MDB --}}
    <div class="top-spacer"></div>
    

<style>
    body{margin-top:20px;}
select.form-control:not([size]):not([multiple]) {
    height: 44px;
}
select.form-control {
    padding-right: 38px;
    background-position: center right 17px;
    background-image: url(data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNv…9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K);
    background-repeat: no-repeat;
    background-size: 9px 9px;
}
.form-control:not(textarea) {
    height: 44px;
}
.form-control {
    padding: 0 18px 3px;
    border: 1px solid #dbe2e8;
    border-radius: 22px;
    background-color: #fff;
    color: #606975;
    font-family: "Maven Pro",Helvetica,Arial,sans-serif;
    font-size: 14px;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
}

.shopping-cart,
.wishlist-table,
.order-table {
    margin-bottom: 20px
}

.shopping-cart .table,
.wishlist-table .table,
.order-table .table {
    margin-bottom: 0
}

.shopping-cart .btn,
.wishlist-table .btn,
.order-table .btn {
    margin: 0
}

.shopping-cart>table>thead>tr>th,
.shopping-cart>table>thead>tr>td,
.shopping-cart>table>tbody>tr>th,
.shopping-cart>table>tbody>tr>td,
.wishlist-table>table>thead>tr>th,
.wishlist-table>table>thead>tr>td,
.wishlist-table>table>tbody>tr>th,
.wishlist-table>table>tbody>tr>td,
.order-table>table>thead>tr>th,
.order-table>table>thead>tr>td,
.order-table>table>tbody>tr>th,
.order-table>table>tbody>tr>td {
    vertical-align: middle !important
}

.shopping-cart>table thead th,
.wishlist-table>table thead th,
.order-table>table thead th {
    padding-top: 17px;
    padding-bottom: 17px;
    border-width: 1px
}

.shopping-cart .remove-from-cart,
.wishlist-table .remove-from-cart,
.order-table .remove-from-cart {
    display: inline-block;
    color: #ff5252;
    font-size: 18px;
    line-height: 1;
    text-decoration: none
}

.shopping-cart .count-input,
.wishlist-table .count-input,
.order-table .count-input {
    display: inline-block;
    width: 100%;
    width: 86px
}

.shopping-cart .product-item,
.wishlist-table .product-item,
.order-table .product-item {
    display: table;
    width: 100%;
    min-width: 150px;
    margin-top: 5px;
    margin-bottom: 3px
}

.shopping-cart .product-item .product-thumb,
.shopping-cart .product-item .product-info,
.wishlist-table .product-item .product-thumb,
.wishlist-table .product-item .product-info,
.order-table .product-item .product-thumb,
.order-table .product-item .product-info {
    display: table-cell;
    vertical-align: top
}

.shopping-cart .product-item .product-thumb,
.wishlist-table .product-item .product-thumb,
.order-table .product-item .product-thumb {
    width: 130px;
    padding-right: 20px
}

.shopping-cart .product-item .product-thumb>img,
.wishlist-table .product-item .product-thumb>img,
.order-table .product-item .product-thumb>img {
    display: block;
    width: 100%
}

@media screen and (max-width: 860px) {
    .shopping-cart .product-item .product-thumb,
    .wishlist-table .product-item .product-thumb,
    .order-table .product-item .product-thumb {
        display: none
    }
}

.shopping-cart .product-item .product-info span,
.wishlist-table .product-item .product-info span,
.order-table .product-item .product-info span {
    display: block;
    font-size: 13px
}

.shopping-cart .product-item .product-info span>em,
.wishlist-table .product-item .product-info span>em,
.order-table .product-item .product-info span>em {
    font-weight: 500;
    font-style: normal
}

.shopping-cart .product-item .product-title,
.wishlist-table .product-item .product-title,
.order-table .product-item .product-title {
    margin-bottom: 6px;
    padding-top: 5px;
    font-size: 16px;
    font-weight: 500
}

.shopping-cart .product-item .product-title>a,
.wishlist-table .product-item .product-title>a,
.order-table .product-item .product-title>a {
    transition: color .3s;
    color: #374250;
    line-height: 1.5;
    text-decoration: none
}

.shopping-cart .product-item .product-title>a:hover,
.wishlist-table .product-item .product-title>a:hover,
.order-table .product-item .product-title>a:hover {
    color: #0da9ef
}

.shopping-cart .product-item .product-title small,
.wishlist-table .product-item .product-title small,
.order-table .product-item .product-title small {
    display: inline;
    margin-left: 6px;
    font-weight: 500
}

.wishlist-table .product-item .product-thumb {
    display: table-cell !important
}

@media screen and (max-width: 576px) {
    .wishlist-table .product-item .product-thumb {
        display: none !important
    }
}

.shopping-cart-footer {
    display: table;
    width: 100%;
    padding: 10px 0;
    border-top: 1px solid #e1e7ec
}

.shopping-cart-footer>.column {
    display: table-cell;
    padding: 5px 0;
    vertical-align: middle
}

.shopping-cart-footer>.column:last-child {
    text-align: right
}

.shopping-cart-footer>.column:last-child .btn {
    margin-right: 0;
    margin-left: 15px
}

@media (max-width: 768px) {
    .shopping-cart-footer>.column {
        display: block;
        width: 100%
    }
    .shopping-cart-footer>.column:last-child {
        text-align: center
    }
    .shopping-cart-footer>.column .btn {
        width: 100%;
        margin: 12px 0 !important
    }
}

.coupon-form .form-control {
    display: inline-block;
    width: 100%;
    max-width: 235px;
    margin-right: 12px;
}

.form-control-sm:not(textarea) {
    height: 36px;
}


</style>







<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container padding-bottom-3x mb-1">
<!-- Shopping Cart-->
@if (session('alert_scc'))
<br />
<div class="alert alert-success m-auto w-75 m-auto text-center">
    {{ session('alert_scc') }}
</div>
@endif @if (session('alert_err'))
    <br />
    <div class="alert alert-danger m-auto w-75 m-auto text-center">
        {{ session('alert_err') }}
    </div>
@endif

<div class="rounded   bg-primary mb-100">
    <div class="container ">
      <h1 class="display-4 text-center text-light">MY HISTORY</h1>
    
    </div>
  </div>

<br>
<div class="table-responsive shopping-cart">
    @if ( count($HistoOfUsers) > 0 ) 
    <table class="table">
        <thead>
            <tr>
                
                <th class="text-center">Event_Details</th>
                <th class="text-center">PRIX PAYER</th>
                <th class="text-center">payer_email</th>
                <th class="text-center">payment_status</th>
                <th class="text-center">type</th>
                <th class="text-center">Date OF PAY</th>
                <th class="text-center">payment_id</th>
                <th class="text-center">payer_id</th>
            </tr>
        </thead>
        <tbody>
            


     @foreach ($HistoOfUsers as $HistoOfUser)
                    @if ($HistoOfUser->type == 'event')


                          <tr>
                <td> <div class="d-inline-block   rounded
              ">
                    <img src="{{asset('../storage/'.$HistoOfUser->getEvent->photo)}}"
                     alt="" class=" border border-primary rounded  img-40 align-top mr-15">
                    <div class="d-inline-block">
                        <br>
                        <h6 class=" border border-primary">{{$HistoOfUser->getEvent->price}} dt</h6>
                        <p class="text-muted mb-0 border border-warning">{{$HistoOfUser->getEvent->label}}</p>
                    </div>
                </div>
          

                </td>
                <td class="text-center text-lg text-medium">{{$HistoOfUser->getEvent->price}} DT</td>
                <td class="text-center text-lg text-medium">{{$HistoOfUser->payer_email}}</td>
                        @if ($HistoOfUser->payment_status == 'approved') 
                                    <td class="text-center text-lg text-medium text-success 
                                    ">{{$HistoOfUser->payment_status}}</td>
                                @else
                                    
                                        <td class="text-center text-lg text-medium text-danger
                                        ">{{$HistoOfUser->payment_status}}</td>
                                                                            
               
                         @endif
                <td class="text-center text-lg text-medium">
                    {{$HistoOfUser->type}} </td>

                <td class="text-center text-lg text-medium 
                text-danger">
                {{$HistoOfUser->created_at->format('Y-m-d')}} </td>

            
                <td class="text-center text-lg text-medium 
                text-danger">
                {{$HistoOfUser->payment_id}} </td>

                <td class="text-center text-lg text-medium 
                text-danger">
                {{$HistoOfUser->payer_id}} </td>

          </tr>
                        @else
                        <tr>
                            <td> <div class="d-inline-block   rounded
                          ">
                                <img src="{{asset('../storage/'.$HistoOfUser->getSubEvent->photo)}}"
                                 alt="" class=" border border-primary rounded  img-40 align-top mr-15">
                                <div class="d-inline-block">
                                    <br>
                                    <h6 class=" border border-primary">{{$HistoOfUser->getEvent->price}} dt</h6>
                                    <p class="text-muted mb-0 border border-warning">{{$HistoOfUser->getSubEvent->label}}</p>
                                </div>
                            </div>
                      
            
                            </td>
                            <td class="text-center text-lg text-medium">{{$HistoOfUser->getSubEvent->price}} DT</td>
                            <td class="text-center text-lg text-medium">{{$HistoOfUser->payer_email}}</td>
                                    @if ($HistoOfUser->payment_status == 'approved') 
                                                <td class="text-center text-lg text-medium text-success 
                                                ">{{$HistoOfUser->payment_status}}</td>
                                            @else
                                                
                                                    <td class="text-center text-lg text-medium text-danger
                                                    ">{{$HistoOfUser->payment_status}}</td>
                                                                                        
                           
                                     @endif
                            <td class="text-center text-lg text-medium">
                                {{$HistoOfUser->type}} </td>
            
                            <td class="text-center text-lg text-medium 
                            text-danger">
                            {{$HistoOfUser->created_at->format('Y-m-d')}} </td>
            
                        
                            <td class="text-center text-lg text-medium 
                            text-danger">
                            {{$HistoOfUser->payment_id}} </td>
            
                            <td class="text-center text-lg text-medium 
                            text-danger">
                            {{$HistoOfUser->payer_id}} </td>
            
                      </tr>
                    


                    @endif
          @endforeach 
         
            </div>
          </div>
         
        </tbody>
    </table>
    @else
    <div class="rounded   mb-100">
      <div class="container ">
        <h1 class="display-7 text-center text-muted">NO HISTORY YET</h1>
        @endif
</div>


</div>
{{-- @else
<td class="text-center text-lg text-medium 
text-danger">
no history yet </td>
@endif --}}
{{-- CDN MDB --}}
<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />

{{-- END CDN MDB --}}
@endsection




