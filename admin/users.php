<body>
    <div class="container-fluid main-page">
        <div class="app-main">
            <div class="main-content">
                <h3 class="title-page">
                    Thành viên
                </h3>
                <div class="d-flex justify-content-end">
                    <a href="" class="btn btn-primary mb-2">Thêm thành viên</a>
                </div>
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Phone number</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $users = get_all_user();
                            foreach($users as $user) {
                        ?>
                        <tr>
                            <td><?=$user['ten']?></td>
                            <td><?=$user['diachi']?></td>
                            <td><?=$user['email']?></td>
                            <td><?=$user['dienthoai']?></td>
                            <td><?=$user['vaitro']?></td>
                        </tr>
                        <?php }?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Phone number</th>
                            <th>Role</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <script>
        new DataTable('#example');
    </script>
</body>

</html>