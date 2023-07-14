<form action="{{ route('settings.profile.update') }}" method="post">
    @csrf
    @method('PUT')

    <!-- Firstname -->
    <div class="col-sm-3">
        <p class="mb-0">
            <strong>
                <label for="updateformfirstname">Firstname</label>
            </strong>
        </p>
    </div>
    <div class="col-sm-9">
        <p class="text-muted mb-0">
            <input type="text" id="first_name" name="first_name" value="{{ auth()->user()->first_name }}"
                id="updateformfirstname" />
        </p>
    </div>

    <!-- Lastname -->
    <div class="col-sm-3">
        <p class="mb-0">
            <strong>
                <label for="updateforlastname">Lastname</label>
            </strong>
        </p>
    </div>
    <div class="col-sm-9">
        <p class="text-muted mb-0">
            <input type="text" id="last_name" name="last_name" value="{{ auth()->user()->last_name }}"
                id="updateformlastname" />
        </p>
    </div>

    <!-- save button -->
    <div class="col-sm-3">
        <p class="mb-0">
            <button type="submit" value="submit">Save</button>
        </p>
    </div>

</form>
