<?php  include('db.php') ?>

<?php include('includes/header.php') ?>

    <div class='container p-4'>
        <div class='row'>
            <div class='col-md-4'>

                <?php if(isset($_SESSION['message'])) { ?>
                    <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                        <?= $_SESSION['message'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php session_unset(); } ?>

                <div class='card card-body'>
                    <form action="save_task.php" method="POST">
                        <div class="form-group mb-2">
                            <input type="text" name="title" class='form-control' placeholder="Task title" autofocus>
                        </div>
                        <div class="form-group mb-2">
                            <textarea name="description" rows="2" class='form-control' placeholder="task description"></textarea>
                        </div>
                        <div class="form-group d-flex justify-content-center">
                            <input type="submit" class="btn btn-success btn-block" name='save_task' value="Save Task">
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-8">
                <table class='table table-bordered'>
                    <thead>
                        <tr class='text-center'>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = "SELECT * FROM task";
                            $result_task = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_array($result_task)){ ?>
                                <tr class='text-center'>
                                    <td><?php echo $row['title'] ?></td>
                                    <td><?php echo $row['description'] ?></td>
                                    <td><?php echo $row['created_at'] ?></td>
                                    <td class='d-flex justify-content-evenly gap-2'>
                                        <a class="btn btn-secondary" href="edit_task.php?id=<?php echo $row['id']?>">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <a class="btn btn-danger" href="delete_task.php?id=<?php echo $row['id']?>">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
    
        </div>
    </div>


<?php include('includes/footer.php') ?>