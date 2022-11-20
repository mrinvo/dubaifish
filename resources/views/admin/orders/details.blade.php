@extends('admin.master.masterar')
@section('name')
تفاصيل الطلب
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-12">

        <!-- Main content -->
        <div class="invoice p-3 mb-3">
          <!-- title row -->
          <div class="row">
            <div class="col-12">
              <h4>
                <i class="fas fa-globe"></i> اسماك الامارات .
                <small class="float-right">التاريخ : {{ $order->created_at->toDayDateTimeString() }}</small>
              </h4>
            </div>
            <!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info">

            <div class="col-sm-6 invoice-col">

              <address>
                <strong>تفاصيل صاحب الطلب</strong><br>
               {{ $order->customer_name }}<strong style="float: right;">اسم صاحب الطلب</strong><br>
               {{ $order->customer_phone }}<strong style="float: right;">رقم صاحب الطلب</strong><br>
               <strong> العنوان </strong><br>


                    @php
                    if ($order->address_id) {

                        $add = App\Models\Address::find($order->address_id);
                        echo $add->name. '<br>';
                        echo $add->address .'<br>';
                        echo $add->building . '<br>';
                        echo $add->city . '<br>';
                        echo $add->emirate . '<br>';



                        # code...
                    }else {
                        echo $order->guest_address . '<br>';
                    }

                    @endphp
              </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-5 invoice-col">
              <b>Invoice #007612</b><br>
              <br>
              <b>Order ID:</b> 4F3S8J<br>
              <b>Payment Due:</b> 2/22/2014<br>
              <b>Account:</b> 968-34567
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <!-- Table row -->
          <div class="row">
            <div class="col-12 table-responsive">
              <table class="table table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>الكمية</th>
                  <th>المنتح</th>
                  <th>طريقة التنظيف</th>
                  <th>سعر طريقة التنظيف</th>
                  <th>سعر المنتج</th>
                </tr>
                </thead>
                <tbody>

                   @foreach ($order->items as  $key=>$item)


                <tr>
                  <td>{{ $key }}</td>
                  <td>{{ $item->quantity }}</td>
                  <td>{{ $item->product_name_ar }}</td>
                  <td>{{ $item->cleaning_name_ar }}</td>
                  <td>{{ $item->cleaning->price }}</td>
                  <td>{{ $item->product_price }}</td>
                </tr>

                @endforeach

                </tbody>
              </table>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <div class="row">
            <!-- accepted payments column -->
            <div class="col-6">
              <p class="lead">Payment Methods:</p>
              <img src="../../dist/img/credit/visa.png" alt="Visa">
              <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
              <img src="../../dist/img/credit/american-express.png" alt="American Express">
              <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

              <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                plugg
                dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
              </p>
            </div>
            <!-- /.col -->
            <div class="col-6">
              <p class="lead">Amount Due 2/22/2014</p>

              <div class="table-responsive">
                <table class="table">
                  <tr>
                    <th style="width:50%">Subtotal:</th>
                    <td>$250.30</td>
                  </tr>
                  <tr>
                    <th>Shipping:</th>
                    <td>$5.80</td>
                  </tr>
                  <tr>
                    <th>Total:</th>
                    <td>$265.24</td>
                  </tr>
                </table>
              </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <!-- this row will not appear when printing -->
          <div class="row no-print">
            <div class="col-12">
              <a href="invoice-print.html" target="_blank" class="btn btn-primary float-right"><i class="fas fa-print"></i> Print</a>

              {{-- <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                Payment
              </button>
              <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                <i class="fas fa-download"></i> Generate PDF
              </button> --}}
            </div>
          </div>
        </div>
        <!-- /.invoice -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->

@endsection
