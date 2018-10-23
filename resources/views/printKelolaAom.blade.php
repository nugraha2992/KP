
<table class="table table-bordered">
 <tr>
   <th>ID AOM</th>
   <th>Jumlah NOA</th>
   <th>Jumlah Plafond</th>
 </tr>
 
 @foreach ($data as $key => $user)
  <tr>
    <td width="100px">{{ $user->aom }}</td>
    <td width="150px">{{ $user->noa }}</td>
    <td width="350px">{{ "Rp. ".number_format($user->jumlah, 2) }}</td>
  </tr>
 @endforeach
</table>