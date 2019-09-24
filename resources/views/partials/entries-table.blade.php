<table>
    <thead>
        <tr>
            <th class="name">Name</th>
            <th class="centre">Centre</th>
            <th class="in_time">Clocked In</th>
            <th class="out_time">Clocked Out</th>
            <th class="total_hours">Total Hours</th>
        </tr>
    </thead>
    <tbody id="entries-table" class="entries-table">
    @foreach($entries as $entry)
        <tr>
            <td class="name"> {{ $entry->user->name }}</td>
            <td class="centre"> {{ $entry->centre->centre_name }}</td>
            <td class="in_time"> {{ $entry->in_time }}</td>
            <td class="out_time"> {{ $entry->out_time }}</td>
            <td class="total_hours"> {{ $entry->total_hours }}</td>
        </tr>
    @endforeach
    </tbody>
    <tbody id="search-entries-result" class="table-search-results"></tbody>
</table>