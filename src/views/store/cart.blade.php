
@extends('store.layouts.store_master')
@section('content')

<div class="fullwidthbox-topborder">
<div id="cartviewlist" class="form-group row">
 @include('store_cart::cartlist')
</div>
</div>
@endsection
<script>
function updatecart(rowid){
  var qty = $("#qty-filed-"+rowid).val();
  var updateitemsarr = {
    "qty": qty
  };
  $.ajax({
         url: "/updatecart",
         dataType: 'JSON',
         type:'POST',
         data:{"_token": "{{ csrf_token() }}","rowid": rowid,"updateitemsarr":updateitemsarr},
         success: function (res) {
           if (res.success)
           {
             $("#cartviewlist").html(res.cartview);
             $("#quickcartviewlist").html(res.quickcartview);

           }
         }
   });
}
   function deletecartitem(rowid){
     $.ajax({
            url: "/deletecartitem",
            dataType: 'JSON',
            type:'POST',
            data:{"_token": "{{ csrf_token() }}","rowid": rowid},
            success: function (res) {
              if (res.success)
              {
                $("#cartviewlist").html(res.cartview);
                $("#quickcartviewlist").html(res.quickcartview);
                

              }
            }
      });

    }
    </script>
</div>
