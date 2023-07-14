<form action="{{ route('settings.email.notify') }}" method="post">
    @csrf
    @method('PUT')

    <!-- Email -->
    <div class="col-sm-3">
        <p class="mb-0">
            <strong>
                <label for="updateformemail">Email</label>
            </strong>
        </p>
    </div>
    <div class="col-sm-9">
        <p class="text-muted mb-0">
            <input type="text" id="email" name="email" value="{{ auth()->user()->email }}"
                id="updateformemail" />
        </p>
    </div>

    <!-- Verification Message -->
    @if ($showVerificationMessage)
        <div class="col-sm-3">
            <p class="mb-0">
                <span>A verification email has been sent to {{ $emailToVerify }}.</span>
            </p>
        </div>
    @endif

    <!-- save button -->
    <div class="col-sm-3">
        <p class="mb-0">
            <button type="submit" value="submit">Save</button>
        </p>
    </div>

</form>
