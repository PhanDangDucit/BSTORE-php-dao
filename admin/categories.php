<?php
    session_start();
    $categories = get_categories();
    if(isset($_SESSION['delete_failed'])) {
        require_once 'assets/php/toast_message_failed.php';
        unset($_SESSION['delete_failed']);
    } else if(isset($_SESSION['delete_success'])) {
        require_once 'assets/php/toast_message_success.php';
        unset($_SESSION['delete_success']);
    }
?>
<div class="container-fluid main-page">
    <div class="app-main">
        <div class="main-content">
            <h3 class="title-page">
                Danh mục
            </h3>
            <div class="d-flex justify-content-end">
                <a href="#" class="btn btn-primary mb-2">Thêm danh mục</a>
            </div>
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name of categories</th>
                        <th cols="2"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $a = 0; 
                        foreach($categories as $item) {
                    ?>
                        <tr>
                            <td><?=$a++?></td>
                            <td><?=$item['ten_loai']?></td>
                            <td>
                                <a href="index.php?page=edit-categories&id_loai=<?=$item['id_loai']?>" class="btn btn-primary btn-warning">
                                    <i class="fa-solid fa-pen-to-square"></i>Sửa
                                </a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-name="<?=$item['ten_loai']?>" data-bs-id="<?=$item['id_loai']?>">
                                    <i class="fa-solid fa-trash"></i>Xóa
                                </button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Name of categories</th>
                        <th cols="2">Start date</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <!-- Button trigger modal -->
    
    <!-- Modal -->
</div>
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


<script src="assets/js/main.js"></script>
<script>
    new DataTable('#example');
    const exampleModal = document.getElementById('exampleModal');

    if (exampleModal) {
        exampleModal.addEventListener('show.bs.modal', event => {
            // Button that triggered the modal
            const button = event.relatedTarget
            // Extract info from data-bs-* attributes
            console.log(button);
            const nameCategory = button.getAttribute('data-bs-name');
            const idCategory = button.getAttribute('data-bs-id');
            console.log(nameCategory);
            // If necessary, you could initiate an Ajax request here
            // and then do the updating in a callback.

            // Update the modal's content.
            const modalTitle = exampleModal.querySelector('.modal-title');
            const modalBodyInput = exampleModal.querySelector('.modal-body h4');
            const deleteElement = exampleModal.querySelector('a');
            console.log(modalBodyInput);
            modalTitle.innerHTML = 'Warning ' + '<i class="fa-solid fa-skull-crossbones">';
            modalBodyInput.textContent = `You want to remove ${nameCategory}`;
            deleteElement.href = `index.php?page=delete-category&id_loai=${idCategory}`;
        })
    }
    
</script>