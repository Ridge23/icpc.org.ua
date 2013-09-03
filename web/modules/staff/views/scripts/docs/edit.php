<?php
    use \common\models\Document;
    \yii::app()->getClientScript()->registerCoreScript('plupload');
?>

<script type="text/javascript">
    $(document).ready(function() {
        new appStaffDocsEdit();
    });
</script>

<div class="page-header clearfix">
    <h1>
        <?=\yii::t('app', 'Document')?>
    </h1>
    <?php if (!$document->getIsNewRecord()): ?>
        <small><a href="<?=$this->createUrl('/document/view', array('id' => $document->_id))?>" target="_blank">
            <?=$this->createAbsoluteUrl('/document/view', array('id' => $document->_id))?>
        </a></small>
    <?php endif; ?>
</div>
<div class="form-horizontal clearfix">
    <input type="hidden" class="id" value="<?=$document->_id?>" />
    <div class="form-group">
        <?php if ($document->getIsNewRecord()): ?>
            <div id="container" style="position: relative;">
                <button class="btn btn-primary" id="pickfiles">
                    <?=\yii::t('app', 'Upload')?>
                </button>
                <span class="document-origin-filename"></span>
                <div class="help-block"></div>
            </div>
        <?php else: ?>
            <button class="btn btn-primary" disabled="">
                <?=\yii::t('app', 'Uploaded')?>
            </button>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <input type="text" class="form-control title" value="<?=\CHtml::encode($document->title)?>" placeholder="<?=\yii::t('app', 'Title')?>">
    </div>
    <div class="form-group">
        <textarea class="form-control desc"><?=\CHtml::encode($document->desc)?></textarea>
    </div>
    <div class="form-group">
        <select class="form-control type">
            <option value="<?=Document::TYPE_REGULATIONS?>">
                <?=Document::model()->getAttributeLabel(Document::TYPE_REGULATIONS, 'type')?>
            </option>
            <option value="<?=Document::TYPE_GUIDANCE?>">
                <?=Document::model()->getAttributeLabel(Document::TYPE_GUIDANCE, 'type')?>
            </option>
        </select>
    </div>
    <div class="form-group">
        <button class="btn btn-primary save-document btn-lg pull-left" disabled="">
            <?=\yii::t('app', 'Save Document')?>
        </button>
        <?php if (!$document->getIsNewRecord()): ?>
            <div class="pull-right">

            </div>
        <?php endif; ?>
    </div>
</div>