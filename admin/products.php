<?php
    session_start();
    if(isset($_SESSION['delete_failed'])) {
        require_once 'assets/php/toast_message_failed.php';
        unset($_SESSION['delete_failed']);
    } else if(isset($_SESSION['delete_success'])) {
        require_once 'assets/php/toast_message_success.php';
        unset($_SESSION['delete_success']);
    }
?>

<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/8c204d0fdf.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <title>Document</title>
</head> -->

<body>
    <div class="container-fluid main-page">
        <div class="app-main">
            <div class="main-content">
                <h3 class="title-page">
                    Sản phẩm
                </h3>
                <div class="d-flex justify-content-end">
                    <a href="index.php?page=add-product" class="btn btn-primary mb-2">Thêm sản phẩm</a>
                </div>
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Gia</th>
                            <th>So luot xem</th>
                            <th>Loai san pham</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $products = get_all_products();
                            foreach($products as $product) {
                        ?>
                            <tr>
                                <td><?=$product['ten_sp']?></td>
                                <td><?=$product['gia']?></td>
                                <td><?=$product['soluotxem']?></td>
                                <td>
                                    <?php 
                                        $loai_sp = get_name_kind($product['id_loai']);
                                        echo $loai_sp['ten_loai'];
                                    ?>
                                </td>
                                <td>
                                    <a href="index.php?page=edit-categories&id_sp=<?=$product['id_sp']?>" class="btn btn-warning">
                                        <i class="fa-solid fa-pen-to-square"></i>Sửa
                                    </a>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-name="<?=$product['ten_sp']?>" data-bs-id="<?=$product['id_sp']?>">
                                        <i class="fa-solid fa-trash"></i>Xóa
                                    </button>
                                </td>
                            </tr>
                        <?php }?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Gia</th>
                            <th>So luot xem</th>
                            <th>Loai san pham</th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-red">
                    <h3 class="modal-title" id="exampleModalLabel"></i></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4></h4>
                </div>
                <div class="modal-footer">
                        <a href="#" class="btn btn-danger">Delete</a>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        new DataTable('#example');
        const exampleModal = document.getElementById('exampleModal');

        if (exampleModal) {
            exampleModal.addEventListener('show.bs.modal', event => {
                // Button that triggered the modal
                const button = event.relatedTarget
                // Extract info from data-bs-* attributes
                console.log(button);
                const nameProduct = button.getAttribute('data-bs-name');
                const idProduct = button.getAttribute('data-bs-id');
                // If necessary, you could initiate an Ajax request here
                // and then do the updating in a callback.

                // Update the modal's content.
                const modalTitle = exampleModal.querySelector('.modal-title');
                const modalBodyInput = exampleModal.querySelector('.modal-body h4');
                const deleteElement = exampleModal.querySelector('a');
                modalTitle.innerHTML = 'Warning ' + '<i class="fa-solid fa-skull-crossbones">';
                modalBodyInput.textContent = `You want to remove ${nameProduct}`;
                deleteElement.href = `index.php?page=delete-product&id_sp=${idProduct}`;
            })
        }
        
    </script>
    <script src="assets/js/main.js"></script>
    <script>
        new DataTable('#example');
    </script>
</body>

<!-- </html> -->
