<?php
/**
 * Created by MediaCP.net.
 * Date: 15/12/2018
 * Time: 8:40 PM
 */

class scstats {
	private $json;
	private $djmeta;
	private $dj;

	public function __construct($address, $port, $secure = false)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, ($secure?'https':'http') . '://' . $address . ':' . $port . '/stats?json=1');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (MediaCP.net)');
		curl_setopt($ch, CURLOPT_TIMEOUT, 8);
		$response = curl_exec($ch);
		$this->json = ($response ? json_decode(iconv('UTF-8', 'UTF-8//IGNORE', $response)) : false);
		$dj = json_decode($this->json->dj);
		$this->djmeta = $dj ? $dj : [];
		$this->dj = $dj ? htmlspecialchars($dj->dj) : @htmlspecialchars($this->json->dj);
		curl_close($ch);
	}


	/*
	 * Return prepared streamstatus as:
	 * 0 = server offline
	 * 1 = server online - no stream
	 * 2 = server and stream online
	 * @return int
	 */
	public function getStreamStatus(){
		return $this->json ? ($this->json->streamstatus === 0 ? 1 : 2) : 0;
	}

	/**
	 * Returns item value from the server or an empty string
	 * @param $item
	 * @return string
	 */
	public function get($item = false)
	{
		if ( !$item ) return json_encode($this->json, JSON_PRETTY_PRINT);
		return isset($this->json->$item) ? htmlspecialchars($this->_json->$item) : '';
	}

	/**
	 * Returns DJ Name as configured in MediaCP or an empty string if no current DJ
	 * @return string
	 */
	public function dj()
	{
		return isset($this->dj) ? $this->dj : '';
	}

	/**
	 * Returns object of dj's meta data sent along with the broadcast
	 * Only works if using liquidsoap as source
	 * @return string|object
	 */
	public function djMeta($item = false)
	{
		if ( $item ) return isset($this->djmeta->$item) ? $this->djmeta->{$item} : '';
		return json_encode($this->djmeta, JSON_PRETTY_PRINT);
	}
}


$sc2 = new scstats('localhost', '8004', false);
echo "<pre>{$sc2->get()}</pre>"; // Returns all available variables from SC2 stats
echo $sc2->get('servertitle');
echo $sc2->get('servergenre');
echo $sc2->get('songtitle');
echo $sc2->get('currentlisteners');
echo $sc2->get('peaklisteners');
echo $sc2->get('maxlisteners');
echo $sc2->get('uniquelisteners');

echo $sc2->dj(); // Displays current DJ
echo "<pre>{$sc2->djMeta()}</pre>"; // Returns all available DJ meta data
echo $sc2->djMeta('icy-name');
echo $sc2->djMeta('icy-genre');
echo $sc2->djMeta('icy-url');