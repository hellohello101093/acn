<script>
    $(document).ready(function(){
        $('#title').on('keyup change',function(){
            var name = $('#title').val();
            $.post( url + "admin/product/generateLink", { name : name})
                .done(function(data ) {
                    $('#link').val(data);

                });
        })
    })
</script>
<div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-reorder"></i><?php echo  (isset($info))?"Sửa ":"Thêm " ?>Tin Tức
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse">
                </a>
                <a href="javascript:;" class="reload">
                </a>

            </div>
        </div>
        <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <form action='<?php echo base_url()?>admin/duan/<?php echo $action ?>/<?php echo  (isset($info['id']))?$info['id']:"" ?>' class="form-horizontal" method="post" enctype="multipart/form-data">

                <div class="form-body">
                    <?php if(validation_errors()!=''){ ?>
                    <div class="note note-danger" >
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            <?php echo validation_errors() ?>
                        </div>
                    <?php } ?>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Tiêu Đề (*)</label>
                        <div class="col-md-4">
                            <input type="text" id='title' name='title' required="required" placeholder="Tiêu Đề ..." class='form-control' value='<?php
                            echo (isset($info))?$info['title']:"" ?>'>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Đường Dẫn (*)</label>
                        <div class="col-md-8">
                            <input type="text" id='link' name='link' required="required" placeholder="Đường Dẫn ..." class='form-control' value='<?php
                            echo (isset($info))?$info['link']:"" ?>'>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Keyword (*)</label>
                        <div class="col-md-4">
                            <input type="text" id='keyword' name='keyword' required="required" placeholder="Keyword ..." class='form-control' value='<?php
                            echo (isset($info['keyword']))?$info['keyword']:"" ?>'>
                        </div>
                    </div>
                    <?php if(isset($info['avatar'])){ ?>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Ảnh Cũ</label>
                        <div class="col-md-4">
                            <img src="<?php echo base_url() ?>public/duan/<?php echo $info['avatar'] ?>" alt=" " height="100" />
                        </div>
                    </div>
                    <?php } ?>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Ảnh (420 x 220)</label>
                        <div class="col-md-4">
                            <input type="file" name="avatar" id="news-avatar" title="Tải ảnh đại diện" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Giới Thiệu (*)</label>
                        <div class="col-md-9">
                            <textarea name="desc" cols="50" rows="5"><?php echo (isset($info))?$info['desc']:""?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Nội Dung (*)</label>
                        <div class="col-md-10">
                            <textarea name="content" class="ckeditor"><?php echo (isset($info))?$info['content']:""?></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-actions nobg fluid">
                    <div class="col-md-offset-3 col-md-9">
                        <a href="<?php echo base_url() ?>admin/duan/listall"  class="btn default">Hủy bỏ</a>
                        <button class="btn green" id='btn-ok' name='ok' type='submit'>Xác Nhận</button>
                    </div>
                </div>
            </form>
            <!-- END FORM-->
        </div>
    </div>
<script>
    $(document).ready(function(){
        $('.select2').select2({
            tags:true
        });
    })
</script>


