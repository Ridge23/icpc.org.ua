<?php \yii::app()->getClientScript()->registerCoreScript('ckeditor'); ?>

<script type="text/javascript">
    $(document).ready(function() {
        new appStaffNewsEdit();
    });
</script>

<div class="page-header clearfix">
    <h1>
        <?=\yii::t('app', 'Edit News')?>
    </h1>
    <small><a href="<?=$this->createUrl('/news/view', array(
        'id'    => $news->commonId,
        'lang'  => $news->lang,
    ))?>" target="_blank">
        <?=$this->createAbsoluteUrl('/news/view', array('id' => $news->commonId))?>
    </a></small>
</div>
<div class="form-horizontal clearfix">
    <ul class="nav nav-tabs">
        <?php foreach (\yii::app()->params['languages'] as $langKey => $langVal): ?>
            <li class="<?=$news->lang === $langKey ? 'active' : ''?>">
                <a href="<?=$this->createUrl('edit', array(
                    'id'    => $news->commonId,
                    'lang'  => $langKey,
                ))?>"><?=$langVal?></a>
            </li>
        <?php endforeach; ?>
    </ul>
    <br />
    <input type="hidden" class="id" value="<?=$news->commonId?>" />
    <input type="hidden" class="lang" value="<?=$news->lang?>" />
    <div class="form-group">
        <input type="text" class="form-control title" value="<?=\CHtml::encode($news->title)?>" placeholder="<?=\yii::t('app', 'Title')?>">
    </div>
    <div class="form-group">
        <textarea class="form-control content" style="height: 500px;"><?=\CHtml::encode($news->content)?></textarea>
    </div>
    <div class="form-group">
        <button class="btn btn-primary save-news btn-lg pull-left" disabled="">
            <?=\yii::t('app', 'Save News')?>
        </button>
        <?php if (!$news->getIsNewRecord()): ?>
            <div class="pull-right">
                <?php $this->widget('\web\widgets\news\StatusSwitcher', array('news' => $news)); ?>
            </div>
        <?php endif; ?>
    </div>
</div>