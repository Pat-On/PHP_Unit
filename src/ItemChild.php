
<?php
// one way to test the protected methods is to use inheritance

class ItemChild extends Item
{
    public function getId()
    {
        // we are changing visibility to test it
        return parent::getID();
    }

    public function getToken(){
        // private methods are not inherited <- it is not going to work
        // should not be tested
        return parent::getToken();
    }
}
