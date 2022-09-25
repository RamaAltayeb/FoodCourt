<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="row mb-3">
    <div class="col-md-6">
        <h1>Foods</h1>
    </div>
</div>

<table id="foodtable" class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Long Description</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data['foodDescs'] as $desc) : ?>
            <tr>
                <td><?php echo $desc->ndb_no; ?></td>
                <td><?php echo $desc->long_desc; ?></td>
                <td>
                    <a href="<?php echo URLROOT; ?>/fooddescs/getFoodNutritionalElements/<?php echo $desc->ndb_no; ?>" class="btn btn-primary pull-right">
                        Nutritional Elements
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    $('#foodtable').DataTable();
</script>

<?php require APPROOT . '/views/inc/footer.php'; ?>