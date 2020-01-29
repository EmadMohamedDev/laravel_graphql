<?php $__env->startSection('page_title'); ?>
 Post
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="row">

            <div class="col-md-12">
                <div class="box box-black">
                    <div class="box-title">
                        <h3><i class="fa fa-table"></i> Post Table</h3>
                        <div class="box-tool">
                            <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                            <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <div class="box-content">
                        <div class="btn-toolbar pull-right">
                            <div class="btn-group">
                                <a class="btn btn-circle show-tooltip" title="" href="<?php echo e(url('post/create')); ?>" data-original-title="Add new record"><i class="fa fa-plus"></i></a>
                                <?php
                                $table_name = "posts";
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
                                        <th style="width:18px"><input type="checkbox" onclick="select_all('posts')"></th>
                                        <th>content</th>
                                        <th>published date</th>
                                        <th>Status</th>
                                        <th>url</th>
                                        <th>user</th>
                                        <th >Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = $content->operators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><input class="select_all_template" type="checkbox" name="selected_rows[]" value="<?php echo e($value->id); ?>" class="roles" onclick="collect_selected(this)"></td>
                                        <td>
                                            <?php echo e($content->title); ?>

                                        </td>
                                        <td><?php echo e($value->pivot->published_date); ?></td>
                                        <td><?php if($value->pivot->active): ?> active <?php else: ?> not active <?php endif; ?></td>
                                        <td>
                                          <input type="text"  id="url_h<?php echo e($value->id); ?><?php echo e($key); ?><?php echo e($value->pivot->id); ?>" value="<?php echo e($value->pivot->url); ?>">
                                          <span class="btn"><?php echo e($value->country->title); ?>-<?php echo e($value->name); ?></span>
                                          <span class="btn" onclick="x = document.getElementById('url_h<?php echo e($value->id); ?><?php echo e($key); ?><?php echo e($value->pivot->id); ?>'); x.select();document.execCommand('copy')"> <i class="fa fa-copy"></i> </span>
                                          <br>
                                        </td>
                                        <td><?php echo e(DB::table('users')->where('id',$value->pivot->user_id)->first()->name); ?></td>
                                        </td>
                                        <td class="visible-md visible-lg">
                                            <div class="btn-group">
                                                <a class="btn btn-sm show-tooltip" href="<?php echo e(url("post/".$value->pivot->id."/edit")); ?>" title="Edit"><i class="fa fa-edit"></i></a>
                                                <a class="btn btn-sm show-tooltip btn-danger" onclick="return ConfirmDelete();" href="<?php echo e(url("post/".$value->pivot->id."/delete")); ?>" title="Delete"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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


$('#post').addClass('active');
$('#post_index').addClass('active');

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\php7.2\xampp\htdocs\laravel_graphQl\resources\views/post/index.blade.php ENDPATH**/ ?>