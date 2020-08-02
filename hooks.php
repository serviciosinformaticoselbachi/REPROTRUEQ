<?php

use WHMCS\Database\Capsule;
use WHMCS\Service\Service;

add_hook('EmailTplMergeFields', 1, function($vars) {
	$merge_fields = [];
	$merge_fields['mediacp_panel_url'] = "MediaCP Panel URL";
	$merge_fields['mediacp_host_address'] = "MediaCP Host Address";
	$merge_fields['mediacp_portbase'] = "MediaCP Portbase";
	return $merge_fields;
});
add_hook('EmailPreSend', 1, function($vars) {

	$service = Service::with('product')->find($vars['relid']);

	if ( $service->product->servertype == 'mediacp' ){

		$merge_fields = [
			'mediacp_panel_url' => ($service->serverModel->secure=='on'?'https://':'http://') . $service->serverModel->hostname . ':' . ($service->serverModel->port?$service->serverModel->port:8080)
		];

		list($merge_fields['mediacp_host_address'],$merge_fields['mediacp_portbase']) = explode(':',$service->domain);

		return $merge_fields;
	}

	return [];
});
