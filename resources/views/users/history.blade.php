@extends('layouts.app') @section('content')
    {{-- CDN MDB --}}
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    
    {{-- END CDN MDB --}}
    <div class="top-spacer"></div>
    

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
      <h1 class="display-4 text-center text-light">{{__('app.my payments')}}</h1>
    
    </div>
  </div>

<br>



</div>





 <!-- BEGIN: Content-->
 <div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
     
      <div class="content-body"><section id="all-transactions">
      <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-content mt-1">
                  <div class="table-responsive">
                    @if ( count($HistoOfUsers) > 0 ) 
                      <table id="crypto-transaction" class="table table-hover table-xl trans-wrapper">
                            <thead>
                              <tr>
                                  <th class="border-top-0">image</th>
                                  <th class="border-top-0">{{__('userpayments.Event')}}</th>
                                  <th class="border-top-0">{{__('userpayments.price')}}</th>
                                  <th class="border-top-0">{{__('userpayments.Email')}}</th>
                                  <th class="border-top-0">{{__('userpayments.id')}}</th>
                                  <th class="border-top-0">{{__('userpayments.id2')}}</th>
                                  <th class="border-top-0">{{__('userpayments.type')}}</th>	
                                  <th class="border-top-0">{{__('userpayments.date')}}</th>
                                  <th class="border-top-0">{{__('userpayments.Status')}}</th>
                              </tr>
                              
                          </thead>
                          <tbody>
                              
                            @foreach ($HistoOfUsers as $HistoOfUser)
                            @if ($HistoOfUser->type == 'event')

                            
                              <tr>		
                                <td class="p-2 text-center mt-10 ">
                                      <img src="{{ asset('../storage/'.$HistoOfUser->getEvent->photo) }}"  alt="" class="rounded w-25 p-3" >
                                </td>							
                                  <td>
                                      <div class="Trans-id">{{$HistoOfUser->getEvent->label}}</div>
                                  </td>
                                  <td>
                                      <div class="trans-type success">{{$HistoOfUser->getEvent->price}} USD</div>
                                  </td>
                                  <td>
                                      <div class="amount">
                                          <i class="la la-bitcoin"></i>{{$HistoOfUser->payer_email}}
                                      </div>
                                  </td>
                                  <td>
                                      <div class="price">{{$HistoOfUser->payment_id}}</div>
                                  </td>
                                  <td>
                                      <div class="usd"> {{$HistoOfUser->payer_id}}</div>
                                  </td>
                                  <td>
                                      <div class="fee">{{$HistoOfUser->type}}</div>
                                  </td>
                                  <td>
                                      <div class="time">{{$HistoOfUser->created_at->format('Y-m-d')}}</div>
                                  </td>
                                  
                                      <div class="">

                                                    @if ($HistoOfUser->payment_status == 'approved') 
                                                    <td class="status badge badge-success badge-pill badge-sm mt-5 p-3 
                                                    ">{{$HistoOfUser->payment_status}}</td>
                                                @else
                                                    
                                                        <td class="status badge badge-danger badge-pill badge-sm
                                                        ">{{$HistoOfUser->payment_status}}</td>
                                                                                            
                                                       
                                                 @endif
                                                 
                                                </div>
                                                
                              </tr>
                              @else
                              <tr>		
                                <td>
                                      <img src="{{ asset('../storage/'.$HistoOfUser->getSubEvent->photo) }}" alt="">
                                </td>							
                                  <td>
                                      <div class="Trans-id">{{$HistoOfUser->getSubEvent->label}}</div>
                                  </td>
                                  <td>
                                      <div class="trans-type success">{{$HistoOfUser->getSubEvent->price}} USD</div>
                                  </td>
                                  <td>
                                      <div class="amount">
                                          <i class="la la-bitcoin"></i>{{$HistoOfUser->payer_email}}
                                      </div>
                                  </td>
                                  <td>
                                      <div class="price">{{$HistoOfUser->payment_id}}</div>
                                  </td>
                                  <td>
                                      <div class="usd"> {{$HistoOfUser->payer_id}}</div>
                                  </td>
                                  <td>
                                      <div class="fee">{{$HistoOfUser->type}}</div>
                                  </td>
                                  <td>
                                      <div class="time">{{$HistoOfUser->created_at->format('Y-m-d')}}</div>
                                  </td>
                                  
                                      <div class="">

                                                    @if ($HistoOfUser->payment_status == 'approved') 
                                                    <td class="status badge badge-success badge-pill badge-sm 
                                                    ">{{$HistoOfUser->payment_status}}</td>
                                                @else
                                                
                                                        <td class="status badge badge-danger badge-pill badge-sm
                                                        ">{{$HistoOfUser->payment_status}}</td>
                                                        
                                
                                                 @endif
                                                </div>
                              </tr>
                              
                    @endif
                    @endforeach 				

                              

                          </tbody>
                      </table>
                      @else
                    <div class="rounded   mb-100">
                    <div class="container ">
                        <h1 class="display-7 text-center text-muted">{{__('userpayments.NO HISTORY YET')}}</h1>
                        @endif
                  </div>
                 
              </div>
          </div>
      </div>
  </div>
</section>
      </div>
    </div>
  </div>
  <!-- END: Content-->

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




