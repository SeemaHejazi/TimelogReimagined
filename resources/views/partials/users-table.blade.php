<table class="table table-striped table-sm">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col" class="name">Name</th>
        <th scope="col" class="username">Username</th>
        <th scope="col" class="email">Email</th>
        <th scope="col" class="role">Role</th>
    </tr>
    </thead>
    <tbody id="users-table" class="users-table">
    @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td class="name">{{ $user->name }}</td>
            <td class="username">{{ $user->username }}</td>
            <td class="email">{{ $user->email }}</td>
            <td class="role">{{ $user->role->name }}</td>
        </tr>
    @endforeach
    </tbody>
    <tbody id="search-users-result" class="table-search-results"></tbody>
</table>