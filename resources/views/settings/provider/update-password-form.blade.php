<form action="{{ route('settings.password.update') }}" method="post">
    @csrf
    @method('PUT')

    <!-- password -->
    <label for="updateformcurrentpassword">Current password</label>
    <input type="password" id="current_password" name="current_password" id="updateformcurrentpassword" />

    <label for="updateformnewpassword">New password</label>
    <input type="password" id="password" name="password" id="updateformnewpassword" />

    <label for="updateformconfirmpassword">Confirm password</label>
    <input type="password" id="password_confirmation" name="password_confirmation" id="updateformconfirmpassword" />

    <button type="submit" value="submit">Save</button>

</form>
