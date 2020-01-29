<?php if(isset($_REQUEST['category_id'])): ?>
<div class="form-group">
    <label for="textfield5" class="col-sm-3 col-lg-2 control-label">Category<span class="text-danger">*</span></label>
    <div class="col-sm-9 col-lg-10 controls">
        <select  name="category_id" class="form-control chosen-rtl">
            <option id="category_<?php echo e($_REQUEST['category_id']); ?>" value="<?php echo e($_REQUEST['category_id']); ?>"><?php echo e($_REQUEST['title']); ?></option>
        </select>
    </div>
</div>
<?php else: ?>
<div class="form-group">
    <label class="col-sm-3 col-lg-2 control-label">Category<span class="text-danger">*</span></label>
    <div class="col-sm-9 col-lg-10 controls">
        <?php echo Form::select('category_id',$categorys->pluck('title','id'),null,['class'=>'form-control chosen-rtl','required']); ?>

    </div>
</div>
<?php endif; ?>

<div class="form-group">
    <label class="col-sm-3 col-lg-2 control-label">Content Type<span class="text-danger">*</span></label>
    <div class="col-sm-9 col-lg-10 controls">
        <?php echo Form::select('content_type_id',$content_types->pluck('title','id'),null,['class'=>'form-control chosen-rtl','id' => 'first_select','required']); ?>

    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 col-lg-2 control-label">Title <span class="text-danger">*</span></label>
    <div class="col-sm-9 col-lg-10 controls">
        <?php echo Form::text('title',null,['placeholder'=>'Title','class'=>'form-control']); ?>

    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 col-lg-2 control-label">Patch Number </label>
    <div class="col-sm-9 col-lg-10 controls">
        <?php echo Form::number('patch_number',null,['placeholder'=>'Patch Number','class'=>'form-control','min'=>0]); ?>

    </div>
</div>

<?php if($content): ?>

      <?php if($content->type->id == 1): ?>
      <div class="form-group"  id="advanced">
          <label class="col-sm-3 col-lg-2 control-label">Content <span class="text-danger">*</span></label>
          <div class="col-sm-9 col-lg-10 controls" >
            <?php echo Form::textarea('path',null,['class'=>'form-control ckeditor', 'rows' => 6, 'cols' => 40]); ?>

          </div>
      </div>
      <?php else: ?>
      <div class="form-group" hidden  id="advanced">
          <label class="col-sm-3 col-lg-2 control-label">Content <span class="text-danger">*</span></label>
          <div class="col-sm-9 col-lg-10 controls" >
            <?php echo Form::textarea('path',null,['class'=>'form-control ckeditor', 'rows' => 6, 'cols' => 40 ,'disabled' =>true ]); ?>

          </div>
      </div>
      <?php endif; ?>

      <?php if($content->type->id == 2): ?>
      <div class="form-group"  id="normal">
          <label class="col-sm-3 col-lg-2 control-label">Content <span class="text-danger">*</span></label>
          <div class="col-sm-9 col-lg-10 controls">
              <?php echo Form::text('path',null,['placeholder'=>'Content','class'=>'form-control']); ?>

          </div>
      </div>
      <?php else: ?>
      <div class="form-group" hidden id="normal">
          <label class="col-sm-3 col-lg-2 control-label">Content <span class="text-danger">*</span></label>
          <div class="col-sm-9 col-lg-10 controls">
              <?php echo Form::text('path',null,['placeholder'=>'Content','class'=>'form-control','disabled' =>true ]); ?>

          </div>
      </div>
      <?php endif; ?>


      <?php if($content->type->id == 3): ?>
      <div class="form-group"  id="image">
          <label class="col-sm-3 col-lg-2 control-label">Content <span class="text-danger">*</span></label>
          <div class="col-sm-9 col-md-8 controls">
              <div class="fileupload fileupload-new" data-provides="fileupload">
                  <div class="fileupload-new img-thumbnail" style="width: 200px; height: 150px;">
                      <?php if($content): ?>
                          <img src="<?php echo e($content->path); ?>" alt="" />
                      <?php else: ?>
                          <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                      <?php endif; ?>
                  </div>
                  <div class="fileupload-preview fileupload-exists img-thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                  <div>
                      <span class="btn btn-file"><span class="fileupload-new"><?php echo app('translator')->getFromJson('messages.select_image'); ?></span>
                          <span class="fileupload-exists">Change</span>
                          <?php echo Form::file('path',["accept"=>"image/*" ,"class"=>"default"]); ?>

                      </span>
                      <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                  </div>
              </div>
              <span class="label label-important">NOTE!</span>
              <span>Only extensions supported png, jpg, and jpeg</span>
          </div>
      </div>
      <?php else: ?>
      <div class="form-group" hidden id="image">
          <label class="col-sm-3 col-lg-2 control-label">Content <span class="text-danger">*</span></label>
          <div class="col-sm-9 col-md-8 controls">
              <div class="fileupload fileupload-new" data-provides="fileupload">
                  <div class="fileupload-new img-thumbnail" style="width: 200px; height: 150px;">
                      <?php if($content): ?>
                          <img src="<?php echo e($content->path); ?>" alt="" />
                      <?php else: ?>
                          <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                      <?php endif; ?>
                  </div>
                  <div class="fileupload-preview fileupload-exists img-thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                  <div>
                      <span class="btn btn-file"><span class="fileupload-new"><?php echo app('translator')->getFromJson('messages.select_image'); ?></span>
                          <span class="fileupload-exists">Change</span>
                          <?php echo Form::file('path',["accept"=>"image/*" ,"class"=>"default" ,'disabled' =>true ]); ?>

                      </span>
                      <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                  </div>
              </div>
              <span class="label label-important">NOTE!</span>
              <span>Only extensions supported png, jpg, and jpeg</span>
          </div>
      </div>
      <?php endif; ?>

      <?php if($content->type->id == 4): ?>
      <div class="form-group"  id="audio">
          <label class="col-sm-3 col-lg-2 control-label">Content <span class="text-danger">*</span></label>
          <div class="col-sm-9 col-md-8 controls">
              <div class="fileupload fileupload-new" data-provides="fileupload">
                  <div class="fileupload-new img-thumbnail" style="width: 200px; height: 150px;">
                      <?php if($content): ?>
                          <audio controls >
                            <source src="<?php echo e($content->path); ?>">
                          </audio>
                      <?php endif; ?>
                  </div>
                  <div class="fileupload-preview fileupload-exists img-thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                  <div>
                      <span class="btn btn-file"><span class="fileupload-new">Select Audio File</span>
                          <span class="fileupload-exists">Change</span>
                          <?php echo Form::file('path',["accept"=>"audio/*",'class'=>'default']); ?>

                      </span>
                      <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                  </div>
              </div>
              <span class="label label-important">NOTE!</span>
              <span>Only extensions supported mp3</span>
          </div>
      </div>
      <?php else: ?>
      <div class="form-group" hidden id="audio">
          <label class="col-sm-3 col-lg-2 control-label">Content <span class="text-danger">*</span></label>
          <div class="col-sm-9 col-md-8 controls">
              <div class="fileupload fileupload-new" data-provides="fileupload">
                  <div class="fileupload-new img-thumbnail" style="width: 200px; height: 150px;">
                      <?php if($content): ?>
                          <audio controls >
                            <source src="<?php echo e($content->path); ?>">
                          </audio>
                      <?php endif; ?>
                  </div>
                  <div class="fileupload-preview fileupload-exists img-thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                  <div>
                      <span class="btn btn-file"><span class="fileupload-new">Select Audio File</span>
                          <span class="fileupload-exists">Change</span>
                          <?php echo Form::file('path',["accept"=>"audio/*",'class'=>'default' ,'disabled' =>true ]); ?>

                      </span>
                      <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                  </div>
              </div>
              <span class="label label-important">NOTE!</span>
              <span>Only extensions supported mp3</span>
          </div>
      </div>
      <?php endif; ?>

      <?php if($content->type->id == 5): ?>
      <div  id="video">
        <div class="form-group">
            <label class="col-sm-3 col-md-2 control-label">Image Preview</label>
            <div class="col-sm-9 col-md-8 controls">
                <div class="fileupload fileupload-new" data-provides="fileupload">
                    <div class="fileupload-new img-thumbnail" style="width: 200px; height: 150px;">
                        <?php if($content): ?>
                            <img src="<?php echo e($content->image_preview); ?>" alt="" />
                        <?php else: ?>
                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                        <?php endif; ?>
                    </div>
                    <div class="fileupload-preview fileupload-exists img-thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                    <div>
                        <span class="btn btn-file"><span class="fileupload-new"><?php echo app('translator')->getFromJson('messages.select_image'); ?></span>
                            <span class="fileupload-exists">Change</span>
                            <?php echo Form::file('image_preview',["accept"=>"image/*" ,"class"=>"default"]); ?>

                        </span>
                        <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                    </div>
                </div>
                <span class="label label-important">NOTE!</span>
                <span>Only extensions supported png, jpg, and jpeg</span>
            </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 col-lg-2 control-label">Content <span class="text-danger">*</span></label>
          <div class="col-sm-9 col-md-8 controls">
              <div class="fileupload fileupload-new" data-provides="fileupload">
                  <div class="fileupload-new img-thumbnail" style="width: 200px; height: 150px;">
                    <?php if($content): ?>
                    <video width="100%" height="100%" controls>
                      <source src="<?php echo e($content->path); ?>">
                    </video>
                    <?php endif; ?>
                  </div>
                  <div class="fileupload-preview fileupload-exists img-thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                  <div>
                      <span class="btn btn-file"><span class="fileupload-new">Select Video File</span>
                          <span class="fileupload-exists">Change</span>
                          <?php echo Form::file('path',["accept"=>"video/*",'class'=>'default']); ?>

                      </span>
                      <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                  </div>
              </div>
              <span class="label label-important">NOTE!</span>
              <span>Only extension supported mp4, flv, and 3gp</span>
          </div>


        </div>
      </div>
      <?php else: ?>
      <div hidden id="video">
        <div class="form-group">
            <label class="col-sm-3 col-md-2 control-label">Image Preview</label>
            <div class="col-sm-9 col-md-8 controls">
                <div class="fileupload fileupload-new" data-provides="fileupload">
                    <div class="fileupload-new img-thumbnail" style="width: 200px; height: 150px;">
                        <?php if($content): ?>
                            <img src="<?php echo e($content->image_preview); ?>" alt="" />
                        <?php else: ?>
                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                        <?php endif; ?>
                    </div>
                    <div class="fileupload-preview fileupload-exists img-thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                    <div>
                        <span class="btn btn-file"><span class="fileupload-new"><?php echo app('translator')->getFromJson('messages.select_image'); ?></span>
                            <span class="fileupload-exists">Change</span>
                            <?php echo Form::file('image_preview',["accept"=>"image/*" ,"class"=>"default"]); ?>

                        </span>
                        <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                    </div>
                </div>
                <span class="label label-important">NOTE!</span>
                <span>Only extensions supported png, jpg, and jpeg</span>
            </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 col-lg-2 control-label">Content <span class="text-danger">*</span></label>
          <div class="col-sm-9 col-md-8 controls">
              <div class="fileupload fileupload-new" data-provides="fileupload">
                  <div class="fileupload-new img-thumbnail" style="width: 200px; height: 150px;">
                    <?php if($content): ?>
                    <video width="100%" height="100%" controls>
                      <source src="<?php echo e($content->path); ?>">
                    </video>
                    <?php endif; ?>
                  </div>
                  <div class="fileupload-preview fileupload-exists img-thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                  <div>
                      <span class="btn btn-file"><span class="fileupload-new">Select Video File</span>
                          <span class="fileupload-exists">Change</span>
                          <?php echo Form::file('path',["accept"=>"video/*",'class'=>'default' ,'disabled' =>true ]); ?>

                      </span>
                      <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                  </div>
              </div>
              <span class="label label-important">NOTE!</span>
              <span>Only extension supported mp4, flv, and 3gp</span>
          </div>


        </div>
      </div>
      <?php endif; ?>

      <?php if($content->type->id == 6): ?>
      <div  id="external">
        <div class="form-group">
            <label class="col-sm-3 col-md-2 control-label">Image Preview</label>
            <div class="col-sm-9 col-md-8 controls">
                <div class="fileupload fileupload-new" data-provides="fileupload">
                    <div class="fileupload-new img-thumbnail" style="width: 200px; height: 150px;">
                        <?php if($content): ?>
                            <img src="<?php echo e($content->image_preview); ?>" alt="" />
                        <?php else: ?>
                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                        <?php endif; ?>
                    </div>
                    <div class="fileupload-preview fileupload-exists img-thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                    <div>
                        <span class="btn btn-file"><span class="fileupload-new"><?php echo app('translator')->getFromJson('messages.select_image'); ?></span>
                            <span class="fileupload-exists">Change</span>
                            <?php echo Form::file('image_preview',["accept"=>"image/*" ,"class"=>"default"]); ?>

                        </span>
                        <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                    </div>
                </div>
                <span class="label label-important">NOTE!</span>
                <span>Only extensions supported png, jpg, and jpeg</span>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 col-lg-2 control-label">Content <span class="text-danger">*</span></label>
            <div class="col-sm-9 col-lg-10 controls">
                <?php echo Form::text('path',null,['placeholder'=>'Content','class'=>'form-control' ]); ?>

            </div>
        </div>
      </div>
      <?php else: ?>
      <div hidden id="external">
        <div class="form-group">
            <label class="col-sm-3 col-md-2 control-label">Image Preview</label>
            <div class="col-sm-9 col-md-8 controls">
                <div class="fileupload fileupload-new" data-provides="fileupload">
                    <div class="fileupload-new img-thumbnail" style="width: 200px; height: 150px;">
                        <?php if($content): ?>
                            <img src="<?php echo e($content->image_preview); ?>" alt="" />
                        <?php else: ?>
                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                        <?php endif; ?>
                    </div>
                    <div class="fileupload-preview fileupload-exists img-thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                    <div>
                        <span class="btn btn-file"><span class="fileupload-new"><?php echo app('translator')->getFromJson('messages.select_image'); ?></span>
                            <span class="fileupload-exists">Change</span>
                            <?php echo Form::file('image_preview',["accept"=>"image/*" ,"class"=>"default"]); ?>

                        </span>
                        <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                    </div>
                </div>
                <span class="label label-important">NOTE!</span>
                <span>Only extensions supported png, jpg, and jpeg</span>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 col-lg-2 control-label">Content <span class="text-danger">*</span></label>
            <div class="col-sm-9 col-lg-10 controls">
                <?php echo Form::text('path',null,['placeholder'=>'Content','class'=>'form-control','disabled' =>true ]); ?>

            </div>
        </div>
      </div>
      <?php endif; ?>
<?php else: ?>
    <div class="form-group"   id="advanced">
        <label class="col-sm-3 col-lg-2 control-label">Content <span class="text-danger">*</span></label>
        <div class="col-sm-9 col-lg-10 controls" >
          <?php echo Form::textarea('path',null,['class'=>'form-control ckeditor', 'rows' => 6, 'cols' => 40  ]); ?>

        </div>
    </div>

    <div class="form-group" hidden id="normal">
        <label class="col-sm-3 col-lg-2 control-label">Content <span class="text-danger">*</span></label>
        <div class="col-sm-9 col-lg-10 controls">
            <?php echo Form::text('path',null,['placeholder'=>'Content','class'=>'form-control' ,'disabled' =>true]); ?>

        </div>
    </div>

    <div hidden id="video">
      <div class="form-group">
          <label class="col-sm-3 col-md-2 control-label">Image Preview</label>
          <div class="col-sm-9 col-md-8 controls">
              <div class="fileupload fileupload-new" data-provides="fileupload">
                  <div class="fileupload-new img-thumbnail" style="width: 200px; height: 150px;">
                      <?php if($content): ?>
                          <img src="<?php echo e($content->image_preview); ?>" alt="" />
                      <?php else: ?>
                          <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                      <?php endif; ?>
                  </div>
                  <div class="fileupload-preview fileupload-exists img-thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                  <div>
                      <span class="btn btn-file"><span class="fileupload-new"><?php echo app('translator')->getFromJson('messages.select_image'); ?></span>
                          <span class="fileupload-exists">Change</span>
                          <?php echo Form::file('image_preview',["accept"=>"image/*" ,"class"=>"default"]); ?>

                      </span>
                      <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                  </div>
              </div>
              <span class="label label-important">NOTE!</span>
              <span>Only extensions supported png, jpg, and jpeg</span>
          </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 col-lg-2 control-label">Content <span class="text-danger">*</span></label>
        <div class="col-sm-9 col-md-10 controls">
            <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="fileupload-preview fileupload-exists img-thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                <div>
                    <span class="btn btn-file"><span class="fileupload-new">Select Video File</span>
                        <span class="fileupload-exists">Change</span>
                        <?php echo Form::file('path',["accept"=>"video/*",'class'=>'default' ,'disabled' =>true ]); ?>

                    </span>
                    <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                </div>
            </div>
            <span class="label label-important">NOTE!</span>
            <span>Only extension supported mp4, flv, and 3gp</span>
        </div>


      </div>
    </div>

    <div class="form-group" hidden id="audio">
        <label class="col-sm-3 col-lg-2 control-label">Content <span class="text-danger">*</span></label>
        <div class="col-sm-9 col-md-10 controls">
            <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="fileupload-preview fileupload-exists img-thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                <div>
                    <span class="btn btn-file"><span class="fileupload-new">Select Audio File</span>
                        <span class="fileupload-exists">Change</span>
                        <?php echo Form::file('path',["accept"=>"audio/*",'class'=>'default' ,'disabled' =>true ]); ?>

                    </span>
                    <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                </div>
            </div>
            <span class="label label-important">NOTE!</span>
            <span>Only extensions supported mp3</span>
        </div>
    </div>

    <div class="form-group" hidden id="image">
        <label class="col-sm-3 col-lg-2 control-label">Content <span class="text-danger">*</span></label>
        <div class="col-sm-9 col-md-8 controls">
            <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="fileupload-new img-thumbnail" style="width: 200px; height: 150px;">
                    <?php if($content): ?>
                        <img src="<?php echo e($content->path); ?>" alt="" />
                    <?php else: ?>
                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                    <?php endif; ?>
                </div>
                <div class="fileupload-preview fileupload-exists img-thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                <div>
                    <span class="btn btn-file"><span class="fileupload-new"><?php echo app('translator')->getFromJson('messages.select_image'); ?></span>
                        <span class="fileupload-exists">Change</span>
                        <?php echo Form::file('path',["accept"=>"image/*" ,"class"=>"default" ,'disabled' =>true ]); ?>

                    </span>
                    <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                </div>
            </div>
            <span class="label label-important">NOTE!</span>
            <span>Only extensions supported png, jpg, and jpeg</span>
        </div>
    </div>

    <div hidden id="external">
      <div class="form-group">
          <label class="col-sm-3 col-md-2 control-label">Image Preview</label>
          <div class="col-sm-9 col-md-8 controls">
              <div class="fileupload fileupload-new" data-provides="fileupload">
                  <div class="fileupload-new img-thumbnail" style="width: 200px; height: 150px;">
                      <?php if($content): ?>
                          <img src="<?php echo e($content->image_preview); ?>" alt="" />
                      <?php else: ?>
                          <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                      <?php endif; ?>
                  </div>
                  <div class="fileupload-preview fileupload-exists img-thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                  <div>
                      <span class="btn btn-file"><span class="fileupload-new"><?php echo app('translator')->getFromJson('messages.select_image'); ?></span>
                          <span class="fileupload-exists">Change</span>
                          <?php echo Form::file('image_preview',["accept"=>"image/*" ,"class"=>"default" ,'disabled' =>true]); ?>

                      </span>
                      <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                  </div>
              </div>
              <span class="label label-important">NOTE!</span>
              <span>Only extensions supported png, jpg, and jpeg</span>
          </div>
      </div>
      <div class="form-group">
          <label class="col-sm-3 col-lg-2 control-label">Content <span class="text-danger">*</span></label>
          <div class="col-sm-9 col-lg-10 controls">
              <?php echo Form::text('path',null,['placeholder'=>'Content','class'=>'form-control','disabled' =>true ]); ?>

          </div>
      </div>
    </div>
<?php endif; ?>
<div class="form-group">
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
        <?php echo Form::submit($buttonAction,['class'=>'btn btn-primary']); ?>

    </div>
</div>
<?php /**PATH E:\php7.2\xampp\htdocs\laravel_graphQl\resources\views/content/input.blade.php ENDPATH**/ ?>