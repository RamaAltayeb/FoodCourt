<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="row mb-3">
    <div class="col-md-6">
        <h1>Food <?php echo $data['ndb_no']; ?> Nutritional Elements</h1>
    </div>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">nutr_no</th>
            <th scope="col">nutr_val</th>
            <th scope="col">num_data_pts</th>
            <th scope="col">std_error</th>
            <th scope="col">src_cd</th>
            <th scope="col">deriv_cd</th>
            <th scope="col">ref_ndb_n</th>
            <th scope="col">add_nutr_mark</th>
            <th scope="col">num_studies</th>
            <th scope="col">min</th>
            <th scope="col">max</th>
            <th scope="col">df</th>
            <th scope="col">low_eb</th>
            <th scope="col">up_eb</th>
            <th scope="col">stat_cmt</th>
            <th scope="col">cc</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data['foodNutritionElements'] as $elm) : ?>
            <tr>
                <td><?php echo $elm->nutr_no; ?></td>
                <td><?php echo $elm->nutr_val; ?></td>
                <td><?php echo $elm->num_data_pts; ?></td>
                <td><?php echo $elm->std_error; ?></td>
                <td><?php echo $elm->src_cd; ?></td>
                <td><?php echo $elm->deriv_cd; ?></td>
                <td><?php echo $elm->ref_ndb_no; ?></td>
                <td><?php echo $elm->add_nutr_mark; ?></td>
                <td><?php echo $elm->num_studies; ?></td>
                <td><?php echo $elm->min; ?></td>
                <td><?php echo $elm->max; ?></td>
                <td><?php echo $elm->df; ?></td>
                <td><?php echo $elm->low_eb; ?></td>
                <td><?php echo $elm->up_eb; ?></td>
                <td><?php echo $elm->stat_cmt; ?></td>
                <td><?php echo $elm->cc; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require APPROOT . '/views/inc/footer.php'; ?>