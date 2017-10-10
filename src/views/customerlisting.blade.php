<table class='table ' id='table_data'>
     <tbody>
      @foreach($customers as $row)
             <tr>
               <td>{{$row->first_name}}</td>
               <td>{{$row->last_name}}</td>
               <td>{{$row->email}}</td>
       	       <td>
                 <button type='button' onclick='selectcustomer({{$row->users_id}});' class='glyphicon glyphicon-plus'>
                 </button>
               </td>
              </tr>
      @endforeach
      </tbody>
</table>
