@extends('layouts.admin')

@section('content')
<div class="tile">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header bg-info">
					<div class="caption">
						<h2 style="text-align: center; color: white">General Setting</h2>
					</div>

				</div>
				<div class="card-body">
					<div class="table-scrollable">
			<form role="form" method="POST" action="{{route('admin.gnlupdate')}}">
				@csrf
				<div class="row">
					<div class="col-md-4">
						<label>Website Title</label>
						<input type="text" class="form-control input-lg" value="{{$general->title}}" name="title" >
					</div>
					<div class="col-md-4">
						<label>Website Sub-Title</label>
						<input type="text" class="form-control input-lg" value="{{$general->subtitle}}" name="subtitle" >
					</div>

					<div class="col-md-2">
						<label>CURRENCY CODE</label>
						<input type="text" class="form-control input-lg" value="{{$general->cur}}" name="cur" >
					</div>
					<div class="col-md-2">
						<label>CURRENCY SYMBOL</label>
						<input type="text" class="form-control input-lg" value="{{$general->cursym}}" name="cursym" >
					</div>

				</div>


				<div class="row">
					<div class="col-md-12">
						<hr/>
					</div>
				</div>


				<div class="row">

					<div class="col-md-2">
						<label>Minimum Card Balance</label>
						<input type="text" class="form-control input-lg" value="{{$general->mincard}}" name="mincard" >
					</div>


					<div class="col-md-2">
						<label>Minimum Deposit</label>
						<input type="text" class="form-control input-lg" value="{{$general->mindepo}}" name="mindepo" >
					</div>
					<div class="col-md-2">
						<label>Minimum Withdraw</label>
						<input type="text" class="form-control input-lg" value="{{$general->minwith}}" name="minwith" >
					</div>

					<div class="col-md-3">
						<label>Minimum Reload</label>
						<input type="text" class="form-control input-lg" value="{{$general->minreload}}" name="minreload" >
					</div>

					<div class="col-md-3">
						<label>Minimum Card Withdraw</label>
						<input type="text" class="form-control input-lg" value="{{$general->mincwith}}" name="mincwith" >
					</div>

				</div>




				<div class="row">
					<div class="col-md-12">
						<hr/>
					</div>
				</div>


				<div class="row">
					<div class="col-md-3">
						<label>Deposit Fee</label>
						<input type="text" class="form-control input-lg" value="{{$general->depositfee}}" name="depositfee" >
					</div>
					<div class="col-md-3">
						<label>Withdraw Fee</label>
						<input type="text" class="form-control input-lg" value="{{$general->withfee}}" name="withfee" >
					</div>

					<div class="col-md-3">
						<label>Reload Fee</label>
						<input type="text" class="form-control input-lg" value="{{$general->reloadfee}}" name="reloadfee" >
					</div>

					<div class="col-md-3">
						<label>Card Withdraw Fee</label>
						<input type="text" class="form-control input-lg" value="{{$general->cwithfee}}" name="cwithfee" >
					</div>

				</div>





				
				<div class="row">
					<div class="col-md-12">
						<hr/>
					</div>
				</div>

				<div class="row">
					<div class="col-md-3">
						<label>Registration</label>
						<div class="toggle lg">
							<label>
								<input type="checkbox" value="1" name="reg" {{ $general->reg == "1" ? 'checked' : '' }}><span class="button-indecator"></span>
							</label>
						</div>
					</div>
					
					<div class="col-md-3">
						<label>EMAIL VERIFICATION</label>
						<div class="toggle lg">
								<label>
									<input type="checkbox" value="1" name="emailver" {{ $general->emailver == "0" ? 'checked' : '' }}><span class="button-indecator"></span>
								</label>
							</div>
					</div>
					<div class="col-md-2">
						<label>SMS VERIFICATION</label>
						<div class="toggle lg">
								<label>
									<input type="checkbox" value="1" name="smsver"  {{ $general->smsver == "0" ? 'checked' : '' }}><span class="button-indecator"></span>
								</label>
							</div>
					</div>
					<div class="col-md-2">
						<label>EMAIL NOTIFY</label>
						<div class="toggle lg">
								<label>
									<input type="checkbox" value="1" name="emailnotf"  {{ $general->emailnotf == "1" ? 'checked' : '' }}><span class="button-indecator"></span>
								</label>
							</div>
					</div>
					<div class="col-md-2">
						<label>SMS NOTIFY</label>
						<div class="toggle lg">
								<label>
									<input type="checkbox"  value="1" name="smsnotf" {{ $general->smsnotf == "1" ? 'checked' : '' }}><span class="button-indecator"></span>
								</label>
							</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<hr/>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<button class="btn btn-success btn-block btn-lg">Update</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
		</div>
	</div>
</div>

@endsection
