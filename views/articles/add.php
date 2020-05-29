<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Share Something!</h3>
  </div>
  <div class="panel-body">
    <?php if(isset($_SESSION['is_logged_in']) && !empty($_SESSION['is_logged_in'])) : ?>
        <form method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <div class="form-group">
                <label>Article Title</label>
                <input type="text" name="title" class="form-control" required/>
            </div>
            <div class="form-group">
                <label>Body</label>
                <textarea name="body" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label>Link</label>
                <input type="text" name="link" class="form-control" required/>
            </div>
            <input class="btn btn-primary" name="submit" type="submit" value="Submit" />
            <a class="btn btn-danger" href="<?php echo ROOT_PATH; ?>articles">Cancel</a>
        </form>
    <?php else : ?> 
        <h2>You must be logged in to access articles</h2>
    <?php endif;?>
  </div>
</div>



