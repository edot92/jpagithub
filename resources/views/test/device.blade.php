@extends('test.template')
@section('conten-body')
<div class="row">
	<div class='col-md-12'>
		<table class='table table-bordered'>
			<thead>
			<tr>
				<th>he</th>
				<th>he</th>
				<th>he</th>
				<th>he</th>
				</tr>
			</thead>
			<tbody>
			@foreach($deviceRegisters as $deviceRegister)
			<tr>
				<td>{{$deviceRegister->id}}</td>
				<td>{{$deviceRegister->register_label_}}</td>
				<td>{{$deviceRegister->id}}</td>
				<td>{{$deviceRegister->id}}</td>
			</tr>
			@endforeach
			</tbody>
			<tfoot>
			{{$deviceRegisters->links()}}
			</tfoot>
		</table>
	</div>
</div>
@stop