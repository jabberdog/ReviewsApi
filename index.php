<!DOCTYPE html>
<html>
    <head>
        <title>ReviewsApi</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
        <style>body{padding: 150px 0 0 0; background: #f4f4f4;}</style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-push-2">
                    <?php if ( isset($_GET['success']) && $_GET['success'] == 1 ): ?>
                        <div class="alert alert-success">
                            <p><?php echo $_GET['message']; ?></p>
                        </div>
                    <?php endif; ?>
                    <?php if ( isset($_GET['success']) && $_GET['success'] == 0 ): ?>
                        <div class="alert alert-danger">
                            <p><?php echo $_GET['message']; ?></p>
                        </div>
                    <?php endif; ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Reviews.co.uk API Tester</h3>
                        </div>
                        <div class="panel-body">
                            <form method="post" action="register.php">
                                <div class="form-group">
                                    <input type="text" name="sku" id="sku" placeholder="SKU" value="<?php echo $_GET['sku']; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success btn-lg btn-block" value="Submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
