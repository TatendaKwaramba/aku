<div class="card" ng-cloak="" ng-controller="usersController">
    <div class="card-content teal white-text">
        <strong><i class="fa fa-user"></i> Manage Users</strong>
    </div>
    <div class="card-content">
        <table class="highlighted bordered">
            <tr>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>CREATED AT</th>
                <th>UPDATED AT</th>
                <th>ROLE</th>
            </tr>
            <tr ng-repeat="user in users">
                <td>{{ user.name }}</td>
                <td>{{ user.email }}</td>
                <td>{{ user.created_at }}</td>
                <td>{{ user.update_at }}</td>
                <td>{{ user.role }}</td>
            </tr>
        </table>
    </div>
</div>