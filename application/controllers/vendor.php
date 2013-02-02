<?php

class Vendor_Controller extends Base_Controller {

    

    public function action_show()
    {
        $vendors = Vendor::order_by('name', 'asc')->get();
    }

}

