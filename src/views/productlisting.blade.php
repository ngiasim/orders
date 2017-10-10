<table class='table ' id='table_data'>
    <!-- <thead>
      <tr>
         <th>ID</th>
         <th>Product Name</th>
         <th>description</th>
         <th>price</th>
 	       <th>Action</th>
       </tr>
     </thead> -->
     <tbody>
      @foreach($products as $row)
             <tr>
               <td>{{$row->product_id}}</td>
               <td>{{$row->productsDescription['products_name']}}</td>
               <td>{{$row->productsDescription['products_description']}}</td>
               <td>{{$row->base_price}}</td>
       	       <td><button type='button' onclick='addtocart({{$row->product_id}});' class='glyphicon glyphicon-shopping-cart'></button></td>
              </tr>
      @endforeach
      </tbody>
</table>
