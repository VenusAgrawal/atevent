<form action="{{ route('settings.address.update') }}" method="post">
    @csrf
    @method('PUT')

    <!-- Address1 (House n° & street name -->
    <div class="col-sm-3">
        <p class="mb-0">
            <strong>
                <label for="updateformaddress1">House n° and street name</label>
            </strong>
        </p>
    </div>
    <div class="col-sm-9">
        <p class="text-muted mb-0">
            <input type="text" id="address1" name="address1" value="{{ auth()->user()->address1 }}"
                id="updateformaddress1" />
        </p>
    </div>

    <!-- Address2 (postcode & locality) -->
    <div class="col-sm-3">
        <p class="mb-0">
            <strong>
                <label for="updateformaddress2">Postcode and Locality</label>
            </strong>
        </p>
    </div>
    <div class="col-sm-9">
        <p class="text-muted mb-0">
            <input type="text" id="address2" name="address2" value="{{ auth()->user()->address2 }}"
                id="updateformaddress2" />
        </p>
    </div>

    <!-- save button -->
    <div class="col-sm-3">
        <p class="mb-0">
            <button type="submit" value="submit">Save</button>
        </p>
    </div>

</form>
