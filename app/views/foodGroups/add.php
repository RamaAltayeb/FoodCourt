<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URLROOT; ?>/foodgroups" class="btn btn-light"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
      <div class="card card-body bg-light mt-5">
        <h2>Add Group</h2>
        <p>Create a Food Group with this form</p>
        <form action="<?php echo URLROOT; ?>/foodgroups/add" method="post">
          <div class="form-group">
              <label>CD:<sup>*</sup></label>
              <input type="text" name="fdgrp_cd" class="form-control form-control-lg <?php echo (!empty($data['fdgrp_cd_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['fdgrp_cd']; ?>" placeholder="Add a cd..."/>
              <span class="invalid-feedback"><?php echo $data['fdgrp_cd_err']; ?></span>
          </div>    
          <div class="form-group">
              <label>Description:<sup>*</sup></label>
              <textarea name="fddrp_desc" class="form-control form-control-lg <?php echo (!empty($data['fddrp_desc_err'])) ? 'is-invalid' : ''; ?>" placeholder="Add some description..."><?php echo $data['fddrp_desc']; ?></textarea>
              <span class="invalid-feedback"><?php echo $data['fddrp_desc_err']; ?></span>
          </div>
          <input type="submit" class="btn btn-success" value="Submit" style="cursor:pointer;">
        </form>
      </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
