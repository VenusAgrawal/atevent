<form action="{{ route('settings.contact.update') }}" method="post">
    @csrf
    @method('PUT')

    <!-- Contact -->
    <div class="col-sm-3">
        <p class="mb-0">
            <strong>
                <label for="updateformcontact">Telefon number</label>
            </strong>
        </p>
    </div>
    <div class="col-sm-9">
        <p class="text-muted mb-0">
            <input type="text" id="contact" name="contact" value="{{ auth()->user()->contact }}"
                id="updateformcontact" />
        </p>
    </div>

    <!-- save button -->
    <div class="col-sm-3">
        <p class="mb-0">
            <button type="submit" value="submit">Save</button>
        </p>
    </div>

</form>
