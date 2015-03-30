@extends('template')

	@section('css')
			
			
	@endsection
	
	@section('content')

	<table class="table table-hover">
		<thead>
			<tr>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td></td>
			</tr>
		</tbody>
	</table>


	@endsection

	@section('js')


	<script>
		$(document).ready(function(){
 

    		$('#example').DataTable(
    			{
        			  "ajax": "ajax",
        			   "columns": [
           							 {"title": "id", 	"data": "id" },
           							 {"title": "nombre", "data": "name" },
           							 {"title": "" , "data" : "id"},
      							   ]
    			});
		});
	</script>

	@endsection
@stop