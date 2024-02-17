@extends('backend.layouts.app')

@section('title', 'Dashboard:Home')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered second" style="width:100%">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Order Number</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Customer Name</th>
                        <th>Phone No</th>
                        <th>Address</th>
                        <th>Invoices</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)                               
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->order_number}}</td>
                            <td>{{$order->productName}}</td>
                            <td>{{$order->quantity}}</td>                                    
                            <td>{{$order->total_amount}}</td>                                    
                            <td>{{$order->customerName}}</td>                                    
                            <td>{{$order->phone}}</td>                                    
                            <td>{{$order->address}}</td>                                    
                            <td><a href="{{url('invoice/'. $order->order_number) }}" target="_blank" class="btn btn-dark">Invoice</a></td>                                    
                             
                            <td>
                                @if (!$order->status==0)
                                <button class="btn btn-success">Completed</button>
                                @else
                                <form action="{{route('order.status',$order->id)}}" method="post">
                                  @csrf
                                  <button class="btn btn-warning" type="submit">Received</button>
                                </form>
                                @endif
                            </td>                                   
                        </tr>
                    @endforeach                              
                </tbody>
            </table>
        </div>
    </div>

  </main><!-- End #main -->


@endsection