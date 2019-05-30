@extends('layouts.app')
@section('content')
	<div class="row">
		<div class="col">
			{!! Form::open(
				['route' => 'company.store'],
				['class' => 'form']
				)!!}
			@include('layouts._formContainer')

			<h3 class="jumbotron">Laravel Multiple File upload</h3>
				<div class="input-group control-group increment">
					<input type="file" name="filename[]" class="form-control">
					<div class="input-group-btn">
						<button class="btn btn-success" type="button">
							<i class="glyphicon glyphicon-plus">Add</i>
						</button>
					</div>
				</div>
				<br>
				<div class="clone hide">
					<div class="control-group input-group">
						<input type="file" name="filename[]" class="form-control">
						<div class="input-group-btn">
							<button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i>Remove</button>
						</div>
					</div>
				</div>
				<div class="form-group">
					{!!	Form::submit('Add Company',
						[
							'class' => 'btn btn-info btn-lg',
							'style' => 'width:100%'
						])
					 !!}
				</div>				

			{!! Form::close() !!}
		</div>
	</div>	

@endsection

<script type="text/javascript">
	$(document).ready(function() {
		$(".btn-success").click(function(){
			var html = $(".clone").html();
			$(".increment").after(html);
		});

		$("body").on("click",".btn-danger",function(){
			$(this).parents(".control-group").remove();
		});
	});
</script>