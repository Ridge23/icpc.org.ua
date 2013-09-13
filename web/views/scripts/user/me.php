<div class="col-lg-offset-4 col-lg-5">
    <h3 class="text-center"><?= \yii::t('app', 'Profile information') ?></h3>
    <table class="table table-bordered">
        <tr>
            <td>
                <?= \yii::t('app', 'Name') ?>
            </td>
            <td>
                <?= $userInfo->firstName ?> <?= $userInfo->lastName ?>
            </td>
        </tr>
        <tr>
            <td>
                <?= \yii::t('app', 'Email') ?>
            </td>
            <td>
                <?= $userInfo->email ?> <?= $userInfo->lastName ?>
            </td>
        </tr>
        <tr>
            <td>
                <?= \yii::t('app', 'User status') ?>
            </td>
            <td>
                <?= $userInfo->role ?>
            </td>
        </tr>
    </table>
    <p class="text-right">
        <a href="<?= $this->createUrl('/user/edit') ?>" class="btn btn-primary btn-lg btn-xs"><?= \yii::t('app', 'Edit profile') ?></a>
    </p>

    <h3 class="text-center" ><?= ucfirst($userInfo->role) ?> <?= \yii::t('app', 'information') ?></h3>
    <table class="table table-bordered">
        <tr>
            <td>
                Country
            </td>
            <td>
                Ukraine
            </td>
        </tr>
        <tr>
            <td>
                City
            </td>
            <td>
                Dnepropetrovsk
            </td>
        </tr>
        <tr>
            <td>
                University
            </td>
            <td>
                DNU
            </td>
        </tr>
        <tr>
            <td>
                Faculty
            </td>
            <td>
                FTF
            </td>
        </tr>
        <tr>
            <td>
                Speciality
            </td>
            <td>
                Rocket science
            </td>
        </tr>
        <tr>
            <td>
                Course
            </td>
            <td>
                4
            </td>
        </tr>

    </table>
    <p class="text-right">
        <a href="<?= $this->createUrl('/user/edit-info') ?>" class="btn btn-primary btn-lg btn-xs"><?= \yii::t('app', 'Edit info') ?></a>
    </p>
</div>
