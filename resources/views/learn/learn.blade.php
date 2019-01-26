
@extends('layouts.app')

@section('content')
	@unless($user["isPaid"])
		<p>You can complete your payment by swittching the payment tab.</p>
	@endunless

	@forelse ($roles as $role)
		<p>Role Id => {{ $role->id }}</p>
		<p>Loop remaining => {{ $loop->remaining }}</p>
	@empty
		<p>No Role for you
	@endforelse

	{{ $title or "Sir" }} Henry
@endsection