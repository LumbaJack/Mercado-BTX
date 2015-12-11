<?php
/* @var $this AccountController */

$this->breadcrumbs=array(
	'Account',
);
?>
		<h4 class="" style="text-transform: uppercase; font-size: 1.8em;"><?php echo Yii::t('translation', 'verify_main_title'); ?></h4>
	<hr>
<div class="row" style="padding-top:20px;">
<div class="col-md-10">
	<div class="row">
		<div class="span10">
			 <div class="control-group" style="padding:10px;">
			 <label class="control-label" for="user_name"><?php echo Yii::t('translation', 'verify_sub_title_1'); ?>:</label>
			 <label class="control-label" for="user_name" style="font-weight: 700; font-size: 1.6em; text-transform: uppercase;"><span class="label <?php if($userdata->isVerified()) { echo "label-success"; }else {echo "label-danger";}?>"><?php echo Yii::t('translation', ($userdata->isVerified() ? 'verify_sub_title_1_2' : 'verify_sub_title_1_1')); ?></span></label>
			 </div>
			 <div class="control-group" style="padding:10px;">
			 <label class="control-label" for="user_name"><?php echo Yii::t('translation', 'verify_sub_title_2'); ?>:</label>
			 <label class="control-label" for="user_name" style="font-weight: 700; font-size: 1.6em; text-transform: uppercase;"> #<?php echo sprintf('%010d', $userdata->id); ?></span></label>
			 </div>
	
		</div>
	</div>
</div>
</div>

<hr>
<div class="row" style="padding-top:50px;">
<h3 class="" style="text-transform: uppercase; font-size: 1.8em;"><?php echo Yii::t('translation', 'verify_mid_title'); ?></h3> 
<script>
$(function () {

    function noti(txt, ty) {
        $.pnotify({
            text: txt, icon: false, styling: 'bootstrap3', type: ty });
    }



    var url = "/verify/upload";
    $('.uploadobj').fileupload({
        url: url,
        dataType: 'json',
	acceptFileTypes: /(\.|\/)(gif|jpe?g|png|pdf)$/i,
	autoUpload: true,
        done: function (e, data) {
	    id = $(this).attr('id').substr(-1);
	    $('#ipb' + id ).css('width', '100%');
	    $("#pb" + id).hide();
	    switch(parseInt(data.result.Code)) {
	        case 500:
                    $("#div" + id).html(data.result.MSG);
	            break;
		case 501:
                    $("#div" + id).html('El archivo es muy grande.');
		    noti('El archivo es muy grande.','error');
		    break;
		case 502:
                    $("#div" + id).html('Formato de archivo no valido.');
		    noti('Formato de archivo no valido.','error');
		    break;
		case 503:
                    $("#div" + id).html('Error enviando al S3.');
		    noti('Error enviando al S3.','error');
		    break;
		case 200:
		    noti('Archivo subido con exito','success');
		    break;
	    }
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            id = $(this).attr('id').substr(-1);
            $('#ipb' + id ).css(
                'width',
                progress + '%'
            );
        }
    }).on('fileuploadadd', function (e, data) {
        id = $(this).attr('id').substr(-1);
        $("#pb" + id).show();
        $("#div" + id).html(data.files[0].name);
    }).on('fileuploadfail', function (e, data) {
        id = $(this).attr('id').substr(-1);
        $("#pb" + id).hide();
        $("#div" + id).html('File upload failed.');
    }).on('fileuploadprocessalways', function (e, data) {
        id = $(this).attr('id').substr(-1);
        var index = data.index,
        file = data.files[index];
        if (file.error) {
            $("#div" + id).html('');
            $("#pb" + id).hide();
	    noti('Formato de archivo no valido.','error');
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});
</script>
<?php if($userdata->type_person == "F") { ?>
<div class="panel panel-default">
<!-- Default panel contents -->
   <div class="panel-heading"><?php echo Yii::t('translation', 'verify_table_1_title');?></div>

<!-- Table -->
	<table class="table">
	 <thead>
		<tr>
		<th><?php echo Yii::t('translation', 'verify_table_1_col_1');?></th>
		<th><?php echo Yii::t('translation', 'verify_table_1_col_2');?></th>
		<th><?php echo Yii::t('translation', 'verify_table_1_col_3');?></th>
		</tr>
	</thead>
	<tbody >
		<tr class="">
			<td><?php echo Yii::t('translation', 'verify_table_1_row_1');?></td>
			<td><div id="div1">&nbsp</div>
                            <div id='pb1' class="progress progress-striped active" style="display:none">
                               <div id='ipb1' class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                             </div>
			</td>
			<td><span class="btn btn-success fileinput-button"><i class="glyphicon glyphicon-plus"></i><span><?php echo Yii::t('translation', 'verify_table_action_1');?></span><input id="docid1" type="file" name="files" class='uploadobj' ></span></td>
		</tr>
		<tr class="">
			<td><?php echo Yii::t('translation', 'verify_table_1_row_2');?> </td> 
			<td><div id="div2">&nbsp</div>
                            <div id='pb2' class="progress progress-striped active" style="display:none">
                               <div id='ipb2' class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                             </div>
                        </td>
			<td><span class="btn btn-success fileinput-button"><i class="glyphicon glyphicon-plus"></i><span><?php echo Yii::t('translation', 'verify_table_action_1');?></span><input id="docid2" type="file" name="files" class='uploadobj' ></span></td>
		</tr>
		<tr class="">
                        <td><?php echo Yii::t('translation', 'verify_table_1_row_3');?> </td>
			<td><div id="div3">&nbsp</div>
                            <div id='pb3' class="progress progress-striped active" style="display:none">
                               <div id='ipb3' class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                             </div>
                        </td>
			<td><span class="btn btn-success fileinput-button"><i class="glyphicon glyphicon-plus"></i><span><?php echo Yii::t('translation', 'verify_table_action_1');?></span><input id="docid3" type="file" name="files"  class='uploadobj'></span></td>
		</tr>
	</tbody>
	</table>
</div>
<?php } else { ?>
<div class="panel panel-default">
<!-- Default panel contents -->
   <div class="panel-heading"><?php echo Yii::t('translation', 'verify_table_2_title');?></div>

<!-- Table -->
	<table class="table">
	 <thead>
		<tr>
		<th><?php echo Yii::t('translation', 'verify_table_1_col_1');?></th>
		<th><?php echo Yii::t('translation', 'verify_table_1_col_2');?></th>
		<th><?php echo Yii::t('translation', 'verify_table_1_col_3');?></th>
		</tr>
	</thead>
	<tbody >
		<tr class="">
			<td><?php echo Yii::t('translation', 'verify_table_2_row_1');?></td>
			<td><div id="div1">&nbsp</div>
                            <div id='pb1' class="progress progress-striped active" style="display:none">
                               <div id='ipb1' class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                             </div>
                        </td>
			<td><span class="btn btn-success fileinput-button"><i class="glyphicon glyphicon-plus"></i><span><?php echo Yii::t('translation', 'verify_table_action_1');?></span><input id="docid1" type="file" name="files" class='uploadobj' ></span></td>
		</tr>
		<tr class="">
			<td><?php echo Yii::t('translation', 'verify_table_2_row_2');?></td>
			<td><div id="div2">&nbsp</div>
                            <div id='pb2' class="progress progress-striped active" style="display:none">
                               <div id='ipb2' class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                             </div>
                        </td>
			<td><span class="btn btn-success fileinput-button"><i class="glyphicon glyphicon-plus"></i><span><?php echo Yii::t('translation', 'verify_table_action_1');?></span><input id="docid2" type="file" name="files" class='uploadobj' ></span></td>
		</tr>
		 <tr class="">
                        <td><?php echo Yii::t('translation', 'verify_table_2_row_3');?></td>
			<td><div id="div3">&nbsp</div>
                            <div id='pb3' class="progress progress-striped active" style="display:none">
                               <div id='ipb3' class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                             </div>
                        </td>
			<td><span class="btn btn-success fileinput-button"><i class="glyphicon glyphicon-plus"></i><span><?php echo Yii::t('translation', 'verify_table_action_1');?></span><input id="docid3" type="file" name="files" class='uploadobj' ></span></td>
                </tr>
		 <tr class="">
                        <td><?php echo Yii::t('translation', 'verify_table_2_row_4');?></td>
			<td><div id="div4">&nbsp</div>
                            <div id='pb4' class="progress progress-striped active" style="display:none">
                               <div id='ipb4' class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                             </div>
                        </td>
			<td><span class="btn btn-success fileinput-button"><i class="glyphicon glyphicon-plus"></i><span><?php echo Yii::t('translation', 'verify_table_action_1');?></span><input id="docid4" type="file" name="files" class='uploadobj' ></span></td>
                </tr>	
		<tr class="">
			<td><?php echo Yii::t('translation', 'verify_table_2_row_5');?> </td> 
			<td><div id="div5">&nbsp</div>
                            <div id='pb5' class="progress progress-striped active" style="display:none">
                               <div id='ipb5' class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                             </div>
                        </td>
			<td><span class="btn btn-success fileinput-button"><i class="glyphicon glyphicon-plus"></i><span><?php echo Yii::t('translation', 'verify_table_action_1');?></span><input id="docid5" type="file" name="files" class='uploadobj' ></span></td>
		</tr>
		<tr class="">
                        <td><?php echo Yii::t('translation', 'verify_table_2_row_6');?></td>
			<td><div id="div6">&nbsp</div>
                            <div id='pb6' class="progress progress-striped active" style="display:none">
                               <div id='ipb6' class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                             </div>
                        </td>
			<td><span class="btn btn-success fileinput-button"><i class="glyphicon glyphicon-plus"></i><span><?php echo Yii::t('translation', 'verify_table_action_1');?></span><input id="docid6" type="file" name="files" class='uploadobj' ></span></td>
                </tr>
<!-- **********FUTURE
		 <tr class="">
                        <td><?php echo Yii::t('translation', 'URL de sitio web');?></td>
                        <td><a href="#"  class="label label-info"><?php echo Yii::t('translation', 'verify_table_action_1'); ?></a></td>
                        <td> <a href="#" class="glyphicon glyphicon-trash " data-method="post" data-remote="true" rel="nofollow">&nbsp;<?php echo Yii::t('translation', 'verify_table_action_2');?></a></td>
                </tr>
		 <tr class="">
                        <td><?php echo Yii::t('translation', 'Breve descripci&oacute;n de los productos o servicios que comercializa');?></td>
                        <td><a href="#"  class="label label-info"><?php echo Yii::t('translation', 'verify_table_action_1'); ?></a></td>
                        <td> <a href="#" class="glyphicon glyphicon-trash " data-method="post" data-remote="true" rel="nofollow">&nbsp;<?php echo Yii::t('translation', 'verify_table_action_2');?></a></td>
                </tr>
-->
	</tbody>
	</table>
</div>
<?php } ?>
</div>	

