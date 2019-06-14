<a href="{{route('admin.reservation')}}">
	<strong style="color: red;">{{Auth::guard('admins')->user()->name}}</strong>   You've got a new reservation
</a>