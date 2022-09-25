<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('group_message'); ?>
<div class="row mb-3">
    <div class="col-md-6">
        <h1>Food Groups</h1>
    </div>
    <div class="col-md-6">
        <a href="<?php echo URLROOT; ?>/foodgroups/add" class="btn btn-primary pull-right">
            <i class="fa fa-pencil"></i> Add Group
        </a>
    </div>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Description</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data['foodGroups'] as $group) : ?>
            <tr>
                <td><?php echo $group->fdgrp_cd; ?></td>
                <td><?php echo $group->fddrp_desc; ?></td>
                <td>
                    <form class="pull-right" action="<?php echo URLROOT; ?>/foodgroups/delete/<?php echo $group->fdgrp_cd; ?>" method="post">
                        <input type="submit" class="btn btn-danger" value="Delete" style="cursor:pointer;">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require APPROOT . '/views/inc/footer.php'; ?>