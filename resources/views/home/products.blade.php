

<section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
            @if(session()->has('message'))
            <div class="alert alert-success">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
               {{ session()->get('message') }}
            </div>
         @endif
               <h2>
                  Our <span>products</span>
               </h2>
            </div>
            <div class="row">
            @foreach($products as $product)
               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="{{url('product_details', $product->id)}}" class="option1">
                           Product Details
                           </a>
                           <form action="{{url('add_cart', $product->id)}}" method="post">
                              @csrf
                              <div class="row">
                                 <div class="col-md-4">
                                    <input type="number" value="1" min="1" style="color:black; width: 100px;"name="quantity">
                                 </div>
                                 <div class="col-mid-4">
                                 <input type="submit"class="btn btn-primary" value="Add to Cart">
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="product/{{$product->image}}" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                        {{$product->title}}
                        </h5>
                        @if($product->discount_price!= null)
                        <br>
                        <h6 style="color:red;">
                           Ksh: {{$product->discount_price}}
                        </h6>
                        <br>
                        <br>
                        <h6 style="text-decoration:line-through; color: blue;">
                           Ksh: {{$product->price}}
                        </h6>

                        @else
                        <br>
                        <br>
                        <h6 style="color: blue;">
                           Ksh: {{$product->price}}
                        </h6>
                        @endif
                     </div>
                  </div>
               </div>
               @endforeach
               {!! $products->withQueryString()->links('pagination::bootstrap-5') !!}
            </div>
         </div>
      </section>