<?php $__env->startSection('page_title'); ?>
 <?php if(isset($category)): ?> <?php echo e($category->title); ?> <?php else: ?> Content <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="row">

            <div class="col-md-12">
                <div class="box box-black">
                    <div class="box-title">
                        <h3><i class="fa fa-table"></i> Content Table</h3>
                        <div class="box-tool">
                            <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                            <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <div class="box-content">
                        <div class="btn-toolbar pull-right">
                            <div class="btn-group">
                                <a class="btn btn-circle show-tooltip" title="" href="<?php echo e(url('content/create')); ?>" data-original-title="Add new record"><i class="fa fa-plus"></i></a>
                                <?php
                                $table_name = "contents";
                                // pass table name to delete all function
                                // if the current route exists in delete all table flags it will appear in view
                                // else it'll not appear
                                ?>
                                <?php echo $__env->make('partial.delete_all', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                        <br><br>
                        <div class="table-responsive">
                            <table id="example" class="table table-striped dt-responsive" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th style="width:18px"><input type="checkbox" onclick="select_all('contents')"></th>
                                        <th>id</th>
                                        <th>Title</th>
                                        <th>Content</th>
                                        <?php if(!isset($category)): ?>
                                        <th>Category</th>
                                        <?php endif; ?>
                                        <th>Content Type</th>
                                        <th>patch number</th>
                                        <th >Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><input class="select_all_template" type="checkbox" name="selected_rows[]" value="<?php echo e($value->id); ?>" class="roles" onclick="collect_selected(this)"></td>
                                        <td><?php echo e($value->id); ?></td>
                                        <td>
                                            <?php echo e($value->title); ?>

                                        </td>
                                        <td>
                                          <?php if($value->type->id == 1): ?>
                                          <?php echo $value->path; ?>

                                          <?php elseif($value->type->id == 2): ?>
                                          <?php echo e($value->path); ?>

                                          <?php elseif($value->type->id == 3): ?>
                                          <img src="<?php echo e($value->path); ?>" alt="" style="width:250px" height="200px">
                                          <?php elseif($value->type->id == 4): ?>
                                          <audio controls src="<?php echo e($value->path); ?>" style="width:100%"></audio>
                                          <?php elseif($value->type->id == 5): ?>
                                          <video src="<?php echo e($value->path); ?>" style="width:250px;height:200px" height="200px" controls poster="<?php echo e($value->image_preview); ?>"></video>
                                          <?php elseif($value->type->id == 6): ?>
                                          <iframe src="<?php echo e($value->path); ?>" width="250px" height="200px"></iframe>
                                          <?php endif; ?>
                                        </td>
                                        <?php if(!isset($category)): ?>
                                        <td>
                                            <?php echo e($value->category->title); ?>

                                        </td>
                                        <?php endif; ?>
                                        <td><?php echo e($value->type->title); ?></td>
                                        <td><?php echo e($value->patch_number); ?></td>
                                        <td class="visible-md visible-lg">
                                            <div class="btn-group">
                                                <a class="btn btn-sm btn-success show-tooltip" title="Add Post" href="<?php echo e(url("post/create?content_id=".$value->id."&title=".$value->title)); ?>" data-original-title="Add Post"><i class="fa fa-plus"></i></a>
                                                <?php if(count($value->operators) > 0): ?>
                                                <a class="btn btn-sm show-tooltip" title="Show Posts" href="<?php echo e(url("content/$value->id")); ?>" data-original-title="show Posts"><i class="fa fa-step-forward"></i></a>
                                                <?php endif; ?>
                                                <a class="btn btn-sm show-tooltip" href="<?php echo e(url("content/$value->id/edit")); ?>" title="Edit"><i class="fa fa-edit"></i></a>
                                                <a class="btn btn-sm show-tooltip btn-danger" onclick="return ConfirmDelete();" href="<?php echo e(url("content/$value->id/delete")); ?>" title="Delete"><i class="fa fa-trash"></i></a>
                                                <?php if($value->type->id == 4): ?>
                                                <a class="btn btn-sm btn-info show-tooltip" title="Add Rbt" href="<?php echo e(url("rbt/create?content_id=".$value->id."&title=".$value->title)); ?>" data-original-title="Add RBt"><i class="fa fa-plus"></i></a>
                                                <?php endif; ?>
                                                <?php if(count($value->rbt_operators) > 0): ?>
                                                <a class="btn btn-sm show-tooltip" title="Show Rbt Code" href="<?php echo e(url("rbt/$value->id")); ?>" data-original-title="show RBt_code"><i class="fa fa-step-forward"></i></a>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>

    $('#contents').addClass('active');
    $('#contents_index').addClass('active');

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\php7.2\xampp\htdocs\laravel_graphQl\resources\views/content/index.blade.php ENDPATH**/ ?>