<div class='row'>
    <div class='col-sm-12'>
        <div class='box box-danger'>
            <div class='box-header with-border'>
                <h4 class='box-title'><i class="fa fa-list"></i> List of Employees</h4>
                <div class="box-tools">
                    <a href="<?php echo site_url('admin/employees/add_new'); ?>" class="btn btn-tools"><i class="fa fa-user-plus"></i> ADD NEW EMPLOYEE</a>
                </div>
            </div>
            <div class='box-body'>
                <div class='table-responsive'>
                    <table class='table table-bordered' id='datatable-employees'>
                        <thead>
                            <tr>
                                <th>Fullname</th>
                                <th>Address</th>
                                <th>Gender</th>
                                <th>Hired Date</th>
                                <th>Employee Type</th>
                                <th>Status</th>
                                <!-- <th>Action</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($employees as $index => $employee): ?>
                            <tr>
                                <td><?php echo $employee['employee_fullname']; ?></td>
                                <td><?php echo $employee['address']; ?></td>
                                <td><?php echo $employee['gender_label']; ?></td>
                                <td><?php echo $employee['date_hired']; ?></td>
                                <td><?php echo $employee['name']; ?></td>
                                <td><?php echo $employee['status_label']; ?></td>
                                <!-- <td><a href="javascript:void(0);">Edit</a></td> -->
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        $('#datatable-employees').DataTable();
    });
</script>