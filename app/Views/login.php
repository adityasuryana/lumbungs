<!-- 
    Aditya Suryana
    IF8 - 10121297
    2024
 -->
<?php 
helper('url');
echo view('_partials/header');
$session = session();
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-6 position-absolute top-50 start-50 translate-middle">
            <div class="">
                <h2 class="head-title text-center">Lumbungs</h2>
                
                    <?php
                        if ($session->getFlashdata('error')) {
                            echo "<div class='alert alert-danger alert-dismissible fade show mb-4 border-0'>{$session->getFlashdata('error')}
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>";
                        }
                    ?>
                         <div class='alert alert-info show mt-3 mb-3 border-0 text-center'>email: admin@mail.com | password: admin</div>
                        <form method="POST" action="<?= base_url('/processLogin') ?>">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="email" value="<?= old('email') ?>" required>
                            </div>
                            
                            <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password" required>
                            </div>
                            <input type="submit" id="submit" class="black-button w-100 mt-2 mb-2" value="Login">
                    </form>
                    
                </div>
                <p class="text-center mt-5">by Aditya Suryana</p>
                <p class="text-center mt-0">IF8 - 10121297</p>
            </div>
    </div>
    
</div>

<?php
echo view('_partials/footer');
?>