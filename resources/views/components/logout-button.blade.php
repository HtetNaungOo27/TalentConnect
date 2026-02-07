<form method="POST" action="{{route('logout')}}" onsubmit="return confirm('Are you sure you want to log out?')">
    @csrf
    <button type="submit" class="text-white">
        <i class="fa fa-sign-out"></i> Logout
    </button>
</form>