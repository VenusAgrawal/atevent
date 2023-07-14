<form action="{{ route('settings.account.delete') }}" method="POST" confirmation="True">
    @csrf
    {{-- form method spoofing for method DELETE to function --}}
    @method('DELETE')




    <!-- delete account -->
    <div class="col-sm-3">
        <p class="mb-0">
            <strong>
                Once your account is deleted, all of its resources and data will be permanently deleted.
            </strong>
        </p>
    </div>

    <!-- save button -->
    <div class="col-sm-3">
        <p class="mb-0">
            <button type="submit" value="submit">Delete Account</button>
        </p>
    </div>



    <div>
    </div>

</form>
