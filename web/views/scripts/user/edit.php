<div class="col-lg-offset-4 col-lg-5">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><?=\yii::t('app', 'User Info')?></h3>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" method="post">
                <div class="form-group">
                    <label for="firstName" class="col-lg-4 control-label"><?=\yii::t('app', 'First Name')?></label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="firstName" id="firstName" value="<?=\CHtml::encode($userInfo->firstName)?>" placeholder="<?=\yii::t('app', 'First Name')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastName" class="col-lg-4 control-label"><?=\yii::t('app', 'Last Name')?></label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="lastName"  id="lastName" value="<?=\CHtml::encode($userInfo->lastName)?>" placeholder="<?=\yii::t('app', 'Last Name')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-lg-4 control-label"><?=\yii::t('app', 'Email')?></label>
                    <div class="col-lg-8">
                        <input type="email" class="form-control" name="email" id="email" value="<?=\CHtml::encode($userInfo->email)?>" placeholder="<?=\yii::t('app', 'Email')?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 text-center">
                        <button type="submit" class="btn btn-primary"><?=\yii::t('app', 'Update')?></button>
                    </div>
                </div>
            </form>
            <?php if (count($errors) > 0): ?>
                <pre><?php var_dump($errors); ?></pre>
            <?php endif; ?>
        </div>
    </div>
</div>