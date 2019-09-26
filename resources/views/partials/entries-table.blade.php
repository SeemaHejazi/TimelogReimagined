<table class="table table-striped table-hover table-responsive">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col" class="name">Name</th>
            <th scope="col" class="centre">Centre</th>
            <th scope="col" class="in_time">Clocked In</th>
            <th scope="col" class="out_time">Clocked Out</th>
            <th scope="col" class="total_hours">Total Hours</th>
        </tr>
    </thead>
    <tbody id="entries-table" class="entries-table">
    @foreach($entries as $entry)
        <tr class="">
            <td>{{ $entry->id }}</td>
            <td class="name">{{ $entry->user->name }}</td>
            <td class="centre">{{ $entry->centre->centre_name }}</td>
            <td class="in_time">{{ $entry->in_time }}</td>
            <td class="out_time">{{ $entry->out_time }}</td>
            <td class="total_hours">{{ $entry->total_hours }}</td>
        </tr>
    @endforeach
    </tbody>
    <tbody id="search-entries-result" class="table-search-results"></tbody>
</table>