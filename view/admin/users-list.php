<h3 class="my-4">لیست کاربران</h3>

<!-- Button trigger modal -->
<button type="button" class="btn btn-success my-4 ms-3 btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal">
    افزودن
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                    ثبت نام کاربر جدید
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- body modal  form -->
                <div class="container">
                    <form action="" id="add_student">
                        <div class="input-group mb-3">
                            <span class="input-group-text">نام و نام خانوادگی </span>
                            <input type="text" id="firstname" aria-label="First name" class="form-control" placeholder="نام" />
                            <input type="text" id="lastname" aria-label="Last name" class="form-control" placeholder="نام خانوادگی" />
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">
                                موبایل</span>
                            <input type="tel" id="mobile" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="09120000000" />
                        </div>
                        <div class="input-group mb-3    ">
                            <label class="input-group-text" for="level">کلاس</label>
                            <select class="form-select" id="level">
                                <option selected>انتخاب کلاس...</option>
                                <option value="1">هفتم</option>
                                <option value="2">هشتم</option>
                                <option value="3">نهم</option>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">
                                ایمیل</span>
                            <input type="email" id="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" />
                        </div>

                        <button type="submit" class="btn btn-success ">افزودن</button>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<!-- edit modal form -->
<div class="modal fade" id="edituser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">ویرایش کاربر</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- form edite and update -->
                <div class="container">
                    <form action="" id="update_student">
                        <div class="input-group mb-3">
                            <span class="input-group-text">نام و نام خانوادگی </span>
                            <input type="text" id="e_name" aria-label="First name" class="form-control" placeholder="نام" />
                            <input type="text" id="e_family" aria-label="Last name" class="form-control" placeholder="نام خانوادگی" />
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">
                                موبایل</span>
                            <input type="tel" id="e_mobile" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="09120000000" />
                        </div>
                        <div class="input-group mb-3    ">
                            <label class="input-group-text" for="inputGroupSelect01">کلاس</label>
                            <select class="form-select" id="e_level">
                                <option selected>انتخاب کلاس...</option>
                                <option value="1">هفتم</option>
                                <option value="2">هشتم</option>
                                <option value="3">نهم</option>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">
                                ایمیل</span>
                            <input type="email" id="e_email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" />
                        </div>
                        <input type="hidden" id="e_ID" value="">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">انصراف</button>
                            <button type="submit" class="btn btn-primary">ثبت</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //table of submit users -->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <table class="table striped border">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">نام</th>
                        <th scope="col">نام خانوادگی</th>
                        <th scope="col">موبایل</th>
                        <th scope="col">کلاس</th>
                        <th scope="col">ایمیل</th>
                        <th scope="col">عملیات</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php $all_users = all_users();
                    if ($all_users) :



                    ?>
                        <?php
                        foreach ($all_users as $item) :; ?>
                            <tr>
                                <th scope="row"><?php echo $item->ID; ?></th>
                                <td><?php echo $item->name; ?></td>
                                <td><?php echo $item->family; ?></td>
                                <td><?php echo $item->mobile; ?></td>
                                <td><?php
                                    switch ($item->level) {
                                        case '1':
                                            echo '<span class="badge text-bg-success">هفتم</span>';
                                            break;
                                        case '2':
                                            echo '<span class="badge text-bg-danger">هشتم</span>';
                                            break;
                                        case '3':
                                            echo '<span class="badge text-bg-info">نهم</span>';
                                            break;
                                    }

                                    ?></td>
                                <td><?php echo $item->email; ?></td>
                                <td>
                                    <i class="bi bi-x-circle-fill delet-student" id="delet-item-<?php echo $item->ID ?>" data-id="<?php echo $item->ID ?>"></i>
                                    <i class="bi bi-pencil select-student" data-bs-toggle="modal" data-bs-target="#edituser" id="delet-item-<?php echo $item->ID ?>" data-id="<?php echo $item->ID ?>"></i>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php else : ?>
                        <div class="alert alert-warning">رکوردی ثبت نشده است</div>
                    <?php endif ?>

                </tbody>
            </table>
        </div>
    </div>
</div>