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
               <input id="{{$row->product_id}}-invsku" name="{{$row->product_id}}-invsku" type="hidden" value="">
               <input id="{{$row->product_id}}-invId" name="{{$row->product_id}}-invId" type="hidden" value="">
               <td>{{$row->product_id}}</td>
               <td>{{$row->productsDescription['products_name']}}</td>
               <td>{{$row->productsDescription['products_description']}}</td>
               <td>


                 @foreach($cook_atributes_product[$row->products_sku] as $r => $v)
                  <select id="{{$row->product_id}}-Size" name="{{$row->product_id}}-{{$r}}" onChange="showColors('{{$row->product_id}}',this.options[this.selectedIndex].value,'{{$row->products_sku}}');">
                    @foreach($v as $key => $val)
                        <option value={{$val}}>{{$val}}</option>
                    @endforeach
                  </select>
                  @break
                  @endforeach
                  <!-- <div id="{{$row->product_id}}-colors"></div> -->
                    <select id="{{$row->product_id}}-colors" name="{{$row->product_id}}-colors" onChange="">
                    </select>
               </td>
               <td>{{$row->base_price}}</td>
       	       <td><button type='button' onclick="setInventory('{{$row->product_id}}','{{$row->products_sku}}');addtocart({{$row->product_id}});" class='glyphicon glyphicon-shopping-cart'></button></td>
              </tr>
      @endforeach
      </tbody>
</table>
<script>
   var json_arr = <?php echo $json_cook_atributes_product; ?>;

   function setInventory(product_id,productsku)
   {
         //console.log(productsku);
         size  = $("#"+product_id+"-Size").val();
         color = $("#"+product_id+"-colors").val();
         console.log(size);
         console.log(color);

         for (var key in json_arr) {
           if (key == productsku)
           {
             for (var key2 in json_arr[key]) {
               if (json_arr[key][key2]['options']['Size'] == size)
               {
                 if(json_arr[key][key2]['options']['Color'] == color);
                 {
                   console.log("ff"+json_arr[key][key2]['options']['Color']);
                   console.log(key2);
                   console.log(json_arr[key][key2]['inventory_id']);
                   $("#"+product_id+"-invsku").val(key2);
                   $("#"+product_id+"-invId").val(json_arr[key][key2]['inventory_id']);
                  break;
                 }

               }
             }
           }
         }
   }

   function showColors(productId,val,productsku)
   {

      $("#"+productId+"-colors option").remove();
      var colors = [];


       for (var key in json_arr) {
         if (key == productsku)
         {
           for (var key2 in json_arr[key]) {
             if (json_arr[key][key2]['options']['Size'] == val)
             {
               colors.push(json_arr[key][key2]['options']['Color']);

             }
           }
         }
       }

       for (var op in colors) {
         var option = $('<option/>');
         option.attr({ 'value': colors[op] }).text(colors[op]);
         $("#"+productId+"-colors").append(option);

       }
       $("#"+productId+"-colors").append(option);

   }

</script>
