@extends('layouts.app')
@section('content')


{{-- CDN MDB --}}
<!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.css"
  rel="stylesheet"
/>

{{-- END CDN MDB --}}
<div class="top-spacer">

</div>
    <div class="container ">
        @if (session('alert_scc'))
        <br>
        <div class="alert alert-success m-auto w-75 m-auto text-center ">
            {{ session('alert_scc') }}
        </div>
        @endif @if (session('alert_err'))
        <br>
            <div class="alert alert-danger m-auto w-75 m-auto text-center ">
                {{ session('alert_err') }}
            </div>
        @endif
        <h1 class="text-center mb-50 mt-50">Cart Page</h1>
        <div class="row">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th width="50%">Event</th>
                    <th width="10%">Price</th>
                    <th width="8%">Quantity</th>
                    <th width="22%">Sub Total</th>
                    <th width="10%"></th>
                </tr>
                </thead>
                <tbody>
                @php $total = 0; @endphp
       
                    @foreach( $events as  $event)
                               
                            @php
                                $total += $event->price;
                            @endphp
                        <tr>
                            <td>
                                <div class="col-6 mb-50  ">
                                  <img src="{{asset('../storage/'.$event->photo)}}"
                                   class="img-fluid   
                                  border border-danger
                                  rounded-pill
                                   " >
                                </div>
                             
                                <span>{{$event->label}}</span>
                            </td>
                            <td>{{$event->price}} DT</td>
                       
                            <td> DT</td>
                            <td>
                                 
                                <a href="/remove/{{$event->cart_id}}"
                                 class="btn btn-danger rounded-pill btn-sm">X</a>
                            </td>

                        </tr>
                        
                 @endforeach
                 
                        
                    </tbody>
                <tfoot>
                <tr>
                    <td>
                        <a href="{{url('events')}}"
                           class="btn btn-warning"
                        >Continue Shopping</a>
                        {{-- <form action="{{route('pay')}}" method="post"> --}}
                            @csrf
                            <input type="hidden" name="amount" value="{{$total}}">
                            <button type="submit"
                                    class="btn btn-success"
                            >Proceed to Pay
                            </button>
                            <button type="submit"
                                    class="btn btn-warning"
                                    name="gateway"
                                    value="paypal"
                            >Proceed with Paypal
                            </button>
                        </form>

                    </td>
                   
                    <td colspan="2"></td>
                    <td><strong>Total {{$total}} DT</strong></td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>

    {{-- CDN MDB --}}
<!-- Font Awesome -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
rel="stylesheet"
/>
<!-- Google Fonts -->
<link
href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
rel="stylesheet"
/>
<!-- MDB -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.css"
rel="stylesheet"
/>

{{-- END CDN MDB --}}
@endsection