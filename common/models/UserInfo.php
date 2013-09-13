<?php

namespace common\models;

class UserInfo extends \common\ext\MongoDb\Document {

    
    
    /**
     * This returns the name of the collection for this class
     *
     * @return string
     */
    public function getCollectionName() {
        return 'user.info';
    }

}