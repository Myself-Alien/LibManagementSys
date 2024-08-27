<?php
include("assets/links.php");
include("st_header.php");
?>
<div class="container-fluid pt-3 pb-3 st_content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <pre><img src="<?php echo ($img); ?>" alt="Profile" class="st_profile_img"></pre>
                <pre><h1><?php echo "$fname" . " " . "$lname"; ?></h1></pre>
            </div>
            <div class="col-md-4">
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <pre><input class="form-control" type="text" placeholder="<?php echo $fname ?>" aria-label="Disabled input example" disabled></pre>
                        </div>
                        <div class="col-md-6">
                            <pre><input class="form-control" type="text" placeholder="<?php echo $lname ?>" aria-label="Disabled input example" disabled></pre>
                        </div>
                        <div class="col-md-12 pb-3">
                            <input class="form-control" type="text" name="email" placeholder="<?php echo $email ?>">
                        </div>
                        <div class="col-md-12 pb-3">
                            <input class="form-control" type="text" placeholder="<?php echo $pass ?>">
                        </div>
                        <div class="col-md-12 pb-3">
                            <input class="form-control" type="file" id="formFile">
                        </div>
                        <div class="col-md-12">
                            <input type="submit" name="submit" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>