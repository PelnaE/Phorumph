<h3>List of Users</h3>
<table>
    <tr>
        <th>ID</th>
        <th>Picture</th>
        <th>Username</th>
        <th>e-mail</th>
    </tr>
    <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo $user->id; ?></td>
        <td><?php echo $user->picture; ?></td>
        <td><?php echo $user->username; ?></td>
        <td><?php echo $user->email; ?></td>
    </tr>
    <?php endforeach; ?>
</table>
