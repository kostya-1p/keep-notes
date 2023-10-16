<form method="POST" action="{{ route('login') }}" enctype="multipart/form-data">
    @csrf
    <label for="username-input">Username</label>
    <input type="text" name="username" id="username-input">

    <label for="password-input">Password</label>
    <input type="password" name="password" id="password-input">

    <button>
        Login
    </button>
</form>
