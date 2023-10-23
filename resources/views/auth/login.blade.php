<form method="POST" action="{{ route('login') }}" enctype="multipart/form-data">
    @csrf
    <label for="username-input">Username</label>
    @error('username')
    <div style="color: red">{{ $message }}</div>
    @enderror
    <input type="text" name="username" id="username-input">

    <label for="password-input">Password</label>
    @error('password')
    <div style="color: red">{{ $message }}</div>
    @enderror
    <input type="password" name="password" id="password-input">

    @error('login_fail')
    <div style="color: red">{{ $message }}</div>
    @enderror

    @php($errors->has('username'))

    <button>
        Login
    </button>
</form>
