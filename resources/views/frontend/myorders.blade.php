@include('frontend.layouts.header')
    <!-- ***** Header Area End ***** -->
    <!-- ***** Main Banner Area Start ***** -->
    <div class="page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>my orders</h2>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

  <table class="table">
    <thead>
        <tr>
           <th>#</th>
           <th>total bill</th>
           <th>name</th>
           <th>phone</th>
           <th>address</th>
           <th>status</th>
           <th>order date</th>
           <th>view products</th>
        </tr>
    </thead>
    <tbody>
         @php 
         $i=0;
         @endphp
         @foreach($orders as $item)
         @php 
         $i++;
         @endphp
         <tr>
            <td>{{$i}}</td>
            <td>{{$item->bill}}</td>
            <td>{{$item->fullname}}</td>
            <td>{{$item->phone}}</td>
            <td>{{$item->address}}</td>
            <td>{{$item->status}}</td>
            <td>{{$item->created_at}}</td>
            <td>
            <!-- Button to Open the Modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal{{$i}}">
  product
</button>

<!-- The Modal -->
<div class="modal" id="myModal{{$i}}">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">all products</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <table class="table">
          <thead>
            <tr>
              <th>Product image</th>
              <th>product name</th>
              <th>quantity</th>
              <th>price</th>
            </tr>
          </thead>
          <tbody>
            @foreach($items  as $product)
            @if($item->id == $product->orderid)
            <tr>
              <td>
              <img src="{{ asset('uploads/products/'.$product->image) }}" width:100px; />
              </td>
              <td>{{$product->name}}</td>
              <td>{{$product->quantity}}</td>
              <td>${{$product->price}}</td>
            </tr>
            @endif
            @endforeach
          </tbody>
        </table>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
            </td>
         </tr>
         @endforeach
    </tbody>
  </table>


    <!-- ***** Footer Start ***** -->
    @include('frontend.layouts.footer')
