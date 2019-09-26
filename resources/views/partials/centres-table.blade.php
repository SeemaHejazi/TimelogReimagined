<table class="table table-striped table-hover table-responsive-sm">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col" class="name">Name</th>
        <th scope="col" class="location">Location</th>
        <th scope="col" class="timezone">Timezone</th>
    </tr>
    </thead>
    <tbody id="centres-table" class="centres-table">
    @foreach($centres as $centre)
        <tr class="">
            <td>{{ $centre->id }}</td>
            <td class="name">{{ $centre->centre_name }}</td>
            <td class="location">{{ $centre->location }}</td>
            <td class="timezone">{{ $centre->timezone }}</td>
        </tr>
    @endforeach
    </tbody>
    <tbody id="search-centres-result" class="table-search-results"></tbody>
</table>