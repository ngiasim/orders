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
                  @if ($loop->iteration === 1)
                      <select id="{{$row->product_id}}-{{$r}}" name="{{$row->product_id}}-{{$r}}" onChange="showAttribute('{{$loop->iteration - 1}}','{{count($product_options[$row->products_sku])}}','{{$r}}','{{$product_options[$row->products_sku][$loop->iteration]}}','{{$row->product_id}}',this.options[this.selectedIndex].value,'{{$row->products_sku}}');">
                          <option value="">Select {{$r}}</option>
                          @foreach($v as $key => $val)
                              <option value={{$val}}>{{$val}}</option>
                          @endforeach
                      </select>
                  @elseif ($loop->iteration < count($cook_atributes_product[$row->products_sku]))
                      <select id="{{$row->product_id}}-{{$r}}" style="display:none;" name="{{$row->product_id}}-{{$r}}" onChange="showAttribute('{{$loop->iteration - 1}}','{{count($product_options[$row->products_sku])}}','{{$r}}','{{$product_options[$row->products_sku][$loop->iteration]}}','{{$row->product_id}}',this.options[this.selectedIndex].value,'{{$row->products_sku}}');">
                      </select>
                  @else
                  <select id="{{$row->product_id}}-{{$r}}" style="display:none;" name="{{$row->product_id}}-{{$r}}" onChange="setInventory('{{$row->product_id}}','{{$row->products_sku}}');">
                  </select>
                  @endif

                  @endforeach
                  <!-- <div id="{{$row->product_id}}-colors"></div> -->
                    <!-- <select id="{{$row->product_id}}-colors" name="{{$row->product_id}}-colors" onChange="">
                    </select> -->
               </td>
               <td><label style="display:none;" id="{{$row->product_id}}-price" name="{{$row->product_id}}-price" >{{$row->base_price}}</label><label style="display:none;" id="{{$row->product_id}}-checkout_currency_symbol_right" name="{{$row->product_id}}-checkout_currency_symbol_right" ></label></td>
       	       <!-- <td><button type='button' onclick="setInventory('{{$row->product_id}}','{{$row->products_sku}}');addtocart({{$row->product_id}});" class='glyphicon glyphicon-shopping-cart'></button></td> -->
               <td><button type='button' id="{{$row->product_id}}-add" name="{{$row->product_id}}-add" style="display:none;" onclick="addtocart({{$row->product_id}});" class='glyphicon glyphicon-shopping-cart'></button></td>
              </tr>
      @endforeach
      </tbody>
</table>
<script>
   var json_arr = <?php echo $json_cook_atributes_product; ?>;
   var productattr = <?php echo json_encode($product_options); ?>;
   //console.log(json_arr);
   function setInventory(product_id,productsku)
   {

             var matchcount = 0;
             for (var key in json_arr) {
               if (key == productsku)
               {
                 for (var key2 in json_arr[key]) {

                          var search = true;
                          for (var key4 in json_arr[key][key2]['options']) {
                            for (var innerkey in productattr[productsku]) {
                                 if (json_arr[key][key2]['options'][productattr[productsku][innerkey]] == $("#"+product_id+"-"+productattr[productsku][innerkey]).val())
                                 {
                                   search = true;
                                 }else{
                                   search = false;
                                 }

                            }
                          }

                            if(search) //(json_arr[key][key2]['options'][productattr[productsku][0]] == $("#"+product_id+"-"+'Size').val() && json_arr[key][key2]['options'][productattr[productsku][1]] == $("#"+product_id+"-"+'Color').val() )
                            {
                               $("#"+product_id+"-invsku").val(key2);
                               $("#"+product_id+"-invId").val(json_arr[key][key2]['inventory_id']);
                               if(json_arr[key][key2]['inventory_price_prefix'] == "+"){
                                $("#"+product_id+"-price").html(parseFloat(json_arr[key][key2]['product_price']) + parseFloat(json_arr[key][key2]['inventory_price']));
                                $("#"+product_id+"-checkout_currency_symbol_right").html(json_arr[key][key2]['checkout_currency_symbol_right']);
                              }else {
                                 $("#"+product_id+"-price").html(parseInt(json_arr[key][key2]['product_price']) - parseInt(json_arr[key][key2]['inventory_price']));
                                 $("#"+product_id+"-checkout_currency_symbol_right").html(json_arr[key][key2]['checkout_currency_symbol_right']);
                               }
                               $("#"+product_id+"-add").show();
                               $("#"+product_id+"-price").show();
                               $("#"+product_id+"-checkout_currency_symbol_right").show();
                               return false;
                            }
                 }
               }
             }

   }

   function showAttribute(currentIndex,attrCount,Currentattribute,Nextattribute,productId,val,productsku)
   {
      $("#"+productId+"-"+Nextattribute+" option").remove();
      var colors = [];
       for (var key in json_arr) {
         if (key == productsku)
         {
           for (var key2 in json_arr[key]) {
             if (json_arr[key][key2]['options'][Currentattribute] == val)
             {
               //console.log("inloop::"+json_arr[key][key2]['options'][Nextattribute]);
               colors.push(json_arr[key][key2]['options'][Nextattribute]);

             }
           }
         }
       }
       //console.log(colors);
       var option = $('<option/>');
       option.attr({ 'value': '' }).text("Select "+Nextattribute);
       $("#"+productId+"-"+Nextattribute).append(option);
       for (var op in colors) {
         var option = $('<option/>');
         option.attr({ 'value': colors[op] }).text(colors[op]);
         $("#"+productId+"-"+Nextattribute).append(option);

       }
       $("#"+productId+"-"+Nextattribute).show();

   }

</script>
