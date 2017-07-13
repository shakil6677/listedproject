<?php
public function checkattempt($data) {
    $service_provider_info = $this->getServiceProvider($data['service']);
    if ($service_provider_info['type'] == "BILL") {
        $CurrentAccountNumber = $data['accountnumber'];
        $CurrentDate = date("Y-m-d");
        $query = $this->db->query("SELECT bt.*,sp.type FROM `" . DB_PREFIX . "bill_transaction` as bt JOIN `" . DB_PREFIX . "service_provider` as sp ON bt.service_provider_id = sp.service_provider_id WHERE bt.customer_id = '" . (int) $this->customer->getId() . "' AND sp.type = 'BILL' AND bt.account_number ='" . $CurrentAccountNumber . "' AND date(bt.date_added) = '" . $CurrentDate . "'");
        if ($query->num_rows) {

            return false;
        } else {
            return $query->row;
        }
    } else {
        echo "hi am Toup up";
    }
}

?>